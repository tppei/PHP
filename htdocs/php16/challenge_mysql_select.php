<pre>
<?php
$empdata =[];
$host = 'localhost';
$username = 'codecamp49497';
$passwd = 'codecamp49497';
$dbname = 'codecamp49497';
$pulldown = "全員";
$link = mysqli_connect($host,$username,$passwd,$dbname);
if(isset($_POST['hyuuga'])){
    $pulldown = $_POST['hyuuga'];
}
if($link){
    mysqli_set_charset($link,'utf8');
    if($pulldown === "全員"){
    $query = 'SELECT * FROM emp_table';
    $result = mysqli_query($link,$query);
        while ($row = mysqli_fetch_array($result)){
           $goodsdata[] = $row;
        }
    }else if($pulldown === "マネージャー"){
    $query = 'SELECT * FROM emp_table WHERE job = "manager"';
    $result = mysqli_query($link,$query);
        while ($row = mysqli_fetch_array($result)){
           $goodsdata[] = $row;
        }
    }else if($pulldown === "アナリスト"){
    $query = 'SELECT * FROM emp_table WHERE job = "analyst"';
    $result = mysqli_query($link,$query);
        while ($row = mysqli_fetch_array($result)){
           $goodsdata[] = $row;
        }
    }else{
    $query = 'SELECT * FROM emp_table WHERE job = "clerk"';
    $result = mysqli_query($link,$query);
        while ($row = mysqli_fetch_array($result)){
           $goodsdata[] = $row;
        }
    }
    mysqli_free_result($result);
    mysqli_close($link);
    
}else{
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
   <h1>表示する職種を選択してください。</h1>
   <form method='post'>
       <select name='hyuuga'>
           <option value="全員">全員</option>
           <option value="マネージャー">マネージャー</option>
           <option value="アナリスト">アナリスト</option>
           <option value="一般職">一般職</option>
       </select>
       <input type='submit' value="表示">
   </form>
   <table>
       <tr>
           <th>社員番号</th>
           <th>名前</th>
           <th>職種</th>
           <th>年齢</th>
       </tr>
<?php
foreach ($goodsdata as $value) {
?>
       <tr>
           <td><?php print htmlspecialchars($value['emp_id'], ENT_QUOTES, 'UTF-8'); ?></td>
           <td><?php print htmlspecialchars($value['emp_name'], ENT_QUOTES, 'UTF-8'); ?></td>
           <td><?php print htmlspecialchars($value['job'], ENT_QUOTES, 'UTF-8'); ?></td>
           <td><?php print htmlspecialchars($value['age'], ENT_QUOTES, 'UTF-8'); ?></td>
       </tr>
<?php
}
?>
   </table>
</body>
</html>