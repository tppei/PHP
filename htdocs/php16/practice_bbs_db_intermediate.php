<?php
$comment = "";
$name = "";
$date = date('y/m/d H:i:s');
$data =[];

$host = 'localhost';
$username = 'codecamp49497';
$passwd = 'codecamp49497';
$dbname = 'codecamp49497';
$link = mysqli_connect($host,$username,$passwd,$dbname);

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
         
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
    }
    
    if ($link) {
  // 文字化け防止
        mysqli_set_charset($link, 'utf8'); 
        if($comment && $name){
        // $hatugen = '名前:'.$name."\t".'コメント:'.$comment."\t".'日時:'.$date."\n";
            $query = "INSERT INTO bbs_table(name,comment,time) VALUES('$name', '$comment','$date')";
        // $fp = fopen($filename,'a');
        //     if($fp){
        //         if(!fwrite($fp,$hatugen)){
        //         print 'ファイル書き込み失敗: ';
        //         }
        //     fclose($fp);
        //     }
            if (mysqli_query($link, $query) === TRUE){
            print '成功';
          } else {
            print '失敗';
          }
    }
     $query2 = 'SELECT * FROM bbs_table';
     $result2 = mysqli_query($link,$query2);
        while ($row = mysqli_fetch_array($result2)){
          $data[] = $row;
        }
}


    // if(is_readable($filename)){
        // $fp = fopen($filename,"r");
        // if($fp){
        //     while(($tmp=fgets($fp))){
        //       $data[] = htmlspecialchars($tmp,ENT_QUOTES,"UTF-8");  
        //     }
        //     fclose($fp);
        // }
    // }
?>

<!DOCTYPE html>
<html lang='ja'>
    <head>
        <meta charset="UTF-8">
        <title>ひとこと掲示板サイト</title>
        <style type="text/css">
        td{
            border-bottom: 1px solid #fff;
        }
    </style>
    </head>
    <body>
        <form method="post">
            <label for="name">名前：<input type="text" name="name"></label>
            <label for="hitokoto">発言：<input type="text" name="hitokoto"></label>
            <input type="submit" value="投稿">
        </form>
        <p>発言</p>
<?php 
    foreach ($data as $go) {
?>
        
        <tr>
           <td><?php print htmlspecialchars($go['name'], ENT_QUOTES, 'UTF-8'); ?></td>
           <td><?php print htmlspecialchars($go['comment'], ENT_QUOTES, 'UTF-8'); ?></td>
           <td><?php print htmlspecialchars($go['time'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
        
<?php
}
?>
         
    </body>
</html>