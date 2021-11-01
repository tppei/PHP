

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>yehhhhhhh!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!</title>
        
    </head>
    <body>
       <p>以下にファイルから読み込んだ住所データを表示</p>
       <p>住所データ</p>
     <?php
$filename = './zip_data_split_2.csv';

print "<table border='1'>
        <tr border='1'>
            <th border='1'>郵便番号</th>
            <th border='1'>都道府県</th>
            <th border='1'>市区町村</th>
            <th border='1'>町域</th>
        </tr>";
        
if(is_readable($filename)){
    $fp = fopen($filename,'r');
    while($tmp = fgetcsv($fp)){
       print "<tr border='1'>";
        print "<td border='1'>" . $tmp[0] . "</td>";
        print "<td border='1'>" . $tmp[4] . "</td>";
        print "<td border='1'>" . $tmp[5] . "</td>";
        print "<td border='1'>" . $tmp[6] . "</td>";
    echo "</tr>";
    }
    print "</table>"; 
    print $tmp[0];
    fclose($fp);
}
?>
    </body>
    <style>
             td{
                 border: 1px solid #fff;
             }
             tr{
                 border: 1px solid #fff;
             }
             th{
                 border: 1px solid #fff;
             }
    </style>
</html>
