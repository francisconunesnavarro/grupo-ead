<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modules extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
        $this->load->model('Disciplines_Model');
        $this->load->model('Settings_Model');
        $this->load->model('Log_Model');
        date_default_timezone_set('America/Sao_Paulo');
        $this->now = date('Y-m-d');
        if (!$this->user['logged']) {
            $data['content'] = 'warning/500';
            $this->load->view('layouts/none', $data);
        }
    }

    function openContentCheck($file) {
        $this->load->helper('file');
        // log_content_access
        $this->Log_Model->log_content_access($file);

        $file = $this->Disciplines_Model->get_content($file);
        if ($file['type'] == 'video') {
            $extension = 'video/mp4';
        } else {
            $extension = get_mime_by_extension($file['content']);
        }
        header("Cache-Control: maxage=1");
        header("Pragma: public");
        header("Content-type: " . $extension);
        header('Content-Length:' . filesize($file['content']));
        try {
            while (@ob_end_flush());
        } catch (Exception $e) {
            
        }
        readfile($file['content']);
    }

    public function load_evaluation_replys($content_id) {
        $evaluation = $this->Disciplines_Model->get_content($content_id);
        $stats = $this->Disciplines_Model->get_correct_replys($evaluation['content']);
        $data_return = '[';
        foreach ($stats as $s) {
            $data_return = $data_return . "['" . $s['question'] . "', " . $s['replys'] . "],";
        }
        $data_return = $data_return . "]";
        $data['stats'] = $data_return;
        $data['content'] = 'disciplines/eval_replys';
        $this->load->view('layouts/default', $data);
    }

    public function load_questions() {
        if (!$this->input->is_ajax_request()) {
            // somente acesso ajax eh permitido
            redirect($this->config->base_url('warning/redirect/access_denied'));
            exit;
        }

        $input = $this->input->post();
        $subject_id = $input['subject_id'];

        $data['questions_very_easy'] = $this->Settings_Model->get_questions_with_replys('1', FALSE, $subject_id); // very_easy
        $data['questions_easy'] = $this->Settings_Model->get_questions_with_replys('2', FALSE, $subject_id); // easy
        $data['questions_medium'] = $this->Settings_Model->get_questions_with_replys('3', FALSE, $subject_id); // medium
        $data['questions_hard'] = $this->Settings_Model->get_questions_with_replys('4', FALSE, $subject_id); // hard
        $data['questions_very_hard'] = $this->Settings_Model->get_questions_with_replys('5', FALSE, $subject_id); // very_hard

        $data['questions_very_easy_count'] = count($data['questions_very_easy']);
        $data['questions_easy_count'] = count($data['questions_easy']);
        $data['questions_medium_count'] = count($data['questions_medium']);
        $data['questions_hard_count'] = count($data['questions_hard']);
        $data['questions_very_hard_count'] = count($data['questions_very_hard']);

        echo json_encode(array('questions' => $data), JSON_NUMERIC_CHECK);
        exit;
    }

    public function openModule($module_id) {
        // admin ou professor
        if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor') {

            $data['categories'] = $this->Disciplines_Model->get_category();

            $data['questions_very_easy'] = $this->Settings_Model->get_questions('1', FALSE, $module_id); // very_easy
            $data['questions_easy'] = $this->Settings_Model->get_questions('2', FALSE, $module_id); // easy
            $data['questions_medium'] = $this->Settings_Model->get_questions('3', FALSE, $module_id); // medium
            $data['questions_hard'] = $this->Settings_Model->get_questions('4', FALSE, $module_id); // hard
            $data['questions_very_hard'] = $this->Settings_Model->get_questions('5', FALSE, $module_id); // very_hard
            //quantidades de questoes de cada tipo no banco
            $data['max_very_easy'] = count($data['questions_very_easy']); // very_easy
            $data['max_easy'] = count($data['questions_easy']); // easy
            $data['max_medium'] = count($data['questions_medium']); // medium
            $data['max_hard'] = count($data['questions_hard']); // hard
            $data['max_very_hard'] = count($data['questions_very_hard']); // very_hard

            $disc_id = $this->Disciplines_Model->get_discipline_id_with_module($module_id);
            $data['return_button'] = $this->config->base_url('disciplines/openDiscipline/' . $disc_id);

            $data['module'] = $this->Disciplines_Model->get_module($module_id);
            $data['contents'] = $this->Disciplines_Model->get_contents($module_id);
            $data['title'] = $data['module']['name'];
            $data['content'] = 'disciplines/openModule';
            $this->load->view('layouts/default', $data);

            // aluno
        } else {
            if ($this->config->item('module_like_forum') == 1) {
                $data['contents'] = $this->Disciplines_Model->get_contents($module_id);
                $data['module'] = $this->Disciplines_Model->get_module($module_id);
                $data['modules'] = $this->Disciplines_Model->get_modules($data['module']['discipline_id']);

                foreach ($data['modules'] as $key => $m) {
                    if ($data['modules'][$key]['id'] == $module_id) {
                        if (isset($data['modules'][$key - 1]['id']) && $this->check_active_module($data['modules'][$key - 1]) == 1) {
                            $data['previous_module'] = $data['modules'][$key - 1]['id'];
                        } else {
                            $data['previous_module'] = null;
                        }
                        if (isset($data['modules'][$key + 1]['id']) && $this->check_active_module($data['modules'][$key + 1]) == 1) {
                            $data['next_module'] = $data['modules'][$key + 1]['id'];
                        } else {
                            $data['next_module'] = null;
                        }
                    }
                }
                $data['title'] = $data['module']['name'] . "      <a href='" . $this->config->base_url('disciplines/openDiscipline/' . $data['module']['discipline_id']) . "'>Voltar</a>";
                $data['content'] = 'disciplines/startAllModule';
                $this->load->view('layouts/default', $data);
            } else {

                $data['module'] = $this->Disciplines_Model->get_module($module_id);
                $data['contents'] = $this->Disciplines_Model->get_contents($module_id);

                // aqui define quais vao estar desativados
                // monta um array de contents ordenando pela ordem de exibicao
                // monta um array de contents que estao no log
                // se estiver no log deixa habilitado
                // se for prova olha a nota e se for azul habilita o proximo conteudo
                // desativa todos
                foreach ($data['contents'] as $key => $c) {
                    $data['contents'][$key]['disabled'] = 1;
                }

                $disabled = 0;
                //1 = esconde
                //0 = mostra
                foreach ($data['contents'] as $key => $c) {

                    if ($c['type'] == 'evaluation') {
                        $data['contents'][$key]['disabled'] = $disabled;
                        $disabled = 1;
                        $content = $this->Log_Model->get_log_content_user($c['id']);

                        if (isset($content['evaluation_note'])) {
                            if ($content['evaluation_note'] < 7) {
                                break;
                            } else {
                                $disabled = 0;
                                $data['contents'][($key + 1)]['disabled'] = $disabled;
                            }
                        }
                    } else {
                        $data['contents'][$key]['disabled'] = $disabled;
                    }
                }



                $disc_id = $this->Disciplines_Model->get_discipline_id_with_module($module_id);
                $data['return_button'] = $this->config->base_url('disciplines/openDiscipline/' . $disc_id);

                $data['discipline'] = $this->Disciplines_Model->get_discipline($data['module']['discipline_id']);
                $data['module']['start_date'] = implode('/', array_reverse(explode('-', $data['module']['start_date'])));
                $data['module']['end_date'] = implode('/', array_reverse(explode('-', $data['module']['end_date'])));
                $data['title'] = $data['discipline']['acronym'] . ' - ' . $data['module']['name'] . ' (' . $data['module']['start_date'] . ' - ' . $data['module']['end_date'] . ')';
                $data['content'] = 'disciplines/startModule';


                $this->load->view('layouts/default', $data);
            }
        }
    }

    function check_active_module($m) {
        if (($this->now >= $m['start_date'] && $this->now < $m['end_date']) || ($this->now > $m['start_date'] && $this->now <= $m['end_date'])) {
            return 1;
        } else {
            return 0;
        }
    }

    public function open_file($content_id) {
        $this->load->helper('file');
        $content = $this->Disciplines_Model->get_content($content_id);
        $file = $this->config->base_url() . $content['content'];
        header('Content-Type: ' . get_mime_by_extension($content['content']));
        readfile($file);
    }

    function downloadContentFile($content_id) {
        $this->load->library('curl');
        $this->load->helper('download');
        $content = $this->Disciplines_Model->get_content($content_id);

        //$data = file_get_contents($this->config->base_url($content['content']));
        //$data = $this->curl->simple_get($this->config->base_url($content['content']));
        //force_download($this->config->base_url($content['content']), NULL);

        echo json_encode(array(
            'data' => $this->config->base_url($content['content'])
        ));
        exit;
    }

    public function create_student_evaluation() {
        ini_set('MAX_EXECUTION_TIME', -1);
        $content_id = $this->input->post('id');
        // log_content_access
        $this->Log_Model->log_content_access($content_id);

        $evaluation = $this->Disciplines_Model->get_content($content_id);
        $evaluation = $this->Disciplines_Model->get_evaluation_data($evaluation['content']);
        $full_evaluation = array();

//montando prova com respostas corretas e erradas randomicamente
        foreach ($evaluation as $e) {
            $question = $this->Settings_Model->get_question($e['question_id']);

            if (count($question) !== 0) {
                if (count($question) === 4) {
                    $question_wrong = $this->Settings_Model->get_question_wrong($e['question_id'], 3);
                    $question_ok = $this->Settings_Model->get_question_ok($e['question_id']);
                    $return = false;
                    if (isset($question_ok[0]) && isset($question_wrong[0]) && isset($question_wrong[1]) && isset($question_wrong[2])) {
                        $question_ready[0] = $question_wrong[0];
                        $question_ready[1] = $question_wrong[1];
                        $question_ready[2] = $question_wrong[2];
                        $question_ready[3] = $question_ok[0];
                        $return = true;
                    }
                } else if (count($question) === 5) {
                    $question_wrong = $this->Settings_Model->get_question_wrong($e['question_id'], 4);
                    $question_ok = $this->Settings_Model->get_question_ok($e['question_id']);
                    $return = false;
                    if (isset($question_ok[0]) && isset($question_wrong[0]) && isset($question_wrong[1]) && isset($question_wrong[2]) && isset($question_wrong[3])) {
                        $question_ready[0] = $question_wrong[0];
                        $question_ready[1] = $question_wrong[1];
                        $question_ready[2] = $question_wrong[2];
                        $question_ready[3] = $question_ok[0];
                        $question_ready[4] = $question_wrong[3];
                        $return = true;
                    }
                } else {
                    $question_wrong = $this->Settings_Model->get_question_wrong($e['question_id'], 2);
                    $question_ok = $this->Settings_Model->get_question_ok($e['question_id']);
                    $return = false;
                    if (isset($question_ok[0]) && isset($question_wrong[0]) && isset($question_wrong[1])) {
                        $question_ready[0] = $question_wrong[0];
                        $question_ready[1] = $question_wrong[1];
                        $question_ready[2] = $question_ok[0];
                        $return = true;
                    }
                }
                if ($return) {
                    shuffle($question_ready);
                    array_push($full_evaluation, $question_ready);
                }
                $question_ready = null;
            }
        }
        //shuffle($full_evaluation);
        $data['evaluation'] = $evaluation;
        $data['full_evaluation'] = $full_evaluation;
        $data['content'] = 'disciplines/startEvaluation';
        $this->load->view('layouts/none', $data);
    }

    public function finish_evaluation() {
        $this->load->model('Modules_Model');
        $replys = $this->input->post('replys');
        $evaluation_id = $this->input->post('evaluation_id');
        $module_id = $this->input->post('module_id');

        $aswers = '<div style="text-align: left"><label style="font-size: 12pt"><b>As questões que você precisa estudar mais são:</b></label><br>';
        // calcula nota do aluno
        $corrects = 0;
        if ($replys) {
            foreach ($replys as $r) {
                $reply = $this->Modules_Model->get_reply($r);
                $corrects = $corrects + $reply['correct'];
                $question = $this->Settings_Model->get_question($reply['question_id']);
                $aswers = $aswers . '<br>-<label style="font-size: 11pt">' . $question[0]['question'] . '</label>';
                // salva respostas do aluno
                $this->Modules_Model->save_user_evaluation_reply($evaluation_id, $module_id, $r['name'], $r['value']);
            }
        }
        $aswers = $aswers . '</div>';
        $evaluation = $this->Disciplines_Model->get_evaluation_data($evaluation_id);
        $note = ($corrects * 10) / $evaluation[0]['quantity_questions'];

        //busca content com id da avaliacao
        $content = $this->Modules_Model->get_content_with_evaluation_id($evaluation_id);
        // salva nota do aluno
        $this->Log_Model->save_user_evaluation_note($content['id'], $note);

        // busca config de exibir nota ou nao na disciplina
        $discipline_id = $this->Disciplines_Model->get_discipline_id_with_module($module_id);
        $show_note = $this->Disciplines_Model->can_show_note($discipline_id);

        if ($note < 7) {
            $status = 'NOK';
            $message = 'Você não foi bem. <p>Que tal estudar um pouco mais e tentar novamente mais tarde ?</p><br><br>';
        } else if ($note >= 8) {
            $status = 'OK';
            $message = 'Parabens voce foi bem! Os proximos conteudos serão liberados.';
        } else {
            $status = 'OK';
            $message = 'Você foi aprovado! Os proximos conteudos serão liberados.';
        }

        if ($show_note == 1) {
            $message = $message . '<p>Sua nota foi ' . $note . '</p>';
        }
        $message = $message . '<br>' . $aswers;
        echo json_encode(array(
            'status' => $status,
            'message' => $message
        ));
        exit;
    }

    public function can_open_evaluation() {
        date_default_timezone_set('America/Sao_Paulo');
        $content_id = $this->input->post('id');
        $log_evaluation = $this->Log_Model->get_log_content_user($content_id);
        if (!empty($log_evaluation)) {
            $datetime1 = date_create($log_evaluation['date_hour']);
            $datetime2 = date_create(date('Y-m-d H:m:s'));
            $interval = date_diff($datetime1, $datetime2);
            // ja fez a prova
            if ($interval->format('%h') >= 1 && $log_evaluation['evaluation_note'] < 7) {
                // nao fez a prova
                echo json_encode(array(
                    'status' => 'OK',
                    'message' => ''
                ));
                exit;
            } else if ($interval->format('%h') < 1 && $log_evaluation['evaluation_note'] < 7) {
                $message = 'Tente rever o conteudo e voltar mais tarde para refazer a prova';
            } else {
                $message = 'Voce ja foi aprovado.';
            }
            echo json_encode(array(
                'status' => 'NOK',
                'message' => $message
            ));
            exit;
        } else {
            // nao fez a prova
            echo json_encode(array(
                'status' => 'OK',
                'message' => ''
            ));
            exit;
        }
    }

}

?>