<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>ショッピングカートページ</title>
  <link type="text/css" rel="stylesheet" href="./css/common.css">
</head>
<body>
  <header>
    <div class="header-box">
      <a href="./ec_login.php">
        <img class="logo" src="./image/logo.png" alt="CodeCamp SHOP">
      </a>
      <a class="nemu" href="./ec_logout.php">ログアウト</a>
      <a href="./ec_cart.php" class="cart"></a>
      <p class="nemu">ユーザー名：tktktktk</p>
    </div>
  </header>
  <div class="content">
    <h1 class="title">ショッピングカート</h1>

    <div class="cart-list-title">
      <span class="cart-list-price">価格</span>
      <span class="cart-list-num">数量</span>
    </div>
    <ul class="cart-list">
    　<?php
      if(!empty($data)){
      
        foreach($data as $go){
      ?>
      <li>
        <div class="cart-item">
          <?php print '<img class = "item-img" src= "./image/'.$go['img'].'">'?>
          <span class="cart-item-name"><?php print htmlspecialchars($go['name'],ENT_QUOTES,'UTF-8')?></span>
          <form class="cart-item-del" action="./ec_cart.php" method="post">
            <input type="submit" value="削除">
            <input type="hidden" name="item_id" value="<?php print htmlspecialchars($go['item_id'],ENT_QUOTES,'UTF-8')?>">
            <input type="hidden" name="delete" value="delete_cart">
          </form>
          <span class="cart-item-price"><?php print '￥' . htmlspecialchars($go['price'],ENT_QUOTES,'UTF-8')?></span>
          <form class="form_select_amount" id="form_select_amount<?php print htmlspecialchars($go['item_id'],ENT_QUOTES,'UTF-8')?>" action="./ec_cart.php" method="post">
            <input type="text" class="cart-item-num2" min="0" name="select_amount" value="
            <?php print htmlspecialchars($go['amount'],ENT_QUOTES,'UTF-8')?>
            ">個&nbsp;<input type="submit" value="変更する">
            <input type="hidden" name="item_id" value="<?php print htmlspecialchars($go['item_id'],ENT_QUOTES,'UTF-8')?>">
            <input type="hidden" name="sql_kind" value="change_cart">
          </form>
        </div>
      </li>
      <?php } 
      }
      ?>
    </ul>
    <div class="buy-sum-box">
      <span class="buy-sum-title">合計</span>
      <span class="buy-sum-price"><?php print "￥" .;?></span>
    </div>
    <div>
      <form method="post">
        <input class="buy-btn" type="submit" value="購入する">
      </form>
    </div>
  </div>
</body>
</html>