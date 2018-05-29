<?php

class Chat_Hooks {

    public function get_chats() {
        $ci = & get_instance();
        $ci->load->model('Chat_Model');
        // CHATS
        $my_disciplines_array = array();
        $data['disciplines'] = $ci->Disciplines_Model->get_disciplines();

        if ($ci->user['type'] != 'pae') {
            if (!empty($data['disciplines'])) {
                foreach ($data['disciplines'] as $md) {
                    array_push($my_disciplines_array, $md['disc_id']);
                }
            }
            if (count($my_disciplines_array) > 0) {
                $ci->chats = $ci->Chat_Model->get_chats($my_disciplines_array);

                foreach ($ci->chats as $key => $f) {
                    $temp_chat = $ci->Chat_Model->get_last_chat_post($f['chat_id']);
                    if (isset($temp_chat['posted_user'])) {
                        $ci->chats[$key]['posted_user'] = $temp_chat['posted_user'];
                        $ci->chats[$key]['last_post'] = $temp_chat['last_post'];
                    } else {
                        $ci->chats[$key]['posted_user'] = '';
                        $ci->chats[$key]['last_post'] = '';
                    }
                }
            } else {
                $ci->chats = null;
            }
        } else {
            $ci->chats = null;
        }
    }

}

?>
