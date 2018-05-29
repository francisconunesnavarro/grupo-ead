<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
        $this->load->model('User_Model');
    }

    public function save_profile_user() {
        $user['name'] = $this->input->post('name');
        $user['password'] = $this->input->post('password');
        $user['birthday'] = $this->input->post('birthday');
        $user['email'] = $this->input->post('email');
        $add_info = $this->input->post('add_info');

        if (isset($add_info)) {
            foreach ($add_info as $ai) {
                $this->User_Model->save_add_info($ai);
            }
        }

        if ($user['password'] == null) {
            unset($user['password']);
        }
        if ($user['birthday'] == null) {
            unset($user['birthday']);
        } else {
            $user['birthday'] = implode('-', array_reverse(explode('/', $user['birthday'])));
        }

        $this->User_Model->save_profile_user($user);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function save_formation_user() {
        $graduation = $this->input->post();
//                                pr('<pre>');       pr($graduation);exit;
        $this->User_Model->save_graduation_user($graduation);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function save_address_user() {
        $address = $this->input->post();
        $this->User_Model->save_address_user($address);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function save_contact_user() {
        $contact = $this->input->post();
        $this->User_Model->save_contact_user($contact);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function save_mbti() {
        $data['mbti'] = $this->input->post('mbti');      
        $this->User_Model->save_mbti_user($data);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function load_formation() {
        $data['graduations'] = $this->User_Model->get_graduations($this->user['id']);
        $data['content'] = 'users/profileGraduations';
        $this->load->view('layouts/none', $data);
    }

    public function load_addresses() {
        $data['addresses'] = $this->User_Model->get_addresses($this->user['id']);
        $data['content'] = 'users/profileAddresses';
        $this->load->view('layouts/none', $data);
    }

    public function load_contacts() {
        $data['contacts'] = $this->User_Model->get_contacts($this->user['id']);
        $data['content'] = 'users/profileContacts';
        $this->load->view('layouts/none', $data);
    }

    public function delete_formation() {
        $graduation_id = $this->input->post('id');
        $this->User_Model->delete_graduation($graduation_id);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function delete_address() {
        $address_id = $this->input->post('id');
        $this->User_Model->delete_address($address_id);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function delete_contact() {
        $contact_id = $this->input->post('id');
        $this->User_Model->delete_contact($contact_id);
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

    public function image_user_receive() {
        $ds = DIRECTORY_SEPARATOR;

        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $targetFile = 'public/images/users' . $ds . $_FILES['file']['name'];
            $additional = '1';
            while (file_exists($targetFile)) {
                $info = pathinfo($targetFile);
                $targetFile = $info['dirname'] . '/'
                        . $info['filename'] . $additional
                        . '.' . $info['extension'];
            }
            $return = move_uploaded_file($tempFile, $targetFile);
            $user_image = 'users' . $ds . $_FILES['file']['name'];
            $content = $this->User_Model->edit_user_image($user_image);

            $session = array(
                'user' => array(
                    'logged' => TRUE,
                    'id' => $this->user['id'],
                    'name' => $this->user['name'],
                    'type' => $this->user['type'],
                    'image' => $this->config->base_url(IMGPATH . $user_image)
                )
            );
            $this->session->set_userdata($session);
        }
    }

}

?>
