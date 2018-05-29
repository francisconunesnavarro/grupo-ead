<?php

class Permission {

    public function get_permissions() {
        $ci = & get_instance();
        $ci->user = $ci->session->userdata('user');
    }

}

?>
