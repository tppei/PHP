<?php

// 設定ファイル読み込み
require_once '../../ECinclude/const.php';
// 関数ファイル読み込み
require_once '../../ECinclude/model.php';
$sql ="";
// データベース接続
$pdo = get_db_connect();
$sql = "SELECT user_name,password FROM user_info_table";
$data = user_table($pdo,$sql);

include_once '../../ECinclude/ec_admin_user_view.php';