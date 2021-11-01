<?php
var_dump($_GET);


$postcode ='';
$prefec = '';
$city = '';
$regexp_post  ='/^\d{6,7}$/';
$host = 'localhost'; // データベースのホスト名
$username = 'codecamp49497';  // MySQLのユーザ名
$passwd   = 'codecamp49497';    // MySQLのパスワード
$dbname   = 'codecamp49497';    // データベース名
$link = mysqli_connect($host, $username, $passwd, $dbname);
$data = [];
$countdata = '';
$query2 ='';
$data2 = [];
if(!isset($_GET['page'])){
        $page = 1;
        } else{
        $page = $_GET['page'];
        };
var_dump($page);

    if(isset($_GET['postcode'])){
        $postcode = $_GET['postcode'];
        $postcode = preg_replace("/( |　)/","",$postcode);
        $postcode_check = preg_match($regexp_post,$postcode);
        $page = $_['page'];
        $offset = 10 ^ ($page - 1);
        if($postcode === ""){
            print "郵便番号を入力してください";
            
        }else if(!$postcode_check){
            print "郵便番号は7桁の半角数字を入力してください";
        }else{
            
               // 接続成功した場合
            if ($link) {
               // 文字化け防止
               mysqli_set_charset($link, 'utf8');
               $query = "SELECT * FROM postcode WHERE postcode='$postcode' AND address_town != '以下に掲載がない場合'";
              
               // クエリを実行します
               $result = mysqli_query($link, $query);
               // 1行ずつ結果を配列で取得します
               while ($row2 = mysqli_fetch_array($result)) {
                  $data2[] = $row2;
                   } // 結果セットを開放します
               mysqli_free_result($result);
               // 接続を閉じます
               mysqli_close($link);
            // 接続失敗した場合
            } else {
               print 'DB接続失敗';
            }
            $countdata = count($data2);
        }
    }
    
    if(isset($_GET['prefec']) && isset($_GET['city'])){
        $prefec = $_GET['prefec'];
        $city = $_GET['city'];
        $offset = 10 * ($page - 1);
        $city = preg_replace("/( |　)/","",$city);
        if($prefec === '都道府県を選択' && $city !== ''){
        print "都道府県を選択してください";
        }else if($prefec !== '都道府県を選択' && $city === ''){
        print "市区町村を入力してください";
        }else if($prefec === '都道府県を選択' && $city === ''){
        print "都道府県を選択してください 市区町村を入力してください";
        }else{
            if($link){
                // 文字化け防止
                mysqli_set_charset($link,'utf8');
                // データ総件数計算クエリ
                $query = "SELECT * FROM postcode WHERE prefec_name = '$prefec' AND address_pre LIKE '$city%' AND address_town != '以下に記載がない場合'";
                var_dump($query);
                // queryをじっこうします
                $result = mysqli_query($link,$query);
                // 1行ずつ結果を配列で取得します
                while ($row = mysqli_fetch_array($result)){
                    $data[] = $row;
                }
                // 結果セットを開放します
                mysqli_free_result($result);
                
                // 10件だけ表示クエリ　クライアント側表示されるクエリはこちら
                $query2 = "SELECT * FROM postcode WHERE prefec_name = '$prefec' AND address_pre LIKE '$city%' AND address_town != '以下に記載がない場合' LIMIT 10 OFFSET $offset";
                // $query2を実行します
                $result2 = mysqli_query($link,$query2);
                // 1行ずつ結果を配列で取得します
                while ($row2 = mysqli_fetch_array($result2)){
                    $data2[] = $row2;
                }
                // 結果セットを開放します
                mysqli_free_result($result2);
                // 接続を閉じます
                mysqli_close($link);
                // }接続失敗した場合
            }else{
                print 'DB接続失敗';
            }
           $countdata = count($data);
        }
    }
   
       
?>
<!DOCTYPE html>
<head>
    <meta charset='UTF-8'>
    <title>郵便番号検索</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            }
        table,th,td,tr{
            border: solid 1px;
        }
        caption{
            text-align: left;
        }
        .kensaku{
            padding-bottom: 10px;
            border-bottom: solid 2px;
        }
    </style>
