<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MiniCEX extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
        date_default_timezone_set('America/Sao_Paulo');
        $this->now = date('Y-m-d');
    }
    
    public function index(){
        $this->load->helper("form");
        $data['content'] = 'disciplines/miniCEX';
        $this->load->view('layouts/default', $data); 
    
    }
    
}
