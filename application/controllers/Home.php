<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
        $this->load->model('Home_Model');
        $this->load->model('User_Model');
        $this->load->model('Disciplines_Model');
        $this->load->model('Log_Model');
        date_default_timezone_set('America/Sao_Paulo');
        $this->now = date('Y-m-d');
    }

    function index() {
        if ($this->user['logged']) {
            $data['disciplines'] = $this->Disciplines_Model->get_disciplines();
            if ($this->user['type'] != 'pae') {
                foreach ($data['disciplines'] as $key => $d) {
                    //checa se disciplina esta ativa
                    $discipline = $this->Disciplines_Model->get_discipline($d['disc_id']);
                    if (($this->now >= $discipline['start_date_lessons'] && $this->now < $discipline['end_date_lessons']) || ($this->now > $discipline['start_date_lessons'] && $this->now <= $discipline['end_date_lessons'])) {
                        $data['disciplines'][$key]['active'] = 1;
                    } else {
                        $data['disciplines'][$key]['active'] = 0;
                    }

                    // calcula % de cada disciplina do aluno
                    if ($this->user['type'] == 'student') {
                        $data['disciplines'][$key]['percent'] = $this->Disciplines_Model->get_percent_discipline($d['disc_id']);
                        if ($data['disciplines'][$key]['percent'] > 100) {
                            $data['disciplines'][$key]['percent'] = 100;
                        }
                    } else {
                        $data['disciplines'][$key]['percent'] = 0;
                    }
                }
            }
            $data['open_apresentation'] = $this->Home_Model->check_first_access($this->user['id']);
            if ($data['open_apresentation'] == 1) {
                $this->Home_Model->save_first_access($this->user['id']);
            }
            if ($this->Home_Model->get_apresentation_video()) {
                $data['apresentation_video'] = $this->Home_Model->get_apresentation_video();
            }
            $data['title'] = 'Inicio';
            $data['content'] = 'home/index';
            $this->load->view('layouts/default', $data);
        } else {
            $data['title'] = 'Login';
            $data['content'] = 'home/login';
            $this->load->view('layouts/none', $data);
        }
    }

    function login() {
        $data['title'] = 'Login';
        $data['content'] = 'home/login';
        $this->load->view('layouts/none', $data);
    }

    function accessLogs($disc_id) {
        if ($this->user['type'] != 'student') {
            $data['logs'] = $this->Log_Model->get_logs_my_discipline($disc_id);

//            
//             foreach ($results as $result) {
//            $data['logs'][] = array(
//                'start_date' => date('d-M-Y', strtotime($result['start_date'])),
//                'user_name' => $result['user_name'],
//                'content_name' => $result['content_name'],
//                'content_type' => $result['content_type'],
//                'log_quantity' => $result['log_quantity'],
//                'evaluation_note' => $result['evaluation_note'],
//                'last_access' => date('d-M-Y', strtotime($result['last_access']))
//            );
//        }
//            
//            pr('<pre>');
//            pr($data['logs']);
//            exit;
            $data['content'] = 'home/accessLogs';
            $this->load->view('layouts/none', $data);
        } else {
            $data['content'] = 'warning/500';
            $this->load->view('layouts/none', $data);
        }
    }

    function logout() {
        $this->session->sess_destroy();
        $data['title'] = '';
        $data['content'] = 'home/login';
        $this->load->view('layouts/none', $data);
    }

    function profile() {
        if ($this->user['logged']) {
            $data['user'] = $this->User_Model->get_user($this->user['id']);
            $add_info = $this->User_Model->get_user_add_info($this->user['id']);
            foreach ($add_info as $ai) {
                $data['user_add_info'][$ai['id']] = $ai;
            }
            $data['user']['birthday'] = implode('/', array_reverse(explode('-', $data['user']['birthday'])));
            $data['number_contents_studied'] = $this->Disciplines_Model->count_my_contents();
            $data['number_relationship_disciplines'] = count($this->Disciplines_Model->get_disciplines());
//            $data['add_information'] = $this->Home_Model->get_additional_information_configs();
            $data['title'] = lang('my_profile');
            $data['content'] = 'users/profile';
            $this->load->view('layouts/default', $data);
        } else {
            $data['content'] = 'warning/500';
            $this->load->view('layouts/none', $data);
        }
    }

    function view_message() {
        $data['message'] = $this->input->post('message');
        $data['content'] = 'home/message';
        $this->load->view('layouts/none', $data);
    }

    function listForuns($disc_id) {
        $data['foruns'] = $this->Home_Model->get_foruns($disc_id);
        foreach ($data['foruns'] as $key => $f) {
            $temp_forum = $this->Home_Model->get_last_forum_post($f['forum_id']);
            if (isset($temp_forum['posted_user'])) {
                $data['foruns'][$key]['posted_user'] = $temp_forum['posted_user'];
                $data['foruns'][$key]['last_post'] = $temp_forum['last_post'];
            } else {
                $data['foruns'][$key]['posted_user'] = '';
                $data['foruns'][$key]['last_post'] = '';
            }
        }
        $this->load->model('Settings_Model');
        $data['categories'] = $this->Settings_Model->get_categories(FALSE);
        $data['content'] = 'foruns/listForuns';
        $this->load->view('layouts/none', $data);
    }

    function open_forum() {
        $forum_id = $this->input->post('forum_id');
        $data['forum'] = $this->Home_Model->get_forum_posts($forum_id);
        $data['f'] = $this->Home_Model->get_forum($forum_id);
        foreach ($data['forum'] as $key => $f) {
            $array = explode(' ', $f['created_time']);
            $data['forum'][$key]['hour'] = $array[1];
            $data['forum'][$key]['date'] = implode('/', array_reverse(explode('-', $array[0])));
        }
        $data['forum_title'] = $data['f']['forum_title'];
        $data['category_name'] = $data['f']['category_name'];
        $data['forum_id'] = $forum_id;
        $data['content'] = 'foruns/openForum';
        $this->load->view('layouts/none', $data);
    }

    function save_new_forum_text() {
        $forum_id = $this->input->post('forum_id');
        $text = $this->input->post('text');
        $result = $this->Home_Model->save_new_forum_text($forum_id, $text);
        echo json_encode(array(
            'status' => $result
        ));
        exit;
    }

    function send_email_new_forum_message() {
        $forum_id = $this->input->post('forum_id');
        $forum = $this->Home_Model->get_forum($forum_id);
        // envia email para todos que acompanham o forum
        $data_template['name'] = $this->user['name'];
        $data_template['forum_name'] = $forum['forum_title'];
        $data_template['base_url'] = $this->config->base_url();
        $content = $this->load->view('layouts/forum_post_email', $data_template, TRUE);

        $users_forum = $this->Home_Model->get_forum_users($forum_id);
        foreach ($users_forum as $uf) {
            mail_to($uf['email'], $uf['name'], "Postagem no Fórum", $content);
        }
        $discipline_owner = $this->Disciplines_Model->get_discipline_owner_with_forum($forum_id);
        mail_to($discipline_owner['email'], $discipline_owner['name'], "Postagem no Fórum", $content);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    function delete_forum() {
        $forum_id = $this->input->post('id');
        $result = $this->Home_Model->delete_forum($forum_id);
        echo json_encode(array(
            'status' => $result
        ));
        exit;
    }

    function load_forum() {
        $forum_id = $this->input->post('id');
        $forum = $this->Home_Model->get_forum($forum_id);
        echo json_encode(array(
            'forum' => $forum
        ));
        exit;
    }

    function save_forum() {
        $forum = $this->input->post();
        if ($forum['id']) {
            $result = $this->Home_Model->edit_forum($forum);
            $forum_id = $forum['id'];
        } else {
            $forum_id = $this->Home_Model->create_forum($forum);
        }
        echo json_encode(array(
            'forum_id' => $forum_id
        ));
    }

    function disciplineRegistration() {
        if ($this->user['logged']) {
            $data['disciplines'] = $this->Disciplines_Model->get_disciplines();
            foreach ($data['disciplines'] as $key => $d) {
                //checa se disciplina esta ativa
                $discipline = $this->Disciplines_Model->get_discipline($d['disc_id']);
                if (($this->now >= $discipline['start_date_registrations'] && $this->now < $discipline['end_date_registrations']) || ($this->now > $discipline['start_date_registrations'] && $this->now <= $discipline['end_date_registrations'])) {
                    $data['disciplines'][$key]['active'] = 1;
                } else {
                    $data['disciplines'][$key]['active'] = 0;
                }
            }
            $data['content'] = 'disciplines/disciplineRegistration';
            $this->load->view('layouts/none', $data);
        } else {
            $data['content'] = 'warning/500';
            $this->load->view('layouts/none', $data);
        }
    }

    function students($discipline_id) {
        if ($this->user['logged'] && $this->user['type'] != 'student') {
            $data['students'] = $this->Disciplines_Model->get_my_students($discipline_id);
            foreach ($data['students'] as $key => $s) {
                $data['students'][$key]['date_hour'] = $this->Log_Model->get_last_access($s['user_id'], $s['target_id']);
            }
            $data['title'] = 'Estudantes matriculados';
            $data['content'] = 'disciplines/listStudentsEnrolled';
            $this->load->view('layouts/none', $data);
        } else {
            $data['content'] = 'warning/500';
            $this->load->view('layouts/none', $data);
        }
    }

    function faq() {
        $data['faq'] = $this->Home_Model->get_faq();
        $data['title'] = lang('faq');
        $data['content'] = 'home/faq';
        $this->load->view('layouts/default', $data);
    }

    function batata() {
        if ($this->user['logged']) {
            $data['disciplines'] = $this->Disciplines_Model->get_disciplines();
            foreach ($data['disciplines'] as $key => $d) {
                //checa se disciplina esta ativa
                $discipline = $this->Disciplines_Model->get_discipline($d['disc_id']);
                if (($this->now >= $discipline['start_date_registrations'] && $this->now < $discipline['end_date_registrations']) || ($this->now > $discipline['start_date_registrations'] && $this->now <= $discipline['end_date_registrations'])) {
                    $data['disciplines'][$key]['active'] = 1;
                } else {
                    $data['disciplines'][$key]['active'] = 0;
                }
            }
            $data['content'] = 'home/enrollStudent';
            $this->load->view('layouts/none', $data);
        } else {
            $data['content'] = 'warning/500';
            $this->load->view('layouts/none', $data);
        }
    }

    function save_faq() {
        $faq = $this->input->post();
        if ($faq['id']) {
            // edita faq
            $result = $this->Home_Model->edit_faq($faq);
        } else {
            // cria faq
            $result = $this->Home_Model->create_faq($faq);
        }
        echo json_encode(array(
            'status' => $result
        ));
        exit;
    }

    function load_faq() {
        $faq = $this->Home_Model->load_faq($this->input->post('id'));
        echo json_encode(array(
            'question' => $faq['question'],
            'reply' => $faq['reply']
        ));
        exit;
    }

    function delete_faq() {
        $result = $this->Home_Model->delete_faq($this->input->post('id'));
        echo json_encode(array(
            'status' => $result
        ));
        exit;
    }

}

?>
