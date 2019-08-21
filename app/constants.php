<?php

// $base1  = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
// $base1 .= '://'.$_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
// $base   = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
// $base  .= '://'.$_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);


$base1 = 'http://localhost/euraka-live/public/';
$base = 'http://localhost/euraka-live/public/';


define('PREFIX1', $base1.'public/');
define('BASE_PATH', $base.'/');
define('PREFIX', $base);

define('PAGINATE', 5);
define('MSG_SUCCESS', 'success');
define('MSG_ERROR', 'error');
define('ROLE_ADMIN', 1);
define('ROLE_USER', 2);
define('URL_USERS_LOGOUT', PREFIX.'logout');
// CATEGORY CONSTANTs
define('URL_CATEGORIES_LIST', PREFIX.'admin/categories');
define('URL_CATEGORIES_ADD', PREFIX.'admin/categories/add');
define('URL_CATEGORIES_EDIT', PREFIX.'admin/categories/edit/');
define('URL_CATEGORIES_DELETE', PREFIX.'admin/categories/delete');

// USERS CONSTANTS
define('URL_USERS_LIST', PREFIX.'admin/users');
define('URL_USERS_ADD', PREFIX.'admin/users/add/');
define('URL_USERS_EDIT', PREFIX.'admin/users/edit/');
define('URL_USERS_DELETE', PREFIX.'admin/users/delete');