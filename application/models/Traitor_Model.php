<?php

Class Traitor_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_quest() {
        return $this->db->select('*')
                        ->from('users_questionnaires_replys')
                        ->limit(10)
                        ->get();
    }

}

?>