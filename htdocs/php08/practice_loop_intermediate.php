
<table border="1">
<?php
for($r=1;$r<10;$r++){
    print "<tr>";
    for($l=1;$l<10;$l++){
        print "<td>".$l.'*'.$r."</td>";
    }
    print "</tr>";
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<style>
 td{
     border:1px solid #000;
 }
 tr{
     border:1px solid #000;
 }
</style>
<body>
</body>