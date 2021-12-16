<?php
/**
* 特殊文字をHTMLエンティティに変換する
* @param str  $str 変換前文字
* @return str 変換後文字
*/
function entity_str($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

/**
* クエリを実行しその結果を配列で取得する
*
* @param obj  $link DBハンドル
* @param str  $sql SQL文
* @return array 結果配列データ
*/
function get_as_array($pdo,$sql) {
 
    // 返却用配列
    global $data;
 
    // クエリを実行する
    $stmt=$pdo->query($sql);
 
    while($row=$stmt->fetch()){
        $data[] = $row;
    }
    
    return $data;
 
}
/**
* リクエストメソッドを取得
* @return str GET/POST/PUTなど
*/
function get_request_method() {
   return $_SERVER['REQUEST_METHOD'];
}
/**
* POSTデータを取得
* @param str $key 配列キー
* @return str POST値
*/
function get_post_data($key) {
   $str = '';
   if (isset($_POST[$key]) === TRUE) {
       $str = $_POST[$key];
   }
   return $str;
}
 
// 文字入力チェック関数
function iteminfo_input_charcheck($pdo){
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
                
                //   アイテム表に行追加
                $query_detail = "INSERT INTO item_info_table (name,price,img,status,created_date,updated_date) VALUES(?,?,?,?,?,?)";
                $stmt=$pdo->prepare($query_detail);
                
                
                // バインド　以下sqlインジェクション対策
                $stmt->bindValue(1,$new_name);
                $stmt->bindValue(2,$new_price);
                $stmt->bindValue(3,$filename);
                $stmt->bindValue(4,$new_status);
                $stmt->bindValue(5,$date);
                $stmt->bindValue(6,$date);
                $stmt->execute();
                
                
                //   在庫表に行追加
                $query_stock = "INSERT INTO item_stock_table (stock,created_date,updated_date) VALUES(?,?,?)";
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
        if(isset($_POST['update_stock']) && isset($_POST['id'])){
            if($_POST['update_stock'] === ""){
                //   個数が空白
                print "個数を入力してください";
            }else if (!preg_match($regexp_stock,$_POST['update_stock'])){
                //   個数が空白ではないが半角数字
                 print "個数は半角数字を入力してください";
            }else{
                // 在庫数変更をデータベースに保存 
                // if($_POST['update_stock'] && $_POST['id']){
                // とすると0ならば代入されない
                
                $update_stock = $_POST['update_stock'];
                // 確認用
                // var_dump($update_stock);
                
                $update_drinkid = $_POST['id'];
                
                // 在庫数変更クエリ
                $query = "UPDATE item_stock_table SET stock = $update_stock WHERE id = $update_drinkid";
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
            var_dump($prestatus);            
            // 現在のステータスが0ならば、変更後は１　そうでないなら変更後は0
            if($prestatus === '0'){
                $poststatus = '1';
            }else{
                $poststatus = '0';
            }
            
            // id取得
            $update_drinkid = $_POST['id'];
    
            // 現在時刻を取得
            $date = date('Y-m-d H:i:s');
                            
            
            // ステータス変更クエリ
            $status_query = "UPDATE item_info_table SET status = '$poststatus' WHERE id = $update_drinkid";
            var_dump($status_query);
            // クエリを実行します
            $stmt=$pdo->query($status_query);
            
            // updated_date更新クエリ
            $update_date_query = "UPDATE item_info_table SET updated_date = '$date'";
            
            // クエリを実行します
            $stmt=$pdo->query($update_date_query);
            
            
        }
    }
}
 
// 管理者ブラウザに表示する表の作成
 function table_display($pdo){
    global $data;
    // 表作成のためのカラム取得
    $sql = "SELECT item_info_table.id,name,img,price,stock,status FROM item_info_table JOIN item_stock_table ON item_info_table.id = item_stock_table.id";
    $stmt=$pdo->query($sql);
    
    while($row=$stmt->fetch()){
        $data[] = $row;
    }
    
    return $data;
 }
 
 
 
 
// 以下　管理者画面で使う関数


// 投入金額と選択商品のエラー関数
// function buyer_inputcheck(){
//     $post_err = [];
//     global $regexp_price;
    
//     if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
        
//         // 投入金額が入力されていない
//         if(!$_POST['money']){
//             print '<p>投入金額を入力してください</p>';
//             $post_err[] = '投入金額を入力してください';
//         }else if(!preg_match($regexp_price,$_POST['money'])){
//             // 投入金額が正規表現外
//             print  "<p>投入金額は半角数字を入力してください</p>";
//             $post_err[] = "投入金額は半角数字を入力してください";
//         }else if($_POST['money'] > 10000){
//             // 投入金額が１万以上
//             print "<p>投入金額は1万円以下にしてください</p>";
//             $post_err[] = "投入金額は1万円以下にしてください";
//         }
        
//         // 購入商品が選択されていないときのエラー
//         if(!$_POST['id']){
//             print '<p>購入する商品を選択してください</p>';
//             $post_err[] = '購入する商品を選択してください';
//         }
    
//         return $post_err;
//     }
// }

// // 商品削除関数
function delete_iteminfo($pdo){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['delete'])){
            // id取得
            $id = $_POST['id'];
            // トランザクション開始
            $pdo->beginTransaction();
            $sql = "DELETE FROM item_info_table WHERE id= $id";
            var_dump($sql);
            $stmt=$pdo->query($sql);
             //コミット
            $pdo->commit();
        }
    
    }
    
}

