<?php
$mail='';
$passwd='';
$regexp_mail  = '/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.]+$/';
$regexp_passwd = '/[a-zA-Z0-9]{6,18}/';
$mail_false ='';
$passwd_false ='';
$action ='';

if(isset($_POST['mail']) && isset($_POST['passwd'])){
    $mail = $_POST['mail'];
    $passwd = $_POST['passwd'];
    
    if(!preg_match($regexp_mail, $mail) && preg_match($regexp_passwd, $passwd)){
        $mail_false = 'メールアドレスの形式が正しくありません';
    }else if(!preg_match($regexp_passwd, $passwd) && preg_match($regexp_mail, $mail)){
        $passwd_false = 'パスワードは半角英数字記号6文字以上18文字以下で入力してください';
    }else if (preg_match($regexp_mail, $mail) && preg_match($regexp_passwd, $passwd)){
        header("location:receive.php");
    }else{
        $mail_false = 'メールアドレスの形式が正しくありません';
        $passwd_false = 'パスワードは半角英数字記号6文字以上18文字以下で入力してください';
    }
}

// header("location:receive.php")

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method='post' <?php print $action ?>>
            <p>ログイン</p>
            <input type='text' name='mail'>
            <p>パスワード</p>
            <input type="text" name="passwd"/>
            <p><input type="submit"></p>
        </form>
        <?php
        print $mail_false;
        print $passwd_false;
        ?>
    </body>
</html>