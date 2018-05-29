<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Encrypt extends CI_Encrypt {
    private $replaces = array(
        '/' => '-_oWw_',
        '+' => '-_pIaw_',
        '%' => '-_iuWi_',
        '#' => '_df-_hdWd_',
        '==' => 'iu-_TWTd_',
        "'" => 'pL-_ZIWzti_'
    );

    public function __construct() {
        parent::__construct();
    }

    public function encode($msg, $key = null) {
        $code = parent::encode($msg, $key);
        foreach ($this->replaces as $k => $v) {
            $code = str_replace($k, $v, $code);
        }
        return $code;
    }

    public function decode($msg, $key = null) {
        $code = $msg;
        foreach ($this->replaces as $k => $v) {
            $code = str_replace($v, $k, $code);
        }
        $decode = parent::decode($code, $key);
        return $decode;
    }
}
?>
