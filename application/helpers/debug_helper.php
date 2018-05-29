<?php
if(!function_exists('pr')){
  // faz nada, so mostra o array formatado no print_r
  function pr($value){ 
      print "<pre>";
      print_r($value);
      print "</pre>";
  }
}
?>