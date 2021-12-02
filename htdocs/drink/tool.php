<?php
// 変数初期化
$new_name = "";
$new_price = 0;
$new_stock = 0;
$new_img = "";
$new_status = 1;
$query_details = "";
$query_stock = 0;
$date = "";
$uploader = "./image/";
$filename ="";
$input_err =[];
$err_msg = [];
$data = [];


$regexp_stock = '/^[0-9]+$/';       // 在庫数正規表現
$regexp_price = '/^[0-9]+$/';       // 値段正規表現
$regexp_file = '/\.png$|\.jpeg$/i/'; // 画像ファイル正規表現

$host = 'localhost';          // データベースのホスト名
$username = 'codecamp49497';  // MySQLのユーザ名
$passwd   = 'codecamp49497';  // MySQLのパスワード
$dbname   = 'codecamp49497';  // データベース名



if($link = mysqli_connect($host, $username, $passwd, $dbname)){
    
    // 文字コードセット
    mysqli_set_charset($link, 'UTF8');
    
    // 文字入力チェック
    if(isset($_POST['new_name']) && isset($_POST['new_price']) && isset($_POST['new_stock']) && isset($_POST['new_status'])){
    
        // 現在時刻を取得
        $date = date('Y-m-d H:i:s');
        
        // 変数に代入
        $new_status = $_POST['new_status'];
        
        // トランザクション開始
         mysqli_autocommit($link, false);
            
         // ＿POSTが空白の場合のエラー
        if($_POST['new_name'] === ""){
        //   名前が空白
            $input_err[] = "名前を入力してください<br>";
        }else{
            $new_name = $_POST['new_name'];
        }
       
        if($_POST['new_price'] === ""){
            //   値段が空白
            $input_err[] = "値段を入力してください<br>";
            
        }else{
            
           if(!preg_match($regexp_price,$_POST['new_price'])){
               //   値段が空白ではないが半角数字ではない
               $input_err[] = "値段は半角数字を入力してください<br>";
           }else if($new_price > 10000){
               //   値段が空白ではなく半角数字でもあるが１万円以上
               $input_err[] = "値段は1万円以下にして下さい<br>";
           }else{
               $new_price = $_POST['new_price'];
           }
           
        }
        
       if($_POST['new_stock'] === ""){
        //   個数が空白
            $input_err[] = "個数を入力してください<br>";
       }else{
           
           if(!preg_match($regexp_stock,$_POST['new_stock'])){
            //   個数が空白ではないが半角数字
            $input_err[] = "個数は半角数字を入力してください<br>";
           }else{
            $new_stock = $_POST['new_stock'];
           }
           
       }   
            
       if(empty($_FILES['new_img']['name'])){
        //   ファイル名が空白
           $input_err[] = "ファイルを選択してください<br>";
       }else{
           if(preg_match($regexp_file,$_FILES['new_img']['name'])){
         
        //  保存先のパスとブラウザ上に一時保存された画像名を結合
           $upload = $uploader . basename($_FILES['new_img']['name']);
        //   var_dump($upload);
        
        //   アップロードされた画像をファイルに保存
           if(move_uploaded_file($_FILES['new_img']['tmp_name'],$upload) !== TRUE){
               $err_msg[] = '保存失敗';
           };
           
        //   画像名を変数に代入
           $filename = basename($_FILES['new_img']['name']);
        //   確認用
           var_dump($filename);
           }else{
               $input_err[] = "ファイル形式が異なります。画像ファイルはJPEG又はPNGのみ利用可能です。";
           }
       }     
      
     
        // 入力でエラーがない場合
        if(count($input_err) === 0){
            
            // 文字コードセット
            mysqli_set_charset($link, 'utf8');
            
            //   ドリンク表に行追加
            $query_details = "INSERT INTO drink_details (ドリンク名,価格,作成日,更新日,公開ステータス,商品画像) VALUES('$new_name',$new_price,'$date','$date',$new_status,'$filename')";
            
            // 確認用
            // var_dump($query_details);
                
            if(mysqli_query($link,$query_details) !== TRUE){
                $err_msg[] = 'SQL失敗:' . $query_details;
            };
            
            //   在庫表に行追加
            $query_stock = "INSERT INTO drink_stock_table (在庫数,作成日,更新日) VALUES($new_stock,'$date','$date')";
            // 確認用
            // var_dump($query_stock);
                
            if(mysqli_query($link,$query_stock) !== TRUE){
                $err_msg[] = 'SQL失敗：' . $query_stock;
            };
                
        }else{
        //   入力エラーある場合エラー内容を表示
               foreach($input_err as $error){
                   print $error;
               }
        }
            
        // sqlでエラーがなければコミット
        if(count($err_msg) === 0){
            mysqli_commit($link);
        } else {
            mysqli_rollback($link);
        }
        
    }

                     
                
                  
                
         
    // 在庫数変更
    if(isset($_POST['update_stock']) && isset($_POST['drink_id'])){
        if($_POST['update_stock'] === ""){
            //   個数が空白
            print "個数を入力してください";
        }else if (!preg_match($regexp_stock,$_POST['update_stock'])){
            //   個数が空白ではないが半角数字
             print "個数は半角数字を入力してください";
        }else{
            // 在庫数変更をデータベースに保存 
            // if($_POST['update_stock'] && $_POST['drink_id']){
            // とすると0ならば代入されない
            
            $update_stock = $_POST['update_stock'];
            // 確認用
            // var_dump($update_stock);
            
            $update_drinkid = $_POST['drink_id'];
                        
            // 文字化け防止
            mysqli_set_charset($link, 'utf8');
            
            // 在庫数変更クエリ
            $query = "UPDATE drink_stock_table SET 在庫数 = $update_stock WHERE ドリンクID = $update_drinkid";
            // 確認用
            // var_dump($query);
                            
            if(mysqli_query($link,$query) !== TRUE){
                $err_msg[] =  'アップデート失敗';
            }else{
                print "在庫数変更完了";
            }
                             
                           
                        
            // }
                    
        }
    }
                
    // ステータス変更
    if(isset($_POST["change_status"])){
        // 現在の公開ステータス
        $prestatus = $_POST["change_status"];
                    
        // 現在のステータスが0ならば、変更後は１　そうでないなら変更後は0
        if($prestatus === '0'){
            $poststatus = '1';
        }else{
            $poststatus = '0';
        }
        
        // ドリンクid取得
        $update_drinkid = $_POST['drink_id'];
        // 現在時刻を取得
        $date = date('Y-m-d H:i:s');
                        
        // 文字化け防止
        mysqli_set_charset($link, 'utf8');
        
        // ステータス変更クエリ
        $status_query = "UPDATE drink_details SET 公開ステータス = '$poststatus' WHERE ドリンクID = $update_drinkid";
        if(mysqli_query($link,$status_query) !== TRUE){
            $err_msg[] = 'アップデート失敗'; 
        };
        
        // 更新日更新クエリ
        $update_date_query = "UPDATE drink_details SET 更新日 = '$date'";
        
        if(mysqli_query($link,$update_date_query) !== TRUE){
            $err_msg[] = 'アップデート失敗'; 
        }
        
        if(mysqli_query($link,$status_query) && mysqli_query($link,$update_date_query)){
            print "ステータス変更完了";
        }
                        
    }


    // 管理者ブラウザに表示する表の作成
                    
    // 文字化け防止
    mysqli_set_charset($link, 'utf8');
    // 表作成のためのカラム取得
    $sql = "SELECT drink_details.ドリンクid,ドリンク名,商品画像,価格,在庫数,公開ステータス FROM drink_details JOIN drink_stock_table ON drink_details.ドリンクid = drink_stock_table.ドリンクid";
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }
    // 結果セットを閉じます
    mysqli_free_result($result);
                    
    // 接続を閉じる
    mysqli_close($link);
                        
}else{
    $err_msg[] = 'error: ' . mysqli_connect_error();
    
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
            
            .status_false {
            background-color: #A9A9A9;
        　　}
        </style>
    </head>
    <body>
        <h1>自動販売機管理ツール</h1>
        <section>
            <h2>新規商品追加</h2>
            <!--enctype属性は画像アップロードに必要-->
            <form method="post" enctype ="multipart/form-data" action = "tool.php">
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
                <tr class='<?php 
                // ステータスが非公開ならば.status_falseクラスを付与
                    if($go['公開ステータス'] === '0'){
                         print htmlspecialchars("status_false",ENT_QUOTES,'UTF-8');
                    }
                ?>'>
                    <form method = 'post'>
                        <td><?php print '<img src = "./image/'.$go['商品画像'].'">'?></td>
                        <td><?php print htmlspecialchars($go['ドリンク名'], ENT_QUOTES, 'UTF-8')?></td>
                        <td><?php print htmlspecialchars($go['価格'], ENT_QUOTES, 'UTF-8')?></td>
                        <td>
                            <input type="text" class="input_text_width text_align_right" name="update_stock" value='<?php print htmlspecialchars($go['在庫数'], ENT_QUOTES, 'UTF-8') ?>'>
                            <br>個
                            <br>
                            <input type="submit" value="変更">
                        </td>    
                        <input type="hidden" name="drink_id" value='<?php print htmlspecialchars($go['ドリンクid'],ENT_QUOTES, 'UTF-8')?>'>
                    </form>
                    <form method="post">
                        <td><input type="submit" value=
                        '<?php 
                            if($go['公開ステータス'] === '0'){
                                print htmlspecialchars("非公開→公開",ENT_QUOTES,'UTF-8');
                            }else{
                                print htmlspecialchars("公開→非公開",ENT_QUOTES,'UTF-8');
                            }
                        ?>'>
                        </td>
                        <input type="hidden" name="change_status" value="<?PHP print htmlspecialchars($go['公開ステータス'],ENT_QUOTES,'UTF-8')?>">
                        <input type="hidden" name="drink_id" value='<?php print htmlspecialchars($go['ドリンクid'],ENT_QUOTES, 'UTF-8')?>'>
                        <input type="hidden" name="sql_kind" value="change">
                    </form>
                </tr>
                <?php
                }
                ?>
            </table>
        </section>
    </body>
</html>