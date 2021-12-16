<?php


// 現在時刻を取得
$date = date('Y-m-d H:i:s');

// 変数初期化
$filename ="";
$input_err =[];
$err_msg = [];
$data = [];


$regexp_stock = '/^[0-9]+$/';       // 在庫数正規表現
$regexp_price = '/^[0-9]+$/';       // 値段正規表現
$regexp_file = '/\.png$|\.jpg$/i'; // 画像ファイル正規表現




