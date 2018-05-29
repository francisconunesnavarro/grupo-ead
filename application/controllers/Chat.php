<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chat extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
        $this->chat = $this->session->userdata('chat');
        $this->load->model('Chat_Model');
        if (!$this->user['logged']) {
            $data['content'] = 'warning/500';
            $this->load->view('layouts/none', $data);
        }
    }

    public function listChats() {
        $data['title'] = 'Chats';

        $my_disciplines_array = array();
        $this->load->model('Disciplines_Model');
        $data['disciplines'] = $this->Disciplines_Model->get_disciplines();
        foreach ($data['disciplines'] as $md) {
            array_push($my_disciplines_array, $md['disc_id']);
        }
        if (count($my_disciplines_array) > 0) {
            $data['chats'] = $this->Chat_Model->get_chats($my_disciplines_array);

            foreach ($data['chats'] as $key => $f) {
                $temp_chat = $this->Chat_Model->get_last_chat_post($f['chat_id']);
                if (isset($temp_chat['posted_user'])) {
                    $data['chats'][$key]['posted_user'] = $temp_chat['posted_user'];
                    $data['chats'][$key]['last_post'] = $temp_chat['last_post'];
                } else {
                    $data['chats'][$key]['posted_user'] = '';
                    $data['chats'][$key]['last_post'] = '';
                }
            }
        } else {
            $data['chats'] = null;
        }
        $this->load->model('Settings_Model');
        $data['categories'] = $this->Settings_Model->get_categories(FALSE);
        $data['content'] = 'chats/listChats';
        $this->load->view('layouts/none', $data);
    }

    public function open_chat() {
        $chat_id = $this->input->post('chat_id');
        $chat = $this->Chat_Model->get_chat($chat_id);
        $data['chat'] = $this->Chat_Model->get_chat_posts($chat_id);
        $data['chat_users'] = $this->Chat_Model->get_chat_users($chat_id);
        $data['chat_title'] = $chat['chat_title'];
        $data['category_name'] = $chat['category_name'];
        $data['chat_id'] = $chat_id;
        $data['content'] = 'chats/openChat';
        $this->load->view('layouts/none', $data);
    }

    public function open_chat_messages() {
        $chat_id = $this->input->post('chat_id');
        $data['chat'] = $this->Chat_Model->get_chat_posts($chat_id);
        $data['content'] = 'chats/chat_messages';
        $this->load->view('layouts/none', $data);
    }

    public function open_chat_users() {
        $chat_id = $this->input->post('chat_id');
        // dou update nesse usuario
        $this->Chat_Model->check_user($chat_id);
        // busco os usuarios online
        $data['chat_users'] = $this->Chat_Model->get_chat_users($chat_id);
        $data['content'] = 'chats/chat_users';
        $this->load->view('layouts/none', $data);
    }

    public function save_new_chat_text() {
        $this->Chat_Model->save_new_chat_text($this->input->post('chat_id'), $this->input->post('text'));
        echo json_encode(array(
            'status' => 'OK'
        ));
        exit;
    }

}
