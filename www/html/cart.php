<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';

session_start();

//ホームで生成したトークンを削除
if($token = get_session('csrf_token')){
  delete_csrf_token($token);
}

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$carts = get_user_carts($db, $user['user_id']);

$total_price = sum_carts($carts);

//トークンを生成
$token = get_csrf_token();

//トークンの盗難を防ぐ
protect_from_jack();

include_once VIEW_PATH . 'cart_view.php';