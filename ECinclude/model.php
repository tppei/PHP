<?php

// ぺージ共通関数
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
    
    // 配列を空にする
    $data = [];
 
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

// 空白チェック関数
function input_blank_check($subject){
    global $input_err;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST[$subject])){
            if($_POST[$subject] === ""){
                if($subject === 'new_name'){
                    $input_err[] = "名前を入力してください<br>";
                }else if($subject === 'new_price'){
                    $input_err[] = "値段を入力してください<br>";
                }else if($subject === 'new_stock'){
                    $input_err[] = "個数を入力してください<br>";
                }else if($subject === 'user_name'){
                    $input_err[] = "ユーザー名を入力してください<br>";
                }else if($subject === 'passwd'){
                    $input_err[] = "パスワードを入力してください<br>";
                }
            }
        }
    }
    return $input_err;
}
 
// 文字入力半角数字正規表現チェック関数
function input_charnumcheck($subject){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        global $regexp_price;
        global $regexp_file;
        global $input_err;
        if(isset($_POST[$subject])){
            // 空白だった場合に以下のエラーを表示させない
            if($_POST[$subject] !== ""){
                if(!preg_match($regexp_price,$_POST[$subject])){
                    if($subject === 'new_price'){
                        //   値段が半角数字ではない
                        $input_err[] = "値段は半角数字を入力してください<br>";
                    }else if($subject === 'new_stock' || $subject === 'select_amount' || $subject === 'updated_stock' || $subject === 'update_stock'){
                        //   個数が半角数字ではない
                        $input_err[] = "個数は半角数字を入力してください<br>";
                    }
                }else if($subject === 'new_price' && $_POST[$subject] > 10000){
                    //   値段が半角で１万より上
                    $input_err[] = "値段は1万円以下にして下さい<br>";
                }else{
                       
                }
            }
        }
        return $input_err;
    }
}

// 文字入力半角英数字6字以上正規表現チェック関数
function input_charcheck($subject){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        global $regexp_user;
        global $input_err;
        if(isset($_POST[$subject])){
             // 空白だった場合に以下のエラーを表示させない
            if($_POST[$subject] !== ""){
                if(!preg_match($regexp_user,$_POST[$subject])){
                    if($subject === 'user_name'){
                        $input_err[] = "ユーザー名は半角英数字6文字以上で入力してください<br>";
                    }else if($subject === 'passwd'){
                        $input_err[] = "パスワードは半角英数字6文字以上で入力してください<br>";
                    }
                }else{
                    
                }
            }
        }
        return $input_err;
    }
}


               
// 画像ファイルエラー関数
function file_check(){
    global $input_err;
    global $regexp_file;
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_FILES['new_img']['name'])){
            if(empty($_FILES['new_img']['name'])){
                //   ファイル名が空白
                $input_err[] = "ファイルを選択してください<br>";
            }else{
                // ファイル形式が異なる
                if(!preg_match($regexp_file,$_FILES['new_img']['name'])){
                    $input_err[] = "ファイル形式が異なります。画像ファイルはJPEG又はPNGのみ利用可能です。<br>";
                }
            }
        }
        return  $input_err;
    }
}       
               
// エラー表示関数
function err_display($input_err){
    foreach($input_err as $go){
        print $go;
    }
} 

