<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title></title>
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
            .right{
                float: right;
            }
        </style>
    </head>
    <body>
        <h1>自動販売機</h1>
        <div class='right'>
                <a href=''><img src="./image/cart.jpeg"></img></a>
        </div>
        <form action="cart.php" method="post">
            <div id="flex">
                <!--アイテムが何も選択されなかった場合のラジオボタン-->
                <!--<input type="radio" name="drink_id"value="" checked="checked" style="display:none;">-->
                
                <!--結果を取り出す-->
                <?php
                    foreach($data as $go){
                ?>
                <?php
                    if($go['status'] === 1){
                ?>
                <div class="drink">
                    <span class = 'img_size'>
                    <!--商品画像-->
                    <?php print '<img src= "./image/'.$go['img'].'">'?>
                    </span>
                    <!--商品名-->
                    <span><?php print htmlspecialchars($go['name'],ENT_QUOTES,'UTF-8')?></span>
                    <!--値段-->
                    <span><?php print htmlspecialchars($go['price'],ENT_QUOTES,'UTF-8')?></span>
                    <?php
                    if($go['stock'] !== '0'){
                    ?>
                    <!--在庫があればラジオボタン表示-->
                        <input type ='hidden' name='drink_id' value='<?php print htmlspecialchars($go['id'],ENT_QUOTES,'UTF-8')?>'>
                        <input type='submit' value="カートに追加">
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
            
            
            <!--<div id="submit">-->
            <!--    <input type="submit" value="■□■□■購入■□■□■">-->
            <!--</div>-->
        </form>
    </body>
</html>