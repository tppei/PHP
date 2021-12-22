{"filter":false,"title":"index_view.php","tooltip":"/htdocs/mvc/index_view.php","undoManager":{"mark":0,"position":0,"stack":[[{"start":{"row":0,"column":0},"end":{"row":90,"column":7},"action":"insert","lines":["<!DOCTYPE html>","<html lang=\"ja\">","    <head>","        <meta charset=\"UTF-8\">","        <title>自動販売機</title>","        <style>","            #flex{","                width: 600px;","            }","            ","            #flex .drink{","                ","                width: 120px;","                height: 210px;","                text-align: center;","                margin: 10px;","                float: left;","            }","            ","            #flex span{","                display: block;","                margin: 3px;","                white-space: nowrap;","                overflow: hidden;","                text-overflow: ellipsis;","            }","            ","            .img_size{","                height: 125px;","            }","            ","            .red{","                color: #F00;","            }","            ","            #submit{","                clear: both;","            }","        </style>","    </head>","    <body>","        <h1>自動販売機</h1>","        <form action=\"result.php\" method=\"post\">","            <div>","                金額","                <input type=\"text\" name=\"money\">","            </div>","            ","            <div id=\"flex\">","                <!--アイテムが何も選択されなかった場合のラジオボタン-->","                <input type=\"radio\" name=\"drink_id\"value=\"\" checked=\"checked\" style=\"display:none;\">","                ","                <!--結果を取り出す-->","                <?php","                foreach($data as $go){","                ?>","                <?php","                if($go['公開ステータス'] === '1'){","                ?>","                <div class=\"drink\">","                    <span class = 'img_size'>","                    <!--商品画像-->","                    <?php print '<img src= \"./image/'.$go['商品画像'].'\">'?>","                    </span>","                    <!--商品名-->","                    <span><?php print htmlspecialchars($go['ドリンク名'],ENT_QUOTES,'UTF-8')?></span>","                    <!--値段-->","                    <span><?php print htmlspecialchars($go['価格'],ENT_QUOTES,'UTF-8')?></span>","                    <?php","                    if($go['在庫数'] !== '0'){","                    ?>","                    <!--在庫があればラジオボタン表示-->","                        <input type ='radio' name='drink_id' value='<?php print htmlspecialchars($go['ドリンクid'],ENT_QUOTES,'UTF-8')?>'>","                    <?php","                    }else{ ","                        // なければ売り切れを表示","                        print \"<span class='red'>売り切れ</span>\";","                    }","                    ?>","                </div>","                <?php } ?>","                <?php }?>","            </div>","            ","            ","            <div id=\"submit\">","                <input type=\"submit\" value=\"■□■□■購入■□■□■\">","            </div>","        </form>","    </body>","</html>"],"id":1}],[{"start":{"row":86,"column":54},"end":{"row":86,"column":55},"action":"remove","lines":["加"],"id":6},{"start":{"row":86,"column":53},"end":{"row":86,"column":54},"action":"remove","lines":["追"]},{"start":{"row":86,"column":52},"end":{"row":86,"column":53},"action":"remove","lines":["に"]},{"start":{"row":86,"column":51},"end":{"row":86,"column":52},"action":"remove","lines":["ト"]},{"start":{"row":86,"column":50},"end":{"row":86,"column":51},"action":"remove","lines":["ー"]},{"start":{"row":86,"column":49},"end":{"row":86,"column":50},"action":"remove","lines":["カ"]}],[{"start":{"row":86,"column":53},"end":{"row":86,"column":55},"action":"insert","lines":["追加"],"id":5}],[{"start":{"row":86,"column":53},"end":{"row":86,"column":54},"action":"remove","lines":["追"],"id":4}],[{"start":{"row":86,"column":49},"end":{"row":86,"column":54},"action":"insert","lines":["カートに追"],"id":3}],[{"start":{"row":86,"column":51},"end":{"row":86,"column":52},"action":"remove","lines":["■"],"id":2},{"start":{"row":86,"column":50},"end":{"row":86,"column":51},"action":"remove","lines":["入"]},{"start":{"row":86,"column":49},"end":{"row":86,"column":50},"action":"remove","lines":["購"]}]]},"ace":{"folds":[],"scrolltop":871,"scrollleft":0,"selection":{"start":{"row":90,"column":7},"end":{"row":90,"column":7},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":71,"state":"start","mode":"ace/mode/php"}},"timestamp":1639113788386,"hash":"9dbe9389e3f2f3a25bece83c74b3c1c4045b15e7"}