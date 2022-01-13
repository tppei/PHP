<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>商品一覧ページ</title>
        <link type="text/css" rel="stylesheet" href="./css/common.css">
    </head>
    <body>
        <header>
            <div class="header-box">
              <a href="./ec_login.php">
                <img class="logo" src="./image/logo.png" alt="CodeSHOP">
              </a>
              <a class="nemu" href="./ec_logout.php">ログアウト</a>
              <a href="./ec_cart.php" class="cart"></a>
              <p class="nemu">ユーザー名：<?php print $user_name?></p>
            </div>
        </header>
        
        <div class="content">
            <ul class="item-list">
                <!--アイテムが何も選択されなかった場合のラジオボタン-->
                <!--<input type="radio" name="drink_id"value="" checked="checked" style="display:none;">-->
                
                <!--結果を取り出す-->
                <?php
                    foreach($data_array as $go){
                ?>
                <?php
                    if($go['status'] === 1){
                ?>
                <li>
                    <div class="item">
                        <!--1/13追加-->
                        <iframe id="iframe" name="iframe" style="display: none;"></iframe>
                        <form action="ec_cart.php" method="post" target="iframe">
                            <!--商品画像-->
                            <?php print '<img class = "item-img" src= "./image/'.$go['img'].'">'?>
                            <div class = "item-info">
                                <!--商品名-->
                                <span class ='item-name'><?php print htmlspecialchars($go['name'],ENT_QUOTES,'UTF-8')?></span>
                                <!--値段-->
                                <span class ='item-price'><?php print '￥' . htmlspecialchars($go['price'],ENT_QUOTES,'UTF-8')?></span>
                            </div>
                            <?php
                            // 在庫の確認
                            if($go['stock'] !== 0){
                            ?>
                                <input type ='hidden' name='additem_id' value='<?php print htmlspecialchars($go['id'],ENT_QUOTES,'UTF-8')?>'>
                                <input class = "cart-btn" type='submit' value="カートに追加">
                            <?php
                            }else{ 
                                // 在庫なければ売り切れを表示
                                print "<span class='red'>売り切れ</span>";
                            }
                            ?>
                        </form>
                    </div>
                </li>
                <?php } ?>
                <?php }?>
            </div>
            
            
            <!--<div id="submit">-->
            <!--    <input type="submit" value="■□■□■購入■□■□■">-->
            <!--</div>-->
        </form>
        </ul>
        </div>
        
    </body>
</html>