// db接続関数
function get_db_connect() {
            $username = 'codecamp49497';
            $passwd = 'codecamp49497';
        try{
            // pdoによるMYSQLへの接続
            $pdo = new PDO('mysql:host=localhost;dbname=codecamp49497;charset=utf8;',$username,$passwd);
            //例外をスロ-
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

// 管理者ブラウザに表示する表の作成
 function table_display($pdo){
    $data_array =[];
    // 表作成のためのカラム取得
    $sql = "SELECT item_info_table.id,name,img,price,stock,status FROM item_info_table JOIN item_stock_table ON item_info_table.id = item_stock_table.item_id";
    $stmt=$pdo->query($sql);
    
    while($row=$stmt->fetch()){
        $data_array[] = $row;
    }
    
    return $data_array;
 }
 
 function user_table($pdo,$sql){
     $data =[];
     $stmt=$pdo->query($sql);
     while($row=$stmt->fetch()){
        $data[] = $row;
    }
    
    return $data;
 }
 


// 以下ec_itemtegisterで使用する関数
// 商品情報追加関数           
function detail_insert($pdo,$input_err){
        // 変数初期化
        global $date;
        $err_msg = [];
        $data_array =[];
        $new_name = "";
        $new_price = 0;
        $filename = "";
        $new_status =0;
        $new_stock = 0;
        $uploader = "./image/";
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // 商品名、値段、画像、ステータス、数の情報をpostで受け取った場合
            if(isset($_POST['new_name']) && isset($_POST['new_price']) && isset($_POST['new_status']) && isset($_POST['new_stock'])){
                // 入力でエラーがない場合
                if(count($input_err) === 0){
                    // 変数に取得情報を代入
                    $new_name = get_post_data('new_name');
                    $new_price = get_post_data('new_price');
                    $new_status = get_post_data('new_status');
                    $new_stock = get_post_data('new_stock');
                    
                    // 画像ファイルの保存
                    if(isset($_FILES['new_img']['name'])){
                    //  保存先のパスとブラウザ上に一時保存された画像名を結合
                      $upload = $uploader . basename($_FILES['new_img']['name']);
                    //   var_dump($upload);
                    
                    //   アップロードされた画像をファイルに保存
                      if(move_uploaded_file($_FILES['new_img']['tmp_name'],$upload) !== TRUE){
                          $err_msg[] = '保存失敗';
                      };
                       
                    //   変数に画像名を代入
                      $filename = basename($_FILES['new_img']['name']);
                    }
                    
                    
                        
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
                        
                        
                        // 表作成のためのカラム取得
                        $sql = "SELECT id FROM item_info_table WHERE created_date = (SELECT MAX(created_date) FROM item_info_table)";
                
                        $stmt=$pdo->query($sql);
            
                        while($row=$stmt->fetch()){
                            $data_array[] = $row;
                        }
                        
                        $item_id = $data_array[0]['id'];
                        
                        //   在庫表に行追加
                        $query_stock = "INSERT INTO item_stock_table (stock,created_date,updated_date,item_id) VALUES(?,?,?,?)";
                        $stmt=$pdo->prepare($query_stock);
                        
                        // バインド　以下sqlインジェクション対策
                        $stmt->bindValue(1,$new_stock);
                        $stmt->bindValue(2,$date);
                        $stmt->bindValue(3,$date);
                        $stmt->bindValue(4,$item_id);
                        $stmt->execute();
                        
                }else{
                //   入力エラーある場合エラー内容を表示
                       err_display($input_err);
                }
            }
        }
}
           



 
//  在庫数変更関数
function stock_change($pdo,$input_err){
    global $date;
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        // 在庫数変更
        if(isset($_POST['update_stock']) && isset($_POST['id'])){
            if(count($input_err) === 0){
                // 在庫数変更をデータベースに保存 
                
                $update_stock = $_POST['update_stock'];
                // 確認用
                // var_dump($update_stock);
                
                $update_drinkid = $_POST['id'];
                
                // 在庫数変更クエリ
                $query = "UPDATE item_stock_table SET stock = $update_stock WHERE item_id = $update_drinkid";
                // 確認用
                // return var_dump($query);
                                
                // クエリを実行します
                $stmt=$pdo->query($query);
                
                $query = "UPDATE item_stock_table SET updated_date = '$date' WHERE item_id = $update_drinkid";
                $stmt=$pdo->query($query);
                
                print "在庫数変更完了";
        
            }else{
                err_display($input_err);
            }
        }
    }
}

// ステータス変更関数
function status_change($pdo){
    global $date;
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        // ステータス変更
        if(isset($_POST["change_status"])){
            // 現在の公開ステータス
            $prestatus = $_POST["change_status"];
            // var_dump($prestatus);            
            // 現在のステータスが0ならば、変更後は１　そうでないなら変更後は0
            if($prestatus === '0'){
                $poststatus = '1';
            }else{
                $poststatus = '0';
            }
            
            // id取得
            $update_drinkid = $_POST['id'];

            // ステータス変更クエリ
            $status_query = "UPDATE item_info_table SET status = '$poststatus' WHERE id = $update_drinkid";
            
            // クエリを実行します
            $stmt=$pdo->query($status_query);
            
            // updated_date更新クエリ
            $update_date_query = "UPDATE item_info_table SET updated_date = '$date'";
            
            // クエリを実行
            $stmt=$pdo->query($update_date_query);
            
            print "ステータス変更完了";
        }
    }
}
 


// 登録商品削除関数
function delete_iteminfo($pdo){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['delete'])){
            // id取得
            $id = $_POST['id'];
            
            // 登録商品テーブル
            $sql = "DELETE FROM item_info_table WHERE id= $id";
            $stmt=$pdo->query($sql);
            
            print "削除完了";
        }
    
    }
    
}


// 以下ec_userregister内で使用する関数
// 登録するユーザー名が既存かどうか調べる関数
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
     
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // 上記2つの関数()でエラーがない場合
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
            err_display($input_err);
            foreach($register_err as $go){
                print $go;
            }
        }
    }
}


