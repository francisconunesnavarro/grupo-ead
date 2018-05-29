<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Traitor extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function encode($a) {
        echo base64_encode($a);
    }

    public function decode($a) {
        echo base64_decode($a);
    }

    public function teste() {
        $this->load->model('Traitor_Model');
        $data = $this->Traitor_Model->get_quest();
        pr($data);
        exit;
    }

}

?>