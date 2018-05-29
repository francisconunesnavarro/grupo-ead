<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Classe relacioanda as disciplinas e suas ações
class Disciplines extends CI_Controller {

    // Construtor da classe
    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
        $this->load->model('Disciplines_Model');
        $this->load->model('Settings_Model');
        $this->load->model('User_Model');
        date_default_timezone_set('America/Sao_Paulo');
        $this->now = date('Y-m-d');
        if (!$this->user['logged']) {
            $data['content'] = 'warning/500';
            $this->load->view('layouts/none', $data);
        }
    }

    /* type: POST
     * @params: array do formulário
     * Return: OK , NOK
     *  Salva formulário inicial ou final da disciplina
     * 
     */

    /*
     * type: POST
     * @params: array (google forms)
     * Return: OK or NOK
     * 
     * insert or edit discipline on database
     * 
     */

    function save_forms() {
        $form = $this->input->post();

        if ($form['id']) {
            $form_id = $this->Disciplines_Model->edit_form($form);
        } else {
            $form_id = $this->Disciplines_Model->create_form($form);
        }
        if ($form_id) {
            $status = 'OK';
        } else {
            $status = 'NOK';
        }
        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    /*
     * type: POST
     * @params: form id
     * Return: data form
     * 
     * load form
     */

    function load_form() {
        $form_id = $this->input->post('id');
        $form = $this->Disciplines_Model->get_form($form_id);
        echo json_encode(array(
            'form' => $form
        ));
        exit;
    }

    /* call: Ajax
     * @params: id do formulário
     * Return: JSON do formulário
     *  Carrega TODOS os formulários (inicial ou final da disciplina)
     * 
     */

    function openDiscipline($disc_id) {
        // depois fazer checagem de usuario e direcionar pra view correta 
        $data['begin_questionnaires'] = $this->Disciplines_Model->get_discipline_questionnaire('begin', $disc_id);
        $data['end_questionnaires'] = $this->Disciplines_Model->get_discipline_questionnaire('end', $disc_id);
//            pr('<pre>');pr($data);exit;


        if ($this->user['type'] == 'student') {
            // checa se o questionario inicial ja foi respondido
            if ($data['begin_questionnaires']) {
                foreach ($data['begin_questionnaires'] as $key => $bq) {
                    if ($this->Disciplines_Model->check_solved_questionnaire($bq['questionnaire_discipline_id'])) {
                        $data['begin_questionnaires'][$key] = null;
                    }
                }
            }
            // checa se o questionario final ja foi respondido
            if ($data['end_questionnaires']) {
                foreach ($data['end_questionnaires'] as $key => $bq) {
                    if ($this->Disciplines_Model->check_solved_questionnaire($bq['questionnaire_discipline_id'])) {
                        $data['end_questionnaires'][$key] = null;
                    }
                }
            }
            if (!$this->Disciplines_Model->check_discipline_active_to_me($disc_id)) {
                $data['content'] = 'warning/500';
                $this->load->view('layouts/none', $data);
            }

            $data['discipline_owner'] = 0;
            $data['modules'] = $this->Disciplines_Model->get_modules($disc_id);
        } else if ($this->user['type'] == 'admin') {
            $data['discipline_owner'] = 1;
            $data['modules'] = $this->Disciplines_Model->get_modules($disc_id);
        } else if ($this->user['type'] == 'professor') {
            if ($this->Disciplines_Model->check_discipline_active_to_me($disc_id)) {
                // se for responsavel por td a disiplina pega todos modulos
                $data['modules'] = $this->Disciplines_Model->get_modules($disc_id);
            } else {
                // se for responsavel por apenas um modulo pega ele
                $data['modules'] = $this->Disciplines_Model->get_my_modules($disc_id);
            }
            $data['discipline_owner'] = $this->Disciplines_Model->check_owner($disc_id);
        } else {
            $data['discipline_owner'] = $this->Disciplines_Model->check_owner($disc_id);
            if (!$this->Disciplines_Model->check_discipline_active_to_me($disc_id) && $data['discipline_owner'] == 0) {
                $data['content'] = 'warning/500';
                $this->load->view('layouts/none', $data);
            }
            $data['modules'] = $this->Disciplines_Model->get_my_modules($disc_id);
        }
        $data['professors'] = $this->Disciplines_Model->get_professors($disc_id);

        $modules_id = array();
        foreach ($data['modules'] as $key => $m) {
            $data['modules'][$key]['active'] = $this->check_active_module($m);
            array_push($modules_id, $m['id']);
        }
        if ($modules_id) {
            $data['responsibles_modules'] = $this->Disciplines_Model->get_responsibles_modules($modules_id);
        } else {
            $data['responsibles_modules'] = array();
        }
        $data['responsibles_disciplines'] = $this->Disciplines_Model->get_responsibles_disciplines($disc_id);

        $data['is_disabled'] = 1;
        $data['questionnaires'] = $this->Settings_Model->get_questionnaires();
        $data['categories'] = $this->Settings_Model->get_categories($this->user['id']);
        $data['discipline'] = $this->Disciplines_Model->get_discipline($disc_id);
        $data['forms'] = $this->Disciplines_Model->get_forms($disc_id);

        // muda as datas para o formato do plugin
        $data['discipline']['start_date_lessons'] = explode('-', $data['discipline']['start_date_lessons']);
        $data['discipline']['start_date_lessons'] = $data['discipline']['start_date_lessons'][1] . '/' . $data['discipline']['start_date_lessons'][2] . '/' . $data['discipline']['start_date_lessons'][0];
        $data['discipline']['end_date_lessons'] = explode('-', $data['discipline']['end_date_lessons']);
        $data['discipline']['end_date_lessons'] = $data['discipline']['end_date_lessons'][1] . '/' . $data['discipline']['end_date_lessons'][2] . '/' . $data['discipline']['end_date_lessons'][0];
        $data['discipline']['start_date_registrations'] = explode('-', $data['discipline']['start_date_registrations']);
        $data['discipline']['start_date_registrations'] = $data['discipline']['start_date_registrations'][1] . '/' . $data['discipline']['start_date_registrations'][2] . '/' . $data['discipline']['start_date_registrations'][0];
        $data['discipline']['end_date_registrations'] = explode('-', $data['discipline']['end_date_registrations']);
        $data['discipline']['end_date_registrations'] = $data['discipline']['end_date_registrations'][1] . '/' . $data['discipline']['end_date_registrations'][2] . '/' . $data['discipline']['end_date_registrations'][0];
//            $data['begin_questionnaires']['start_date'] = explode('-', $data['begin_questionnaires']['start_date']);
//            $data['begin_questionnaires']['start_date'] = $data['begin_questionnaires']['start_date'][1] . '/' . $data['begin_questionnaires']['start_date'][2] . '/' . $data['begin_questionnaires']['start_date'][0];
//            $data['begin_questionnaires']['end_date'] = explode('-', $data['begin_questionnaires']['end_date']);
//            $data['begin_questionnaires']['end_date'] = $data['begin_questionnaires']['end_date'][1] . '/' . $data['begin_questionnaires']['end_date'][2] . '/' . $data['begin_questionnaires']['end_date'][0];
//            $data['end_questionnaires']['start_date'] = explode('-', $data['end_questionnaires']['start_date']);
//            $data['end_questionnaires']['start_date'] = $data['end_questionnaires']['start_date'][1] . '/' . $data['end_questionnaires']['start_date'][2] . '/' . $data['end_questionnaires']['start_date'][0];
//            $data['end_questionnaires']['end_date'] = explode('-', $data['end_questionnaires']['end_date']);
//            $data['end_questionnaires']['end_date'] = $data['end_questionnaires']['end_date'][1] . '/' . $data['end_questionnaires']['end_date'][2] . '/' . $data['end_questionnaires']['end_date'][0];



        if (isset($data['discipline']['category_id'])) {
            $data['set_category'] = $data['discipline']['category_id'];
        } else {
            $data['set_category'] = null;
        }

        $data['return_button'] = $this->config->base_url('home');

        $data['title'] = $data['discipline']['acronym'] . ' - ' . $data['discipline']['name'];
        $data['content'] = 'disciplines/openDiscipline';
        $this->load->view('layouts/default', $data);
    }

    /*
     * type: GET
     * @params: module id
     * Return: 1 or 0
     * 
     * check if module is active
     */

    function check_active_module($m) {
        if (($this->now >= $m['start_date'] && $this->now < $m['end_date']) || ($this->now > $m['start_date'] && $this->now <= $m['end_date'])) {
            return 1;
        } else {
            return 0;
        }
    }

    /*
     * type: POST
     * @params: questionnaire discipline id
     * Return: consent term
     * 
     * get consent term of discipline
     */

    function load_questionnaire_discipline_consent_term() {
        $questionnaire_discipline_id = $this->input->post('questionnaire_discipline_id');
        $questionnaire_discipline = $this->Disciplines_Model->get_questionnaire_discipline($questionnaire_discipline_id);
        $consent_term = $this->Settings_Model->get_consent_term($questionnaire_discipline['questionnaire_id']);
        echo json_encode(array(
            'consent_term' => $consent_term
        ));
        exit;
    }

    /*
     * type: GET
     * @params: category id
     * Return: questionnaires and categories
     * 
     * open page to add a new discipline
     */

    public function newDiscipline($cat_id = null) {
        if ($this->user['type'] != 'student') {
            // depois fazer checagem de usuario e direcionar pra view correta 
            $data['title'] = lang('add_new_discipline');
            $data['discipline_owner'] = 1;
            $data['responsibles'] = null;
            $data['responsibles_modules'] = null;
            $data['modules'] = 'none';
            $data['responsibles'] = 'none';
            $data['questionnaires'] = $this->Settings_Model->get_questionnaires();
            $data['set_category'] = $cat_id;
            $data['categories'] = $this->Settings_Model->get_categories($this->user['id']);
            $data['content'] = 'disciplines/openDiscipline';
            $this->load->view('layouts/default', $data);
        } else {
            $data['content'] = 'warning/500';
            $this->load->view('layouts/none', $data);
        }
    }

    /*
     * type: POST
     * @params: discipline id
     * Return: modules
     * 
     * load modules
     */

    public function load_modules() {
        $disc_id = $this->input->post('id');
        $modules = $this->Disciplines_Model->get_modules($disc_id);
        echo json_encode($modules);
        exit;
    }

    /*
     * type: POST
     * @params: category id
     * Return: categories
     * 
     * load categories
     */

    public function load_category() {
        $category_id = $this->input->post('id');
        $modules = $this->Disciplines_Model->get_subjects($category_id);
        echo json_encode($modules);
        exit;
    }

    /*
     * type: POST
     * @params: discipline id
     * Return: OK or NOK
     * 
     * delete discipline
     */

    function delete_discipline() {
        $discipline_id = $this->input->post('id');
        $result = $this->Disciplines_Model->delete_discipline($discipline_id);
        echo json_encode(array(
            'status' => $result
        ));
        exit;
    }

    /*
     * type: POST
     * @params: data discipline
     * Return: OK or NOK
     * 
     * save discipline
     */

    public function save_discipline() {

        $discipline = $this->input->post();
        if ($discipline['start_date_lessons']) {
            $discipline['start_date_lessons'] = explode('/', $discipline['start_date_lessons']);
            $discipline['start_date_lessons'] = $discipline['start_date_lessons'][2] . '-' . $discipline['start_date_lessons'][0] . '-' . $discipline['start_date_lessons'][1];
        } else {
            $discipline['start_date_lessons'] = $this->now;
        }
        if ($discipline['end_date_lessons']) {
            $discipline['end_date_lessons'] = explode('/', $discipline['end_date_lessons']);
            $discipline['end_date_lessons'] = $discipline['end_date_lessons'][2] . '-' . $discipline['end_date_lessons'][0] . '-' . $discipline['end_date_lessons'][1];
        } else {
            $discipline['end_date_lessons'] = date('Y-m-d', strtotime($this->now . ' + 30 days'));
        }

        if ($discipline['start_date_registrations']) {
            $discipline['start_date_registrations'] = explode('/', $discipline['start_date_registrations']);
            $discipline['start_date_registrations'] = $discipline['start_date_registrations'][2] . '-' . $discipline['start_date_registrations'][0] . '-' . $discipline['start_date_registrations'][1];
        } else {
            $discipline['start_date_registrations'] = $this->now;
        }
        if ($discipline['end_date_registrations']) {
            $discipline['end_date_registrations'] = explode('/', $discipline['end_date_registrations']);
            $discipline['end_date_registrations'] = $discipline['end_date_registrations'][2] . '-' . $discipline['end_date_registrations'][0] . '-' . $discipline['end_date_registrations'][1];
        } else {
            $discipline['end_date_registrations'] = date('Y-m-d', strtotime($this->now . ' + 30 days'));
        }
        if ($discipline['published'] == 'true') {
            $discipline['published'] = 1;
        } else {
            $discipline['published'] = 0;
        }
        if ($discipline['show_note'] == 'true') {
            $discipline['show_note'] = 1;
        } else {
            $discipline['show_note'] = 0;
        }
        if ($discipline['availability'] == 'true') {
            $discipline['availability'] = 1;
        } else {
            $discipline['availability'] = 0;
        }
        if ($discipline['availability_tutor'] == 'true') {
            $discipline['availability_tutor'] = 1;
        } else {
            $discipline['availability_tutor'] = 0;
        }
        if ($discipline['availability_moderator'] == 'true') {
            $discipline['availability_moderator'] = 1;
        } else {
            $discipline['availability_moderator'] = 0;
        }
        if ($discipline['availability_student'] == 'true') {
            $discipline['availability_student'] = 1;
        } else {
            $discipline['availability_student'] = 0;
        }
        if ($discipline['availability_visitor'] == 'true') {
            $discipline['availability_visitor'] = 1;
        } else {
            $discipline['availability_visitor'] = 0;
        }

        if ($discipline['id']) {
            $result = $this->Disciplines_Model->edit_discipline($discipline);
        } else {
            // cria disciplina
            $forum['discipline_id'] = $this->Disciplines_Model->create_discipline($discipline);
            if ($forum['discipline_id']) {
                $result = 'OK';
            } else {
                $result = 'NOK';
            }
            // cria um forum da disciplina
            $forum['title'] = $discipline['acronym'] . ' - ' . $discipline['name'];
            $forum['category_id'] = $discipline['category_id'];
            $this->load->model('Home_Model');
            $this->Home_Model->create_forum($forum);
        }

        echo json_encode(array(
            'status' => $result
        ));
        exit;
    }

    /*
     * type: POST
     * @params: module id
     * Return: OK or NOK
     * 
     * delete module
     */

    public function delete_module() {
        $module_id = $this->input->post('id');
        echo json_encode(array(
            'status' => $this->Disciplines_Model->delete_module($module_id)
        ));
        exit;
    }

    /*
     * type: POST
     * @params: module id
     * Return: data module
     * 
     * load module
     */

    public function load_module() {
        $module_id = $this->input->post('id');
        $module = $this->Disciplines_Model->get_module($module_id);
        $module['start_date'] = explode('-', $module['start_date']);
        $module['start_date'] = $module['start_date'][1] . '/' . $module['start_date'][2] . '/' . $module['start_date'][0];
        $module['end_date'] = explode('-', $module['end_date']);
        $module['end_date'] = $module['end_date'][1] . '/' . $module['end_date'][2] . '/' . $module['end_date'][0];
        echo json_encode(array(
            'module' => $module
        ));
        exit;
    }

    /*
     * type: POST
     * @params: data module
     * Return: OK or NOK
     * 
     * save module
     */

    public function save_module() {
        $module = $this->input->post();
        $module['start_date'] = explode('/', $module['start_date']);
        $module['start_date'] = $module['start_date'][2] . '-' . $module['start_date'][0] . '-' . $module['start_date'][1];
        $module['end_date'] = explode('/', $module['end_date']);
        $module['end_date'] = $module['end_date'][2] . '-' . $module['end_date'][0] . '-' . $module['end_date'][1];

        if ($module['id']) {
            $module_id = $this->Disciplines_Model->edit_module($module);
        } else {
            $module_id = $this->Disciplines_Model->create_module($module);
            $return = $this->Disciplines_Model->save_responsible_module($module_id, $this->user['id']);
        }

        if ($module_id) {
            $status = 'OK';
        } else {
            $status = 'NOK';
        }

        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    /*
     * type: POST
     * @params: data content text
     * Return: OK or NOK
     * 
     * save content text
     */

    public function save_content_text() {
        $content['id'] = $this->input->post('content_id');
        $content['module_id'] = $this->input->post('module_id');
        $content['content'] = $this->input->post('text');
        $content['name'] = $this->input->post('name');
        $content['order'] = $this->input->post('order');
        $content['type'] = 'text';

        if ($content['id']) {
            $content = $this->Disciplines_Model->edit_content_text($content);
        } else {
            $content = $this->Disciplines_Model->create_content($content);
        }

        echo json_encode(array(
            'status' => $content
        ));
        exit;
    }

    /*
     * type: POST
     * @params: content id
     * Return: OK or NOK
     * 
     * delete content
     */

    public function delete_content() {
        $content_id = $this->input->post('id');
        echo json_encode(array(
            'status' => $this->Disciplines_Model->delete_content($content_id)
        ));
        exit;
    }

    /*
     * type: POST
     * @params: content id
     * Return: OK or NOK
     * 
     * load content text
     */

    public function load_content_text() {
        $content_id = $this->input->post('id');
        $this->load->model('Log_Model');
        $content = $this->Disciplines_Model->get_content($content_id);
        // log_content_access
        $this->Log_Model->log_content_access($content_id);

        echo json_encode(array(
            'content' => $content
        ));
        exit;
    }

    /*
     * type: POST
     * @params: content id
     * Return: OK or NOK
     * 
     * save content term
     */

    public function save_content_name() {
        $content = $this->input->post();
        $result = $this->Disciplines_Model->edit_content_name($content);
        echo json_encode(array(
            'status' => $result
        ));
        exit;
    }

    /*
     * type: GET
     * @params: discipline id
     * Return: no return
     * 
     * change discipline background image
     */

    function receive_background_image($discipline_id) {
        $ds = DIRECTORY_SEPARATOR;
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $targetFile = 'public/images/' . $_FILES['file']['name'];
            $additional = '1';
            while (file_exists($targetFile)) {
                $info = pathinfo($targetFile);
                $targetFile = $info['dirname'] . '/'
                        . $info['filename'] . $additional
                        . '.' . $info['extension'];
            }
            $return = move_uploaded_file($tempFile, $targetFile);
            $content = $this->Disciplines_Model->update_discipline_image($discipline_id, $_FILES['file']['name']);
        }
    }

    /*
     * type: POST
     * @params: discipline id
     * Return: OK or NOK
     * 
     * remove discipline background image
     */

    function delete_background_image() {
        $discipline_id = $this->input->post('disc_id');
        $targetFile = 'public/images/default-lesson.png';
        $status = $this->Disciplines_Model->update_discipline_image($discipline_id, $targetFile);
        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    /*
     * type: GET - FILES
     * @params: module id and content type
     * Return: no return
     * 
     * save content in discipline and save file in server
     */

    public function receive($type, $module_id) {

        $ds = DIRECTORY_SEPARATOR;
        if (!empty($_FILES)) {
            if ($type == 'video') {
                $tempFile = $_FILES['file']['tmp_name'];
                $targetFile = $this->config->item('store_folder') . 'modules' . $ds . 'videos' . $ds . $_FILES['file']['name'];
                $additional = '1';
                while (file_exists($targetFile)) {
                    $info = pathinfo($targetFile);
                    $targetFile = $info['dirname'] . '/'
                            . $info['filename'] . $additional
                            . '.' . $info['extension'];
                }
                $return = move_uploaded_file($tempFile, $targetFile);
            } else if ($type == 'file') {
                $tempFile = $_FILES['file']['tmp_name'];
                $targetFile = $this->config->item('store_folder') . 'modules' . $ds . 'files' . $ds . $_FILES['file']['name'];
                $additional = '1';
                while (file_exists($targetFile)) {
                    $info = pathinfo($targetFile);
                    $targetFile = $info['dirname'] . '/'
                            . $info['filename'] . $additional
                            . '.' . $info['extension'];
                }
                $return = move_uploaded_file($tempFile, $targetFile);
            } else if ($type == 'image') {
                $tempFile = $_FILES['file']['tmp_name'];
                $targetFile = $this->config->item('store_folder') . 'modules' . $ds . 'images' . $ds . $_FILES['file']['name'];
                $additional = '1';
                while (file_exists($targetFile)) {
                    $info = pathinfo($targetFile);
                    $targetFile = $info['dirname'] . '/'
                            . $info['filename'] . $additional
                            . '.' . $info['extension'];
                }
                $return = move_uploaded_file($tempFile, $targetFile);
            }

            $content['module_id'] = $module_id;
            $content['content'] = $targetFile;
            $content['name'] = $_FILES['file']['name'];
            $content['type'] = $type;
            $content = $this->Disciplines_Model->create_content($content);
        }
    }

    /*
     * type: POST
     * @params: data evaluation
     * Return: OK or NOK
     * 
     * save evaluation with your questions and answers
     */

    public function save_evaluation() {
        $type = $this->input->post('type_test');
        $module_id = $this->input->post('module_id');
        $quantity['very_easy'] = $this->input->post('quantity_very_easy');
        $quantity['easy'] = $this->input->post('quantity_easy');
        $quantity['medium'] = $this->input->post('quantity_medium');
        $quantity['hard'] = $this->input->post('quantity_hard');
        $quantity['very_hard'] = $this->input->post('quantity_very_hard');
        $order = $this->input->post('evaluation_order');

        $quantity_questions = $quantity['very_easy'] + $quantity['easy'] + $quantity['medium'] + $quantity['hard'] + $quantity['very_hard'];

        $questions_sel['very_easy'] = $this->input->post('questions_very_easy');
        $questions_sel['easy'] = $this->input->post('questions_easy');
        $questions_sel['medium'] = $this->input->post('questions_medium');
        $questions_sel['hard'] = $this->input->post('questions_hard');
        $questions_sel['very_hard'] = $this->input->post('questions_very_hard');

// random nas questoes escolhidas de acordo com a quantidade de cada dificuldade        
        $rand_very_easy = array();
        $rand_easy = array();
        $rand_medium = array();
        $rand_hard = array();
        $rand_very_hard = array();

        if ($questions_sel['very_easy'] && $quantity['very_easy'] > 0) {
            $rand_very_easy = array_rand($questions_sel['very_easy'], $quantity['very_easy']);
        }

        if ($questions_sel['easy'] && $quantity['easy'] > 0) {
            $rand_easy = array_rand($questions_sel['easy'], $quantity['easy']);
        }
        if ($questions_sel['medium'] && $quantity['medium'] > 0) {
            $rand_medium = array_rand($questions_sel['medium'], $quantity['medium']);
        }
        if ($questions_sel['hard'] && $quantity['hard'] > 0) {
            $rand_hard = array_rand($questions_sel['hard'], $quantity['hard']);
        }
        if ($questions_sel['very_hard'] && $quantity['very_hard'] > 0) {
            $rand_very_hard = array_rand($questions_sel['very_hard'], $quantity['very_hard']);
        }
        $content_id = $this->input->post('evaluation_id');

        // criar prova nova         
        $new_evaluation_id = $this->Disciplines_Model->create_evaluation($type, $quantity_questions);

        if ($type == 1) {
            $name = lang('daily_pay_test');
        } else if ($type == 2) {
            $name = lang('after_test');
        } else if ($type == 3) {
            $name = lang('evaluation');
        }

        // se existir prova com esse id ele cria uma nova e salva o id novo na tabela contents
        if (!empty($content_id)) {
            if (!$order) {
                $order = $this->Disciplines_Model->get_content_order($content_id);
            }
            $content['id'] = $content_id;
            $content['content'] = $new_evaluation_id;
            $content['name'] = $name;
            $content['order'] = $order;
            $content = $this->Disciplines_Model->edit_content_evaluation($content);
        } else {
            $content['module_id'] = $module_id;
            $content['content'] = $new_evaluation_id;
            $content['name'] = $name;
            $content['type'] = 'evaluation';
            $content['order'] = $order;
            $content = $this->Disciplines_Model->create_content($content);
        }

        // adicionar questoes novas a prova 
        if ($quantity['very_easy'] == 1) {
            $this->Disciplines_Model->insert_question_evaluation($new_evaluation_id, $questions_sel['very_easy'][$rand_very_easy]);
        } else {
            foreach ($rand_very_easy as $rve) {
                $this->Disciplines_Model->insert_question_evaluation($new_evaluation_id, $questions_sel['very_easy'][$rve]);
            }
        }
        if ($quantity['easy'] == 1) {
            $this->Disciplines_Model->insert_question_evaluation($new_evaluation_id, $questions_sel['easy'][$rand_easy]);
        } else {
            foreach ($rand_easy as $re) {
                $this->Disciplines_Model->insert_question_evaluation($new_evaluation_id, $questions_sel['easy'][$re]);
            }
        }
        if ($quantity['medium'] == 1) {
            $this->Disciplines_Model->insert_question_evaluation($new_evaluation_id, $questions_sel['medium'][$rand_medium]);
        } else {
            foreach ($rand_medium as $rm) {
                $this->Disciplines_Model->insert_question_evaluation($new_evaluation_id, $questions_sel['medium'][$rm]);
            }
        }
        if ($quantity['hard'] == 1) {
            $this->Disciplines_Model->insert_question_evaluation($new_evaluation_id, $questions_sel['hard'][$rand_hard]);
        } else {
            foreach ($rand_hard as $rh) {
                $this->Disciplines_Model->insert_question_evaluation($new_evaluation_id, $questions_sel['hard'][$rh]);
            }
        }
        if ($quantity['very_hard'] == 1) {
            $this->Disciplines_Model->insert_question_evaluation($new_evaluation_id, $questions_sel['very_hard'][$rand_very_hard]);
        } else {
            foreach ($rand_very_hard as $rvh) {
                $this->Disciplines_Model->insert_question_evaluation($new_evaluation_id, $questions_sel['very_hard'][$rvh]);
            }
        }

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    /*
     * type: POST
     * @params: content id
     * Return: data content
     * 
     * load content of evaluation
     */

    public function load_content_evaluation() {
        $content_id = $this->input->post('id');
        $content = $this->Disciplines_Model->get_content($content_id);
        $order = $content['order'];
        $content = $this->Disciplines_Model->get_evaluation_data($content['content']);

        $type = $content[0]['type'];
        $quantity_very_easy = 0;
        $quantity_easy = 0;
        $quantity_medium = 0;
        $quantity_hard = 0;
        $quantity_very_hard = 0;

        $questions = array();

        foreach ($content as $c) {
            if ($c['difficulty'] == 1) {
                $quantity_very_easy++;
            } else if ($c['difficulty'] == 2) {
                $quantity_easy++;
            } else if ($c['difficulty'] == 3) {
                $quantity_medium++;
            } else if ($c['difficulty'] == 4) {
                $quantity_hard++;
            } else if ($c['difficulty'] == 5) {
                $quantity_very_hard++;
            }
            array_push($questions, $c['question_id']);
        }

        echo json_encode(array(
            'order' => $order,
            'type' => $type,
            'quantity_very_easy' => $quantity_very_easy,
            'quantity_easy' => $quantity_easy,
            'quantity_medium' => $quantity_medium,
            'quantity_hard' => $quantity_hard,
            'quantity_very_hard' => $quantity_very_hard,
            'questions' => $questions
        ));
        exit;
    }

    /*
     * type: POST
     * @params: questionnaire id and discipline id
     * Return: OK or NOK
     * 
     * link questionnaire in discipline
     */

    public function save_discipline_questionnaire() {
        $questionnaire_discipline = $this->input->post();
        $questionnaire_discipline['start_date'] = explode('/', $questionnaire_discipline['start_date']);
        $questionnaire_discipline['start_date'] = $questionnaire_discipline['start_date'][2] . '-' . $questionnaire_discipline['start_date'][0] . '-' . $questionnaire_discipline['start_date'][1];
        $questionnaire_discipline['end_date'] = explode('/', $questionnaire_discipline['end_date']);
        $questionnaire_discipline['end_date'] = $questionnaire_discipline['end_date'][2] . '-' . $questionnaire_discipline['end_date'][0] . '-' . $questionnaire_discipline['end_date'][1];

        $result = $this->Disciplines_Model->save_questionnaire_discipline($questionnaire_discipline);
        echo json_encode(array(
            'status' => $result
        ));
        exit;
    }

    /*
     * type: POST
     * @params: questionnaire discipline id
     * Return: OK or NOK
     * 
     * remove questionnaire from discipline
     */

    public function delete_questionnaire_discipline() {
        $questionnaire_discipline_id = $this->input->post('id');
        echo json_encode(array(
            'status' => $this->Disciplines_Model->delete_questionnaire_discipline($questionnaire_discipline_id)
        ));
        exit;
    }

    /*
     * type: POST
     * @params: questionnaire discipline id
     * Return: users questionnaires replys
     * 
     * list all replys from users 
     */

    function list_questionnaire_replys() {
        $questionnaire_discipline_id = $this->input->post('id');
        $questionnaire_users_replys = $this->Disciplines_Model->get_questionnaire_users_replys($questionnaire_discipline_id);
        $questionnaire_users_open_replys = $this->Disciplines_Model->get_questionnaire_users_open_replys($questionnaire_discipline_id);
        $user_id = 0;
        $single_array = array();
        $total_array = array();

        foreach ($questionnaire_users_replys as $key => $qur) {
            if ($user_id != $qur['user_id']) {
                if ($user_id != 0) {
                    array_push($total_array, $single_array);
                    $single_array = array();
                }

                if ($qur['birthday'] == NULL) {
                    $single_array['birthday'] = null;
                    $single_array['age'] = null;
                } else {
                    //explode the date to get month, day and year
                    $birthDate = explode("-", $qur['birthday']);
                    //get age from date or birthdate
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
                    $single_array['birthday'] = $birthDate[2] . '/' . $birthDate[1] . '/' . $birthDate[0];
                    $single_array['age'] = $age;
                }
                $user_id = $qur['user_id'];
                $single_array['user_id'] = $qur['user_id'];
                $single_array['created_time'] = $qur['created_time'];
                $single_array['name'] = $qur['name'];
                $single_array['gender'] = $qur['gender'];
                $single_array['likert_id'] = $qur['likert_id'];
                $single_array['replys'] = array();
            }

            //respostas abertas
            foreach ($questionnaire_users_open_replys as $key => $quor) {
                if ($quor['user_id'] == $user_id) {
                    $reply_open_array = array();
                    $reply_open_array['reply_value'] = $quor['reply'];
                    $reply_open_array['question'] = $quor['open_question'];
                    array_push($single_array['replys'], $reply_open_array);
                    unset($questionnaire_users_open_replys[$key]);
                }
            }

            // respostas do likert
            $reply_array = array();
            $reply_array['reply_value'] = $qur['reply_value'];
            $reply_array['reply'] = $qur['reply'];
            $reply_array['lr_id'] = $qur['lr_id'];
            $reply_array['question'] = $qur['question'];
            $reply_array['question_order'] = $qur['question_order'];
            $reply_array['lq_id'] = $qur['lq_id'];
            array_push($single_array['replys'], $reply_array);
        }
        array_push($total_array, $single_array);

        $data['questionnaire_users_replys'] = $total_array;
        $data['content'] = 'disciplines/questionnaireUsersReplys';
        $this->load->view('layouts/none', $data);
    }

    function list_questionnaire_graphs($questionnaire_discipline_id_encoded) {
//        $questionnaire_discipline_id = secdecode($questionnaire_discipline_id_encoded);
        $questionnaire_discipline_id = $questionnaire_discipline_id_encoded;
        $questionnaire_users_replys = $this->Disciplines_Model->get_questionnaire_users_replys($questionnaire_discipline_id);
        $questionnaire_questions = $this->Disciplines_Model->get_likert_questions_with_q_id($questionnaire_discipline_id);
        $questionnaire_users_open_replys = $this->Disciplines_Model->get_questionnaire_users_open_replys($questionnaire_discipline_id);
        $user_id = 0;
        $single_array = array();
        $total_array = array();

        foreach ($questionnaire_users_replys as $key => $qur) {
            if ($user_id != $qur['user_id']) {
                if ($user_id != 0) {
                    array_push($total_array, $single_array);
                    $single_array = array();
                }

                if ($qur['birthday'] == NULL) {
                    $single_array['birthday'] = null;
                    $single_array['age'] = null;
                } else {
                    //explode the date to get month, day and year
                    $birthDate = explode("-", $qur['birthday']);
                    //get age from date or birthdate
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
                    $single_array['birthday'] = $birthDate[2] . '/' . $birthDate[1] . '/' . $birthDate[0];
                    $single_array['age'] = $age;
                }
                $user_id = $qur['user_id'];
                $single_array['user_id'] = $qur['user_id'];
                $single_array['created_time'] = $qur['created_time'];
                $single_array['name'] = $qur['name'];
                $single_array['gender'] = $qur['gender'];
                $single_array['likert_id'] = $qur['likert_id'];
                $single_array['user_type'] = $qur['user_type'];
                $single_array['replys'] = array();
            }

            //respostas abertas
            foreach ($questionnaire_users_open_replys as $key => $quor) {
                if ($quor['user_id'] == $user_id) {
                    $reply_open_array = array();
                    $reply_open_array['reply_value'] = $quor['reply'];
                    $reply_open_array['question'] = $quor['open_question'];
                    array_push($single_array['replys'], $reply_open_array);
                    unset($questionnaire_users_open_replys[$key]);
                }
            }

            // respostas do likert
            $reply_array = array();
            $reply_array['reply_value'] = $qur['reply_value'];
            $reply_array['reply'] = $qur['reply'];
            $reply_array['lr_id'] = $qur['lr_id'];
            $reply_array['question'] = $qur['question'];
            $reply_array['question_order'] = $qur['question_order'];
            $reply_array['lq_id'] = $qur['lq_id'];
            array_push($single_array['replys'], $reply_array);
        }
        array_push($total_array, $single_array);
        $data['questionnaire_questions'] = $questionnaire_questions;
        $data['questionnaire_discipline_id_encoded'] = secencode($questionnaire_discipline_id);
        $data['questionnaire_users_replys'] = $total_array;
        $data['content'] = 'disciplines/questionnaireUsersGraphs';
        $this->load->view('layouts/default', $data);
    }

    /*
     * type: GET
     * @params: questionnaire discipline id and likert question id
     * Return: replys array
     * 
     * get all users replys from this likert question
     */

    function question_graph($lq_id_encoded, $questionnaire_discipline_id_encoded) {
        $questionnaire_discipline_id = secdecode($questionnaire_discipline_id_encoded);
        $lq_id = secdecode($lq_id_encoded);
        $replys = $this->Disciplines_Model->get_likert_question($lq_id);

        // geral
        foreach ($replys as $key => $r) {
            $replys[$key]['sum'] = $this->Disciplines_Model->get_question_users_replys($questionnaire_discipline_id, $lq_id, $r['id'], 0);
        }
        $total = 0;
        foreach ($replys as $ur) {
            $total = $total + $ur['sum'];
        }
        if ($total != 0) {
            foreach ($replys as $key => $r) {
                $replys[$key]['percent'] = number_format(($r['sum'] * 100) / $total, 2, '.', '');
            }
            $data['replys'] = $replys;
        } else {
            $data['replys'] = array();
        }

        // medico
        foreach ($replys as $key => $r) {
            $replys[$key]['sum'] = $this->Disciplines_Model->get_question_users_replys($questionnaire_discipline_id, $lq_id, $r['id'], 1);
        }
        $total = 0;
        foreach ($replys as $ur) {
            $total = $total + $ur['sum'];
        }
        if ($total != 0) {
            foreach ($replys as $key => $r) {
                $replys[$key]['percent'] = number_format(($r['sum'] * 100) / $total, 2, '.', '');
            }
            $data['replys_med'] = $replys;
        } else {
            $data['replys_med'] = array();
        }

        // enfermeiro
        foreach ($replys as $key => $r) {
            $replys[$key]['sum'] = $this->Disciplines_Model->get_question_users_replys($questionnaire_discipline_id, $lq_id, $r['id'], 2);
        }
        $total = 0;
        foreach ($replys as $ur) {
            $total = $total + $ur['sum'];
        }
        if ($total != 0) {
            foreach ($replys as $key => $r) {
                $replys[$key]['percent'] = number_format(($r['sum'] * 100) / $total, 2, '.', '');
            }
            $data['replys_enf'] = $replys;
        } else {
            $data['replys_enf'] = array();
        }

        // farmaceutico
        foreach ($replys as $key => $r) {
            $replys[$key]['sum'] = $this->Disciplines_Model->get_question_users_replys($questionnaire_discipline_id, $lq_id, $r['id'], 3);
        }
        $total = 0;
        foreach ($replys as $ur) {
            $total = $total + $ur['sum'];
        }
        if ($total != 0) {
            foreach ($replys as $key => $r) {
                $replys[$key]['percent'] = number_format(($r['sum'] * 100) / $total, 2, '.', '');
            }
            $data['replys_con'] = $replys;
        } else {
            $data['replys_con'] = array();
        }

        // geral (professor)
        foreach ($replys as $key => $r) {
            $replys[$key]['sum'] = $this->Disciplines_Model->get_question_users_replys($questionnaire_discipline_id, $lq_id, $r['id'], 4);
        }
        $total = 0;
        foreach ($replys as $ur) {
            $total = $total + $ur['sum'];
        }
        if ($total != 0) {
            foreach ($replys as $key => $r) {
                $replys[$key]['percent'] = number_format(($r['sum'] * 100) / $total, 2, '.', '');
            }
            $data['replys2'] = $replys;
        } else {
            $data['replys2'] = array();
        }

        // medico (professor)
        foreach ($replys as $key => $r) {
            $replys[$key]['sum'] = $this->Disciplines_Model->get_question_users_replys($questionnaire_discipline_id, $lq_id, $r['id'], 5);
        }
        $total = 0;
        foreach ($replys as $ur) {
            $total = $total + $ur['sum'];
        }
        if ($total != 0) {
            foreach ($replys as $key => $r) {
                $replys[$key]['percent'] = number_format(($r['sum'] * 100) / $total, 2, '.', '');
            }
            $data['replys_med2'] = $replys;
        } else {
            $data['replys_med2'] = array();
        }

        // enfermeiro (professor)
        foreach ($replys as $key => $r) {
            $replys[$key]['sum'] = $this->Disciplines_Model->get_question_users_replys($questionnaire_discipline_id, $lq_id, $r['id'], 6);
        }
        $total = 0;
        foreach ($replys as $ur) {
            $total = $total + $ur['sum'];
        }
        if ($total != 0) {
            foreach ($replys as $key => $r) {
                $replys[$key]['percent'] = number_format(($r['sum'] * 100) / $total, 2, '.', '');
            }
            $data['replys_enf2'] = $replys;
        } else {
            $data['replys_enf2'] = array();
        }

        // farmaceutico (professor)
        foreach ($replys as $key => $r) {
            $replys[$key]['sum'] = $this->Disciplines_Model->get_question_users_replys($questionnaire_discipline_id, $lq_id, $r['id'], 7);
        }
        $total = 0;
        foreach ($replys as $ur) {
            $total = $total + $ur['sum'];
        }
        if ($total != 0) {
            foreach ($replys as $key => $r) {
                $replys[$key]['percent'] = number_format(($r['sum'] * 100) / $total, 2, '.', '');
            }
            $data['replys_con2'] = $replys;
        } else {
            $data['replys_con2'] = array();
        }

        $data['questionnaire_discipline_id_encoded'] = $questionnaire_discipline_id_encoded;
        $data['content'] = 'disciplines/questionnaireUsersGraphs2';
        $this->load->view('layouts/default', $data);
    }

    /*
     * type: POST
     * @params: form id
     * Return: form link
     * 
     * get form link and start in view
     */

    function start_form() {
        $form_id = $this->input->post('id');
        $data['form'] = $this->Disciplines_Model->get_form($form_id);
        $data['content'] = 'disciplines/startForm';
        $this->load->view('layouts/none', $data);
    }

    /*
     * type: POST
     * @params: questionnaire discipline id
     * Return: questions array
     * 
     * get all questions and start questionnaire
     */

    public function start_questionnaire() {
        $questionnaire_discipline_id = $this->input->post('id');
        $questionnaire_discipline = $this->Disciplines_Model->get_questionnaire_discipline($questionnaire_discipline_id);
        $likerts = $this->Disciplines_Model->get_full_questionnaire($questionnaire_discipline['questionnaire_id']);
        $questionnaire = $this->Disciplines_Model->get_questionnaire($questionnaire_discipline['questionnaire_id']);
        $open_questions = $this->Settings_Model->get_questionnaire_open_questions($questionnaire_discipline['questionnaire_id']);
        $questions_ids = array();

        foreach ($likerts as $key => $l) {
//            $likerts[$key]['questions'] = explode('||||', $l['questions']);
//            $likerts[$key]['questions_ids'] = explode('||||', $l['questions_ids']);
//            $likerts[$key]['replys'] = explode('||||', $l['replys']);
//            $likerts[$key]['replys_ids'] = explode('||||', $l['replys_ids']);            

            $likerts[$key]['questions'] = $this->Disciplines_Model->get_likert_questions($l['id']);
            $likerts[$key]['questions_ids'] = $this->Disciplines_Model->get_likert_questions_ids($l['id']);
            $likerts[$key]['replys'] = $this->Disciplines_Model->get_likert_replys($l['id']);
            $likerts[$key]['replys_ids'] = $this->Disciplines_Model->get_likert_replys_ids($l['id']);
            $questions_ids = array_merge($questions_ids, $likerts[$key]['questions_ids']);
        }
        $data['questionnaire_discipline_id'] = $questionnaire_discipline_id;
        $data['questionnaire'] = $questionnaire;
        $data['discipline_id'] = $questionnaire_discipline['discipline_id'];
        $data['likerts'] = $likerts;
        $data['questions_ids'] = $questions_ids;
        $data['open_questions'] = $open_questions;
        $data['content'] = 'disciplines/startQuestionnaire';
        $this->load->view('layouts/none', $data);
    }

    /*
     * type: POST
     * @params: questionnaire discipline id and questionnaire replys
     * Return: OK or NOK
     * 
     * save all user replys of this questionnaire
     */

    public function save_complete_questionnaire() {
        $questionnaire_discipline_id = $this->input->post('questionnaire_discipline_id');
        $questionnaire_replys = $this->input->post('questionnaire_replys');

        // name = question_id (pergunta)
        // value = reply_id (resposta)
        foreach ($questionnaire_replys as $qr) {
            $type = explode("-", $qr['name']);
            $qr['name'] = $type[1];
            if ($type[0] == 'lik') {
                $status = $this->Disciplines_Model->save_questionnaire_user_reply_likert($qr, $questionnaire_discipline_id);
            } else {
                $status = $this->Disciplines_Model->save_questionnaire_user_reply_open_question($qr, $questionnaire_discipline_id);
            }
        }

        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    /*
     * type: POST
     * @params: discipline id encoded
     * Return: OK or NOK
     * 
     * register user in discipline
     */

    public function save_discipline_registration($discipline_password = null) {
        if ($discipline_password == null) {
            $discipline_password = $this->input->post('discipline_password');
            $discipline_id = base64_decode($discipline_password);
            $discipline_password = null;
        } else {
            $discipline_id = base64_decode($discipline_password);
        }

        $discipline = $this->Disciplines_Model->get_discipline($discipline_id);

        $number_registered_students = $this->Disciplines_Model->number_registered_students($discipline_id);

        // checa se a turma ja alcancou o maximo de alunos
        if ($number_registered_students < $discipline['amount_students_group']) {

            //checa se a inscricao ainda esta aberta
            $discipline = $this->Disciplines_Model->get_discipline($discipline_id);

            if (($this->now >= $discipline['start_date_registrations'] && $this->now < $discipline['end_date_registrations']) || ($this->now > $discipline['start_date_registrations'] && $this->now <= $discipline['end_date_registrations'])) {

                $this->Disciplines_Model->save_discipline_registration($discipline_id, $this->user['id']);
                $status = 'OK';
                $message = '';
                $title = '';
            } else {
                $status = 'NOK';
                $message = 'Periodo de matrícula: ' . $discipline['start_date_registrations'] . ' a ' . $discipline['end_date_registrations'];
                $title = 'Fora do periodo';
            }
        } else {
            $status = 'NOK';
            $message = lang('full_discipline_message');
            $title = lang('no_vacation');
        }

//                                      pr('<pre>');
//                    pr($discipline_password);
//                    exit;
        if ($discipline_password == null) {
            echo json_encode(array(
                'title' => $title,
                'status' => $status,
                'message' => $message,
                'discipline_id' => $discipline_id
            ));
            exit;
        } else {
            $this->load->helper('url');
            redirect('home', 'refresh');
        }
    }

    /*
     * type: POST
     * @params: professor id, modules, discipline and discipline id
     * Return: OK or NOK
     * 
     * define responsible for a module
     */

    public function save_responsible() {
        $professor_id = $this->input->post('professor_id');
        $responsible_modules = $this->input->post('responsible_modules');
        $responsible_discipline = $this->input->post('responsible_discipline');
        $discipline_id = $this->input->post('discipline_id');

        if ($responsible_discipline == 'true') {
            $return = $this->Disciplines_Model->save_responsible_discipline($discipline_id, $professor_id);
        } else {
            foreach ($responsible_modules as $m) {
                $return = $this->Disciplines_Model->save_responsible_module($m, $professor_id);
            }
        }
        echo json_encode($return);
        exit;
    }

    /*
     * type: POST
     * @params: responsible id
     * Return: OK or NOK
     * 
     * remove responsible from discipline or module
     */

    public function delete_responsible() {
        $responsible_id = $this->input->post('id');
        $table = $this->input->post('table');

        echo json_encode(array(
            'status' => $this->Disciplines_Model->delete_responsible($responsible_id, $table)
        ));
        exit;
    }

    /*
     * type: POST
     * @params: discipline id, student email and type registration
     * Return: OK or NOK
     * 
     * send email to student enter in discipline
     */

    public function send_discipline_registration() {
        $disciplines_id = $this->input->post('discipline_id');
        $student_email = $this->input->post('student_email');
        $direct_registration = $this->input->post('direct_registration');
//        pr('<pre>');pr($disciplines_id);exit;

        $professor = $this->User_Model->get_user($this->user['id']);

        if ($direct_registration == 0) {

            foreach ($disciplines_id as $discipline_id) {
                if ($discipline_id != 'multiselect-all') {
                    $discipline = $this->Disciplines_Model->get_discipline($discipline_id);
                    $data_template = array();
                    $data_template['base_url'] = $this->config->base_url();
                    $data_template['email_key'] = secencode($student_email);
                    $data_template['email_key'] = str_replace(array('+', '/', '='), array('-', '_', '~'), $data_template['email_key']);
                    $data_template['professor'] = $this->user['name'];
                    $data_template['discipline'] = $discipline['name'];
                    $data_template['discipline_key'] = secencode($discipline_id);
                    $data_template['discipline_key'] = str_replace(array('+', '/', '='), array('-', '_', '~'), $data_template['discipline_key']);
//                            pr('<pre>');pr($data_template);exit;

                    $content = $this->load->view('layouts/registration_direct_email', $data_template, true);

                    $mail_to = mail_to($student_email, 'Estudante', "Convite de matrícula", $content);
                    if ($mail_to === 'SEND_OK') {
                        $type = 'success';
                        $title = 'Sucesso';
                        $text = 'O convite foi enviado';
                    } else {
                        $type = 'error';
                        $title = 'Erro';
                        $text = 'Tente novamente mais tarde (01)';
                    }
                }
            }
        } else if ($direct_registration == 1) {
            $student = $this->User_Model->get_user_with_email($student_email); // checa se usuario esta cadastrado

            $data_template = array();
            $data_template['base_url'] = $this->config->base_url();
            $data_template['professor'] = $this->user['name'];
            $data_template['discipline'] = '';

            if (isset($student['id'])) {
                // matricula usuario nas disciplinas
                foreach ($disciplines_id as $discipline_id) {
                    if ($discipline_id != 'multiselect-all') {
                        $discipline = $this->Disciplines_Model->get_discipline($discipline_id);
                        $this->Disciplines_Model->save_discipline_registration($discipline_id, $student['id']);
                        $data_template['discipline'] = $data_template['discipline'] . ' ' . $discipline['name'] . ', ';
                    }
                }
                $content = $this->load->view('layouts/pre_registration_direct_email', $data_template, true);
                $mail_to = mail_to($student_email, 'Elearning', "Você foi matriculado em uma nova disciplina", $content);
                if ($mail_to === 'SEND_OK') {
                    $type = 'success';
                    $title = 'Sucesso';
                    $text = 'Usuário foi matriculado';
                } else {
                    $type = 'error';
                    $title = 'Erro';
                    $text = 'Tente novamente mais tarde (02)';
                }
            } else {

                $user['info'] = null;
                $user['name'] = 'Aluno';
                $user['type'] = 'student';
                $user['email'] = $student_email;
                $user['password'] = $this->randomPassword();
                $user['now'] = $this->now;

                // cadastra aluno
                $user_id = $this->User_Model->create_user($user);

                // matricula usuario nas disciplinas
                foreach ($disciplines_id as $discipline_id) {
                    if ($discipline_id != 'multiselect-all') {
                        $discipline = $this->Disciplines_Model->get_discipline($discipline_id);
                        $this->Disciplines_Model->save_discipline_registration($discipline_id, $user_id);
                        $data_template['discipline'] = $data_template['discipline'] . ' ' . $discipline['name'] . ', ';
                    }
                }
                // enviando email de confirmacao de cadastro com dados de acesso
                $data_template['name'] = $user['name'];
                $data_template['login'] = $user['email'];
                $data_template['password'] = $user['password'];
                $data_template['base_url'] = $this->config->base_url();
                $content = $this->load->view('layouts/register_system_confirmation_email', $data_template, true);
                $mail_to = mail_to($user['email'], $user['name'], "Seja bem vindo ao Elearning", $content);
                if ($mail_to === 'SEND_OK') {
                    $type = 'success';
                    $title = 'Sucesso';
                    $text = 'Usuário foi matriculado';
                } else {
                    $type = 'error';
                    $title = 'Erro';
                    $text = 'Tente novamente mais tarde (02)';
                }
            }
        } else {
            // nao envia nenhum email para o estudante. Mas efetua a matricula dele.
            $student = $this->User_Model->get_user_with_email($student_email); // checa se usuario esta cadastrado

            $data_template = array();
            $data_template['base_url'] = $this->config->base_url();
            $data_template['professor'] = $this->user['name'];
            $data_template['discipline'] = '';

            if (isset($student['id'])) {
                // matricula usuario nas disciplinas
                foreach ($disciplines_id as $discipline_id) {
                    if ($discipline_id != 'multiselect-all') {
                        $discipline = $this->Disciplines_Model->get_discipline($discipline_id);
                        $this->Disciplines_Model->save_discipline_registration($discipline_id, $student['id']);
                    }
                }
                $type = 'success';
                $title = 'Sucesso';
                $text = 'Usuário foi matriculado';
            } else {
                // monta uma pre matricula do usuario
                foreach ($disciplines_id as $discipline_id) {
                    if ($discipline_id != 'multiselect-all') {
                        $discipline = $this->Disciplines_Model->get_discipline($discipline_id);
                        $this->Disciplines_Model->save_discipline_pre_registration($discipline_id, $student_email, $this->user['id']);
                    }
                }
                $type = 'success';
                $title = 'Sucesso';
                $text = 'Usuário não cadastrado, pré matrícula salva.';
            }
        }

        echo json_encode(array(
            'type' => $type,
            'title' => $title,
            'text' => $text
        ));
        exit;
    }

    /*
     * type: none
     * @params: none
     * Return: string
     * 
     * ramdomize a password
     */

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    /*
     * type: POST
     * @params: relationship id and status
     * Return: OK or NOK
     * 
     * change status of student in discipline
     */

    function change_status_enrolled_students() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if ($status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $status = $this->Disciplines_Model->change_status_enrolled_students($id, $status);

        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    /*
     * type: GET
     * @params: email and discipline id
     * Return: message
     * 
     * confirm registration of student in discipline
     */

    function confirm_registration_email($email_key, $discipline_key) {
        $email_key = str_replace(array('-', '_', '~'), array('+', '/', '='), $email_key);
        $discipline_key = str_replace(array('-', '_', '~'), array('+', '/', '='), $discipline_key);
        $student_email = secdecode($email_key);
        $discipline_id = secdecode($discipline_key);

        $discipline = $this->Disciplines_Model->get_discipline($discipline_id);
        $number_registered_students = $this->Disciplines_Model->number_registered_students($discipline_id);

        // checa se a turma ja alcancou o maximo de alunos
        if ($number_registered_students < $discipline['amount_students_group']) {

            //checa se a inscricao ainda esta aberta
            if (($this->now >= $discipline['start_date_registrations'] && $this->now < $discipline['end_date_registrations']) || ($this->now > $discipline['start_date_registrations'] && $this->now <= $discipline['end_date_registrations'])) {

                // checa se o email do usuario corresponde ao email que recebeu o convite
                $user = $this->User_Model->get_user($this->user['id']);
                if ($student_email == $user['email']) {
                    $this->Disciplines_Model->save_discipline_registration($discipline_id, $this->user['id']);
                    $data['message'] = 'Sua matrícula foi efetuada com sucesso !';
                } else {
                    $data['message'] = 'O convite não corresponde ao seu email, peça para seu Professor enviar outro convite para o email cadastrado no EaD !';
                }
            } else {
                $data['message'] = 'Periodo de matrícula: ' . $discipline['start_date_registrations'] . ' a ' . $discipline['end_date_registrations'];
            }
        } else {
            $data['message'] = 'A disciplina ja atingiu o numero máximo de alunos matriculados.';
        }

        $data['title'] = lang('register_invitation');
        $data['content'] = 'home/message';
        $this->load->view('layouts/default', $data);
    }

}
