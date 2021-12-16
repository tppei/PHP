<?php

// 設定ファイル読み込み
require_once 'revender_const.php';
// 関数ファイル読み込み
require_once 'revender_model.php';

// DB接続
// MySQLへの接続

$pdo = get_db_connect();
  
input_charcheck($pdo);

stock_change($pdo);

status_change($pdo);                    
                
table_display($pdo);

include_once 'tool_view.php';
                
$pdo = null;         
    
                
   


    
                    
  



