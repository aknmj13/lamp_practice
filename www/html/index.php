<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();

//カートで生成したトークンを削除
if($token = get_session('csrf_token')){
  delete_csrf_token($token);
}

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$items = get_open_items($db);

//トークンを生成
$token = get_csrf_token();

//トークンの盗難を防ぐ
protect_from_jack();
include_once VIEW_PATH . 'index_view.php';