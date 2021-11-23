<?php
$regexp_price = '/^[0-9]+$/';
$host = 'localhost'; // データベースのホスト名
$username = 'codecamp49497';  // MySQLのユーザ名
$passwd   = 'codecamp49497';    // MySQLのパスワード
$dbname   = 'codecamp49497';    // データベース名

$drink_id = '';
$err_msg = [];
?>
<!DOCTYPE html>
<html lang="ja">
    <body>
        <h1>自動販売機結果</h1>
    <?php
    if(!$_POST['money']){
        print '投入金額を入力してください';
        $err_msg[] = '投入金額を入力してください';
    }else if(!preg_match($regexp_price,$_POST['money'])){
        print  "投入金額は半角数字を入力してください";
        $err_msg[] = "投入金額は半角数字を入力してください";
    }else if($_POST['money'] > 10000){
        print "投入金額は1万円以下にしてください";
        $err_msg[] = "投入金額は1万円以下にしてください";
    }
    
    if(!$_POST['drink_id']){
        print '購入する商品を選択してください';
        $err_msg[] = '購入する商品を選択してください';
    }
    
    if(count($err_msg) === 0){
        print $_POST['drink_id'];
        $drink_id = $_POST['drink_id'];
        if($link =  mysqli_connect($host, $username, $passwd, $dbname)){
            // 文字コードセット
            mysqli_set_charset($link, 'UTF8');
            $sql = "SELECT drink_details.ドリンクid,ドリンク名,商品画像,価格,在庫数 FROM drink_details JOIN drink_stock_table ON drink_details.ドリンクid = drink_stock_table.ドリンクid WHERE drink_details.ドリンクid = '$drink_id'";
            if($result = mysqli_query($link,$sql)){
                // 確認用
                // var_dump($drink_id);
                while($row = mysqli_fetch_assoc($result)){
                    $ドリンク名 = htmlspecialchars($row['ドリンク名']);
                    $おつり = $_POST['money'] - $row['価格'];
                    $画像 = $row['商品画像'];
                }
                if($おつり < 0){
                    print 'お金が足りません';
                }else{
                print '<img src="./image/'.$画像.'">';
                print '<p>がしゃん!['.$ドリンク名.']が買えました！</p>';
                print '<p>おつりは['.$おつり.'円]です</p>';
                }
            }else{
                $err_msg[] = "sql実行失敗";
                 print $err_msg[0];
            }
        }
       
    }
    ?>
        
        
        
    </body>
    <footer>
        <a href="index.php">戻る</a>
    </footer>
</html>