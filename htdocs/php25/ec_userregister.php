<?php


// 設定ファイル読み込み
require_once '../../ECinclude/const.php';
// 関数ファイル読み込み
require_once '../../ECinclude/model.php';

// MySQLへの接続
$pdo = get_db_connect();

$input_err = input_blank_check('user_name');
$input_err = input_charcheck('user_name');
$input_err = input_blank_check('passwd');
$input_err = input_charcheck('passwd');

$register_err = check_same_user($pdo);

user_register($input_err,$register_err,$pdo);

include_once '../../ECinclude/ec_user_view.php';

$pdo = null;