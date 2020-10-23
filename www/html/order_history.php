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
$db = get_db_connect();
$user = get_login_user($db);

$histories = get_order_history($db);
$histories = h_assoc_array($histories);

include_once '../view/order_history_view.php';