// 以下ec_cart.php内で使用する関数
// カート商品追加関数
function cart_adding ($pdo,$item_id,$user_id){
    global $date;
    $query = '';
    $sql = '';
    $add_sql = "";
    $amount_select_sql = "";
    $amount = 0;
    $stock_get = "";
    $stock = 0;
    $data = "";
    if(isset($_POST['additem_id'])){
        // カートに追加する商品がすでにカート内にあるか確かめるクエリ
        $sql = "SELECT item_id FROM cart_table WHERE item_id = $item_id";
            // 上のクエリで取得できなかった場合
            if(empty(get_as_array($pdo,$sql))){
                   
                    // カートテーブルに商品情報追加
                    $query = "INSERT INTO cart_table(user_id,item_id,amount,created_date,updated_date) VALUES(?,?,?,?,?)";
                    
                    $stmt=$pdo->prepare($query);
                    
                    // バインド　以下sqlインジェクション対策
                    $stmt->bindValue(1,$user_id);
                    $stmt->bindValue(2,$item_id);
                    $stmt->bindValue(3,1);
                    $stmt->bindValue(4,$date);
                    $stmt->bindValue(5,$date);
                    $stmt->execute();
                    print 'カートにいれました';
            
            // 上のクエリで取得できた場合
            }else{ 
                 
                    
                    //  カートテーブルからカート内の個数を取得
                     $amount_select_sql = "SELECT amount FROM cart_table WHERE item_id = $item_id";
                     $data = get_as_array($pdo,$amount_select_sql);
                     
                     $amount = $data[0]['amount'];   //  cartから取り出した量
                     $amount = ++$amount;   //  カート内の個数+1
                     
                     // 在庫数確認
                     $stock_get = "SELECT stock FROM item_stock_table WHERE item_id = $item_id";
                     $stock = get_as_array($pdo,$stock_get);
                     $stock = $stock[0]['stock'];
                     
                     if($stock - $amount >= 0){
                         
                         $add_sql = "UPDATE cart_table SET amount = $amount WHERE item_id = $item_id";
                         $stmt=$pdo->query($add_sql);
                         
                         $update_date_query = "UPDATE cart_table SET updated_date = '$date' WHERE item_id = $item_id";
                         $stmt=$pdo->query($update_date_query);
                         
                         print 'カートに入れました';
                     }else{
                         print "在庫がありません";
                     }
            }
    }   
}

// カート内数量変更関数
function cart_amount_change($pdo,$input_err){
    $sql ="";
    $amount =0;
    $item_id =0;
    $stock = "";
    $purchase = "";
    global $date;
    
    if(count($input_err) === 0){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['select_amount']) && isset($_POST['item_id'])){
                
                // 入力された数量と商品のidを取得
                $amount = $_POST['select_amount'];
                $item_id = $_POST['item_id'];
                
                 
                // 在庫数確認
                $stock_get = "SELECT stock FROM item_stock_table WHERE item_id = $item_id";
                $stock = get_as_array($pdo,$stock_get);
                $stock = $stock[0]['stock'];
                
                // 変更後数が在庫数を超えていなかった場合
                if($amount <= $stock){
                    // 入力された数量に更新
                    $sql = "UPDATE cart_table SET amount = $amount WHERE item_id = $item_id";
                    $stmt=$pdo->query($sql);
                    
                    $update_date_query = "UPDATE cart_table SET updated_date = '$date' WHERE item_id = $item_id";
                    $stmt=$pdo->query($update_date_query);
                    
                    print '数量変更完了';
                }else{
                    print "更新失敗";
                }
            }
        }
    }else{
        err_display($input_err);
    }
}

// 購入完了関数 
function complete_shopping($pdo,$array,$user_id){
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(!empty($array)){
       
            try{
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                // トランザクション開始
                $pdo->beginTransaction();
                
                // 在庫数変更クエリ
                $sql = "UPDATE item_stock_table,cart_table SET stock = stock - amount WHERE item_stock_table.item_id = cart_table.item_id AND cart_table.user_id = $user_id";
                $stmt=$pdo->query($sql);
                
                // カート情報削除クエリ
                $sql = "DELETE FROM cart_table WHERE $user_id";
                $stmt=$pdo->query($sql);
                
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
            print '商品がありません';
        }
    }
    
}

// // カート内商品削除関数
function delete_cartiteminfo($pdo){
        $item_id = 0;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['delete'])){
                // id取得
                $item_id = get_post_data('item_id');
                // カートテーブル
                $sql = "DELETE FROM cart_table WHERE item_id= $item_id";
                // var_dump($sql);
                
                $stmt=$pdo->query($sql);
                
            }
        }
    
}
