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

$token = get_post('csrf_token');

$item_id = get_post('item_id');

//セッションに登録済のトークンと一致しているか判定
if(is_valid_token($token) === true){
  if(add_cart($db,$user['user_id'], $item_id)){
    set_message('カートに商品を追加しました。');
  } else {
    set_error('カートの更新に失敗しました。');
  }
} else {
  redirect_to(LOGOUT_URL);
}

$token = delete_csrf_token($token);

redirect_to(HOME_URL);