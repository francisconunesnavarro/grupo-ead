<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
        $this->load->model('Settings_Model');
        $this->load->model('Home_Model');
        $this->load->model('Disciplines_Model');
        if (!$this->user['logged'] || $this->user['type'] == 'student') {
            $data['content'] = 'warning/500';
            $this->load->view('layouts/none', $data);
        }
    }

    function save_open_question() {
        $open_question = $this->input->post();
        if ($open_question['id']) {
            $this->Settings_Model->edit_open_question($open_question);
        } else {
            $open_question['id'] = $this->Settings_Model->create_open_question($open_question);
        }
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    function listCategories() {
        $data['categories'] = $this->Settings_Model->get_categories($this->user['id']);
        $data['content'] = 'settings/listCategories';
        $this->load->view('layouts/default', $data);
    }

    function listThemes() {
        $data['themes'] = $this->Settings_Model->get_themes();
        $data['content'] = 'settings/listThemes';
        $this->load->view('layouts/default', $data);
    }

    function load_subthemes() {
        $theme_id = $this->input->post('id');
        $subthemes = $this->Settings_Model->get_subthemes($theme_id);
        echo json_encode($subthemes);
        exit;
    }

    function listSubThemes($theme_id_encoded) {
        $theme_id = secdecode($theme_id_encoded);
        $data['subthemes'] = $this->Settings_Model->get_subthemes($theme_id);
        $data['content'] = 'settings/listSubThemes';
        $this->load->view('layouts/default', $data);
    }

    function load_questionnaire_consent_term() {
        $questionnaire_id = $this->input->post('id');
        $consent_term = $this->Settings_Model->get_consent_term($questionnaire_id);
        echo json_encode(array(
            'consent_term' => $consent_term
        ));
        exit;
    }

    function save_consent_term() {
        $term = $this->input->post();
        $status = $this->Settings_Model->update_consent_term($term);
        echo json_encode(array(
            'status' => $status
        ));
        exit;
    }

    public function save_likert() {
        $likert = $this->input->post();
        $likert['replys'] = $replys = explode('&', $likert['replys']);
        $likert['replys_values'] = $replys_values = explode('&', $likert['replys_values']);
        $likert['question_order'] = $question_order = explode('&', $likert['question_order']);
        $likert['questions'] = $questions = explode('&', $likert['questions']);
        $likert['select_questions'] = $select_questions = explode('&', $likert['select_questions']);


        if ($likert['id']) {
            $this->Settings_Model->edit_likert($likert);
        } else {
            $likert['id'] = $this->Settings_Model->create_likert($likert);
        }

        // adicionar perguntas e respostas na escala de likert
        $replys_array = array();
        $questions_array = array();

        foreach ($questions as $key => $r) {
            $values = array();
            $values_2 = array();
            $reply_questions = array();

            if ($likert['reply_questions'][$key]) {
                $reply_questions_explode = explode('&', $likert['reply_questions'][$key]);

                if ($reply_questions_explode) {
                    foreach ($reply_questions_explode as $rqe) {
                        parse_str($rqe, $aaa);
                        $reply_questions[] = $aaa['select_replys'];
                    }
                }
            }

            parse_str($r, $questions_array);
            parse_str($question_order[$key], $values);
            parse_str($select_questions[$key], $values_2);

            $this->Settings_Model->add_question_likert($likert['id'], $questions_array['questions'], $values['question_order'], $values_2['select_type'], $reply_questions);
        }

        foreach ($replys as $key => $r) {
            $values = array();
            parse_str($r, $replys_array);
            parse_str($replys_values[$key], $values);
            $this->Settings_Model->add_reply_likert($likert['id'], $replys_array['replys'], $values['replys_values']);
        }

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function load_likert() {
        $likert_id = $this->input->post('id');
        $likert = $this->Settings_Model->get_likert($likert_id);
        $likert['replys'] = $this->Settings_Model->get_likert_replys($likert_id);
        $likert['questions'] = $this->Settings_Model->get_likert_questions($likert_id);
        echo json_encode(array(
            'likert' => $likert
        ));
        exit;
    }

    public function load_open_question() {
        $open_question_id = $this->input->post('id');
        $open_question = $this->Settings_Model->get_open_question($open_question_id);
        echo json_encode(array(
            'open_question' => $open_question
        ));
        exit;
    }

    public function openQuestionnaire($questionnaire_id) {
        $data['likerts'] = $this->Settings_Model->get_questionnaire_likerts($questionnaire_id);
        $data['open_questions'] = $this->Settings_Model->get_questionnaire_open_questions($questionnaire_id);
        $data['title'] = 'Questionário';
        $data['questionnaire_id'] = $questionnaire_id;
        $data['content'] = 'settings/openQuestionnaire';
        $this->load->view('layouts/default', $data);
    }

    public function listQuestionnaires() {
        $data['questionnaires'] = $this->Settings_Model->get_questionnaires();
        $data['title'] = 'Questionários';
        $data['content'] = 'settings/listQuestionnaires';
        $this->load->view('layouts/default', $data);
    }

    public function delete_category() {
        $category_id = $this->input->post('id');
        $this->Settings_Model->delete_category($category_id);

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function delete_theme() {
        $theme_id = secdecode($this->input->post('id'));
        $this->Settings_Model->delete_theme($theme_id);

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function delete_subtheme() {
        $subtheme_id = secdecode($this->input->post('id'));
        $this->Settings_Model->delete_subtheme($subtheme_id);

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function delete_likert() {
        $likert_id = $this->input->post('id');
        $this->Settings_Model->delete_likert($likert_id);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function delete_open_question() {
        $open_question_id = $this->input->post('id');
        $this->Settings_Model->delete_open_question($open_question_id);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function load_category() {
        $category_id = $this->input->post('id');
        $category = $this->Settings_Model->get_category($category_id);

        echo json_encode(array(
            'category' => $category
        ));
        exit;
    }

    public function load_theme() {
        $theme_id = secdecode($this->input->post('id'));
        $theme = $this->Settings_Model->get_theme($theme_id);
        echo json_encode(array(
            'theme' => $theme
        ));
        exit;
    }

    public function load_subtheme() {
        $subtheme_id = secdecode($this->input->post('id'));
        $subtheme = $this->Settings_Model->get_subtheme($subtheme_id);
        echo json_encode(array(
            'subtheme' => $subtheme
        ));
        exit;
    }

    public function save_category() {
        $category['id'] = $this->input->post('id');
        $category['color'] = $this->input->post('color');
        $category['name'] = $this->input->post('name');

        if ($category['id']) {
            $category = $this->Settings_Model->edit_category($category);
        } else {
            $category = $this->Settings_Model->create_category($category);
        }

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function listQuestions() {
        $data['results'] = $this->Settings_Model->get_questions(FALSE, $this->user['id'], FALSE);
        if ($this->user['type'] == 'pae') {
            //$data['disciplines'] = $this->Disciplines_Model->get_disciplines_pae();
            $data['themes'] = $this->Settings_Model->get_themes();
        } else {
            //$data['disciplines'] = $this->Disciplines_Model->get_disciplines();
            $data['themes'] = $this->Settings_Model->get_themes();
        }

        $data['content'] = 'settings/listQuestions';
        $this->load->view('layouts/default', $data);
    }

    public function delete_question() {
        $question_id = $this->input->post('id');
        $this->Settings_Model->delete_question($question_id);

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function delete_questionnaire() {
        $questionnaire_id = $this->input->post('id');
        $this->Settings_Model->delete_questionnaire($questionnaire_id);

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function load_question() {
        $question_id = $this->input->post('id');
        $question = $this->Settings_Model->get_question($question_id);

        $key_correct = 1;
        $key_wrong = 1;
        foreach ($question as $q) {
            if ($q['correct'] == 1) {
                $question_replys['question'] = $question[0]['question'];
                $question_replys['difficulty'] = $question[0]['difficulty'];
                $question_replys['theme_id'] = $question[0]['theme_id'];
                $question_replys['subtheme_id'] = $question[0]['subtheme_id'];
                $question_replys['correct_reply' . $key_correct] = $q['reply'];
                $key_correct++;
            } else {
                $question_replys['wrong_reply' . $key_wrong] = $q['reply'];
                $key_wrong++;
            }
        }

        while ($key_correct != 3) {
            $question_replys['correct_reply' . $key_correct] = '';
            $key_correct++;
        }
        while ($key_wrong != 9) {
            $question_replys['wrong_reply' . $key_wrong] = '';
            $key_wrong++;
        }

        echo json_encode(array(
            'question' => $question_replys
        ));
        exit;
    }

    public function load_questionnaire() {
        $questionnaire_id = $this->input->post('id');
        $questionnaire = $this->Settings_Model->get_questionnaire($questionnaire_id);

        echo json_encode(array(
            'questionnaire' => $questionnaire
        ));
        exit;
    }

    public function save_question() {
        $question = $this->input->post();
        if ($question['id']) {
            $question = $this->Settings_Model->edit_question($question);
        } else {
            $question = $this->Settings_Model->create_question($question);
        }

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function save_theme() {
        $theme = $this->input->post();
        if ($theme['id']) {
            $theme['id'] = secdecode($theme['id']);
            $theme = $this->Settings_Model->edit_theme($theme);
        } else {
            $theme = $this->Settings_Model->create_theme($theme);
        }

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function save_subtheme() {
        $subtheme = $this->input->post();
        if ($subtheme['id']) {
            $subtheme['id'] = secdecode($subtheme['id']);
            $subtheme = $this->Settings_Model->edit_subtheme($subtheme);
        } else {
            $subtheme = $this->Settings_Model->create_subtheme($subtheme);
        }

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function save_questionnaire() {
        $questionnaire = $this->input->post();


        if ($questionnaire['id']) {
            $questionnaire = $this->Settings_Model->edit_questionnaire($questionnaire);
        } else {
            unset($questionnaire['id']);
            $questionnaire = $this->Settings_Model->create_questionnaire($questionnaire);
        }

        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    function apresentationVideo() {
        if ($this->Home_Model->get_apresentation_video()) {
            $data['apresentation_video'] = $this->config->base_url() . $this->Home_Model->get_apresentation_video();
        }
        $data['content'] = 'settings/apresentationVideo';
        $this->load->view('layouts/default', $data);
    }

    function receiveVideo() {
        $tempFile = $_FILES['file']['tmp_name'];
        $targetFile = $this->config->item('store_folder') . $_FILES['file']['name'];
        $additional = '1';
        while (file_exists($targetFile)) {
            $info = pathinfo($targetFile);
            $targetFile = $info['dirname'] . '/'
                    . $info['filename'] . $additional
                    . '.' . $info['extension'];
        }

        $return = move_uploaded_file($tempFile, $targetFile);
        $this->Settings_Model->insert_update_apresentation_video($targetFile);
    }

}
