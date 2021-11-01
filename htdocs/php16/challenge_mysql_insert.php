<pre>
<?php
$goodsdata =[];
$host = 'localhost';
$username = 'codecamp49497';
$passwd = 'codecamp49497';
$dbname = 'codecamp49497';
$link = mysqli_connect($host,$username,$passwd,$dbname);
$goods_name ='';
$price = '';




if ($link) {
  // 文字化け防止
  mysqli_set_charset($link, 'utf8');
  if(isset($_POST['goods_name']) && isset($_POST['price'])){
    $goods_name = $_POST['goods_name'];
    $price = $_POST['price'];
    
    // $goods_nameに文字が入っているか調べる
    var_dump($goods_name);
    
    // インサートクエリ
    $query = "INSERT INTO goods_table(goods_name, price) VALUES('$goods_name', $price)";
    // このクエリはエラーとなる　$query = "INSERT INTO goods_table(goods_name, price) VALUES($goods_name, $price)";
    // 理由としては""を全体で書こうだけでは　my sqlにおいて変数$goods_nameの内容が文字列にならないため　クエリが実行さた時点でエラーになる。
    
    // クエリのコードが正しいか判断できるコード
    var_dump($query);
    
      if (mysqli_query($link, $query) === TRUE) {
        print '成功';
      } else {
        print '失敗';
      }
  }
    $query2 = 'SELECT goods_name,price FROM goods_table';
    $result2 = mysqli_query($link,$query2);
        while ($row = mysqli_fetch_array($result2)){
          $goodsdata[] = $row;
        }
  // 接続を閉じます
  mysqli_close($link);
  mysqli_free_result($result2);
// 接続失敗した場合
} else {
  print 'DB接続失敗';
}

?>

</pre>

<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <title>サンプル</title>
   <style type="text/css">
       table, td, th {
         border: solid black 1px;
        }
        table {
         width: 200px;
          
        }
   </style>
</head>
<body>
   <h1>追加したい商品の名前と価格を入力してください</h1>
   <form method='post'>
       <span>商品名：<input type="text" name="goods_name"></span>
       <span>価格：<input type="text" name="price"></span>
       <input type='submit' value="追加">
   </form>
   <table>
       <tr>
           <th>商品名</th>
           <th>価格</th>
       </tr>
<?php
  foreach ($goodsdata as $value) {
?>
       <tr>
           <td><?php print htmlspecialchars($value['goods_name'], ENT_QUOTES, 'UTF-8'); ?></td>
           <td><?php print htmlspecialchars($value['price'], ENT_QUOTES, 'UTF-8'); ?></td>
       </tr>
<?php
 }
?>
   </table>
</body>
</html>