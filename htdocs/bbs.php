<?php
$filename = "./bbs.txt";
$comment = "";
$name = "";
$date = date('Y-m-d H:i:s');

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
            
    if($comment && $name){
        $hatugen = $name.":"."\t".$comment."\t".'-'.$date."\n";
        $fp = fopen($filename,'a');
            if($fp){
                if(!fwrite($fp,$hatugen)){
                print 'ファイル書き込み失敗: ';
                }
            fclose($fp);
            }
    }
        
$data =[];

    if(is_readable($filename)){
        $fp = fopen($filename,"r");
        if($fp){
            while(($tmp=fgets($fp))){
              $data[] = htmlspecialchars($tmp,ENT_QUOTES,"UTF-8");  
            }
            fclose($fp);
        }
    }
?>

<!DOCTYPE html>
<html lang='ja'>
    <head>
        <meta charset="UTF-8">
        <title>ひとこと掲示板サイト</title>
    </head>
    <body>
        <h1>ひとこと掲示板</h1>
        <form method="post">
            <label for="name">名前：<input type="text" name="name"></label>
            <label for="hitokoto">ひとこと：<input type="text" name="hitokoto"></label>
            <input type="submit" value="送信">
        </form>
        <?php 
            foreach ($data as $go) {
            print "<p>"."・".$go."</p>" ; 
         }
         ?>
    </body>
</html>