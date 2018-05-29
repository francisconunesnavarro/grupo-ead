<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_controller_constructor'][]=array(
    'class'=>'Permission',
    'function'=>'get_permissions',
    'filename'=>'permission.php',
    'filepath'=>'hooks'
);

$hook['post_controller_constructor'][]=array(
    'class'=>'Disciplines_Hooks',
    'function'=>'get_disciplines',
    'filename'=>'disciplines_hooks.php',
    'filepath'=>'hooks'
);
//
//$hook['post_controller_constructor'][]=array(
//    'class'=>'Forum_Hooks',
//    'function'=>'forum_today_posts',
//    'filename'=>'forum_hooks.php',
//    'filepath'=>'hooks'
//);

$hook['post_controller_constructor'][]=array(
    'class'=>'Chat_Hooks',
    'function'=>'get_chats',
    'filename'=>'chat_hooks.php',
    'filepath'=>'hooks'
);

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */