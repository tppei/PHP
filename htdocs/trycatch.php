<?php

$host = 'localhost'; // データベースのホスト名
$username = 'codecamp49497';  // MySQLのユーザ名
$passwd   = 'codecamp49497';    // MySQLのパスワード
$dbname   = 'codecamp49497';    // データベース名
$dsn = 'mysql:dbname=codecamp49497;host=localhost';
try {
    // MySQLへの接続（データベースのホスト名、 データベース名、文字セット、 MySQLのユーザ名、MySQLのパスワード）
    $pdo = new PDO('mysql:host=localhost;dbname=codecamp49497;charset=utf8;', $username, $passwd);
    // $pdo = new PDO($dsn, $username, $passwd);
    //例外をスローさせるためのおまじない↓
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    //トランザクション開始
    $pdo->beginTransaction();

    print '接続成功しました！！';

/////////////////////////////////////////////////////
//////////////////ここにSQL文を書く////////////////////
////////////////////////////////////////////////////


//コミット
$pdo->commit();

}catch(PDOException $e){
    
     if(isset($pdo)===true && $pdo->inTransaction()===true){
         //ロールバックする
         $pdo->rollBack();
     }
     
     //エラー情報の表示
     //エラーコード取得
     $code=$e->getCode();
     //エラーメッセージ取得
     $message=$e->getMessage();
     print '接続失敗しました';
     print '<br>';
     print("{$code}/{$message}<brS>");
     //プログラム終了
     die();
}
 
 // 接続を閉じる
 $pdo=null;