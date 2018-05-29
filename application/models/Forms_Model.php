<?php

Class Forms_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    function save_engagement($data) {
        $this->db->set($data)
                ->insert('form_engagement'); // nome da tabela
        if ($this->db->insert_id()) { // verificação que volta pro controller
            return 'OK';
        } else {
            return 'NOK';
        }
    }

    function save_bemestar($data) {
        $this->db->set($data)
                ->insert('form_bemestar'); // nome da tabela
        if ($this->db->insert_id()) { // verificação que volta pro controller
            return 'OK';
        } else {
            return 'NOK';
        }
    }

    function save_learning_style($data) {
        $this->db->set($data)
                ->insert('form_learning_style'); // nome da tabela
        if ($this->db->insert_id()) { // verificação que volta pro controller
            return 'OK';
        } else {
            return 'NOK';
        }
    }

    function save_enade($data) {
        $this->db->set($data)
                ->insert('form_enade'); // nome da tabela
        if ($this->db->insert_id()) { // verificação que volta pro controller
            return 'OK';
        } else {
            return 'NOK';
        }
    }

    function save_vark($data) {
        $this->db->set($data)
                ->insert('form_vark'); // nome da tabela
        if ($this->db->insert_id()) { // verificação que volta pro controller
            return 'OK';
        } else {
            return 'NOK';
        }
    }

    function get_vark($user_id) {
        return $this->db->select('*')
                        ->from('form_vark')
                        ->where('user_id', $user_id)
                        ->get()->row_array();
    }

    function save_kts($data) {
        $this->db->set($data)
                ->insert('form_kts'); // nome da tabela
        if ($this->db->insert_id()) { // verificação que volta pro controller
            return 'OK';
        } else {
            return 'NOK';
        }
    }

    function get_kts($user_id) {
        return $this->db->select('*')
                        ->from('form_kts')
                        ->where('user_id', $user_id)
                        ->get()->row_array();
    }

}
