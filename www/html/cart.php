<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$carts = get_user_carts($db, $user['user_id']);
$carts = h_assoc_array($carts);

$total_price = sum_carts($carts);
$total_price = h($total_price);

//トークンを生成
$token = set_csrf_security();

include_once VIEW_PATH . 'cart_view.php';