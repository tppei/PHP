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
                border: solid 1px;
                width: 120px;
                height: 210px;
                text-align: center;
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
            <div id="submit">
                <input type="submit" value="■□■□■購入■□■□■">
            </div>
        </form>
    </body>
</html>