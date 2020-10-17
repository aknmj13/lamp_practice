<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';

session_start();

if(is_logined() === true){
  redirect_to(HOME_URL);
}

//トークンを生成し、フォームに埋め込むトークンの盗難を防ぐ
$token = set_csrf_security();

include_once VIEW_PATH . 'signup_view.php';



