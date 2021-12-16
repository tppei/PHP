<?php

// 設定ファイル読み込み
require_once 'revender_const.php';
// 関数ファイル読み込み
require_once 'revender_model.php';

// 入力チェック関数
$post_err = buyer_inputcheck();

// データベース接続
$pdo = get_db_connect();

// 商品情報変更関数
bought_iteminfo($post_err,$pdo);

include_once 'result_view.php';


$pdo = null;


