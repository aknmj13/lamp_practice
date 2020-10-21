<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$sort_new = get_get('new');
$sort_cheap = get_get('cheap');
$sort_expensive = get_get('expensive');

//$items = get_open_items($db);
$items = get_sort_items($db);
$items = h_assoc_array($items);

//トークンを生成し、フォームに埋め込むトークンの盗難を防ぐ
$token = set_csrf_security();

include_once VIEW_PATH . 'index_view.php';