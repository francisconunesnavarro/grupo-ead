<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class forms extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');

        $this->user_type = $this->session->userdata('user_type');
        $this->load->model('Home_Model');
        $this->load->model('User_Model');
        $this->load->model('Settings_Model');
        $this->load->model('Disciplines_Model');
        $this->load->model('Log_Model');
        $this->load->model('Forms_Model');

        date_default_timezone_set('America/Sao_Paulo');
        $this->now = date('Y-m-d');
    }

    public function form_engagement() {
        if ($this->user['logged']) {
            $data['title'] = 'Engagement entre Estudantes do Ensino Superior das Ciências da Saúde';
            $data['content'] = 'forms/form_engagement';
            $this->load->view('layouts/default', $data);
        } else {
            $data['title'] = 'Login';
            $this->load->view('home/login');
        }
    }

    public function save_engagement() {
        $reply = $this->input->post('reply');
        pr('<pre>');
        pr($reply);
        exit;

        $obj = array();
        foreach ($reply as $key => $p) {
            $obj[$p['name']] = $p['value'];
        }

        $obj['cidades'] = $this->input->post('cidades');
        $obj['cidades_estuda'] = $this->input->post('cidades_estuda');
        $obj['estados'] = $this->input->post('estados');
        $obj['estados_estuda'] = $this->input->post('estados_estuda');
        $obj['id_user'] = $this->user_type['id'];
        $obj['name_user'] = $this->user_type['name'];

        $status = $this->Forms_Model->save_engagement($obj);
        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    public function form_bemestar() {
        if ($this->user['logged']) {
            $data['title'] = 'Study & Well-being Survey (UWES-S) © Questionário do Bem estar e Trabalho para Estudantes';
            $data['content'] = 'forms/form_bemestar';
            $this->load->view('layouts/default', $data);
        } else {
            $data['title'] = 'Login';
            $this->load->view('home/login');
        }
    }

    public function save_bemestar() {
        $data = $this->input->post('reply');
        $data['id_user'] = $this->user_type['id'];
        $data['name_user'] = $this->user_type['name'];
        $status = $this->forms_model->save_bemestar($data);
        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    public function form_workshop() {
        $this->load->view('layouts/questionnaries_without_login');
    }

    public function learning_style() {
        $data['title'] = 'Estilo de Aprendizagem';
        $data['content'] = 'forms/learning_style';
        $this->load->view('layouts/none', $data);
    }

    public function save_learning_style() {
        $reply_ls = $this->input->post('reply_ls');
        $data = array();
        foreach ($reply_ls as $p) {
            $data[$p['name']] = $p['value'];
        }

        $data['controle_emocao'] = number_format(($data['ls21'] + $data['ls22'] + $data['ls23'] + $data['ls24'] + $data['ls25']) / 5, 2);
        $data['busca_ajuda_interpessoal'] = number_format(($data['ls3'] + $data['ls4'] + $data['ls5'] + $data['ls6'] + $data['ls7'] + $data['ls8']) / 6, 2);
        $data['repeticao_organizacao'] = number_format(($data['ls13'] + $data['ls14'] + $data['ls15'] + $data['ls18'] + $data['ls20']) / 5, 2);
        $data['controle_motivacao'] = number_format(($data['ls26'] + $data['ls27'] + $data['ls28'] + $data['ls29']) / 4, 2);
        $data['elaboracao'] = number_format(($data['ls16'] + $data['ls17'] + $data['ls19']) / 3, 2);
        $data['busca_ajuda_material'] = number_format(($data['ls1'] + $data['ls2']) / 2, 2);
        $data['monitoramento_compreensao'] = number_format(($data['ls31'] + $data['ls32'] + $data['ls33']) / 3, 2);
        $data['user_id'] = $this->user['id'];
        $status = $this->Forms_Model->save_learning_style($data);
        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    public function form_enade() {
        $data['title'] = 'Questionário Socioeconômico';
//        $data['teste'] = $this->Home_Model->get_form_enade($id);
        $data['content'] = 'forms/form_enade';
        $this->load->view('layouts/none', $data);
    }

    public function save_enade() {
        $reply_enade = $this->input->post('reply_enade');
        $data = array();
        foreach ($reply_enade as $key => $p) {
            $data[$p['name']] = $p['value'];
        }
        $data['user_id'] = $this->user['id'];
        $status = $this->Forms_Model->save_enade($data);
        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    public function form_kts() {
        $data['content'] = 'forms/form_kts';
        $data['kts'] = $this->Forms_Model->get_kts($this->user['id']);
        $this->load->view('layouts/none', $data);
    }

    public function form_vark() {
        $data['content'] = 'forms/form_vark';
        $data['vark'] = $this->Forms_Model->get_vark($this->user['id']);
        $this->load->view('layouts/none', $data);
    }

    public function save_vark() {
        $vark = $this->input->post();
        $data = array();
        foreach ($vark['reply_vark'] as $key => $p) {
            $data[$p['name']] = $p['value'];
            $aux[$p['name']] = $p['name'];
        }
        $v = 0;
        $a = 0;
        $r = 0;
        $k = 0;
        foreach ($data as $key => $value) {
            if ($value == 'v') {
                $v++;
            } else if ($value == 'a') {
                $a++;
            } else if ($value == 'r') {
                $r++;
            } else if ($value == 'k') {
                $k++;
            }
        }
        $data['v_total'] = $v;
        $data['a_total'] = $a;
        $data['r_total'] = $r;
        $data['k_total'] = $k;

        $data['user_id'] = $this->user['id'];
        $status = $this->Forms_Model->save_vark($data);
        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    public function save_kts() {
        $reply_kts = $this->input->post('reply_kts');
        $data = array();

        foreach ($reply_kts as $p) {
            $data[$p['name']] = $p['value'];
        }
        $ma = 0;
        $mb = 0;
        $ba = 0;
        $bb = 0;
        $ta = 0;
        $tb = 0;
        $ia = 0;
        $ib = 0;

        if (isset($data['q1']) == 'a') {
            $ma++;
        } else if (isset($data['q1']) == 'b') {
            $mb++;
        }
        if (isset($data['q8']) == 'a') {
            $ma++;
        } else if (isset($data['q8']) == 'b') {
            $mb++;
        }
        if (isset($data['q15']) == 'a') {
            $ma++;
        } else if (isset($data['q15']) == 'b') {
            $mb++;
        }
        if (isset($data['q22']) == 'a') {
            $ma++;
        } else if (isset($data['q22']) == 'b') {
            $mb++;
        }
        if (isset($data['q29']) == 'a') {
            $ma++;
        } else if (isset($data['q29']) == 'b') {
            $mb++;
        }
        if (isset($data['q36']) == 'a') {
            $ma++;
        } else if (isset($data['q36']) == 'b') {
            $mb++;
        }
        if (isset($data['q43']) == 'a') {
            $ma++;
        } else if (isset($data['q43']) == 'b') {
            $mb++;
        }
        if (isset($data['q50']) == 'a') {
            $ma++;
        } else if (isset($data['q50']) == 'b') {
            $mb++;
        }
        if (isset($data['q57']) == 'a') {
            $ma++;
        } else if (isset($data['q57']) == 'b') {
            $mb++;
        }
        if (isset($data['q64']) == 'a') {
            $ma++;
        } else if (isset($data['q64']) == 'b') {
            $mb++;
        }
        if (isset($data['q2']) == 'a') {
            $ba++;
        } else if (isset($data['q2']) == 'b') {
            $bb++;
        }
        if (isset($data['q3']) == 'a') {
            $ba++;
        } else if (isset($data['q3']) == 'b') {
            $bb++;
        }
        if (isset($data['q9']) == 'a') {
            $ba++;
        } else if (isset($data['q9']) == 'b') {
            $bb++;
        }
        if (isset($data['q10']) == 'a') {
            $ba++;
        } else if (isset($data['q10']) == 'b') {
            $bb++;
        }
        if (isset($data['q16']) == 'a') {
            $ba++;
        } else if (isset($data['q16']) == 'b') {
            $bb++;
        }
        if (isset($data['q17']) == 'a') {
            $ba++;
        } else if (isset($data['q17']) == 'b') {
            $bb++;
        }
        if (isset($data['q23']) == 'a') {
            $ba++;
        } else if (isset($data['q1']) == 'b') {
            $bb++;
        }
        if (isset($data['q24']) == 'a') {
            $ba++;
        } else if (isset($data['q24']) == 'b') {
            $bb++;
        }
        if (isset($data['q30']) == 'a') {
            $ba++;
        } else if (isset($data['q1']) == 'b') {
            $bb++;
        }
        if (isset($data['q31']) == 'a') {
            $ba++;
        } else if (isset($data['q31']) == 'b') {
            $bb++;
        }
        if (isset($data['q37']) == 'a') {
            $ba++;
        } else if (isset($data['q37']) == 'b') {
            $bb++;
        }
        if (isset($data['q38']) == 'a') {
            $ba++;
        } else if (isset($data['q38']) == 'b') {
            $bb++;
        }
        if (isset($data['q44']) == 'a') {
            $ba++;
        } else if (isset($data['q44']) == 'b') {
            $bb++;
        }
        if (isset($data['q45']) == 'a') {
            $ba++;
        } else if (isset($data['q45']) == 'b') {
            $bb++;
        }
        if (isset($data['q51']) == 'a') {
            $ba++;
        } else if (isset($data['q51']) == 'b') {
            $bb++;
        }
        if (isset($data['q52']) == 'a') {
            $ba++;
        } else if (isset($data['q52']) == 'b') {
            $bb++;
        }
        if (isset($data['q58']) == 'a') {
            $ba++;
        } else if (isset($data['q58']) == 'b') {
            $bb++;
        }
        if (isset($data['q59']) == 'a') {
            $ba++;
        } else if (isset($data['q59']) == 'b') {
            $bb++;
        }
        if (isset($data['q65']) == 'a') {
            $ba++;
        } else if (isset($data['q65']) == 'b') {
            $bb++;
        }
        if (isset($data['q66']) == 'a') {
            $ba++;
        } else if (isset($data['q66']) == 'b') {
            $bb++;
        }
        if (isset($data['q4']) == 'a') {
            $ta++;
        } else if (isset($data['q4']) == 'b') {
            $tb++;
        }
        if (isset($data['q5']) == 'a') {
            $ta++;
        } else if (isset($data['q5']) == 'b') {
            $tb++;
        }
        if (isset($data['q11']) == 'a') {
            $ta++;
        } else if (isset($data['q11']) == 'b') {
            $tb++;
        }
        if (isset($data['q12']) == 'a') {
            $ta++;
        } else if (isset($data['q12']) == 'b') {
            $tb++;
        } if (isset($data['q18']) == 'a') {
            $ta++;
        } else if (isset($data['q18']) == 'b') {
            $tb++;
        }
        if (isset($data['q19']) == 'a') {
            $ta++;
        } else if (isset($data['q19']) == 'b') {
            $tb++;
        } if (isset($data['q25']) == 'a') {
            $ta++;
        } else if (isset($data['q25']) == 'b') {
            $tb++;
        }
        if (isset($data['q26']) == 'a') {
            $ta++;
        } else if (isset($data['q26']) == 'b') {
            $tb++;
        } if (isset($data['q32']) == 'a') {
            $ta++;
        } else if (isset($data['q32']) == 'b') {
            $tb++;
        }
        if (isset($data['q33']) == 'a') {
            $ta++;
        } else if (isset($data['q33']) == 'b') {
            $tb++;
        } if (isset($data['q39']) == 'a') {
            $ta++;
        } else if (isset($data['q39']) == 'b') {
            $tb++;
        }
        if (isset($data['q40']) == 'a') {
            $ta++;
        } else if (isset($data['q40']) == 'b') {
            $tb++;
        } if (isset($data['q46']) == 'a') {
            $ta++;
        } else if (isset($data['q46']) == 'b') {
            $tb++;
        }
        if (isset($data['q47']) == 'a') {
            $ta++;
        } else if (isset($data['q47']) == 'b') {
            $tb++;
        } if (isset($data['q53']) == 'a') {
            $ta++;
        } else if (isset($data['q53']) == 'b') {
            $tb++;
        }
        if (isset($data['q54']) == 'a') {
            $ta++;
        } else if (isset($data['q54']) == 'b') {
            $tb++;
        } if (isset($data['q60']) == 'a') {
            $ta++;
        } else if (isset($data['q60']) == 'b') {
            $tb++;
        }
        if (isset($data['q61']) == 'a') {
            $ta++;
        } else if (isset($data['q1']) == 'b') {
            $tb++;
        } if (isset($data['q67']) == 'a') {
            $ta++;
        } else if (isset($data['q67']) == 'b') {
            $tb++;
        }
        if (isset($data['q68']) == 'a') {
            $ta++;
        } else if (isset($data['q68']) == 'b') {
            $tb++;
        }
        if (isset($data['q6']) == 'a') {
            $ia++;
        } else if (isset($data['q6']) == 'b') {
            $ib++;
        }
        if (isset($data['q7']) == 'a') {
            $ia++;
        } else if (isset($data['q7']) == 'b') {
            $ib++;
        }
        if (isset($data['q13']) == 'a') {
            $ia++;
        } else if (isset($data['q13']) == 'b') {
            $ib++;
        }
        if (isset($data['q14']) == 'a') {
            $ia++;
        } else if (isset($data['q14']) == 'b') {
            $ib++;
        }
        if (isset($data['q20']) == 'a') {
            $ia++;
        } else if (isset($data['q20']) == 'b') {
            $ib++;
        }
        if (isset($data['q21']) == 'a') {
            $ia++;
        } else if (isset($data['q21']) == 'b') {
            $ib++;
        }
        if (isset($data['q27']) == 'a') {
            $ia++;
        } else if (isset($data['q27']) == 'b') {
            $ib++;
        }
        if (isset($data['q28']) == 'a') {
            $ia++;
        } else if (isset($data['q28']) == 'b') {
            $ib++;
        }
        if (isset($data['q34']) == 'a') {
            $ia++;
        } else if (isset($data['q34']) == 'b') {
            $ib++;
        }
        if (isset($data['q35']) == 'a') {
            $ia++;
        } else if (isset($data['q35']) == 'b') {
            $ib++;
        }
        if (isset($data['q41']) == 'a') {
            $ia++;
        } else if (isset($data['q41']) == 'b') {
            $ib++;
        }
        if (isset($data['q42']) == 'a') {
            $ia++;
        } else if (isset($data['q42']) == 'b') {
            $ib++;
        }
        if (isset($data['q48']) == 'a') {
            $ia++;
        } else if (isset($data['q48']) == 'b') {
            $ib++;
        }
        if (isset($data['q49']) == 'a') {
            $ia++;
        } else if (isset($data['q49']) == 'b') {
            $ib++;
        }
        if (isset($data['q55']) == 'a') {
            $ia++;
        } else if (isset($data['q55']) == 'b') {
            $ib++;
        }
        if (isset($data['q56']) == 'a') {
            $ia++;
        } else if (isset($data['q56']) == 'b') {
            $ib++;
        }
        if (isset($data['q62']) == 'a') {
            $ia++;
        } else if (isset($data['q62']) == 'b') {
            $ib++;
        }
        if (isset($data['q63']) == 'a') {
            $ia++;
        } else if (isset($data['q63']) == 'b') {
            $ib++;
        }
        if (isset($data['q69']) == 'a') {
            $ia++;
        } else if (isset($data['q69']) == 'b') {
            $ib++;
        }
        if (isset($data['q70']) == 'a') {
            $ia++;
        } else if (isset($data['q70']) == 'b') {
            $ib++;
        }
        //  calculo das letras
        if ($ma > $mb) {
            $data['m'] = 'E';
        } else {
            $data['m'] = 'I';
        }
        if ($ba > $bb) {
            $data['b'] = 'S';
        } else {
            $data['b'] = 'N';
        }
        if ($ta > $tb) {
            $data['t'] = 'T';
        } else {
            $data['t'] = 'F';
        }
        if ($ia > $ib) {
            $data['i'] = 'J';
        } else {
            $data['i'] = 'P';
        }

        $data['user_id'] = $this->user['id'];
        $status = $this->Forms_Model->save_kts($data);
        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    public function check_token() {
        $usr = $this->input->post('name');
        $type = $this->input->post('type');
        $token = $this->input->post('token');
        $user = $this->User_Model->get_token($token);

        if (isset($user)) {
            $session = array(
                'user_type' => array(
                    'id' => $user['id'],
                    'usr' => $usr,
                    'type' => $type,
                    'token' => $token,
                    'logged' => TRUE,
                )
            );
            $this->session->set_userdata($session);
            $status = "OK";
            $message = '';
        } else {
            $status = "NOK";
            $message = 'Token Inválido';
        }
        echo json_encode(array(
            'status' => $status,
            'message' => $message
        ));
        exit;
    }

    public function register() {
        $data['title'] = '';
        $data['content'] = 'home/register';
        $this->load->view('layouts/none', $data);
    }

    public function form_info() {
        if (!$this->input->is_ajax_request()) {
            // somente acesso ajax eh permitido
            redirect('warning/redirect/access_denied');
            exit();
        }
        $input = $this->input->post();
        $user_type = $input['user_type'];
        switch ($user_type) {
            case 1:
                $data ['content'] = 'layouts/cadastro_grad';
                break;
            case 2:
                $data ['content'] = 'layouts/cadastro_res';
                break;
            case 3:
                $data ['content'] = 'layouts/cadastro_m_residente';
                break;
        }
        $this->load->view('layouts/none', $data);
    }

    function set_session() {
        $type = $this->input->post('type');
        $this->user = $this->session->userdata('user');
        $session = array(
            'user_type' => array(
                'id' => $this->user['id'],
                'usr' => $this->user['name'],
                'type' => $type,
                'token' => null,
                'logged' => TRUE,
            )
        );
        $this->session->set_userdata($session);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

}

?>
