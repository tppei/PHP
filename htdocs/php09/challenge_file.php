<?php
$filename = './challenge_log.txt';
$comment = "";
$date = date('m月d日 H:i:s');


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    if(isset($_POST['comment'])){
        $comment = $_POST['comment'];
    }
    $fp = fopen($filename,'a');
    if($fp){
        $result = fwrite($fp, $date . " " . $comment ."\n");
        
        if(!$result){
            print 'ファイル書き込み失敗：'.$filename;
        }
        
    fclose($fp);
    }
}

$work =[];

if(is_readable($filename)){
    print"\n";
    $fp = fopen($filename,'r');
    if($fp){
        print "\n";
        while(($tmp = fgets($fp)) !== false){
            print "\n";
            $work[] = htmlspecialchars($tmp,ENT_QUOTES,'UTF-8');
        }
        fclose($fp);
    }
    
}else{
    print "\n";
    $work[] = "ファイルがありません" ;
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ファイル操作</title>
    </head>
    <body>
        <h1>ファイル操作</h1>
        <form method="post" >
            <label><p>発言:<input type="text" name="comment">
            <input type="submit" value="送信"></p></label>
        </form>
        <p>発言一覧</p>
        <?php foreach ($work as $value){?>
        <p><?php print $value?></p>
        <?php } ?>
    </body>
</html>

