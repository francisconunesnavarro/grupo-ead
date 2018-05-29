<?php

Class Home_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

//    function forum_today_posts(){
//         $query = $this->db->select('id')
//                ->from('forum_posts')
//                ->where('created_time >= CURDATE()')
//                ->get()->result_array();
//         return count($query);
//    }

    function get_foruns($disc_id) {
        return $this->db->select('f.id as forum_id, count(fp.forum_id) as number_posts, f.title as forum_title, u.name as created_user, c.color as category_color, c.name as category_name')
                        ->from('foruns f')
                        ->join('forum_posts fp', 'f.id=fp.forum_id', 'left')
                        ->join('categories c', 'c.id=f.category_id', 'left')
                        ->join('users u', 'u.id=f.user_id', 'left')
                        ->where('discipline_id', $disc_id)
                        ->where('f.enabled', 1)
                        ->order_by('fp.created_time', 'desc')
                        ->group_by('f.id')
                        ->get()->result_array();
    }

    function get_additional_information_configs() {
        return $this->db->select('*')
                        ->from('users_config_info')
                        ->where('enabled', 1)
                        ->get()->result_array();
    }

    function get_forum_users($forum_id) {
        return $this->db->select('u.name as name, u.email as email')
                        ->from('users u')
                        ->join('relationship r', 'r.user_id=u.id')
                        ->join('foruns f', 'f.discipline_id=r.target_id')
                        ->where('r.table', 'disciplines')
                        ->where('f.id', $forum_id)
                        ->get()->result_array();
    }

    function get_last_forum_post($forum_id) {
        return $this->db->select('u.name as posted_user, fp.created_time as last_post')
                        ->from('forum_posts fp')
                        ->join('users u', 'u.id=fp.user_id', 'left')
                        ->where('fp.enabled', 1)
                        ->where('forum_id', $forum_id)
                        ->order_by('fp.created_time', 'desc')
                        ->limit(1)
                        ->get()->row_array();
    }

    function get_forum_posts($forum_id) {
        return $this->db->select('fp.created_time, f.title as forum_title,u.image as user_image, u.name as user_name, fp.text as post, fp.user_id as user_id, f.user_id as owner_id, c.name as category_name, c.id as category_id')
                        ->select('date_format(fp.created_time, "%H:%i:%s") hour', false)
                        ->select('date_format(fp.created_time, "%d/%m/%Y") date', false)
                        ->from('forum_posts fp')
                        ->join('foruns f', 'f.id=fp.forum_id', 'left')
                        ->join('users u', 'u.id=fp.user_id', 'left')
                        ->join('categories c', 'c.id=f.category_id', 'left')
                        ->where('fp.forum_id', $forum_id)
                        ->where('fp.enabled', 1)
                        ->order_by('fp.created_time', 'asc')
                        ->get()->result_array();
    }

    function get_forum($forum_id) {
        return $this->db->select('f.title as forum_title, c.name as category_name, c.id as category_id, f.discipline_id')
                        ->from('foruns f')
                        ->join('categories c', 'c.id=f.category_id', 'left')
                        ->where('f.id', $forum_id)
                        ->where('f.enabled', 1)
                        ->get()->row_array();
    }

    function save_new_forum_text($forum_id, $text) {
        $this->db->set('forum_id', $forum_id)
                ->set('text', $text)
                ->set('user_id', $this->user['id'])
                ->insert('forum_posts');
        $id = $this->db->insert_id();
        if ($id) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function delete_forum($id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $id)
                ->update('foruns');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function create_forum($forum) {
        $this->db->set($forum)
                ->set('user_id', $this->user['id'])
                ->insert('foruns');
        $id = $this->db->insert_id();
        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    function edit_forum($forum) {
        $query = $this->db->set($forum)
                ->where('id', $forum['id'])
                ->update('foruns');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function get_faq() {
        return $this->db->select('*')
                        ->from('faq')
                        ->where('enabled', 1)
                        ->get()->result_array();
    }

    function create_faq($faq) {
        $this->db->set($faq)
                ->insert('faq');
        $id = $this->db->insert_id();
        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    function edit_faq($faq) {
        $query = $this->db->set($faq)
                ->where('id', $faq['id'])
                ->update('faq');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function load_faq($faq_id) {
        return $this->db->select('*')
                        ->from('faq')
                        ->where('id', $faq_id)
                        ->get()->row_array();
    }

    function delete_faq($faq_id) {
        $query = $this->db->set('enabled', 0)
                ->where('id', $faq_id)
                ->update('faq');
        if ($query) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    function check_first_access($user_id) {
        $query = $this->db->select('first_access')
                        ->from('users')
                        ->where('id', $user_id)
                        ->get()->row_array();
        return $query['first_access'];
    }

    function save_first_access($user_id) {
        $this->db->set('first_access', 0)
                ->where('id', $user_id)
                ->update('users');
    }

    function get_apresentation_video() {
        $query = $this->db->select('apresentation_video')
                        ->from('configs')
                        ->get()->row_array();
        if (isset($query['apresentation_video'])) {
            return $query['apresentation_video'];
        } else {
            return false;
        }
    }

}

?>