</head>
<body>
    <div class="kensaku">
        <h1>郵便番号検索</h1>
        <form method='post'>
            <h2>郵便番号から検索</h2>
            <input type="text" name="postcode" placeholder='例) 1010001'>
            <input type="submit" name="" value="検索">
        </form>
        <form method='post'>
            <h2>地名から検索</h2>
            <label for="prefec">都道府県を選択</label>
            <select name="prefec" size="1" id='prefec'>
                <option value="都道府県を選択">都道府県を選択</option>
                <option value="北海道">北海道</option>
                <option value="青森県">青森県</option>
                <option value="岩手県">岩手県</option>
                <option value="宮城県">宮城県</option>
                <option value="秋田県">秋田県</option>
                <option value="山形県">山形県</option>
                <option value="福島県">福島県</option>
                <option value="茨城県">茨城県</option>
                <option value="栃木県">栃木県</option>
                <option value="群馬県">群馬県</option>
                <option value="埼玉県">埼玉県</option>
                <option value="千葉県">千葉県</option>
                <option value="東京都">東京都</option>
                <option value="神奈川県">神奈川県</option>
                <option value="新潟県">新潟県</option>
                <option value="富山県">富山県</option>
                <option value="石川県">石川県</option>
                <option value="福井県">福井県</option>
                <option value="山梨県">山梨県</option>
                <option value="長野県">長野県</option>
                <option value="岐阜県">岐阜県</option>
                <option value="静岡県">静岡県</option>
                <option value="愛知県">愛知県</option>
                <option value="三重県">三重県</option>
                <option value="滋賀県">滋賀県</option>
                <option value="京都府">京都府</option>
                <option value="大阪府">大阪府</option>
                <option value="兵庫県">兵庫県</option>
                <option value="奈良県">奈良県</option>
                <option value="和歌山県">和歌山県</option>
                <option value="鳥取県">鳥取県</option>
                <option value="島根県">島根県</option>
                <option value="岡山県">岡山県</option>
                <option value="広島県">兵庫県</option>
                <option value="山口県">山口県</option>
                <option value="徳島県">徳島県</option>
                <option value="香川県">香川県</option>
                <option value="愛媛県">愛媛県</option>
                <option value="高知県">高知県</option>
                <option value="福岡県">福岡県</option>
                <option value="佐賀県">佐賀県</option>
                <option value="長崎県">長崎県</option>
                <option value="熊本県">熊本県</option>
                <option value="大分県">大分県</option>
                <option value="宮崎県">宮崎県</option>
                <option value="鹿児島県">鹿児島県</option>
                <option value="沖縄県">沖縄県</option>
            </select>
            <label for="city">市区町村</label>
            <input type="text" name="city" id='city'>
            <input type="submit" value="検索">
        </form>
    </div>
    <?php
    
    if(($postcode && $postcode_check)||($prefec != '都道府県を選択'  && $city)){
    ?>
     <p>検索結果<?php print $countdata;?>件</p>
    <?php
        if($countdata !=0){
    ?>
    <table>
        <caption>郵便番号検索結果</caption>
        <tr>
            <th>郵便番号</th><th>都道府県名</th><th>市区町村</th><th>町域</th>
        </tr>
    <?php
        }
    ?>    
    <?php
        
    }else{
        print "ここに検索結果が表示されます";
        
     } ?>
    
<?php
    foreach ($data2 as $go) {
?>
   
       
        <tr>
            <td><?php print htmlspecialchars($go['postcode'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php print htmlspecialchars($go['prefec_name'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php print htmlspecialchars($go['address_pre'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php print htmlspecialchars($go['address_town'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
    
 
<?php
}
?>
</table>

<?php
    
    if(($postcode && $postcode_check)||($prefec != '都道府県を選択'  && $city)){
?>



     

<?php

// データ総数
$count = $countdata;
// ページ当たりの表示件数
$perpage = 10;
// ページ総数
$totalpage = ceil($count/$perpage);
// ceil($count / $perpage);
var_dump($totalpage);
function paging($totalpage,$page,$prefec,$city){
    
    var_dump($page);
    // 前のページ
    $prev = max($page - 1,1);
    // 次のページ
    $next = min($page + 1,$totalpage);
    if($page != 1){
        print '<a href="practice_post_code_advanced.php?prefec='.$prefec.'&city='.$city.'&page=' . $prev . '">前へ</a>';
    }if($page < $totalpage){
        print '<a href="practice_post_code_advanced.php?prefec='.$prefec.'&city='.$city.'&page=' . $next . '">次へ</a>';
    }
}

paging($totalpage,$page,$prefec,$city);

?>

<?php
}
?>
</body>
</html>