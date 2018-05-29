<?php

Class Chat_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user'); // Must be already set
    }

    function get_last_chat_post($chat_id) {
        return $this->db->select('u.name as posted_user, fp.created_time as last_post')
                        ->from('chat_posts fp')
                        ->join('users u', 'u.id=fp.user_id', 'left')
                        ->where('fp.enabled', 1)
                        ->where('chat_id', $chat_id)
                        ->order_by('fp.created_time', 'desc')
                        ->limit(1)
                        ->get()->row_array();
    }

    function check_user($chat_id) {
        $this->db->where('user_id', $this->user['id']);
        $q = $this->db->get('chat_users_on');
        if ($q->num_rows() > 0) {
            $this->db->set('count', 'count+1', FALSE);
            $this->db->set('chat_id', $chat_id);
            $this->db->where('user_id', $this->user['id']);
            $this->db->update('chat_users_on');
        } else {
            $this->db->set('chat_id', $chat_id);
            $this->db->set('user_id', $this->user['id']);
            $this->db->insert('chat_users_on');
        }
    }

    function get_chat_users($chat_id) {
        return $this->db->select('u.name, u.image')
                        ->from('chat_users_on cuo')
                        ->join('users u', 'u.id=cuo.user_id')
                        ->where('cuo.last_time_on > date_sub(now(), interval 1 minute)')
                        ->where('cuo.chat_id', $chat_id)
                        ->order_by('u.name')
                        ->get()->result_array();
    }

    function get_chat_posts($chat_id) {
        return $this->db->select('f.title as chat_title,u.image as user_image, u.name as user_name, fp.text as post, fp.user_id as user_id, f.user_id as owner_id, c.name as category_name, c.id as category_id')
                        ->select('date_format(fp.created_time, "%H:%i:%s") hour', false)
                        ->select('date_format(fp.created_time, "%d/%m/%Y") date', false)
                        ->from('chat_posts fp')
                        ->join('chats f', 'f.id=fp.chat_id', 'left')
                        ->join('users u', 'u.id=fp.user_id', 'left')
                        ->join('categories c', 'c.id=f.category_id', 'left')
                        ->where('fp.chat_id', $chat_id)
                        ->where('fp.enabled', 1)
                        ->order_by('fp.created_time', 'asc')
                        ->get()->result_array();
    }

    function get_chat($chat_id) {
        return $this->db->select('f.title as chat_title, c.name as category_name, c.id as category_id, f.discipline_id')
                        ->from('chats f')
                        ->join('categories c', 'c.id=f.category_id', 'left')
                        ->where('f.id', $chat_id)
                        ->where('f.enabled', 1)
                        ->get()->row_array();
    }

    function save_new_chat_text($chat_id, $text) {
        $this->db->set('chat_id', $chat_id)
                ->set('text', $text)
                ->set('user_id', $this->user['id'])
                ->insert('chat_posts');
        return "OK";
    }

    function get_chats($my_disciplines) {
        return $this->db->select('f.id as chat_id, count(fp.chat_id) as number_posts, f.title as chat_title, u.name as created_user, c.color as category_color, c.name as category_name')
                        ->from('chats f')
                        ->join('chat_posts fp', 'f.id=fp.chat_id', 'left')
                        ->join('categories c', 'c.id=f.category_id', 'left')
                        ->join('users u', 'u.id=f.user_id', 'left')
                        ->where_in('discipline_id', $my_disciplines)
                        ->where('f.enabled', 1)
                        ->order_by('fp.created_time', 'desc')
                        ->group_by('f.id')
                        ->get()->result_array();
    }

}

?>