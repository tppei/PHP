<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <title>ログイン</title>
   <link type="text/css" rel="stylesheet" href="./css/common.css">
</head>
<body>
   <header>
    <div class="header-box">
      <a href="./ec_login.php">
        <img class="logo" src="./image/logo.png" alt="CodeSHOP">
      </a>
      <a href="./cart.php" class="cart"></a>
    </div>
  </header>
   <div class="content">
    <div class="login">
      <form action="ec_login_action.php" method="post">
         <div><input type="text" id="user_name" name="user_name" placeholder = "ユーザー名" value="<?php print $user_name; ?>"></div>
         <div><input type="password" id="passwd" name="passwd" placeholder = "パスワード" value=""></div>
         <div><input type="submit" value="ログイン"></div>
      </form>
      <div class="account-create">
        <a href="./ec_userregister.php">ユーザーの新規作成</a>
      </div>
    </div>
   </div>
<?php if ($login_err_flag === TRUE) { ?>
   <p>メールアドレス又はパスワードが違います</p>
<?php } ?>
</body>
</html>

<!--http://3.92.6.149:8000/htdocs/php25/ec_login_action.php-->
<!--http://3.92.6.149:8000/php25/ec_login.php-->