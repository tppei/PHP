{"filter":false,"title":"get_sample.php","tooltip":"/htdocs/php07/get_sample.php","undoManager":{"mark":2,"position":2,"stack":[[{"start":{"row":0,"column":0},"end":{"row":30,"column":7},"action":"insert","lines":["<?php","if (isset($_GET['query']) === TRUE) {","   $query  = htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8');","}","?>","<!DOCTYPE html>","<html lang=\"ja\">","<head>","   <meta charset=\"UTF-8\">","   <title>スーパーグローバル変数使用例</title>","</head>","<body>","   <h1>検索しよう</h1>","<?php","   // formから検索文字列が渡ってきている場合はGoogleへのリンクを表示","   if (isset($query) === TRUE) {","?>","   <a href=\"https://www.google.co.jp/search?q=<?php print $query; ?>\" target=\"_blank\">「<?php print $query; ?>」をGoogleで検索する</a><br>","   <a href=\"http://www.bing.com/search?q=<?php print $query; ?>\" target=\"_blank\">「<?php print $query; ?>」をbingで検索する</a><br>","   <a href=\"http://search.yahoo.co.jp/search?p=<?php print $query; ?>\" target=\"_blank\">「<?php print $query; ?>」をyahooで検索する</a><br>","   <p>このページをブックマークしてみましょう。<br>ブックマークからこのページにアクセスしても同じページが表示されます</p>","<?php","   }","?>","   <!-- 検索文字列送信用フォーム -->","   <form method=\"get\">","       <input type=\"text\" name=\"query\" value=\"<?php if (isset($query) === TRUE) { print $query; } ?>\">","       <input type=\"submit\" value=\"送信\">","   </form>","</body>","</html>"],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":30,"column":7},"action":"remove","lines":["<?php","if (isset($_GET['query']) === TRUE) {","   $query  = htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8');","}","?>","<!DOCTYPE html>","<html lang=\"ja\">","<head>","   <meta charset=\"UTF-8\">","   <title>スーパーグローバル変数使用例</title>","</head>","<body>","   <h1>検索しよう</h1>","<?php","   // formから検索文字列が渡ってきている場合はGoogleへのリンクを表示","   if (isset($query) === TRUE) {","?>","   <a href=\"https://www.google.co.jp/search?q=<?php print $query; ?>\" target=\"_blank\">「<?php print $query; ?>」をGoogleで検索する</a><br>","   <a href=\"http://www.bing.com/search?q=<?php print $query; ?>\" target=\"_blank\">「<?php print $query; ?>」をbingで検索する</a><br>","   <a href=\"http://search.yahoo.co.jp/search?p=<?php print $query; ?>\" target=\"_blank\">「<?php print $query; ?>」をyahooで検索する</a><br>","   <p>このページをブックマークしてみましょう。<br>ブックマークからこのページにアクセスしても同じページが表示されます</p>","<?php","   }","?>","   <!-- 検索文字列送信用フォーム -->","   <form method=\"get\">","       <input type=\"text\" name=\"query\" value=\"<?php if (isset($query) === TRUE) { print $query; } ?>\">","       <input type=\"submit\" value=\"送信\">","   </form>","</body>","</html>"],"id":2}],[{"start":{"row":0,"column":0},"end":{"row":30,"column":7},"action":"insert","lines":["<?php","if (isset($_GET['query']) === TRUE) {","   $query  = htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8');","}","?>","<!DOCTYPE html>","<html lang=\"ja\">","<head>","   <meta charset=\"UTF-8\">","   <title>スーパーグローバル変数使用例</title>","</head>","<body>","   <h1>検索しよう</h1>","<?php","   // formから検索文字列が渡ってきている場合はGoogleへのリンクを表示","   if (isset($query) === TRUE) {","?>","   <a href=\"https://www.google.co.jp/search?q=<?php print $query; ?>\" target=\"_blank\">「<?php print $query; ?>」をGoogleで検索する</a><br>","   <a href=\"http://www.bing.com/search?q=<?php print $query; ?>\" target=\"_blank\">「<?php print $query; ?>」をbingで検索する</a><br>","   <a href=\"http://search.yahoo.co.jp/search?p=<?php print $query; ?>\" target=\"_blank\">「<?php print $query; ?>」をyahooで検索する</a><br>","   <p>このページをブックマークしてみましょう。<br>ブックマークからこのページにアクセスしても同じページが表示されます</p>","<?php","   }","?>","   <!-- 検索文字列送信用フォーム -->","   <form method=\"get\">","       <input type=\"text\" name=\"query\" value=\"<?php if (isset($query) === TRUE) { print $query; } ?>\">","       <input type=\"submit\" value=\"送信\">","   </form>","</body>","</html>"],"id":3}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":10,"column":7},"end":{"row":10,"column":7},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1632449693560,"hash":"43d939a99360537d09409306a1762b814a3d6617"}