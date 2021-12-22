<?php

// 設定ファイル読み込み
require_once '../../ECinclude/const.php';
// 関数ファイル読み込み
require_once '../../ECinclude/model.php';
// セッション開始
session_start();

$user_id = 0;

// データベース接続
$pdo = get_db_connect();

$item_id = get_post_data('item_id');

if(isset($_SESSION['user_id']) === TRUE) {
    $user_id = $_SESSION['user_id'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    cart_adding($pdo,$item_id,$user_id);
    cart_amount_change($pdo);
    delete_cartiteminfo($pdo);
   
}


$sql = "SELECT * FROM item_info_table INNER JOIN cart_table ON item_info_table.id = cart_table.item_id";
$data = user_table($pdo,$sql);

include_once '../../ECinclude/ec_cart_view.php';