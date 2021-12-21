<?php

// 設定ファイル読み込み
require_once '../../ECinclude/const.php';
// 関数ファイル読み込み
require_once '../../ECinclude/model.php';



// DB接続
// MySQLへの接続

$pdo = get_db_connect();
  
iteminfo_input_charcheck($pdo);

stock_change($pdo);

status_change($pdo);

delete_iteminfo($pdo);

$data = table_display($pdo);




include_once '../../ECinclude/ec_tool_view.php';
                
$pdo = null;