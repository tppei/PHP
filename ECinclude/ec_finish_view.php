<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>購入完了ページ</title>
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
      <p class="nemu">ユーザー名:<?php print $user_name; ?></p>
    </div>
  </header>
  <div class = 'content'>
      <div class="finish-msg">ご購入ありがとうございました。</div>
      <div class="cart-list-title">
          <span class="cart-list-price">価格</span>
          <span class="cart-list-num">数量</span>
    　</div>
    　<ul class="cart-list">
    　  <?php
        if(!empty($data)){
         
            foreach($data as $go){
                $sum_price += $go['price'] * $go['amount'];
        ?>
        <li>
            <div class="cart-item">
              <?php print '<img class = "item-img" src= "./image/'.$go['img'].'">'?>
              <span class="cart-item-name"><?php print htmlspecialchars($go['name'],ENT_QUOTES,'UTF-8')?></span>
              <span class="cart-item-price"><?php print '￥' . htmlspecialchars($go['price'],ENT_QUOTES,'UTF-8')?></span>
              <span class="finish-item-price"><?php print htmlspecialchars($go['amount'],ENT_QUOTES,'UTF-8')?></span>
            </div>
        </li>
        <?php }
        }
        ?>
    　</ul>
    　<div class="buy-sum-box">
          <span class="buy-sum-title">合計</span>
          <span class="buy-sum-price"><?php print "￥" . $sum_price;?></span>
    　</div>
    </div>
</body>
</html>