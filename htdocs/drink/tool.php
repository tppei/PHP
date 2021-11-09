<?php
// 変数初期化
$new_name = "";
$new_price = 0;
$new_stock = 0;
$new_img = "";
$new_status = 1;
$regexp_stock = '/^[0-9]+$/';
$regexp_price = '/^[0-9]+$/';
$query_details = "";
$query_stock = 0;
$date = "";

$host = 'localhost'; // データベースのホスト名
$username = 'codecamp49497';  // MySQLのユーザ名
$passwd   = 'codecamp49497';    // MySQLのパスワード
$dbname   = 'codecamp49497';    // データベース名
$link = mysqli_connect($host, $username, $passwd, $dbname);
$data = [];

// 文字入力チェック
if(isset($_POST['new_name']) && isset($_POST['new_price']) && isset($_POST['new_stock']) && isset($_POST['new_img']) && isset($_POST['new_status'])){
    
    // 現在時刻を取得
    $date = date('Y-m-d H:i:s');
    // 変数に代入
    $new_status = $_POST['new_status'];
    // ＿POSTが空白の場合のエラー
       if($_POST['new_name'] === ""){
        //   名前が空白
            print "名前を入力してください<br>";
       }else{
           $new_name = $_POST['new_name'];
       }
       
       if($_POST['new_price'] === ""){
        //   値段が空白
            print "値段を入力してください<br>";
       }else{
           if(!preg_match($regexp_price,$new_price)){
               //   値段が空白ではないが半角数字ではない
               print "値段は半角数字を入力してください<br>";
           }else if($new_price > 10000){
               //   値段が空白ではなく半角数字でもあるが１万円以上
               print "値段は1万円以下にして下さい<br>";
           }else{
               $new_price = $_POST['new_price'];
           }
       }
        
       if($_POST['new_stock'] === ""){
        //   個数が空白
            print "個数を入力してください<br>";
       }else{
           if(!preg_match($regexp_stock,$new_stock)){
            //   個数が空白ではないが半角数字
               print "個数は半角数字を入力してください<br>";
           }else{
               $new_stock = $_POST['new_stock'];
           }
       }   
            
       if($_POST['new_img'] === ""){
        //   ファイル名が空白
           print "ファイルを選択してください<br>";
       }else{
           $new_img = $_POST['new_img'];
       }     
       
        // 接続成功した場合
        if($link){
            // 文字化け防止
               mysqli_set_charset($link, 'utf8');
            //   ドリンク表に行追加
                $query_details = "INSERT INTO drink_details (ドリンク名,価格,作成日,更新日,公開ステータス,商品画像) VALUES('$new_name',$new_price,'$date','$date',$new_status,'$new_img')";
                var_dump($query_details);
                mysqli_query($link,$query_details);
            //   在庫表に行追加
                $query_stock = "INSERT INTO drink_stock_table (在庫数,作成日) VALUES($new_stock,'$date')";
                var_dump($query_stock);
                mysqli_query($link,$query_stock);
                
                // 管理者ブラウザに表示する表の作成
                if($drink_add = mysqli_query($link,$query_details) && $stock_add = mysqli_query($link,$query_stock)){
                    $sql = "SELECT ドリンク名,商品画像,価格,在庫数,公開ステータス FROM drink_details JOIN drink_stock_table ON drink_details.ドリンクid = drink_stock_table.ドリンクid";
                    $result = mysqli_query($link,$sql);
                    var_dump($sql);
                    if(mysqli_query($link,$sql)){
                        print "成功";
                    }
                    while($row = mysqli_fetch_array($result)){
                        $data[] = $row;
                    }
                    // 結果セットを閉じます
                    mysqli_free_result($result);
                }
               // 接続を閉じます
               mysqli_close($link);
            // 接続失敗した場合
            } else {
               print 'DB接続失敗';
            }
        
        
} 
?>

<!DOCTYPE html>
<html lang='ja'>
    <head>
        <meta charset="UTF-8">
        <title>自動販売機</title>
        <style>
            section{
                margin-bottom: 20px;
                border-top: solid 1px;
            }
            
            table{
                width: 660px;
                border-collapse: collapse;
            }
            
            table,tr,th,td{
                border: solid 1px;
                padding: 10px;
                text-align: center;
            }
            
            caption{
                text-align: left;
            }
            
            .text_align_right{
                text-align: right;
            }
            
            .drink_name_width{
                width: 100px;
            }
            
            .input_text_width{
                width: 60px;
            }
        </style>
    </head>
    <body>
        <h1>自動販売機管理ツール</h1>
        <section>
            <h2>新規商品追加</h2>
            <form method="post" >
               <div>
                   <label>
                       名前：
                       <input type="text" name="new_name">
                   </label>
               </div>
               <div>
                   <label>
                       値段：
                       <input type="text" name="new_price">
                   </label>
               </div>
               <div>
                   <label>
                       個数：
                       <input type="text" name="new_stock">
                   </label>
               </div>
               <div>
                   <input type="file" name="new_img">
               </div>
               <div>
                   <select name="new_status">
                       <option value="0">非公開</option>
                       <option value="1">公開</option>
                   </select>
               </div>
               <div>
                   <input type="hidden" name="sql_kind" value="insert">
               </div>
               <div>
                   <input type="submit" value="■□■□■商品追加■□■□■">
               </div>
            </form>
        </section>
        <section>
            <h2>商品情報変更</h2>
            <table>
                <caption>商品一覧</caption>
                <tr>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>公開ステータス</th>
                </tr>
                <?php
                foreach($data as $go){
                ?>
                <tr>
                    <td><?php print htmlspecialchars($go['商品画像'], ENT_QUOTES, 'UTF-8')?></td>
                    <td><?php print htmlspecialchars($go['ドリンク名'], ENT_QUOTES, 'UTF-8')?></td>
                    <td><?php print htmlspecialchars($go['価格'], ENT_QUOTES, 'UTF-8')?></td>
                    <td>
                        <input type="text" class="input_text_width text_align_right" name="update_stock" value='<?php print htmlspecialchars($go['在庫数'], ENT_QUOTES, 'UTF-8') ?>'>
                        <br>個&nbsp;&nbsp;
                        <br><input type="submit" value="変更">
                    </td>
                    <td><?php print htmlspecialchars($go['公開ステータス'], ENT_QUOTES, 'UTF-8')?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </section>
    </body>
</html>