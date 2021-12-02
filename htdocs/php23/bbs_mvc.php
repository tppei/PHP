<?php

// 設定ファイル読み込み
require_once '../include/const_bbs.php';
// 関数ファイル読み込み
require_once '../include/model_bbs.php';

// DB接続
$link = get_db_connect();

// 投稿をデータベースに追加する関数
post_bbs();

// 書き込みを取得
$data = get_bbs($link);

// DB切断
close_db_connect($link);

// 特殊文字をHTMLエンティティに変換
// $bbs = entity_assoc_array($goods_data);

// 書き込みテンプレートファイル読み込み
include_once '../include/view_bbs.php';

