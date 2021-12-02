<?php
// DB接続

function get_db_connect(){
    
     // コネクション取得
    if (!$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME)) {
        die('error: ' . mysqli_connect_error());
    }
    
    // 文字コードセット
    mysqli_set_charset($link, DB_CHARACTER_SET);
 
    return $link;
}

// 書き込みを読み込む
function get_bbs($link){
    
    // sql生成
    $sql = 'SELECT * FROM bbs_table';
    
    // sqlを実行するget_as_array関数へ引き渡し
    return get_as_array($link, $sql);
}


// クエリを実行しその結果を取得する関数
function get_as_array($link, $sql) {
    
    // 返却配列
    $data = [];
    
    // クエリを実行する
    if ($result = mysqli_query($link, $sql)){
        
        if(mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_array($result)){
                $data[] = $row;
            }
        }
        
        // 結果セットを開放
        mysqli_free_result($result);
    }
    return $data;
}

// form情報を受け取る関数
function post_bbs(){
    
     if ($_SERVER['REQUEST_METHOD'] === 'POST'){
         
         $name = '';
         $comment = '';
         
         if(isset($_POST['name'])){
            if(mb_strlen($_POST['name']) <= 20 && mb_strlen($_POST['name']) != 0){
                $name = $_POST['name'];
            }else if(mb_strlen($_POST['name']) > 20){
                $error_name = "!!名前は文字数を20文字以下にしてください!!"."\n";
                print $error_name;
            }else if(mb_strlen($_POST['name']) === 0){
                $error_noname ="!!名前を入力してください!!"."\n";
                print $error_noname;
            }
        }
        
        if(isset($_POST['hitokoto'])){
            if(mb_strlen($_POST['hitokoto']) <= 100 && mb_strlen($_POST['hitokoto']) != 0){
                $comment = $_POST['hitokoto'];
            }else if(mb_strlen($_POST['hitokoto']) > 100 ){
                $error_comment = "!!コメントは文字数を100文字以下にしてください!!"."\n";
                print $error_comment;
            }else if(mb_strlen($_POST['hitokoto']) === 0){
                $error_nocomment = "!!コメントを入力してください!!"."\n";
                print $error_nocomment;
            }
        }
        
        if($name !== '' && $comment !== ''){
            return update_bbs($name,$comment);
        } 
        
    }
    
    
}

// クエリを実行して書き込みをdbに追加する関数
function update_bbs($name,$comment){
    global $link;
    if($comment && $name){
            $date = date('y/m/d H:i:s');
            
        
            $query = "INSERT INTO bbs_table(name,comment,time) VALUES('$name', '$comment','$date')";
      
        if (mysqli_query($link, $query) === TRUE){
            print '成功';
        } else {
            print '失敗';
        }
    }
}
// DB切断

function close_db_connect($link){
    // 接続を閉じる
    mysqli_close($link);
}