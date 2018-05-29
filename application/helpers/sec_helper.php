<?php

function secencode($msg, $key = null) {
    $replaces = array(
        '/' => '-_oWw_',
        '+' => '-_pIaw_',
        '%' => '-_iuWi_',
        '#' => '_df-_hdWd_',
        '==' => 'iu-_TWTd_',
        "'" => 'pL-_ZIWzti_'
    );
    $ci = & get_instance();
    $ci->load->library('encryption');

    $code = $ci->encryption->encrypt($msg, $key);
    foreach ($replaces as $k => $v) {
        $code = str_replace($k, $v, $code);
    }
    return $code;
}

function secdecode($msg, $key = null) {
    $replaces = array(
        '/' => '-_oWw_',
        '+' => '-_pIaw_',
        '%' => '-_iuWi_',
        '#' => '_df-_hdWd_',
        '==' => 'iu-_TWTd_',
        "'" => 'pL-_ZIWzti_'
    );
    $ci = & get_instance();
    $ci->load->library('encryption');
    $code = $msg;
    foreach ($replaces as $k => $v) {
        $code = str_replace($v, $k, $code);
    }
    $decode = $ci->encryption->decrypt($code, $key);
    return $decode;
}

?>