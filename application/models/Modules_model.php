<?php

Class Modules_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function get_reply($reply) {
        return $this->db->select('*')
                        ->from('replys')
                        ->where('question_id', $reply['name'])
                        ->where('id', $reply['value'])
                        ->get()->row_array();
    }

    public function save_user_evaluation_reply($evaluation_id, $module_id, $question_id, $reply_id) {
        $this->db->set('evaluation_id', $evaluation_id)
                ->set('module_id', $module_id)
                ->set('question_id', $question_id)
                ->set('reply_id', $reply_id)
                ->set('user_id', $this->user['id'])
                ->insert('users_evaluations_replys');
    }

    public function get_content_with_evaluation_id($evaluation_id) {
        return $this->db->select('*')
                        ->from('contents')
                        ->where('content', $evaluation_id)
                        ->get()->row_array();
    }

}

?>