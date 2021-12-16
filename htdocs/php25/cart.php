<?php

// 設定ファイル読み込み
require_once '../../ECinclude/const.php';
// 関数ファイル読み込み
require_once '../../ECinclude/model.php';

// データベース接続
$pdo = get_db_connect();

$item_id = get_post_data('drink_id');

$sql = "SELECT * FROM item_info_table WHERE id = $item_id"