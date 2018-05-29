<?php

Class Disciplines_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    function get_category() {
        return $this->db->select('*')
                        ->from('themes')
                        ->where('enabled', 1)
                        ->get()->result_array();
    }

    function get_disciplines() {

        if ($this->user['type'] != 'admin' && $this->user['logged'] == TRUE) {
            // pega disciplinas criadas pelo usuario
            $this->db->select('d.image, d.summary_content, d.availability_visitor, d.id as disc_id, d.name as disc_name, d.acronym as disc_acronym, d.image as disc_image, c.color as category_color, c.name as category_name, c.id as category_id')
                    ->select('date_format(d.start_date_lessons, "%d/%m/%Y") start_date_lessons', false)
                    ->select('date_format(d.end_date_lessons, "%d/%m/%Y") end_date_lessons', false)
                    ->select('date_format(d.start_date_lessons, "%Y-%m-%d") start_date_lessons_c', false)
                    ->select('date_format(d.end_date_lessons, "%Y-%m-%d") end_date_lessons_c', false)
                    ->from('disciplines d')
                    ->join('categories c', 'c.id=d.category_id', 'left')
                    ->where('d.user_id', $this->user["id"])
                    ->where('d.enabled', 1)
                    //->order_by('c.id');
                    ->order_by('d.name');

            $result1 = $this->db->get()->result_array();

            // pega disciplinas em que o usuario tem algum relacionamento

            if ($this->user['type'] == 'student') {
                $this->db->select('d.image, d.summary_content, d.availability_visitor, d.id as disc_id, d.name as disc_name, d.acronym as disc_acronym, d.image as disc_image, c.color as category_color, c.name as category_name, c.id as category_id')
                        ->select('date_format(d.start_date_lessons, "%d/%m/%Y") start_date_lessons', false)
                        ->select('date_format(d.end_date_lessons, "%d/%m/%Y") end_date_lessons', false)
                        ->select('date_format(d.start_date_lessons, "%Y-%m-%d") start_date_lessons_c', false)
                        ->select('date_format(d.end_date_lessons, "%Y-%m-%d") end_date_lessons_c', false)
                        ->from('disciplines d')
                        ->join('categories c', 'c.id=d.category_id', 'left')
                        ->join('relationship r', 'r.target_id=d.id', 'left')
                        ->where('(d.availability_student = 1 OR d.availability = 1)')
                        ->where('r.table', 'disciplines')
                        ->where('(d.user_id = ' . $this->user["id"] . ' OR r.user_id = ' . $this->user["id"] . ')')
                        ->where('d.enabled', 1)
                        ->where('r.enabled', 1)
                        //$this->db->order_by('c.id');
                        ->order_by('d.name')
                        ->group_by('d.id');
                $result2 = $this->db->get()->result_array();

                return $result2;
            } else if ($this->user['type'] == 'professor') {
                $this->db->select('d.image, d.summary_content, d.availability_visitor, d.id as disc_id, d.name as disc_name, d.acronym as disc_acronym, d.image as disc_image, c.color as category_color, c.name as category_name, c.id as category_id')
                        ->select('date_format(d.start_date_lessons, "%d/%m/%Y") start_date_lessons', false)
                        ->select('date_format(d.end_date_lessons, "%d/%m/%Y") end_date_lessons', false)
                        ->select('date_format(d.start_date_lessons, "%Y-%m-%d") start_date_lessons_c', false)
                        ->select('date_format(d.end_date_lessons, "%Y-%m-%d") end_date_lessons_c', false)
                        ->from('disciplines d')
                        ->join('categories c', 'c.id=d.category_id', 'left')
                        ->join('modules m', 'm.discipline_id=d.id')
                        ->join('relationship r', 'r.target_id=m.id')
                        ->where('(d.availability_tutor = 1 OR d.availability = 1)')
                        ->where('r.table', 'modules')
                        ->where('(d.user_id = ' . $this->user["id"] . ' OR r.user_id = ' . $this->user["id"] . ')')
                        ->where('d.enabled', 1)
                        //->order_by('c.id')
                        ->order_by('d.name')
                        ->group_by('d.id');

                $result2 = $this->db->get()->result_array();

                $this->db->select('d.image, d.summary_content, d.availability_visitor, d.id as disc_id, d.name as disc_name, d.acronym as disc_acronym, d.image as disc_image, c.color as category_color, c.name as category_name, c.id as category_id')
                        ->select('date_format(d.start_date_lessons, "%d/%m/%Y") start_date_lessons', false)
                        ->select('date_format(d.end_date_lessons, "%d/%m/%Y") end_date_lessons', false)
                        ->select('date_format(d.start_date_lessons, "%Y-%m-%d") start_date_lessons_c', false)
                        ->select('date_format(d.end_date_lessons, "%Y-%m-%d") end_date_lessons_c', false)
                        ->from('disciplines d')
                        ->join('categories c', 'c.id=d.category_id', 'left')
                        ->join('relationship r', 'r.target_id=d.id')
                        ->where('(d.availability_tutor = 1 OR d.availability = 1)')
                        ->where('r.table', 'disciplines')
                        ->where('(d.user_id = ' . $this->user["id"] . ' OR r.user_id = ' . $this->user["id"] . ')')
                        ->where('d.enabled', 1)
                        //->order_by('c.id')
                        ->order_by('d.name')
                        ->group_by('d.id');

                $result3 = $this->db->get()->result_array();
                return array_unique(array_merge($result1, $result2, $result3), SORT_REGULAR);
            }
        } else {
            // pega todas disciplinas
            $this->db->select('d.image, d.summary_content, d.id as disc_id, d.name as disc_name, d.acronym as disc_acronym, d.image as disc_image, c.color as category_color, c.name as category_name, c.id as category_id')
                    ->select('date_format(d.start_date_lessons, "%d/%m/%Y") start_date_lessons', false)
                    ->select('date_format(d.end_date_lessons, "%d/%m/%Y") end_date_lessons', false)
                    ->select('date_format(d.start_date_lessons, "%Y-%m-%d") start_date_lessons_c', false)
                    ->select('date_format(d.end_date_lessons, "%Y-%m-%d") end_date_lessons_c', false)
                    ->from('disciplines d')
                    ->join('categories c', 'c.id=d.category_id', 'left')
                    ->where('d.enabled', 1)
                    ->order_by('c.id');
            return $this->db->get()->result_array();
        }
    }

    function get_pre_registrations_disciplines($user_email) {
        return $this->db->select('*')
                        ->from('pre_registration')
                        ->where('user_email', $user_email)
                        ->get()->result_array();
    }

    function get_discipline($id) {
        $this->db->select('*')
                ->from('disciplines')
                ->where('id', $id);
        return $this->db->get()->row_array();
    }

    function get_discipline_owner_with_forum($forum_id) {
        return $this->db->select('u.name as name, u.email as email')
                        ->from('users u')
                        ->join('disciplines d', 'u.id=d.user_id')
                        ->join('foruns f', 'f.discipline_id=d.id')
                        ->where('f.id', $forum_id)
                        ->get()->row_array();
    }

    function get_percent_discipline($discipline_id) {
        $row = $this->db->select('count(c.id) as count')
                        ->from('contents c')
                        ->join('modules m', 'c.module_id=m.id')
                        ->where('m.discipline_id', $discipline_id)
                        ->where('m.enabled', 1)
                        ->where('c.enabled', 1)
                        ->where('c.type != "file"')
                        ->where('c.enabled', 1)->get()->row();
        $count = $row->count;


        $row2 = $this->db->select('count(c.id) as count')
                        ->from('log_content_access lca')
                        ->join('contents c', 'lca.content_id=c.id', 'left')
                        ->join('modules m', 'c.module_id=m.id', 'left')
                        ->where('m.discipline_id', $discipline_id)
                        ->where('m.enabled', 1)
                        ->where('lca.user_id', $this->user['id'])
                        ->where('c.enabled', 1)
                        ->where('c.type != "file"')
                        ->where('c.enabled', 1)->get()->row();
        $count2 = $row2->count;
        if ($count == 0) {
            return 0;
        } else {
            return ($count2 * 100) / $count;
        }
    }

    function get_modules($id) {
        $this->db->select('*')
                ->from('modules m')
                ->where('m.enabled', 1)
                ->where('m.discipline_id', $id)
                ->order_by('m.order');
        return $this->db->get()->result_array();
    }

    function get_forms($id) {
        return $this->db->select('*')
                        ->from('forms')
                        ->where('enabled', 1)
                        ->where('discipline_id', $id)
                        ->order_by('name')
                        ->get()->result_array();
    }

    function get_subjects($id) {
        $this->db->select('*')
                ->from('subthemes')
                ->where('enabled', 1)
                ->where('theme_id', $id)
                ->order_by('name');
        return $this->db->get()->result_array();
    }

    function get_my_modules($id) {
        $this->db->select('*, m.id as id')
                ->from('modules m')
                ->join('relationship r', 'r.target_id=m.id')
                ->where('r.table', 'modules')
                ->where('r.user_id', $this->user['id'])
                ->where('m.enabled', 1)
                ->where('r.enabled', 1)
                ->where('m.discipline_id', $id)
                ->order_by('m.id');

        return $this->db->get()->result_array();
    }

    function create_discipline($discipline) {
        $this->db->set($discipline)
                ->set('user_id', $this->user['id'])
                ->insert('disciplines');
        $id = $this->db->insert_id();
        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    function delete_discipline($discipline_id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $discipline_id)
                ->update('disciplines');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function edit_discipline($discipline) {
        $query = $this->db->set($discipline)
                ->where('id', $discipline['id'])
                ->update('disciplines');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function change_status_enrolled_students($id, $status) {
        $query = $this->db->set('enabled', $status)
                ->where('id', $id)
                ->update('relationship');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function check_discipline_active_to_me($target_id) {
        return $this->db->select('*')
                        ->from('relationship')
                        ->where('user_id', $this->user['id'])
                        ->where('target_id', $target_id)
                        ->where('table', 'disciplines')
                        ->where('enabled', 1)
                        ->get()->row_array();
    }

    function get_module($id) {
        return $this->db->select('*')
                        ->from('modules')
                        ->where('id', $id)
                        ->get()->row_array();
    }

    function delete_module($id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->update('modules');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function create_module($module) {

        $this->db->set($module)
                ->set('user_id', $this->user['id'])
                ->insert('modules');

        $id = $this->db->insert_id();

        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    function edit_module($module) {

        $query = $this->db->set($module)
                ->where('id', $module['id'])
                ->update('modules');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function create_form($form) {
        $this->db->set($form)
                ->set('user_id', $this->user['id'])
                ->insert('forms');
        $id = $this->db->insert_id();
        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    function edit_form($form) {
        $query = $this->db->set($form)
                ->where('id', $form['id'])
                ->update('forms');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_form($id) {
        return $this->db->select('*')
                        ->from('forms')
                        ->where('id', $id)
                        ->get()->row_array();
    }

    function delete_form($id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->update('forms');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function backup_content($content) {
        // pega o conteudo a ser apagado
        $backup = $this->db->select('*')
                        ->from('contents')
                        ->where('id', $content['id'])
                        ->get()->row_array();

        // grava na tabela de backup
        $this->db->set('name', $backup['name'])
                ->set('content', $backup['content'])
                ->set('modified_by', $this->user['id'])
                ->set('content_id', $backup['id'])
                ->insert('backup_content');
    }

    function edit_content_text($content) {

        $this->backup_content($content);
        // modifica o conteudo        
        $query = $this->db->set('name', $content['name'])
                ->set('content', $content['content'])
                ->set('order', $content['order'])
                ->set('modified_by', $this->user['id'])
                ->where('id', $content['id'])
                ->update('contents');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_content_order($content_id) {
        $this->db->select('order')
                ->from('contents')
                ->where('id', $content_id);
        $result = $this->db->get()->row_array();
        return $result['order'];
    }

    function edit_content_evaluation($content) {

        $query = $this->db->set('name', $content['name'])
                ->set('content', $content['content'])
                ->set('order', $content['order'])
                ->where('id', $content['id'])
                ->update('contents');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function create_evaluation($type, $quantity_questions) {
        $this->db->set('type', $type)
                ->set('quantity_questions', $quantity_questions)
                ->insert('evaluations');
        $id = $this->db->insert_id();

        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    function insert_question_evaluation($evaluation_id, $question_id) {
        $this->db->set('evaluation_id', $evaluation_id)
                ->set('question_id', $question_id)
                ->insert('questions_evaluations');
        $id = $this->db->insert_id();

        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    function update_discipline_image($discipline_id, $target_file) {
        $query = $this->db->set('image', $target_file)
                ->where('id', $discipline_id)
                ->update('disciplines');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function create_content($content) {

        if (!$content['order']) {
            $this->db->select('*')
                    ->from('contents')
                    ->where('module_id', $content['module_id']);
            $result = $this->db->get()->result_array();

            if (isset($result)) {
                $content['order'] = count($result) + 1;
            } else {
                $content['order'] = 1;
            }
        }

        $this->db->set('name', $content['name'])
                ->set('module_id', $content['module_id'])
                ->set('type', $content['type'])
                ->set('order', $content['order'])
                ->set('content', $content['content'])
                ->insert('contents');
        $id = $this->db->insert_id();

        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_contents($module_id) {
        $this->db->select('*')
                ->from('contents')
                ->where('enabled', 1)
                ->where('module_id', $module_id)
                ->order_by('order');

        return $this->db->get()->result_array();
    }

    function delete_content($id) {

        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->update('contents');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_content($id) {
        return $this->db->select('*')
                        ->from('contents')
                        ->where('id', $id)
                        ->get()->row_array();
    }

    function edit_content_name($content) {

        $query = $this->db->set('name', $content['name']);
        if (isset($content['order'])) {
            $this->db->set('order', $content['order']);
        }
        $this->db->where('id', $content['id'])
                ->update('contents');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_my_students($discipline_id) {

        return $this->db->select('r.*, u.name as user_name, u.email as user_email, d.name as discipline_name')
                        ->select('date_format(r.created_time, "%d/%m/%Y %H:%i:%s") created_time', false)
                        ->from('relationship r')
                        ->join('users u', 'u.id=r.user_id')
                        ->join('disciplines d', 'd.id=r.target_id')
                        ->where('r.table', 'disciplines')
                        ->where('r.target_id', $discipline_id)
                        ->where('u.type', 'student')
                        ->where('u.name != "aluno"')
                        ->get()->result_array();
    }

    function edit_content_order($content) {

        $query = $this->db->set('order', $content['order'])
                ->where('id', $content['id'])
                ->update('contents');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_evaluation_data($evaluation_id) {
        return $this->db->select('e.type as type, q.id as question_id, q.difficulty as difficulty, e.id as evaluation_id, e.quantity_questions as quantity_questions')
                        ->from('evaluations e')
                        ->join('questions_evaluations qe', 'qe.evaluation_id=e.id', 'left')
                        ->join('questions q', 'q.id=qe.question_id', 'left')
                        ->where('e.id', $evaluation_id)
                        ->order_by('qe.id')
                        ->get()->result_array();
    }

    function save_questionnaire_discipline($questionnaire_discipline) {
        $this->db->set($questionnaire_discipline)
                ->insert('questionnaires_disciplines');

        $id = $this->db->insert_id();

        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_correct_replys($eval_id) {
        return $this->db->select('q.id as question, count(r.id) as replys')
                        ->from('users_evaluations_replys uer')
                        ->join('replys r', 'r.id=uer.reply_id')
                        ->join('questions q', 'q.id=uer.question_id')
                        ->where('uer.evaluation_id', $eval_id)
                        ->where('r.correct', 1)
                        ->group_by('q.id')
                        ->get()->result_array();
    }

    function get_discipline_questionnaire($type, $discipline_id) {
        return $this->db->select('qd.id as questionnaire_discipline_id, q.id as questionnaire_id, q.name as questionnaire_name,qd.start_date,qd.end_date,qd.order')
                        ->from('questionnaires_disciplines qd')
                        ->join('questionnaires q', 'q.id = qd.questionnaire_id', 'left')
                        ->where('qd.discipline_id', $discipline_id)
                        ->where('qd.enabled', 1)
                        ->where('qd.type', $type)
                        ->get()->result_array();
    }

    function delete_questionnaire_discipline($questionnaire_discipline_id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $questionnaire_discipline_id)
                ->update('questionnaires_disciplines');

        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_discipline_id_with_module($module_id) {
        $query = $this->db->select('discipline_id')
                ->from('modules')
                ->where('id', $module_id);
        $row = $this->db->get()->row();

        return $row->discipline_id;
    }

    function can_show_note($discipline_id) {
        $this->db->select('show_note')
                ->from('disciplines')
                ->where('id', $discipline_id);
        $row = $this->db->get()->row();
        return $row->show_note;
    }

    function get_questionnaire_discipline($questionnaire_discipline_id) {
        return $this->db->select('questionnaire_id, discipline_id')
                        ->from('questionnaires_disciplines')
                        ->where('id', $questionnaire_discipline_id)
                        ->get()->row_array();
    }

    function get_question_users_replys($questionnaire_discipline_id, $lq_id, $lr_id, $user_type) {
        $query = $this->db->select('count(uqr.likert_reply_id) as sum_replys, uqr.user_type')
                        ->from('users_questionnaires_replys uqr')
                        ->where('uqr.questionnaire_discipline_id', $questionnaire_discipline_id)
                        ->where('uqr.likert_question_id', $lq_id)
                        ->where('uqr.likert_reply_id', $lr_id)
                        ->where('uqr.user_type', $user_type)
                        ->group_by('uqr.likert_reply_id')
                        ->get()->row_array();
        if ($query) {
            return $query['sum_replys'];
        } else {
            return 0;
        }
    }

    function get_likert_questions_with_q_id($questionnaire_discipline_id) {
        return $this->db->select('lq.id, lq.id as lq_id, lq.question, lq.question_order, lq.select_type,lq.reply_questions')
                        ->from('likert_questions lq')
                        ->join('likerts l', 'l.id=lq.likert_id')
                        ->join('questionnaires_disciplines qd', 'qd.questionnaire_id=l.questionnaire_id')
                        ->where('qd.id', $questionnaire_discipline_id)
                        ->where('l.enabled', '1')
                        ->order_by('lq.id', 'asc')
                        ->get()->result_array();
    }

    function get_questionnaire_users_replys($questionnaire_discipline_id) {
        return $this->db->select('uqr.user_type, uqr.created_time, lq.question_order, lr.reply_value, lr.reply, lr.id as lr_id, lq.likert_id, lq.question, lq.id as lq_id, u.name, u.gender, u.birthday, uqr.user_id')
                        ->select('date_format(uqr.created_time, "%d/%m/%Y %H:%i") created_time', false)
                        ->from('users_questionnaires_replys uqr')
                        ->join('users u', 'u.id = uqr.user_id')
                        ->join('likert_replys lr', 'lr.id = uqr.likert_reply_id')
                        ->join('likerts l', 'l.id = lr.likert_id')
                        ->join('likert_questions lq', 'lq.id = uqr.likert_question_id')
                        ->where('questionnaire_discipline_id', $questionnaire_discipline_id)
                        ->order_by('uqr.user_id')
                        ->order_by('l.likert_order')
                        ->order_by('lq.question_order')
                        ->get()->result_array();
    }

    function get_questionnaire_users_open_replys($questionnaire_discipline_id) {
        return $this->db->select('uqr.created_time, uqr.reply, qoq.open_question, u.name, u.gender, u.birthday, uqr.user_id')
                        ->from('users_questionnaires_open_replys uqr')
                        ->join('users u', 'u.id = uqr.user_id')
                        ->join('questionnaire_open_questions qoq', 'qoq.id = uqr.open_question_id')
                        ->where('questionnaire_discipline_id', $questionnaire_discipline_id)
                        ->order_by('uqr.user_id')
                        ->order_by('qoq.order')
                        ->get()->result_array();
    }

    function get_full_questionnaire($questionnaire_id) {
        return $this->db->select('*')
                        ->from('likerts')
                        ->where('questionnaire_id', $questionnaire_id)
                        ->where('enabled', 1)
                        ->order_by('likert_order')
                        ->get()->result_array();
    }

    function get_likert_question($likert_question_id) {
        return $this->db->select('lq.question, lr.reply, lr.id')
                        ->from('likert_questions lq')
                        ->join('likert_replys lr', 'lr.likert_id=lq.likert_id')
                        ->where('lq.id', $likert_question_id)
                        ->order_by('lq.question_order')
                        ->get()->result_array();
    }

    function get_likert_questions($likert_id) {
        return $this->db->select('question, select_type,reply_questions')
                        ->from('likert_questions')
                        ->where('likert_id', $likert_id)
                        ->order_by('question_order')
                        ->get()->result_array();
    }

    function get_likert_questions_ids($likert_id) {
        return $this->db->select('id')
                        ->from('likert_questions')
                        ->where('likert_id', $likert_id)
                        ->order_by('question_order')
                        ->get()->result_array();
    }

    function get_likert_replys($likert_id) {
        return $this->db->select('reply,reply_value')
                        ->from('likert_replys')
                        ->where('likert_id', $likert_id)
                        ->order_by('id')
                        ->get()->result_array();
    }

    function get_likert_replys_ids($likert_id) {
        return $this->db->select('id,reply_value')
                        ->from('likert_replys')
                        ->where('likert_id', $likert_id)
                        ->order_by('id')
                        ->get()->result_array();
    }

    function get_questionnaire($questionnaire_id) {
        return $this->db->select('*')
                        ->from('questionnaires')
                        ->where('id', $questionnaire_id)
                        ->get()->row_array();
    }

    function save_questionnaire_user_reply_likert($questionnaire_reply, $questionnaire_discipline_id) {
        $this->user_type = $this->session->userdata['user_type'];
        // name = question_id (pergunta)
        // value = reply_id (resposta)
        $this->db->set('likert_question_id', $questionnaire_reply['name'])
                ->set('likert_reply_id', $questionnaire_reply['value'])
                ->set('questionnaire_discipline_id', $questionnaire_discipline_id)
                ->set('user_id', $this->user['id'])
                ->set('user_type', $this->user_type['type'])
                ->insert('users_questionnaires_replys');
        $id = $this->db->insert_id();

        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function save_questionnaire_user_reply_open_question($questionnaire_reply, $questionnaire_discipline_id) {
        // name = question_id (pergunta)
        // value = reply_id (resposta)
        $this->db->set('open_question_id', $questionnaire_reply['name'])
                ->set('reply', $questionnaire_reply['value'])
                ->set('questionnaire_discipline_id', $questionnaire_discipline_id)
                ->set('user_id', $this->user['id'])
                ->insert('users_questionnaires_open_replys');
        $id = $this->db->insert_id();

        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function save_discipline_pre_registration($discipline_id, $user_email, $responsible_id) {
        $this->db->set('discipline_id', $discipline_id)
                ->set('user_email', $user_email)
                ->set('responsible_id', $responsible_id)
                ->insert('pre_registration');
        $id = $this->db->insert_id();
        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    function save_discipline_registration($discipline_id, $user_id) {

        $this->db->select('*')
                ->from('relationship')
                ->where('user_id', $user_id)
                ->where('table', 'disciplines')
                ->where('target_id', $discipline_id);
        $q = $this->db->get();

        if ($q->num_rows() > 0) {
            $this->db->set('enabled', 1)
                    ->where('user_id', $user_id)
                    ->where('table', 'disciplines')
                    ->where('target_id', $discipline_id)
                    ->update('relationship');
            $return = $q->row_array();
            $return['id'];
            $return['type'] = 'update';
        } else {
            $this->db->set('user_id', $user_id)
                    ->set('table', 'disciplines')
                    ->set('target_id', $discipline_id)
                    ->insert('relationship');
            $return['id'] = $this->db->insert_id();
            $return['type'] = 'insert';
        }

        if ($return) {
            return $return;
        } else {
            return "NOK";
        }
    }

    function save_responsible_module($module_id, $user_id) {

        $this->db->select('*')
                ->from('relationship')
                ->where('user_id', $user_id)
                ->where('table', 'modules')
                ->where('target_id', $module_id);
        $q = $this->db->get();

        if ($q->num_rows() > 0) {
            $this->db->set('enabled', 1)
                    ->where('user_id', $user_id)
                    ->where('table', 'modules')
                    ->where('target_id', $module_id)
                    ->update('relationship');
            $return = $q->row_array();
            $return['id'];
            $return['type'] = 'update';
        } else {
            $this->db->set('user_id', $user_id)
                    ->set('table', 'modules')
                    ->set('target_id', $module_id)
                    ->insert('relationship');
            $return['id'] = $this->db->insert_id();
            $return['type'] = 'insert';
        }

        if ($return) {
            return $return;
        } else {
            return "NOK";
        }
    }

    function save_responsible_discipline($discipline_id, $user_id) {
        $this->db->set('user_id', $user_id)
                ->set('table', 'disciplines')
                ->set('target_id', $discipline_id)
                ->insert('relationship');
        $return['id'] = $this->db->insert_id();
        $return['type'] = 'insert';

        if ($return) {
            return $return;
        } else {
            return "NOK";
        }
    }

    function check_solved_questionnaire($questionnaire_discipline_id) {
        $query = $this->db->select('*')
                        ->from('users_questionnaires_replys')
                        ->where('user_id', $this->user['id'])
                        ->where('questionnaire_discipline_id', $questionnaire_discipline_id)->get();

        if ($query->num_rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function check_owner($discipline_id) {
        $query = $this->db->select('*')
                        ->from('disciplines')
                        ->where('user_id', $this->user['id'])
                        ->where('id', $discipline_id)->get()->result_array();

        if (count($query) > 0) {
            return 1;
        } else {

            $query = $this->db->select('*')
                            ->from('relationship')
                            ->where('user_id', $this->user['id'])
                            ->where('table', 'disciplines')
                            ->where('enabled', 1)
                            ->where('target_id', $discipline_id)->get()->result_array();

            if (count($query) > 0) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    function get_responsibles_modules($modules_id) {
        return $this->db->select('r.id as relationship_id, u.name as user_name, r.created_time as relationship_created_time, m.name as module_name')
                        ->from('relationship r')
                        ->join('users u', 'u.id=r.user_id')
                        ->join('modules m', 'm.id=r.target_id')
                        ->where('r.table', 'modules')
                        ->where_in('r.target_id', $modules_id)
                        ->where('u.type', 'professor')
                        ->where('r.enabled', 1)
                        ->get()->result_array();
    }

    function get_responsibles_disciplines($discipline_id) {
        return $this->db->select('r.id as relationship_id, u.name as user_name, r.created_time as relationship_created_time, d.name as discipline_name')
                        ->from('relationship r')
                        ->join('users u', 'u.id=r.user_id')
                        ->join('disciplines d', 'd.id=r.target_id')
                        ->where('r.table', 'disciplines')
                        ->where_in('r.target_id', $discipline_id)
                        ->where('u.type', 'professor')
                        ->where('r.enabled', 1)
                        ->get()->result_array();
    }

    function get_responsible($id) {
        return $this->db->select('r.id as relationship_id, u.name as user_name, r.created_time as relationship_created_time')
                        ->from('relationship r')
                        ->join('users u', 'u.id=r.user_id')
                        ->where('r.id', $id)
                        ->get()->row_array();
    }

    function get_professors() {
        return $this->db->select('*')
                        ->from('users')
                        ->where('type', 'professor')
                        ->where('id != ' . $this->user["id"])
                        ->where('enabled', 1)
                        ->get()->result_array();
    }

    function delete_responsible($id, $table) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->where('table', $table)
                ->update('relationship');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function number_registered_students($discipline_id) {
        $row = $this->db->select('count(r.id) as count')
                        ->from('relationship r')
                        ->join('users u', 'r.user_id=u.id')
                        ->where('u.type', 'student')
                        ->where('r.target_id', $discipline_id)
                        ->where('r.table', 'disciplines')
                        ->where('r.enabled', 1)->get()->row();
        return $row->count;
    }

    function count_my_contents() {
        $row = $this->db->select('count(id) as count')
                        ->from('log_content_access')
                        ->where('user_id', $this->user['id'])->get()->row();
        return $row->count;
    }

}

?>
