<?php

Class Log_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    function get_logs() {
        return $this->db->select('u.name as  user_name, c.name as content_name, lca.quantity as log_quantity, c.type as content_type, d.name as discipline_name, lca.evaluation_note, lca.date_hour as last_access')
                        ->from('log_content_access lca')
                        ->join('contents c', 'c.id=lca.content_id')
                        ->join('users u', 'u.id=lca.user_id')
                        ->join('modules m', 'm.id=c.module_id')
                        ->join('disciplines d', 'd.id=m.discipline_id')
                        ->where('d.enabled', 1)
                        ->where('u.type != "admin"')
                        ->where('u.id != "5"')
                        ->order_by('lca.date_hour', 'desc')
                        ->get()->result_array();
    }

    public function get_logs_my_discipline($disc_id) {
        return $this->db->select('m.start_date as start_date,u.name as  user_name,u.email as email,m.name as module_name, c.name as content_name,c.type as content_type, lca.quantity as log_quantity, lca.evaluation_note, lca.date_hour as last_access')
                        ->from('log_content_access lca')
                        ->join('contents c', 'c.id=lca.content_id')
                        ->join('users u', 'u.id=lca.user_id')
                        ->join('modules m', 'm.id=c.module_id')
                        ->join('disciplines d', 'd.id=m.discipline_id')
                        ->where('d.id', $disc_id)
                        ->where('d.enabled', 1)
                        ->where('c.enabled', 1)
                        ->where('u.enabled', 1)
                        ->where('m.enabled', 1)
                        ->where('u.type != "admin"')
                        ->where('u.type != "professor"')
                        ->where('u.id != "5"')
                        ->where('lca.date_hour >', '2017-05-12')
                        ->order_by('u.name', 'asc')
                        ->order_by('m.name', 'asc')
                        ->get()->result_array();
    }

    function log_content_access($content_id) {

        $this->db->select('*')
                ->from('log_content_access')
                ->where('content_id', $content_id)
                ->where('user_id', $this->user['id']);
        $result = $this->db->get()->row_array();

        if ($result) {
            $this->db->set('quantity', 'quantity+1', FALSE)
                    ->where('content_id', $content_id)
                    ->where('user_id', $this->user['id'])
                    ->update('log_content_access');
        } else {
            $this->db->set('quantity', 1)
                    ->set('content_id', $content_id)
                    ->set('user_id', $this->user['id'])
                    ->insert('log_content_access');
        }
    }

    function check_content_log($content_id) {
        $query = $this->db->select('*')
                        ->from('log_content_access')
                        ->where('user_id', $this->user['id'])
                        ->where('content_id', $content_id)->get();

        if ($query->num_rows > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function save_user_evaluation_note($content_id, $note) {
        $this->db->select('*')
                ->from('log_content_access')
                ->where('content_id', $content_id)
                ->where('user_id', $this->user['id']);
        $result = $this->db->get()->row_array();

        if ($result) {
            $this->db->set('evaluation_note', $note)
                    ->where('content_id', $content_id)
                    ->where('user_id', $this->user['id'])
                    ->update('log_content_access');
        } else {
            $this->db->set('evaluation_note', $note)
                    ->set('content_id', $content_id)
                    ->set('user_id', $this->user['id'])
                    ->insert('log_content_access');
        }
    }

    function get_log_content_user($content_id) {
        $query = $this->db->select('*')
                        ->from('log_content_access')
                        ->where('content_id', $content_id)
                        ->where('user_id', $this->user['id'])
                        ->order_by('id', 'desc')
                        ->limit(1)
                        ->get()->result_array();
        if (isset($query[0])) {
            return $query[0];
        } else {
            return null;
        }
    }

    function get_last_access($user_id, $discipline_id) {
        $query = $this->db->select('date_format(date_hour, "%d/%m/%Y %H:%i:%s") date_hour', false)
                        ->from('log_content_access lca')
                        ->join('contents c', 'c.id=lca.content_id')
                        ->join('modules m', 'm.id=c.module_id')
                        ->where('m.discipline_id', $discipline_id)
                        ->where('lca.user_id', $user_id)
                        ->order_by('lca.date_hour', 'desc')
                        ->limit(1)
                        ->get()->row();
        if (isset($query->date_hour)) {
            return $query->date_hour;
        } else {
            return 'Não acessou ainda';
        }
    }

}

?>
