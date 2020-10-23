<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'order_.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$order_id = get_get('id');

$db = get_db_connect();
$user = get_login_user($db);

$history = get_a_history($db,$order_id);
$history = h_assoc_array($history);
$order_details = get_order_details($db, $order_id);
$order_details = h_assoc_array($order_details);

include_once '../view/order_details_view.php';