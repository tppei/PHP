<?php

// 設定ファイル読み込み
require_once 'revender_const.php';
// 関数ファイル読み込み
require_once 'revender_model.php';

// データベース接続
$pdo = get_db_connect();

table_display($pdo);
    
include_once 'index_view.php';

$pdo = null;
