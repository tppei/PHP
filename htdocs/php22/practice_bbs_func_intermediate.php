<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'codecamp49497');
define('DB_PASSWD', 'codecamp49497');
define('DB_NAME', 'codecamp49497');

define('HTML_CHARACTER_SET', 'UTF-8');
define('DB_CHARACTER_SET', 'UTF-8');

$link = get_db_connect();

    function get_db_connect() {
 
        // コネクション取得
        if (!$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME)) {
            die('error: ' . mysqli_connect_error());
        }
     
        // 文字コードセット
        mysqli_set_charset($link, DB_CHARACTER_SET);
     
        return $link;
    }
    
    function close_db_connect($link){
        mysqli_close($link);
    }
?>