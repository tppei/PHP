<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Cookie</title>
</head>
<body>
<?php


// 「現在日時」「前回アクセスした日時」「これまでアクセスした回数」を表示する
$now_date = date('Y-m-d H:i:s');
// cookieが設定されていなければ(初回アクセス)、cookieを設定する
if (! isset($_COOKIE['visit_count'])) {
    // cookieを設定
    setcookie('visit_count', 1);
    setcookie('visit_history', $now_date);
    print("初めてのアクセスです<br>");
    print("現在の日時は" . $now_date . "<br>");
}// cookieがすでに設定されていれば(2回目以降のアクセス)、cookieで設定した数値を加算する
else{
       
        if(isset($_POST['delete'])){
            // cookieを設定
            setcookie('visit_count', 1);
            setcookie('visit_history', $now_date);
            print('履歴を削除しました');
            print("現在の日時は" . $now_date . "<br>");
        }else{
            $count = $_COOKIE['visit_count'] + 1;
            $visit_history = $_COOKIE['visit_history'];
            setcookie('visit_count', $count);
            setcookie('visit_history', $now_date); //←追加
            print("訪問回数は" . $count . "回<br>");
            print("現在の日時は" . $now_date . "<br>");
            print("前回のアクセス日時は" . $visit_history . "<br>");
    
    }
   
   
}



?>

<form method = 'post'>
    <input type="submit" name="delete" value="履歴削除">
</form>
</body>
</html><html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Cookie</title>
</head>
<body>
<?php
$now = time();



// 「現在日時」「前回アクセスした日時」「これまでアクセスした回数」を表示する
$now_date = date('Y-m-d H:i:s');
// cookieが設定されていなければ(初回アクセス)、cookieを設定する
if (! isset($_COOKIE['visit_count'])) {
    // cookieを設定
    setcookie('visit_count', 1);
    setcookie('visit_history', $now_date);
    print("初めてのアクセスです<br>");
    print("現在の日時は" . $now_date . "<br>");
}// cookieがすでに設定されていれば(2回目以降のアクセス)、cookieで設定した数値を加算する
else{
       
        if(isset($_POST['delete'])){
            // cookieを設定
            setcookie('visit_count', 1);
            setcookie('visit_history', $now_date);
            print('履歴を削除しました');
            print("現在の日時は" . $now_date . "<br>");
        }else{
            $count = $_COOKIE['visit_count'] + 1;
            $visit_history = $_COOKIE['visit_history'];
            setcookie('visit_count', $count);
            setcookie('visit_history', $now_date); //←追加
            print("訪問回数は" . $count . "回<br>");
            print("現在の日時は" . $now_date . "<br>");
            print("前回のアクセス日時は" . $visit_history . "<br>");
    
    }
   
   
}



?>

<form method = 'post'>
    <input type="submit" name="delete" value="履歴削除">
</form>
</body>
</html>