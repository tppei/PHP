<?php
$my_name = '';
if( isset( $_POST['my_name'] ) === TRUE && $_POST['my_name'] !== '' ) {
    print 'ようこそ' . htmlspecialchars($_POST['my_name'], ENT_QUOTES, 'UTF-8') .'さん';
} else if($_POST['my_name'] === '') {
    print '名前が未入力です';
}
?>