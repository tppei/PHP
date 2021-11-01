<?php
// 変数初期化
    $gender = '';
    if(isset($_POST['gender']) === TRUE){
        $gender = htmlspecialchars($_POST['gender'], ENT_QUOTES , 'UTF-8');
    }
    
    $myname = '';
    if(isset($_POST['my_name']) === TRUE){
        $myname = htmlspecialchars($_POST['my_name'], ENT_QUOTES , 'UTF-8');
    }
    
    $mail = '';
    if(isset($_POST['mail']) === TRUE){
        $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES , 'UTF-8');
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
       <meta charset="UTF-8">
       <title>スーパーグローバル変数使用例</title>
    </head>
    <body>
      <p> 
       ここに入力したお名前を表示:<?php print $myname ; ?>
    　</p>
       
       <?php if ($gender === 'man' || $gender === 'woman') { ?>
       <p>ここに選択した性別を表示:<?php print $gender; ?></p>
       <?php } ?>
       
       <?php if ($mail === 'OK') { ?>
       <p>ここにメールを受け取るかを表示:<?php print $mail; ?></p>
       <?php } ?>
        <h1>課題</h1>
        
        <form method = "post" >
            <label for="my_name">お名前：</label><input id="my_name" type="text" name="my_name" value=''>
            </br><label for="gender">性別：</label><input type="radio" name="gender" value="man" >男
            <input type="radio" name="gender" value="woman" ?>女
            </br><input type="checkbox" name="mail" value="OK" >お知らせメールを受け取る
            </br><input type="submit" value="送信">
        </form>
    </body>
</html>

