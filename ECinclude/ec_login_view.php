<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <title>ログイン</title>
   <style>
       input {
           display: block;
           margin-bottom: 10px;
       }
   </style>
</head>
<body>
   <form action="ec_login_action.php" method="post">
       <label for="user_name">メールアドレス</label>
       <input type="text" id="user_name" name="user_name" value="<?php print $user_name; ?>">
       <label for="passwd">パスワード</label>
       <input type="password" id="passwd" name="passwd" value="">
       <input type="submit" value="ログイン">
   </form>
<?php if ($login_err_flag === TRUE) { ?>
   <p>メールアドレス又はパスワードが違います</p>
<?php } ?>
</body>
</html>

<!--http://3.92.6.149:8000/htdocs/php25/ec_login_action.php-->
<!--http://3.92.6.149:8000/php25/ec_login.php-->