// // カートの商品情報取得関数
// function cart_iteminfo($pdo){
//     // トランザクション開始
//     $pdo->beginTransaction();
        
//         // 現在時刻を取得
//         $date = date('Y-m-d H:i:s');
        
//         // id取得
//         $id = $_POST['drink_id'];
        
//         // // トランザクション開始
//         // $pdo->beginTransaction();
        
//         // カートに入れた商品情報取得のためのクエリ
//         $sql = "SELECT item_info_table.id,name,img,price,stock,status FROM item_info_table JOIN item_stock_table ON item_info_table.id = item_stock_table.id WHERE item_info_table.id = '$id'";
        
//         $stmt=$pdo->query($sql);
        
//         // 結果を一行取り出す
//         while($row=$stmt->fetch()){
            
//             // カートに入れたアイテム名取得
//             $item_name = htmlspecialchars($row['name']);
                
//             // カートに入れたアイテムのステータス取得　修正箇所　12/2/'21
//             $status = htmlspecialchars($row['status']);
                
//             // カートに入れたアイテムのstock取得　修正箇所　12/2/'21
//             $stock = htmlspecialchars($row['stock']);
                
//             // カートに入れた商品画像取得　修正箇所　12/2/'21
//             $image = $row['img'];
                
//             // カートに入れた商品価格取得　修正箇所　12/2/'21
//             $price = $row['price'];
            
//         }
                
//                
//  }
//            


// ユーザー名　パスワード　入力チェック
function userinfo_input_charcheck($pdo){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        global $regexp_user;
        global $input_err;
     
        
        if(isset($_POST['user_name']) && isset($_POST['passwd'])){
            if($_POST['user_name'] === ""){
                //   値段が空白
                $input_err[] = "ユーザー名を入力してください<br>";
                
            }else{
                
               if(!preg_match($regexp_user,$_POST['user_name'])){
                   //   値段が空白ではないが半角数字ではない
                   $input_err[] = "ユーザー名は半角数字6文字以上で入力してください<br>";
               }
            }
               
            if($_POST['passwd'] === ""){
                //   値段が空白
                $input_err[] = "パスワードを入力してください<br>";
                
            }else{
                
               if(!preg_match($regexp_user,$_POST['passwd'])){
                   //   値段が空白ではないが半角数字ではない
                   $input_err[] = "パスワードは半角数字6文字以上で入力してください<br>";
               }
            }
        }
        return $input_err;
    }     
}

// 重複したユーザー名があるかどうか調べる関数
function check_same_user ($pdo){
    global $data;
    $register_err = [];
    $username = '';
    $username = get_post_data('user_name');
    
    $sql = "SELECT * FROM user_info_table WHERE user_name = '$username' ";
    $data = get_as_array($pdo,$sql);
    if(!empty($data)){
        $register_err[] = 'このユーザー名はすでに登録されているため、登録できません<br>';
    }
    
    return $register_err;
}

// ユーザー登録関数
function user_register($input_err,$register_err,$pdo){
    global $date;
    $new_user = '';
    $new_pass = '';
     // 上記2つの関数でエラーがない場合
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(count($input_err) === 0 && count($register_err) === 0){
            try{
                
                $new_user = get_post_data('user_name');
                $new_pass = get_post_data('passwd');
                    
                   
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    
                // トランザクション開始
                $pdo->beginTransaction();
                    
                //   user_info表に行追加
                $query_detail = "INSERT INTO user_info_table (user_name,password,created_date,updated_date) VALUES(?,?,?,?)";
                $stmt=$pdo->prepare($query_detail);
                    
                    
                // バインド　以下sqlインジェクション対策
                $stmt->bindValue(1,$new_user);
                $stmt->bindValue(2,$new_pass);
                $stmt->bindValue(3,$date);
                $stmt->bindValue(4,$date);
                
                $stmt->execute();
                    
                    
                //コミット
                $pdo->commit();
                    
                print '登録完了しました';
                
                
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
            foreach($input_err as $go){
                print $go;
            }
            foreach($register_err as $go){
                print $go;
            }
        }
    }
}


 
