<?php

Class User_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_users() {
        return $this->db->select('*')
                        ->from('users')
                        ->where('enabled', 1)
                        ->get()->result_array();
    }

    public function get_user($id) {
        return $this->db->select('*')
                        ->from('users')
                        ->where('id', $id)
                        ->where('enabled', 1)
                        ->get()->row_array();
    }

    function get_user_add_info($id) {
        return $this->db->select('uci.id, uci.field, ui.value')
                        ->from('users_info ui')
                        ->join('users_config_info uci', 'uci.id=ui.users_config_info_id')
                        ->where('ui.user_id', $id)
                        ->where('uci.enabled', 1)
                        ->get()->result_array();
    }

    public function get_facebook_user($facebook_id) {
        $query = $this->db->select('*')
                ->from('users')
                ->where('facebook', $facebook_id)
                ->where('enabled', 1)
                ->get();

        if ($query->num_rows > 0) {
            return $query->row_array();
        }
        return 0;
    }

    public function edit_user_image($user_image) {
        $query = $this->db->set('image', $user_image)
                ->where('id', $this->user['id'])
                ->update('users');
        if ($query) {
            return "OK";
        } else {
            return"NOK";
        }
    }

    /**
     * verifica se existe um usuario com name ou email
     * @param type $user
     */
    public function user_already_exists($email) {

        $query_email = $this->db->select('id')
                ->from('users')
                ->where('email', $email)
                ->get();

        if ($query_email->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function get_user_with_email($email) {
        return $query_email = $this->db->select('*')
                        ->from('users')
                        ->where('email', $email)
                        ->get()->row_array();
    }

    public function user_already_exists_cellphone($cellphone) {
        $query_user = $this->db->select('id')
                ->from('users')
                ->where('cellphone', $cellphone)
                ->get();

        if ($query_user->num_rows > 0) {
            $user = $query_user->row_array();
            return $user['id'];
        }
        return false;
    }

    public function create_facebook_user($user) {
        $this->db->set('name', $user['name'])
                ->set('type', $user['type'])
                ->set('created', $user['now'])
                ->set('gender', $user['gender'])
                ->set('facebook', $user['facebook'])
                ->set('image', $user['image'])
                ->insert('users');
        $id = $this->db->insert_id();

        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    public function create_user($user) {

        $this->db->trans_start();

        $this->db->set('name', $user['name'])
                ->set('email', $user['email'])
                ->set('password', $user['password'])
                ->set('type', $user['type'])
                ->set('birthday', $user['birthday'])
                ->set('created', $user['now'])
                ->insert('users');
        $id = $this->db->insert_id();
        
        if (isset($user['info'])) {
            foreach ($user['info'] as $key => $value) {
                $info [$user['info'][$key]['name']] = $user['info'][$key]['value'];
            }
            $info['user_id'] = $id;

            $this->db->set($info)
                    ->insert('users_info_temporary');
        }

        $this->db->trans_complete();

        if ($id) {
            return $id;
        } else {
            return "NOK";
        }
    }

    public function edit_user($user) {

        $query = $this->db->set('name', $user['name'])
                ->set('email', $user['email'])
                ->set('password', $user['password'])
                ->set('cellphone', $user['cellphone'])
                ->set('telephone', $user['telephone'])
                ->set('permission', $user['permission'])
                ->set('commission', $user['commission'])
                ->set('street', $user['street'])
                ->set('number', $user['number'])
                ->set('comp', $user['comp'])
                ->set('neighborhood', $user['neighborhood'])
                ->set('city', $user['city'])
                ->set('uf', $user['uf'])
                ->set('wage', $user['wage'])
                ->where('id', $user['id'])
                ->update('users');

        if ($query) {
            return "OK";
        } else {
            return"NOK";
        }
    }

    function save_add_info($add_info) {
        $query = $this->db->select('*')
                ->from('users_info')
                ->where('user_id', $this->user['id'])
                ->where('users_config_info_id', $add_info['name'])
                ->get();

        if ($query->num_rows() > 0) {
            $this->db->set('value', $add_info['value'])
                    ->where('users_config_info_id', $add_info['name'])
                    ->where('user_id', $this->user['id'])
                    ->update('users_info');
        } else {
            $this->db->set('users_config_info_id', $add_info['name'])
                    ->set('value', $add_info['value'])
                    ->set('user_id', $this->user['id'])
                    ->insert('users_info');
        }
    }

    public function save_profile_user($user) {
        $this->db->set($user)
                ->where('id', $this->user['id'])
                ->update('users');
    }

    public function save_graduation_user($graduation) {
        $this->db->set($graduation)
                ->set('user_id', $this->user['id'])
                ->insert('graduation');
    }

    public function save_address_user($address) {
        $this->db->set($address)
                ->set('user_id', $this->user['id'])
                ->insert('addresses');
    }

    public function save_contact_user($contact) {
        $this->db->set($contact)
                ->set('user_id', $this->user['id'])
                ->insert('telephones');
    }
     public function save_mbti_user($mbti) {
        $this->db->set($mbti)
                ->where('id', $this->user['id'])
                ->update('users');   
    }

    public function get_graduations($user_id) {
        return $this->db->select('*')
                        ->from('graduation')
                        ->where('user_id', $user_id)
                        ->order_by('scholarity_status')
                        ->get()->result_array();
    } 
    
    public function get_addresses($user_id) {
        return $this->db->select('*')
                        ->from('addresses')
                        ->where('user_id', $user_id)
                        ->get()->result_array();
    }

    public function get_contacts($user_id) {
        return $this->db->select('*')
                        ->from('telephones')
                        ->where('user_id', $user_id)
                        ->get()->result_array();
    }

    public function delete_graduation($graduation_id) {
        $this->db->where('id', $graduation_id);
        $this->db->delete('graduation');
    }

    public function delete_address($address_id) {
        $this->db->where('id', $address_id);
        $this->db->delete('addresses');
    }

    public function delete_contact($contact_id) {
        $this->db->where('id', $contact_id);
        $this->db->delete('telephones');
    }

    public function get_form_type($user_type) {
        return $this->db->select('*')
                        ->from('users_config_info')
                        ->where('user_type', $user_type)
                        ->where('enabled', 1)
                        ->get()->result_array();
    }

    public function get_form_res($user_type) {
        return $this->db->select('ur.*')
                        ->from('users_config_info as ui')
                        ->join('users_config_info_res as ur', 'ur.user_config_info_id = ui.id')
                        ->where('ui.user_type', $user_type)
                        ->where('ui.enabled', 1)
                        ->get()->result_array();
    }

    public function get_token($token) {
        return $this->db->select('*')
                        ->from('questionnaires')
                        ->where('access_token', $token)
                        ->where('enabled', 1)
                        ->get()->row_array();
    }

}

?>