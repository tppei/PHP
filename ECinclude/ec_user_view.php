<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>会員登録</title>
        <style>
           
        </style>
    </head>
    <body>
       <form action='ec_userregister.php'method='post'>
           <label for="user_name">ユーザー名</label>
           <input type="text" name="user_name" id='user_name'>
           <label for='passwd'>パスワード</label>
           <input type='text' name='passwd' id ='passwd'>
           <input type="submit" value="■□■□■登録■□■□■">
       </form>
       
   <form action="ec_logout.php" method="post">
       <input type="submit" value="ログアウト">
   </form>
    </body>
</html>