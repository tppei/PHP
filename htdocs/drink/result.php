<?php
$regexp_price = '/^[0-9]+$/';   //半角数字の正規表現

$host = 'localhost';            // データベースのホスト名
$username = 'codecamp49497';    // MySQLのユーザ名
$passwd   = 'codecamp49497';    // MySQLのパスワード
$dbname   = 'codecamp49497';    // データベース名
$link = mysqli_connect($host, $username, $passwd, $dbname);

// 変数初期化
$drink_id = '';
$post_err = [];
$err_msg = [];
?>
<!DOCTYPE html>
<html lang="ja">
    <body>
        <h1>自動販売機結果</h1>
    <?php
    
    // 投入金額のエラー
    
    // 投入金額が入力されていない
    if(!$_POST['money']){
        print '<p>投入金額を入力してください</p>';
        $post_err[] = '投入金額を入力してください';
    }else if(!preg_match($regexp_price,$_POST['money'])){
        // 投入金額が正規表現外
        print  "<p>投入金額は半角数字を入力してください</p>";
        $post_err[] = "投入金額は半角数字を入力してください";
    }else if($_POST['money'] > 10000){
        // 投入金額が１万以上
        print "<p>投入金額は1万円以下にしてください</p>";
        $post_err[] = "投入金額は1万円以下にしてください";
    }
    
    // 購入商品が選択されていないときのエラー
    if(!$_POST['drink_id']){
        print '<p>購入する商品を選択してください</p>';
        $post_err[] = '購入する商品を選択してください';
    }
    
    // 投入金額と選択商品にエラーがないとき
    if(count($post_err) === 0){
        
        // 現在時刻を取得
        $date = date('Y-m-d H:i:s');
        
        // ドリンクid取得
        $drink_id = $_POST['drink_id'];
        
         // トランザクション開始
        mysqli_autocommit($link, false);
        
        
        
        if($link){
            
            // 文字コードセット
            mysqli_set_charset($link, 'UTF8');
            
            // 購入した商品情報取得のためのクエリ
            $sql = "SELECT drink_details.ドリンクid,ドリンク名,商品画像,価格,在庫数,公開ステータス FROM drink_details JOIN drink_stock_table ON drink_details.ドリンクid = drink_stock_table.ドリンクid WHERE drink_details.ドリンクid = '$drink_id'";
            
            if($result = mysqli_query($link,$sql)){
                // 確認用
                // var_dump($drink_id);
                
                // 結果を一行取り出す
                while($row = mysqli_fetch_assoc($result)){
                    
                    // 購入したドリンク名取得
                    $drink_name = htmlspecialchars($row['ドリンク名']);
                    
                    // 購入したドリンクのステータス取得　修正箇所　12/2/'21
                    $status = htmlspecialchars($row['公開ステータス']);
                    
                    // 購入したドリンクの在庫数取得　修正箇所　12/2/'21
                    $stock = htmlspecialchars($row['在庫数']);
                    
                    // 購入した商品画像取得　修正箇所　12/2/'21
                    $image = $row['商品画像'];
                    
                     // 購入した商品価格取得　修正箇所　12/2/'21
                    $price = $row['価格'];
                    
                }
                
                // 公開ステータスが非公開の場合購入できない　修正箇所　12/2/'21
                if($status === '0'){
                        
                    print '現在購入できません';
                        
                }else{
                        
                    // おつり計算
                    $charge = $_POST['money'] - $price;
                        
                    // 在庫数が0個以下の場合購入できない　修正箇所　12/2/'21    
                    if($stock <= 0){
                        
                        print '売り切れました！';
                        
                    }else{
                
                        // 現在の在庫数から一つひく
                        $stock = $stock - 1;
                        
                        // 投入金額 - 価格　< 0　の時
                        if($charge < 0){
                            print 'お金が足りません';
                        }else{
                    
                        // 購入履歴表(drink_history_table)に購入日追加
                        $tohistory_sql = "INSERT INTO drink_history_table (ドリンクID,購入日) VALUES($drink_id,'$date')";
                            if(!$result = mysqli_query($link,$tohistory_sql)){
                                $err_msg[] = '購入日追加失敗';
                            }
                        
                        // 在庫管理表(drink_stock_table)の更新日を更新
                        $tostock_date_sql = "UPDATE drink_stock_table SET 更新日 = '$date' WHERE ドリンクid = '$drink_id'";
                            if(!$result = mysqli_query($link,$tostock_date_sql)){
                                $err_msg[] = '在庫表更新日更新失敗';
                            }
                            
                        // 在庫管理表(drink_stock_table)の在庫から一つ引いた数で更新
                        $tostock_stock_sql = "UPDATE drink_stock_table SET 在庫数 = $stock WHERE ドリンクid = '$drink_id'";
                            if(!$result = mysqli_query($link,$tostock_stock_sql)){
                                $err_msg[] = '在庫数更新失敗';
                                
                            }
                    
                        // 結果の表示
                        print '<img src="./image/'.$image.'">';
                        print '<p>がしゃん!['.$drink_name.']が買えました！</p>';
                        print '<p>おつりは['.$charge.'円]です</p>';
                        
                        }
                    }
                }
            }else{
                $err_msg[] = "商品情報取得失敗";
            }
            
            // sqlでエラーがなければコミット
            if(count($err_msg) === 0){
                mysqli_commit($link);
            }else {
                mysqli_rollback($link);
            }
            
            // 接続を閉じる
            mysqli_close($link);
        }else{
            $err_msg[] = 'error:' . mysqli_connect_error();
        }
       
    }
    ?>
        
        
        
    </body>
    <footer>
        <a href="index.php">戻る</a>
    </footer>
</html>