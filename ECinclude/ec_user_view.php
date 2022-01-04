<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ユーザー登録</title>
        <link type="text/css" rel="stylesheet" href="./css/common.css">
    </head>
    <body>
        <header>
            <div class="header-box">
              <a href="./ec_login.php">
                <img class="logo" src="./image/logo.png" alt="CodeSHOP">
              </a>
            </div>
        </header>
        
        <div class = "content">
            <div class = 'register'>
                <form action='ec_userregister.php'method='post'>
                   <div><label for="user_name">ユーザー名:</label>
                   <input type="text" name="user_name" id='user_name'></div>
                   <div><label for='passwd'>パスワード:</label>
                   <input type='text' name='passwd' id ='passwd'></div>
                   <div><input type="submit" value="■□■□■登録■□■□■"></div>
                </form>
                <div class="login-link"><a href="./ec_login.php">ログインページに移動する</a></div>
            </div>
       
          
        </div>
    </body>
</html>