<?php
// ショッピングカートページ

// 設定ファイル読み込み
require_once '../../ECinclude/const.php';
// 関数ファイル読み込み
require_once '../../ECinclude/model.php';
// セッション開始
session_start();

// セッション変数からuser_id取得
if (isset($_SESSION['user_id']) === TRUE) {
   $user_id = $_SESSION['user_id'];
}else{
     // ログイン画面へ遷移
   header('Location:ec_login.php');
   exit;
}

// 入力文字チェック
$input_err = input_blank_check('select_amount');
$input_err = input_charnumcheck('select_amount');
// データベース接続
$pdo = get_db_connect();

// user_idからユーザ名を取得するSQL
$sql = 'SELECT user_name FROM user_info_table WHERE id = ' . $user_id;

// SQL実行し登録データを配列で取得
$data = get_as_array($pdo, $sql);

// ユーザ名を取得できたか確認
if (isset($data[0]['user_name'])) {
   $user_name = $data[0]['user_name'];
}

// アイテムid取得
$item_id = get_post_data('additem_id');

try{
    // 例外スロー
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    // トランザクション開始
    $pdo->beginTransaction();
    
    // カート内商品追加関数
    cart_adding($pdo,$item_id,$user_id);
    
    // カート内数量変更関数
    cart_amount_change($pdo,$input_err);
    
    // カート内情報削除関数
    delete_cartiteminfo($pdo);
    
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
                
        print 'sql文の実行が失敗しました';
        print '<br>';
        print("{$code}/{$message}<brS>");
        //プログラム終了
        die();
}

// 現在ログインしているユーザーのカート情報取得
$sql = "SELECT * FROM item_info_table INNER JOIN cart_table ON item_info_table.id = cart_table.item_id WHERE user_id = $user_id";
// 取得情報をテーブルにする
$data = user_table($pdo,$sql);



include_once '../../ECinclude/ec_cart_view.php';

$pdo = null;