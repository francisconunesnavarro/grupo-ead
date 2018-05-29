<?php

Class Settings_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    function get_categories($user_id) {
        $this->db->select('*')
                ->from('categories')
                ->order_by('name')
                ->where('enabled', 1);
        if ($user_id && $this->user['type'] != 'admin') {
            $this->db->where('user_id', $user_id);
        }
        return $this->db->get()->result_array();
    }
    
    function get_themes(){
        $this->db->select('*')
                ->from('themes')
                ->order_by('name')
                ->where('enabled', 1);
        return $this->db->get()->result_array();
    }
    
    function create_theme($theme) {
        $this->db->set($theme)
                ->insert('themes');
        $id = $this->db->insert_id();
        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function edit_theme($theme) {
        $query = $this->db->set($theme)
                ->where('id', $theme['id'])
                ->update('themes');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function delete_theme($id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->update('themes');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }
    
    function create_subtheme($subtheme) {
        $this->db->set($subtheme)
                ->insert('subthemes');
        $id = $this->db->insert_id();
        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function edit_subtheme($subtheme) {
        $query = $this->db->set($subtheme)
                ->where('id', $subtheme['id'])
                ->update('subthemes');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function delete_subtheme($id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->update('subthemes');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }
    
    function get_subthemes($theme_id){
        $this->db->select('*')
                ->from('subthemes')
                ->order_by('name')
                ->where('enabled', 1)
                ->where('theme_id', $theme_id);
        return $this->db->get()->result_array();
    }

    function get_consent_term($questionnaire_id) {
        return $this->db->select('*')
                        ->from('questionnaires q')
                        ->where('id', $questionnaire_id)
                        ->get()->row_array();
    }

    function get_questionnaire_open_questions($questionnaire_id) {
        return $this->db->select('*')
                        ->from('questionnaire_open_questions')
                        ->where('questionnaire_id', $questionnaire_id)
                        ->order_by('order')
                        ->where('enabled', 1)
                        ->get()->result_array();
    }

    function get_questionnaire_likerts($questionnaire_id) {
        return $this->db->select('*')
                        ->from('likerts')
                        ->where('questionnaire_id', $questionnaire_id)
                        ->order_by('likert_order')
                        ->where('enabled', 1)
                        ->get()->result_array();
    }

    function get_questionnaires() {
        $this->db->select('*')
                ->from('questionnaires')
                ->order_by('name')
                ->where('enabled', 1);
        if ($this->user['type'] != 'admin') {
            $this->db->where('user_id', $this->user['id']);
        }
        return $this->db->get()->result_array();
    }

    function get_category($id) {
        return $this->db->select('*')
                ->from('categories')
                ->where('id', $id)
                ->get()->row_array();
    }
    
    function get_theme($id) {
        return $this->db->select('*')
                ->from('themes')
                ->where('id', $id)
                ->get()->row_array();
    }
    
    function get_subtheme($id) {
        return $this->db->select('*')
                ->from('subthemes')
                ->where('id', $id)
                ->get()->row_array();
    }

    function create_category($category) {
        $this->db->set('name', $category['name'])
                ->set('color', $category['color'])
                ->set('user_id', $this->user['id'])
                ->insert('categories');
        $id = $this->db->insert_id();
        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function edit_category($category) {
        $query = $this->db->set('name', $category['name'])
                ->set('color', $category['color'])
                ->where('id', $category['id'])
                ->update('categories');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function delete_category($id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->update('categories');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function delete_likert($id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->update('likerts');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function delete_open_question($id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->update('questionnaire_open_questions');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_questions_with_replys($difficulty = null, $user_id, $module_id) {
        $this->db->select('q.*')
                ->select('qc.name as theme_name')
                ->select('m.name as subtheme_name')
                ->from('questions q')
                ->join('replys r', 'r.question_id=q.id')
                ->join('themes qc', 'qc.id=q.theme_id', 'left')
                ->join('subthemes m', 'm.id=q.subtheme_id', 'left')
                ->where('q.enabled', 1);

        if ($difficulty) {
            $this->db->where('difficulty', $difficulty);
        }
        if ($module_id) {
            $this->db->where('m.id', $module_id);
        }
        if ($user_id && ($this->user['type'] == 'student' || $this->user['type'] == 'professor')) {
            $this->db->where('q.user_id', $user_id);
        }
        $this->db->group_by('q.id');
        return $this->db->get()->result_array();
    }

    function get_questions($difficulty = null, $user_id, $module_id) {
//         $this->db->select('q.*')
//                 ->select('d.name as discipline_name')
//                 ->select('m.name as module_name')
//                 ->from('questions q')
//                 ->join('disciplines d', 'd.id=q.discipline_id', 'left')
//                 ->join('modules m', 'm.id=q.module_id', 'left')
//                 ->where('q.enabled', 1);
//         if ($difficulty) {
//             $this->db->where('difficulty', $difficulty);
//         }
//         if ($module_id) {
//             $this->db->where('m.id', $module_id);
//         }
//         if ($user_id && ($this->user['type'] == 'student' || $this->user['type'] == 'professor')) {
//             $this->db->where('d.user_id', $user_id);
//         }
//         return $this->db->get()->result_array();


        $this->db->select('q.*')
                ->select('qc.name as theme_name')
                ->select('m.name as subtheme_name')
                ->from('questions q')
                ->join('themes qc', 'qc.id=q.theme_id', 'left')
                ->join('subthemes m', 'm.id=q.subtheme_id', 'left')
                ->where('q.enabled', 1);

        if ($difficulty) {
            $this->db->where('difficulty', $difficulty);
        }
        if ($module_id) {
            $this->db->where('m.id', $module_id);
        }
        if ($user_id && ($this->user['type'] == 'student' || $this->user['type'] == 'professor')) {
            $this->db->where('q.user_id', $user_id);
        }
        return $this->db->get()->result_array();
    }

    function get_questions_type($difficulty) {
        $this->db->select('*')
                ->from('questions')
                ->where('difficulty', $difficulty)
                ->where('enabled', 1);
        $result = $this->db->get();
        return $result->result_array();
    }

    function delete_question($id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->update('questions');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function delete_questionnaire($id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->update('questionnaires');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_question_wrong($id, $limit) {
        return $this->db->select('q.*, r.reply, r.correct, r.id as reply_id')
                        ->from('questions q')
                        ->join('replys r', 'q.id=r.question_id', 'left')
                        ->where('q.id', $id)
                        ->where('r.question_id', $id)
                        ->where('r.enabled', 1)
                        ->where('r.correct', 0)
                        ->limit($limit)
                        ->order_by('correct', 'asc')
                        ->get()->result_array();
    }

    function get_question_ok($id) {
        return $this->db->select('q.*, r.reply, r.correct, r.id as reply_id')
                        ->from('questions q')
                        ->join('replys r', 'q.id=r.question_id', 'left')
                        ->where('q.id', $id)
                        ->where('r.question_id', $id)
                        ->where('r.enabled', 1)
                        ->where('r.correct', 1)
                        ->limit(1)
                        ->order_by('correct', 'asc')
                        ->get()->result_array();
    }

    function get_question($id) {
        return $this->db->select('q.*, r.reply, r.correct, r.id as reply_id')
                        ->from('questions q')
                        ->join('replys r', 'q.id=r.question_id', 'left')
                        ->where('q.id', $id)
                        ->where('r.question_id', $id)
                        ->where('r.enabled', 1)
                        ->order_by('correct', 'asc')
                        ->get()->result_array();
    }

    function get_questionnaire($id) {
        $this->db->select('*')
                ->from('questionnaires')
                ->where('id', $id);
        return $this->db->get()->row_array();
    }

    function create_question($question) {
        $this->db->set('difficulty', $question['difficulty'])
                ->set('question', $question['question'])
                ->set('theme_id', $question['theme_id'])
                ->set('subtheme_id', $question['subtheme_id'])
                ->set('user_id', $this->user['id'])
                ->insert('questions');
        $id = $this->db->insert_id();

        // cria respostas novas
        if ($question['correct_reply1']) {
            $this->db->set('reply', $question['correct_reply1'])->set('question_id', $id)->set('correct', 1)->insert('replys');
        }
        if ($question['correct_reply2']) {
            $this->db->set('reply', $question['correct_reply2'])->set('question_id', $id)->set('correct', 1)->insert('replys');
        }
        if ($question['wrong_reply1']) {
            $this->db->set('reply', $question['wrong_reply1'])->set('question_id', $id)->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply2']) {
            $this->db->set('reply', $question['wrong_reply2'])->set('question_id', $id)->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply3']) {
            $this->db->set('reply', $question['wrong_reply3'])->set('question_id', $id)->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply4']) {
            $this->db->set('reply', $question['wrong_reply4'])->set('question_id', $id)->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply5']) {
            $this->db->set('reply', $question['wrong_reply5'])->set('question_id', $id)->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply6']) {
            $this->db->set('reply', $question['wrong_reply6'])->set('question_id', $id)->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply7']) {
            $this->db->set('reply', $question['wrong_reply7'])->set('question_id', $id)->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply8']) {
            $this->db->set('reply', $question['wrong_reply8'])->set('question_id', $id)->set('correct', 0)->insert('replys');
        }

        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function edit_question($question) {

        // desativa respostas antigas
        $this->db->set('enabled', 0)
                ->where('question_id', $question['id'])
                ->update('replys');

        // cria respostas novas
        if ($question['correct_reply1']) {
            $this->db->set('reply', $question['correct_reply1'])->set('question_id', $question['id'])->set('correct', 1)->insert('replys');
        }
        if ($question['correct_reply2']) {
            $this->db->set('reply', $question['correct_reply2'])->set('question_id', $question['id'])->set('correct', 1)->insert('replys');
        }
        if ($question['wrong_reply1']) {
            $this->db->set('reply', $question['wrong_reply1'])->set('question_id', $question['id'])->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply2']) {
            $this->db->set('reply', $question['wrong_reply2'])->set('question_id', $question['id'])->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply3']) {
            $this->db->set('reply', $question['wrong_reply3'])->set('question_id', $question['id'])->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply4']) {
            $this->db->set('reply', $question['wrong_reply4'])->set('question_id', $question['id'])->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply5']) {
            $this->db->set('reply', $question['wrong_reply5'])->set('question_id', $question['id'])->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply6']) {
            $this->db->set('reply', $question['wrong_reply6'])->set('question_id', $question['id'])->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply7']) {
            $this->db->set('reply', $question['wrong_reply7'])->set('question_id', $question['id'])->set('correct', 0)->insert('replys');
        }
        if ($question['wrong_reply8']) {
            $this->db->set('reply', $question['wrong_reply8'])->set('question_id', $question['id'])->set('correct', 0)->insert('replys');
        }

        // atualiza tabela de questoes
        $query = $this->db->set('difficulty', $question['difficulty'])
                ->set('question', $question['question'])
                ->set('theme_id', $question['theme_id'])
                ->set('subtheme_id', $question['subtheme_id'])
                ->where('id', $question['id'])
                ->update('questions');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function update_consent_term($term) {
        $query = $this->db->set('consent_term', $term['consent_term'])
                ->where('id', $term['id'])
                ->update('questionnaires');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function create_likert($likert) {
        $this->db->set('name', $likert['name'])
                ->set('questionnaire_id', $likert['questionnaire_id'])
                ->set('likert_order', $likert['likert_order'])
                ->set('quantity_questions', count($likert['questions']))
                ->set('quantity_replys', count($likert['replys']))
                ->insert('likerts');
        $id = $this->db->insert_id();

        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    function create_open_question($open_question) {
        $this->db->set('order', $open_question['order'])
                ->set('questionnaire_id', $open_question['questionnaire_id'])
                ->set('open_question', $open_question['open_question'])
                ->insert('questionnaire_open_questions');
        $id = $this->db->insert_id();

        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    function edit_open_question($open_question) {
        $this->db->set('order', $open_question['order'])
                ->set('questionnaire_id', $open_question['questionnaire_id'])
                ->set('open_question', $open_question['open_question'])
                ->where('id', $open_question['id'])
                ->update('questionnaire_open_questions');
    }

    function edit_likert($likert) {

        // apaga perguntas antigas
        $this->db->where('likert_id', $likert['id']);
        $this->db->delete('likert_questions');
        // apaga respostas antigas
        $this->db->where('likert_id', $likert['id']);
        $this->db->delete('likert_replys');

        $this->db->set('name', $likert['name'])
                ->set('likert_order', $likert['likert_order'])
                ->set('questionnaire_id', $likert['questionnaire_id'])
                ->set('quantity_questions', count($likert['questions']))
                ->set('quantity_replys', count($likert['replys']))
                ->where('id', $likert['id'])
                ->update('likerts');
    }

    function add_reply_likert($likert_id, $reply, $reply_value) {
        $this->db->set('reply', $reply)
                ->set('reply_value', $reply_value)
                ->set('likert_id', $likert_id)
                ->insert('likert_replys');
        $id = $this->db->insert_id();

        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function add_question_likert($likert_id, $question, $question_order, $select_type, $reply_questions) {
        $this->db->set('question', $question)
                ->set('likert_id', $likert_id)
                ->set('question_order', $question_order)
                ->set('select_type', $select_type)
                ->set('reply_questions', json_encode($reply_questions))
                ->insert('likert_questions');
        $id = $this->db->insert_id();

        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_likert($likert_id) {
        return $this->db->select('*')
                        ->from('likerts')
                        ->where('id', $likert_id)
                        ->get()->row_array();
    }

    function get_open_question($open_question_id) {
        return $this->db->select('*')
                        ->from('questionnaire_open_questions')
                        ->where('id', $open_question_id)
                        ->get()->row_array();
    }

    function get_likert_questions($likert_id) {
        $this->db->select('question, question_order')
                ->from('likert_questions')
                ->where('likert_id', $likert_id)
                ->order_by('question_order');

        return $this->db->get()->result_array();
    }

    function get_likert_replys($likert_id) {
        $this->db->select('reply, reply_value')
                ->from('likert_replys')
                ->where('likert_id', $likert_id)
                ->order_by('id');

        return $this->db->get()->result_array();
    }

    function create_questionnaire($questionnaire) {

        $this->db->set($questionnaire)
                ->set('user_id', $this->user['id'])
                ->insert('questionnaires');
        $id = $this->db->insert_id();

        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function edit_questionnaire($questionnaire) {
        $query = $this->db->set($questionnaire)
                ->where('id', $questionnaire['id'])
                ->update('questionnaires');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function insert_update_apresentation_video($targetFile) {

        $select = $this->db->select('*')
                        ->from('configs')
                        ->get()->row_array();

        if ($select) {
            $this->db->set('apresentation_video', $targetFile)
                    ->update('configs');
        } else {
            $this->db->set('apresentation_video', $targetFile)
                    ->insert('configs');
        }
    }

}

?>