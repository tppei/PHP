<?php

// 設定ファイル読み込み
require_once '../../ECinclude/const.php';
// 関数ファイル読み込み
require_once '../../ECinclude/model.php';

// データベース接続
$pdo = get_db_connect();

table_display($pdo);
    
include_once '../../ECinclude/ec_index_view.php';

$pdo = null;