{"filter":false,"title":"view.php","tooltip":"/include/view.php","undoManager":{"mark":2,"position":2,"stack":[[{"start":{"row":0,"column":0},"end":{"row":33,"column":7},"action":"insert","lines":["<!DOCTYPE html>","<html lang=\"ja\">","<head>","    <meta charset=\"UTF-8\">","    <title>商品一覧</title>","    <style type=\"text/css\">","        table, td, th {","            border: solid black 1px;","        }","        table {","            width: 200px;","        }","        caption {","            text-align: left;","        }","    </style>","</head>","<body>","    <table>","    <caption>商品一覧(税込み)</caption>","        <tr>","            <th>商品名</th>","            <th>価格</th>","        <tr>","<?php foreach ($goods_data as $value) { ?>","        <tr>","            <td><?php print $value['goods_name']; ?></td>","            <td><?php print $value['price']; ?></td>","        </tr>","<?php } ?>","    </table>"," ","</body>","</html>"],"id":1}],[{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"remove","lines":["1"],"id":2}],[{"start":{"row":7,"column":32},"end":{"row":7,"column":33},"action":"insert","lines":["3"],"id":3}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":7,"column":33},"end":{"row":7,"column":33},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1638160529482,"hash":"43ac610208e284857a003ca7ee4a6f5e97e02c37"}