<?php
$host = 'localhost'; // データベースのホスト名
$username = 'codecamp49497';  // MySQLのユーザ名
$passwd   = 'codecamp49497';    // MySQLのパスワード
$dbname   = 'codecamp49497';    // データベース名

if($link =  mysqli_connect($host, $username, $passwd, $dbname)){
    
     // 文字コードセット
    mysqli_set_charset($link, 'UTF8');
    
     // 購入者画面に表示する表作成のためのカラム取得
     $sql = "SELECT drink_details.ドリンクid,ドリンク名,商品画像,価格,在庫数,公開ステータス FROM drink_details JOIN drink_stock_table ON drink_details.ドリンクid = drink_stock_table.ドリンクid";
     $result = mysqli_query($link,$sql);
     
    //  結果を一行ずつ取得
     while($row = mysqli_fetch_array($result)){
         $data[] = $row;
     }
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>自動販売機</title>
        <style>
            #flex{
                width: 600px;
            }
            
            #flex .drink{
                
                width: 120px;
                height: 210px;
                text-align: center;
                margin: 10px;
                float: left;
            }
            
            #flex span{
                display: block;
                margin: 3px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            
            .img_size{
                height: 125px;
            }
            
            .red{
                color: #F00;
            }
            
            #submit{
                clear: both;
            }
        </style>
    </head>
    <body>
        <h1>自動販売機</h1>
        <form action="result.php" method="post">
            <div>
                金額
                <input type="text" name="money">
            </div>
            
            <div id="flex">
                <!--アイテムが何も選択されなかった場合のラジオボタン-->
                <input type="radio" name="drink_id"value="" checked="checked" style="display:none;">
                
                <!--結果を取り出す-->
                <?php
                foreach($data as $go){
                ?>
                <?php
                if($go['公開ステータス'] === '1'){
                ?>
                <div class="drink">
                    <span class = 'img_size'>
                    <!--商品画像-->
                    <?php print '<img src= "./image/'.$go['商品画像'].'">'?>
                    </span>
                    <!--商品名-->
                    <span><?php print htmlspecialchars($go['ドリンク名'],ENT_QUOTES,'UTF-8')?></span>
                    <!--値段-->
                    <span><?php print htmlspecialchars($go['価格'],ENT_QUOTES,'UTF-8')?></span>
                    <?php
                    if($go['在庫数'] !== '0'){
                    ?>
                    <!--在庫があればラジオボタン表示-->
                        <input type ='radio' name='drink_id' value='<?php print htmlspecialchars($go['ドリンクid'],ENT_QUOTES,'UTF-8')?>'>
                    <?php
                    }else{ 
                        // なければ売り切れを表示
                        print "<span class='red'>売り切れ</span>";
                    }
                    ?>
                </div>
                <?php } ?>
                <?php }?>
            </div>
            
            
            <div id="submit">
                <input type="submit" value="■□■□■購入■□■□■">
            </div>
        </form>
    </body>
</html>