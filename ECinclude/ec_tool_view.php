<!DOCTYPE html>
<html lang='ja'>
    <head>
        <meta charset="UTF-8">
        <title>ECサイト商品登録</title>
        <style>
            section{
                margin-bottom: 20px;
                border-top: solid 1px;
            }
            
            table{
                width: 660px;
                border-collapse: collapse;
            }
            
            table,tr,th,td{
                border: solid 1px;
                padding: 10px;
                text-align: center;
            }
            
            caption{
                text-align: left;
            }
            
            .text_align_right{
                text-align: right;
            }
            
            .drink_name_width{
                width: 100px;
            }
            
            .input_text_width{
                width: 60px;
            }
            
            .status_false {
            background-color: #A9A9A9;
        　　}
        </style>
    </head>
    <body>
        <h1>ECサイト販売者管理ツール</h1>
        <section>
            <h2>新規商品追加</h2>
            <!--enctype属性は画像アップロードに必要-->
            <form method="post" enctype ="multipart/form-data" action = "../php25/ec_tool.php">
               <div>
                   <label>
                       名前：
                       <input type="text" name="new_name">
                   </label>
               </div>
               <div>
                   <label>
                       値段：
                       <input type="text" name="new_price">
                   </label>
               </div>
               <div>
                   <label>
                       個数：
                       <input type="text" name="new_stock">
                   </label>
               </div>
               <div>
                   <input type="file" name="new_img">
               </div>
               <div>
                   <select name="new_status">
                       <option value="0">非公開</option>
                       <option value="1">公開</option>
                   </select>
               </div>
               <div>
                   <input type="hidden" name="sql_kind" value="insert">
               </div>
               <div>
                   <input type="submit" value="■□■□■商品追加■□■□■">
               </div>
            </form>
        </section>
        <section>
            <h2>商品情報変更</h2>
            <table>
                <caption>商品一覧</caption>
                <tr>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>公開ステータス</th>
                    <th>商品削除</th>
                </tr>
                <?php
                foreach($data as $go){
                ?>
                <tr class='<?php 
                // ステータスが非公開ならば.status_falseクラスを付与
                    if($go['status'] === 0){
                         print htmlspecialchars("status_false",ENT_QUOTES,'UTF-8');
                    }
                ?>'>
                    <form method = 'post'>
                        <td><?php print '<img src = "./image/'.$go['img'].'">'?></td>
                        <td><?php print htmlspecialchars($go['name'], ENT_QUOTES, 'UTF-8')?></td>
                        <td><?php print htmlspecialchars($go['price'], ENT_QUOTES, 'UTF-8')?></td>
                        <td>
                            <input type="text" class="input_text_width text_align_right" name="update_stock" value='<?php print htmlspecialchars($go['stock'], ENT_QUOTES, 'UTF-8') ?>'>
                            <br>個
                            <br>
                            <input type="submit" value="変更">
                        </td>    
                        <input type="hidden" name="id" value='<?php print htmlspecialchars($go['id'],ENT_QUOTES, 'UTF-8')?>'>
                    </form>
                    <form method="post">
                        <td><input type="submit" value=
                        '<?php 
                            if($go['status'] === 0){
                                print htmlspecialchars("非公開→公開",ENT_QUOTES,'UTF-8');
                            }else{
                                print htmlspecialchars("公開→非公開",ENT_QUOTES,'UTF-8');
                            }
                        ?>'>
                        </td>
                        <input type="hidden" name="change_status" value="<?PHP print htmlspecialchars($go['status'],ENT_QUOTES,'UTF-8')?>">
                        <input type="hidden" name="id" value='<?php print htmlspecialchars($go['id'],ENT_QUOTES, 'UTF-8')?>'>
                        <input type="hidden" name="sql_kind" value="change">
                    </form>
                    <form method = "post">
                        <td><input type = "submit" value = "削除" name = "delete"></td>
                        <input type="hidden" name="id" value='<?php print htmlspecialchars($go['id'],ENT_QUOTES, 'UTF-8')?>'>
                    </form>
                </tr>
                <?php
                }
                ?>
            </table>
        </section>
    </body>
</html>