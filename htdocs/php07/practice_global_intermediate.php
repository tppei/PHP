<?php
    $dasite = '';
    if(isset($_POST['dasite']) === TRUE){
        $dasite = htmlspecialchars($_POST['dasite'] , ENT_QUOTES , 'UTF-8');
    }
    
    $aite = ['グー','チョキ','パー'];
    $response = $aite[array_rand($aite)];
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
       <meta charset="UTF-8">
       <title>じゃじゃんけん</title>
    </head>
    <body>
        <h1>じゃんけん勝負</h1>
        
        <p>自分：<?php 
        print $dasite;
        ?></p>
        <p>相手：<?php
        print $response;
        ?></p>
        <p>結果：<?php
        if($response === $dasite){
            print 'draw';
        }else if($dasite === 'グー' && $response === 'チョキ'){
            print 'win!!';
        }else if($dasite === 'チョキ' && $response === 'パー'){
            print 'win!!';
        }else if($dasite === 'パー' && $response === 'グー'){
            print 'win!!';
        }else{
            print 'lose...';
        }
        ?></p>
        
        <form method = "post">
            <input type="radio" name="dasite" value="グー">グー
            <input type="radio" name="dasite" value="チョキ">チョキ
            <input type="radio" name="dasite" value="パー">パー
            </br><input type="submit" name="syoubu" value="勝負!!">
        </form>    
    </body>