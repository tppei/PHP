<?php
//変数初期化
$name='';
$price='0';
$result='';
$drink_data=[];
$error_msg=[];

    if((isset($_POST['name']))===true){
        $name=$_POST['name'];
        $name=htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    }else if(empty($_POST['name'])){
        $error_msg[]='商品名は必須項目です。';
    }

    if(isset($_POST['price'])){
        $price=$_POST['price'];
        $price=htmlspecialchars($price, ENT_QUOTES, 'UTF-8');
    }

    if(empty($_POST['price'])){
        $error_msg[]='値段は必須項目です。';
    }else if(!preg_match('/^(0|[1-9]\d*)$/', $price)){
        $error_msg[]='値段は0以上の整数を入力してください。';
    }


$host = 'localhost:8889'; // データベースのホスト名又はIPアドレス
$username = 'root';  // MySQLのユーザ名
$passwd   = 'root';    // MySQLのパスワード
$dbname   = 'dk_db';    // データベース名

try {
    // MySQLへの接続
    $pdo = new PDO('mysql:host=localhost:8889;dbname=dk_db;charset=utf8;', $username, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //トランザクション開始
    $pdo->beginTransaction();
    
    //クエリを作成
        $query_drink = "INSERT INTO dk_table(dk_name, dk_price) VALUES(?,?)";
        $stmt=$pdo->prepare($query_drink);
        //バインド　以下SQLインジェクション対策
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $price);
        $stmt->execute(); 
    
    
    //コミット
    $pdo->commit();
    
    $query = "SELECT * FROM dk_table";
    // クエリを実行します
    $stmt=$pdo->query($query);
    // 1行ずつ結果を配列で取得します
    while($row=$stmt->fetch()){
        $drink_data[] = $row;
   }
   
}catch(PDOException $e){
    
    if(isset($pdo)===true && $pdo->inTransaction()===true){
        //ロールバック
        $pdo->rollBack();
    }
    
    //エラー情報の表示
    $code=$e->getCode();
    $message=$e->getMessage();
    print("{$code}/{$message}<br>");
    die();
}

// 接続を閉じる
$pdo=null;
?>


<!DOCTYPE HTML>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <title>自動販売機管理ツール</title>
   <style>
       /*ここにcssをかく*/
       table,tr,th,td{
           border: 4px solid #d2b48c;
           border-collapse: collapse;
           background-color: #fffacd;
           
       }
       
       #status{
           width: 200px;
           margin-top: 25px;
       }
       
       #submit{
           display: inline-block;
           width: 200px;
           height: 50px;
           background-color: skyblue;
           color: blue;
           font-size: 24px;
           border: none;
           border-radius: 10px;
           margin-top: 25px;
       }
   </style>
</head>
<body>
    <h1 style="color: skyblue;">自動販売機管理ツール</h1>
    <hr>
    <h2 style="color: blue;">新規商品追加</h2>
    
    <!--バリデーション結果-->
    <ul>
        <?php foreach ($error_msg as $msg){ ?>
        <li><?php echo $msg ?></li>
        <?php } ?>
    </ul>
    
    <form action="injection.php" method="post" enctype="multipart/form-data">
        名前:
        <input type="text" name="name" id="name" size="30"><br>
        値段:
        <input type="text" name="price" id="price" size="30"><br>
        
        <button type="submit" id="submit">商品追加</button>
    </form>
    
<h2 style="color: blue;">商品情報変更</h2>
<table>
       <tr>
           <th>商品名</th>
           <th>値段</th>
       </tr>
       
<?php
foreach ($drink_data as $value) {
    
?>
       <tr>
           <td><?php print($value['dk_name']); ?></td>
           <td><?php print($value['dk_price']); ?>円</td>
       </tr>
<?php
}
?>
   </table>
</body>
</html>
