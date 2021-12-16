<?php

// 文字入力チェック関数
function input_charcheck($pdo){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        global $regexp_price;
        global $regexp_stock;
        global $regexp_file;
        global $date;
        global $input_err;
        
        // 変数初期化
        $new_name = "";
        $new_price = 0;
        $new_stock = 0;
        $new_img = "";
        $filename ="";
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
        try{
            // pdoによるMYSQLへの接続
            $pdo = new PDO('mysql:host=localhost;dbname=codecamp49497;charset=utf8;',$username,$passwd);
            //例外をスローさせるためのおまじない↓
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }catch(PDOException $e){
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
            return $pdo;
}

// 商品情報追加関数           
function detail_insert($input_err,$new_name,$new_price,$date,$new_status,$filename,$new_stock,$pdo){
        
        // 入力でエラーがない場合
        if(count($input_err) === 0){
            try{
                //例外をスローさせるためのおまじない↓
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                
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
                $stmt->execute();
                
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
            
        }else{
        //   入力エラーある場合エラー内容を表示
               foreach($input_err as $error){
                   print $error;
               }
        }
}
 
//  在庫数変更関数
function stock_change($pdo){
    global $regexp_stock;
    
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
 
 
 
 
// 以下　管理者画面で使う関数


// 投入金額と選択商品のエラー関数
function buyer_inputcheck(){
    $post_err = [];
    global $regexp_price;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
        
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
    
        return $post_err;
    }
}

// 購入に伴う商品情報変更関数
function bought_iteminfo($post_err,$pdo){
    // トランザクション開始
    $pdo->beginTransaction();
    global $err_msg ;
    // 投入金額と選択商品にエラーがないとき
    if(count($post_err) === 0){
        
        // 現在時刻を取得
        $date = date('Y-m-d H:i:s');
        
        // ドリンクid取得
        $drink_id = $_POST['drink_id'];
        
        // // トランザクション開始
        // $pdo->beginTransaction();
        
        // 購入した商品情報取得のためのクエリ
        $sql = "SELECT drink_details.ドリンクid,ドリンク名,商品画像,価格,在庫数,公開ステータス FROM drink_details JOIN drink_stock_table ON drink_details.ドリンクid = drink_stock_table.ドリンクid WHERE drink_details.ドリンクid = '$drink_id'";
        
        $stmt=$pdo->query($sql);
        
        // 結果を一行取り出す
        while($row=$stmt->fetch()){
            
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
                            if($stmt=$pdo->query($tohistory_sql)){
                                $err_msg[] = '購入日追加失敗';
                            }
                        
                        // 在庫管理表(drink_stock_table)の更新日を更新
                        $tostock_date_sql = "UPDATE drink_stock_table SET 更新日 = '$date' WHERE ドリンクid = '$drink_id'";
                            if($stmt=$pdo->query($tostock_date_sql)){
                                $err_msg[] = '在庫表更新日更新失敗';
                            }
                            
                        // 在庫管理表(drink_stock_table)の在庫から一つ引いた数で更新
                        $tostock_stock_sql = "UPDATE drink_stock_table SET 在庫数 = $stock WHERE ドリンクid = '$drink_id'";
                            if($stmt=$pdo->query($tostock_stock_sql)){
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
                //コミット
                $pdo->commit();
            }else {
                //ロールバック
                $pdo->rollBack();
            }
}

