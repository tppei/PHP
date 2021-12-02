<?php

// 文字入力チェック関数
function input_charcheck($pdo){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        global $regexp_price;
        global $regexp_stock;
        global $regexp_file;
        global $date;
        $new_name = "";
        $new_price = 0;
        $new_stock = 0;
        $new_img = "";
        $filename ="";
        $input_err =[];
        $new_status =0;
        $uploader = "./image/";
        
        if(isset($_POST['new_name']) && isset($_POST['new_price']) && isset($_POST['new_stock']) && isset($_POST['new_status'])){
        
            // 変数に代入
            $new_status = $_POST['new_status'];
            
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
            //   var_dump($filename);
               }else{
                   $input_err[] = "ファイル形式が異なります。画像ファイルはJPEG又はPNGのみ利用可能です。";
               }
           }
           return detail_insert($input_err,$new_name,$new_price,$date,$new_status,$filename,$new_stock,$pdo);
        }
    }
}
           
// db接続関数
function get_db_connect() {
            $username = 'codecamp49497';
            $passwd = 'codecamp49497';
     
            // pdoによるMYSQLへの接続
            $pdo = new PDO('mysql:host=localhost;dbname=codecamp49497;charset=utf8;',$username,$passwd);
            $pdo-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            
            return $pdo;
}

// 商品情報追加関数           
function detail_insert($input_err,$new_name,$new_price,$date,$new_status,$filename,$new_stock,$pdo){
        var_dump($input_err);
        // 入力でエラーがない場合
        if(count($input_err) === 0){
            // トランザクション開始
            $pdo->beginTransaction();
            
            //   ドリンク表に行追加
            $query_detail = "INSERT INTO drink_details (ドリンク名,価格,作成日,更新日,公開ステータス,商品画像) VALUES(?,?,?,?,?,?)";
            $stmt=$pdo->prepare($query_detail);
            
            // バインド　以下sqlインジェクション対策
            $stmt->bindValue(1,$new_name);
            $stmt->bindValue(2,$new_price);
            $stmt->bindValue(3,$date);
            $stmt->bindValue(4,$date);
            $stmt->bindValue(5,$new_status);
            $stmt->bindValue(6,$filename);
            $stmt->execute();
            
            
            //   在庫表に行追加
            $query_stock = "INSERT INTO drink_stock_table (在庫数,作成日,更新日) VALUES(?,?,?)";
            $stmt=$pdo->prepare($query_stock);
            
            // バインド　以下sqlインジェクション対策
            $stmt->bindValue(1,$new_stock);
            $stmt->bindValue(2,$date);
            $stmt->bindValue(3,$date);
                
            //コミット
            $pdo->commit();
            
        }else{
        //   入力エラーある場合エラー内容を表示
               foreach($input_err as $error){
                   print $error;
               }
        }
}
 
//  在庫数変更関数
function stock_change($pdo){
    $regexp_stock = '/^[0-9]+$/';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
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
                
                // 在庫数変更クエリ
                $query = "UPDATE drink_stock_table SET 在庫数 = $update_stock WHERE ドリンクID = $update_drinkid";
                // 確認用
                // var_dump($query);
                                
                // クエリを実行します
                $stmt=$pdo->query($query);
                    
            }
        }
    }
}

// ステータス変更関数
function status_change($pdo){

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
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
                            
            
            // ステータス変更クエリ
            $status_query = "UPDATE drink_details SET 公開ステータス = '$poststatus' WHERE ドリンクID = $update_drinkid";
             // クエリを実行します
            $stmt=$pdo->query($status_query);
            
            // 更新日更新クエリ
            $update_date_query = "UPDATE drink_details SET 更新日 = '$date'";
             // クエリを実行します
            $stmt=$pdo->query($update_date_query);
            
            
        }
    }
}
 
 // 管理者ブラウザに表示する表の作成
 function table_display($pdo){
    global $data;
    // 表作成のためのカラム取得
    $sql = "SELECT drink_details.ドリンクid,ドリンク名,商品画像,価格,在庫数,公開ステータス FROM drink_details JOIN drink_stock_table ON drink_details.ドリンクid = drink_stock_table.ドリンクid";
    $stmt=$pdo->query($sql);
    
    while($row=$stmt->fetch()){
        $data[] = $row;
    }
    
    return $data;
 }



