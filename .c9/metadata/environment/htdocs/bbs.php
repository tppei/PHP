{"filter":false,"title":"bbs.php","tooltip":"/htdocs/bbs.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":43,"column":9},"end":{"row":44,"column":0},"action":"insert","lines":["",""],"id":1228},{"start":{"row":44,"column":0},"end":{"row":44,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":45,"column":10},"end":{"row":46,"column":0},"action":"insert","lines":["",""],"id":1229}],[{"start":{"row":21,"column":7},"end":{"row":31,"column":9},"action":"remove","lines":[" if(isset($_POST['name'])){","            if(mb_strlen($_POST['name']) <= 20 && mb_strlen($_POST['name']) != 0){","                $name = $_POST['name'];","            }else if(mb_strlen($_POST['name']) > 20){","                $error_name = \"!!名前は文字数を20文字以下にしてください!!\";","                print $error_name;","            }else if(mb_strlen($_POST['name']) === 0){","                $error_noname =\"!!名前を入力してください!!\";","                print $error_noname;","            }","        }"],"id":1230}],[{"start":{"row":6,"column":47},"end":{"row":7,"column":0},"action":"insert","lines":["",""],"id":1231},{"start":{"row":7,"column":0},"end":{"row":7,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":7,"column":8},"end":{"row":17,"column":9},"action":"insert","lines":[" if(isset($_POST['name'])){","            if(mb_strlen($_POST['name']) <= 20 && mb_strlen($_POST['name']) != 0){","                $name = $_POST['name'];","            }else if(mb_strlen($_POST['name']) > 20){","                $error_name = \"!!名前は文字数を20文字以下にしてください!!\";","                print $error_name;","            }else if(mb_strlen($_POST['name']) === 0){","                $error_noname =\"!!名前を入力してください!!\";","                print $error_noname;","            }","        }"],"id":1232}],[{"start":{"row":7,"column":9},"end":{"row":8,"column":0},"action":"insert","lines":["",""],"id":1233},{"start":{"row":8,"column":0},"end":{"row":8,"column":9},"action":"insert","lines":["         "]}],[{"start":{"row":36,"column":4},"end":{"row":36,"column":8},"action":"remove","lines":["    "],"id":1234}],[{"start":{"row":45,"column":4},"end":{"row":45,"column":8},"action":"remove","lines":["    "],"id":1235}],[{"start":{"row":37,"column":12},"end":{"row":37,"column":13},"action":"remove","lines":[" "],"id":1236},{"start":{"row":37,"column":8},"end":{"row":37,"column":12},"action":"remove","lines":["    "]}],[{"start":{"row":38,"column":12},"end":{"row":38,"column":13},"action":"remove","lines":[" "],"id":1237},{"start":{"row":38,"column":8},"end":{"row":38,"column":12},"action":"remove","lines":["    "]}],[{"start":{"row":39,"column":12},"end":{"row":39,"column":16},"action":"remove","lines":["    "],"id":1238}],[{"start":{"row":40,"column":16},"end":{"row":40,"column":20},"action":"remove","lines":["    "],"id":1239}],[{"start":{"row":41,"column":16},"end":{"row":41,"column":20},"action":"remove","lines":["    "],"id":1240}],[{"start":{"row":42,"column":16},"end":{"row":42,"column":20},"action":"remove","lines":["    "],"id":1241}],[{"start":{"row":43,"column":12},"end":{"row":43,"column":16},"action":"remove","lines":["    "],"id":1242}],[{"start":{"row":44,"column":12},"end":{"row":44,"column":16},"action":"remove","lines":["    "],"id":1243}],[{"start":{"row":49,"column":0},"end":{"row":49,"column":4},"action":"insert","lines":["    "],"id":1244},{"start":{"row":50,"column":0},"end":{"row":50,"column":4},"action":"insert","lines":["    "]},{"start":{"row":51,"column":0},"end":{"row":51,"column":4},"action":"insert","lines":["    "]},{"start":{"row":52,"column":0},"end":{"row":52,"column":4},"action":"insert","lines":["    "]},{"start":{"row":53,"column":0},"end":{"row":53,"column":4},"action":"insert","lines":["    "]},{"start":{"row":54,"column":0},"end":{"row":54,"column":4},"action":"insert","lines":["    "]},{"start":{"row":55,"column":0},"end":{"row":55,"column":4},"action":"insert","lines":["    "]},{"start":{"row":56,"column":0},"end":{"row":56,"column":4},"action":"insert","lines":["    "]},{"start":{"row":57,"column":0},"end":{"row":57,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":12,"column":56},"end":{"row":12,"column":57},"action":"insert","lines":["."],"id":1245}],[{"start":{"row":12,"column":57},"end":{"row":12,"column":59},"action":"insert","lines":["\"\""],"id":1246}],[{"start":{"row":12,"column":58},"end":{"row":12,"column":59},"action":"insert","lines":["\\"],"id":1247},{"start":{"row":12,"column":59},"end":{"row":12,"column":60},"action":"insert","lines":["n"]}],[{"start":{"row":12,"column":59},"end":{"row":12,"column":60},"action":"remove","lines":["n"],"id":1248},{"start":{"row":12,"column":59},"end":{"row":12,"column":60},"action":"insert","lines":["n"]}],[{"start":{"row":15,"column":48},"end":{"row":15,"column":49},"action":"insert","lines":["."],"id":1249}],[{"start":{"row":15,"column":49},"end":{"row":15,"column":51},"action":"insert","lines":["\"\""],"id":1250}],[{"start":{"row":15,"column":50},"end":{"row":15,"column":51},"action":"insert","lines":["\\"],"id":1251},{"start":{"row":15,"column":51},"end":{"row":15,"column":52},"action":"insert","lines":["n"]}],[{"start":{"row":15,"column":51},"end":{"row":15,"column":52},"action":"remove","lines":["n"],"id":1252},{"start":{"row":15,"column":51},"end":{"row":15,"column":52},"action":"insert","lines":["n"]}],[{"start":{"row":25,"column":62},"end":{"row":25,"column":63},"action":"insert","lines":["."],"id":1253}],[{"start":{"row":25,"column":63},"end":{"row":25,"column":65},"action":"insert","lines":["\"\""],"id":1254}],[{"start":{"row":25,"column":64},"end":{"row":25,"column":65},"action":"insert","lines":["\\"],"id":1255},{"start":{"row":25,"column":65},"end":{"row":25,"column":66},"action":"insert","lines":["n"]}],[{"start":{"row":28,"column":54},"end":{"row":28,"column":55},"action":"insert","lines":["."],"id":1256}],[{"start":{"row":28,"column":55},"end":{"row":28,"column":57},"action":"insert","lines":["\"\""],"id":1257}],[{"start":{"row":28,"column":56},"end":{"row":28,"column":57},"action":"insert","lines":["\\"],"id":1258},{"start":{"row":28,"column":57},"end":{"row":28,"column":58},"action":"insert","lines":["n"]}],[{"start":{"row":28,"column":57},"end":{"row":28,"column":58},"action":"remove","lines":["n"],"id":1259},{"start":{"row":28,"column":57},"end":{"row":28,"column":58},"action":"insert","lines":["n"]}],[{"start":{"row":64,"column":25},"end":{"row":64,"column":26},"action":"remove","lines":["ぉ"],"id":1260}],[{"start":{"row":68,"column":31},"end":{"row":68,"column":32},"action":"remove","lines":["o"],"id":1261},{"start":{"row":68,"column":30},"end":{"row":68,"column":31},"action":"remove","lines":["t"]},{"start":{"row":68,"column":29},"end":{"row":68,"column":30},"action":"remove","lines":["o"]},{"start":{"row":68,"column":28},"end":{"row":68,"column":29},"action":"remove","lines":["k"]},{"start":{"row":68,"column":27},"end":{"row":68,"column":28},"action":"remove","lines":["o"]},{"start":{"row":68,"column":26},"end":{"row":68,"column":27},"action":"remove","lines":["t"]},{"start":{"row":68,"column":25},"end":{"row":68,"column":26},"action":"remove","lines":["i"]},{"start":{"row":68,"column":24},"end":{"row":68,"column":25},"action":"remove","lines":["h"]}],[{"start":{"row":68,"column":24},"end":{"row":68,"column":25},"action":"insert","lines":["n"],"id":1262},{"start":{"row":68,"column":25},"end":{"row":68,"column":26},"action":"insert","lines":["a"]},{"start":{"row":68,"column":26},"end":{"row":68,"column":27},"action":"insert","lines":["m"]},{"start":{"row":68,"column":27},"end":{"row":68,"column":28},"action":"insert","lines":["e"]}],[{"start":{"row":75,"column":18},"end":{"row":75,"column":20},"action":"insert","lines":["\"\""],"id":1263}],[{"start":{"row":75,"column":19},"end":{"row":75,"column":20},"action":"insert","lines":["/"],"id":1264}],[{"start":{"row":75,"column":19},"end":{"row":75,"column":20},"action":"remove","lines":["/"],"id":1265}],[{"start":{"row":75,"column":19},"end":{"row":75,"column":20},"action":"insert","lines":["・"],"id":1266}],[{"start":{"row":75,"column":21},"end":{"row":75,"column":22},"action":"insert","lines":["."],"id":1267}],[{"start":{"row":75,"column":20},"end":{"row":75,"column":21},"action":"remove","lines":["\""],"id":1268},{"start":{"row":75,"column":19},"end":{"row":75,"column":20},"action":"remove","lines":["・"]},{"start":{"row":75,"column":18},"end":{"row":75,"column":19},"action":"remove","lines":["\""]}],[{"start":{"row":75,"column":18},"end":{"row":75,"column":19},"action":"remove","lines":["."],"id":1269}],[{"start":{"row":75,"column":23},"end":{"row":75,"column":24},"action":"insert","lines":["\""],"id":1270},{"start":{"row":75,"column":24},"end":{"row":75,"column":25},"action":"insert","lines":["\""]}],[{"start":{"row":75,"column":24},"end":{"row":75,"column":25},"action":"insert","lines":["/"],"id":1271}],[{"start":{"row":75,"column":24},"end":{"row":75,"column":25},"action":"remove","lines":["/"],"id":1272}],[{"start":{"row":75,"column":24},"end":{"row":75,"column":25},"action":"insert","lines":["・"],"id":1273}],[{"start":{"row":75,"column":26},"end":{"row":75,"column":27},"action":"insert","lines":["."],"id":1274}],[{"start":{"row":75,"column":23},"end":{"row":75,"column":24},"action":"insert","lines":["."],"id":1275}],[{"start":{"row":75,"column":27},"end":{"row":75,"column":28},"action":"remove","lines":["."],"id":1276}],[{"start":{"row":66,"column":10},"end":{"row":67,"column":8},"action":"insert","lines":["","        "],"id":1277}],[{"start":{"row":67,"column":8},"end":{"row":67,"column":9},"action":"insert","lines":["H"],"id":1278},{"start":{"row":67,"column":9},"end":{"row":67,"column":10},"action":"insert","lines":["1"]}],[{"start":{"row":67,"column":9},"end":{"row":67,"column":10},"action":"remove","lines":["1"],"id":1279},{"start":{"row":67,"column":8},"end":{"row":67,"column":9},"action":"remove","lines":["H"]}],[{"start":{"row":67,"column":8},"end":{"row":67,"column":9},"action":"insert","lines":["h"],"id":1280},{"start":{"row":67,"column":9},"end":{"row":67,"column":10},"action":"insert","lines":["1"]}],[{"start":{"row":67,"column":8},"end":{"row":67,"column":10},"action":"remove","lines":["h1"],"id":1281},{"start":{"row":67,"column":8},"end":{"row":67,"column":17},"action":"insert","lines":["<h1></h1>"]}],[{"start":{"row":67,"column":12},"end":{"row":67,"column":19},"action":"insert","lines":["ひとこと掲示板"],"id":1282}],[{"start":{"row":37,"column":60},"end":{"row":37,"column":61},"action":"remove","lines":["時"],"id":1283},{"start":{"row":37,"column":59},"end":{"row":37,"column":60},"action":"remove","lines":["日"]}],[{"start":{"row":37,"column":59},"end":{"row":37,"column":60},"action":"insert","lines":["-"],"id":1284}],[{"start":{"row":37,"column":60},"end":{"row":37,"column":61},"action":"remove","lines":[":"],"id":1285}],[{"start":{"row":4,"column":15},"end":{"row":4,"column":16},"action":"remove","lines":["/"],"id":1286}],[{"start":{"row":4,"column":15},"end":{"row":4,"column":16},"action":"insert","lines":["-"],"id":1287}],[{"start":{"row":4,"column":17},"end":{"row":4,"column":18},"action":"remove","lines":["/"],"id":1288}],[{"start":{"row":4,"column":17},"end":{"row":4,"column":18},"action":"insert","lines":["-"],"id":1289}],[{"start":{"row":4,"column":14},"end":{"row":4,"column":15},"action":"remove","lines":["y"],"id":1290}],[{"start":{"row":4,"column":14},"end":{"row":4,"column":15},"action":"insert","lines":["Y"],"id":1291}],[{"start":{"row":37,"column":24},"end":{"row":37,"column":25},"action":"remove","lines":["."],"id":1292},{"start":{"row":37,"column":23},"end":{"row":37,"column":24},"action":"remove","lines":["'"]},{"start":{"row":37,"column":22},"end":{"row":37,"column":23},"action":"remove","lines":[":"]},{"start":{"row":37,"column":21},"end":{"row":37,"column":22},"action":"remove","lines":["前"]},{"start":{"row":37,"column":20},"end":{"row":37,"column":21},"action":"remove","lines":["名"]},{"start":{"row":37,"column":19},"end":{"row":37,"column":20},"action":"remove","lines":["'"]}],[{"start":{"row":37,"column":25},"end":{"row":37,"column":26},"action":"insert","lines":["."],"id":1293}],[{"start":{"row":37,"column":25},"end":{"row":37,"column":27},"action":"insert","lines":["\"\""],"id":1294}],[{"start":{"row":37,"column":26},"end":{"row":37,"column":27},"action":"insert","lines":[":"],"id":1295}],[{"start":{"row":37,"column":40},"end":{"row":37,"column":41},"action":"remove","lines":["'"],"id":1296},{"start":{"row":37,"column":39},"end":{"row":37,"column":40},"action":"remove","lines":[":"]},{"start":{"row":37,"column":38},"end":{"row":37,"column":39},"action":"remove","lines":["ト"]},{"start":{"row":37,"column":37},"end":{"row":37,"column":38},"action":"remove","lines":["ン"]},{"start":{"row":37,"column":36},"end":{"row":37,"column":37},"action":"remove","lines":["メ"]},{"start":{"row":37,"column":35},"end":{"row":37,"column":36},"action":"remove","lines":["コ"]},{"start":{"row":37,"column":34},"end":{"row":37,"column":35},"action":"remove","lines":["'"]}],[{"start":{"row":37,"column":33},"end":{"row":37,"column":34},"action":"remove","lines":["."],"id":1297}],[{"start":{"row":70,"column":35},"end":{"row":70,"column":36},"action":"remove","lines":["言"],"id":1298},{"start":{"row":70,"column":34},"end":{"row":70,"column":35},"action":"remove","lines":["発"]}],[{"start":{"row":70,"column":34},"end":{"row":70,"column":38},"action":"insert","lines":["コメント"],"id":1299}],[{"start":{"row":70,"column":37},"end":{"row":70,"column":38},"action":"remove","lines":["ト"],"id":1300},{"start":{"row":70,"column":36},"end":{"row":70,"column":37},"action":"remove","lines":["ン"]},{"start":{"row":70,"column":35},"end":{"row":70,"column":36},"action":"remove","lines":["メ"]},{"start":{"row":70,"column":34},"end":{"row":70,"column":35},"action":"remove","lines":["コ"]}],[{"start":{"row":70,"column":34},"end":{"row":70,"column":38},"action":"insert","lines":["ひとこと"],"id":1301},{"start":{"row":70,"column":38},"end":{"row":70,"column":42},"action":"insert","lines":["ひとこと"]}],[{"start":{"row":71,"column":41},"end":{"row":71,"column":42},"action":"remove","lines":["稿"],"id":1302},{"start":{"row":71,"column":40},"end":{"row":71,"column":41},"action":"remove","lines":["投"]}],[{"start":{"row":71,"column":40},"end":{"row":71,"column":42},"action":"insert","lines":["送信"],"id":1303}],[{"start":{"row":70,"column":41},"end":{"row":70,"column":42},"action":"remove","lines":["と"],"id":1304},{"start":{"row":70,"column":40},"end":{"row":70,"column":41},"action":"remove","lines":["こ"]},{"start":{"row":70,"column":39},"end":{"row":70,"column":40},"action":"remove","lines":["と"]},{"start":{"row":70,"column":38},"end":{"row":70,"column":39},"action":"remove","lines":["ひ"]}],[{"start":{"row":73,"column":16},"end":{"row":73,"column":17},"action":"remove","lines":[">"],"id":1305},{"start":{"row":73,"column":15},"end":{"row":73,"column":16},"action":"remove","lines":["p"]},{"start":{"row":73,"column":14},"end":{"row":73,"column":15},"action":"remove","lines":["/"]},{"start":{"row":73,"column":13},"end":{"row":73,"column":14},"action":"remove","lines":["<"]},{"start":{"row":73,"column":12},"end":{"row":73,"column":13},"action":"remove","lines":["言"]},{"start":{"row":73,"column":11},"end":{"row":73,"column":12},"action":"remove","lines":["発"]},{"start":{"row":73,"column":10},"end":{"row":73,"column":11},"action":"remove","lines":[">"]},{"start":{"row":73,"column":9},"end":{"row":73,"column":10},"action":"remove","lines":["p"]},{"start":{"row":73,"column":8},"end":{"row":73,"column":9},"action":"remove","lines":["<"]},{"start":{"row":73,"column":4},"end":{"row":73,"column":8},"action":"remove","lines":["    "]},{"start":{"row":73,"column":0},"end":{"row":73,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":72,"column":15},"end":{"row":73,"column":0},"action":"remove","lines":["",""],"id":1306}],[{"start":{"row":54,"column":13},"end":{"row":55,"column":0},"action":"insert","lines":["",""],"id":1307},{"start":{"row":55,"column":0},"end":{"row":55,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":55,"column":12},"end":{"row":55,"column":13},"action":"insert","lines":["$"],"id":1308},{"start":{"row":55,"column":13},"end":{"row":55,"column":14},"action":"insert","lines":["d"]},{"start":{"row":55,"column":14},"end":{"row":55,"column":15},"action":"insert","lines":["a"]},{"start":{"row":55,"column":15},"end":{"row":55,"column":16},"action":"insert","lines":["t"]},{"start":{"row":55,"column":16},"end":{"row":55,"column":17},"action":"insert","lines":["a"]}],[{"start":{"row":55,"column":17},"end":{"row":55,"column":18},"action":"insert","lines":[" "],"id":1309},{"start":{"row":55,"column":18},"end":{"row":55,"column":19},"action":"insert","lines":["~"]}],[{"start":{"row":55,"column":18},"end":{"row":55,"column":19},"action":"remove","lines":["~"],"id":1310}],[{"start":{"row":55,"column":18},"end":{"row":55,"column":19},"action":"insert","lines":["="],"id":1311}],[{"start":{"row":55,"column":19},"end":{"row":55,"column":20},"action":"insert","lines":[" "],"id":1312},{"start":{"row":55,"column":20},"end":{"row":55,"column":21},"action":"insert","lines":["r"]},{"start":{"row":55,"column":21},"end":{"row":55,"column":22},"action":"insert","lines":["e"]}],[{"start":{"row":55,"column":22},"end":{"row":55,"column":23},"action":"insert","lines":["v"],"id":1313},{"start":{"row":55,"column":23},"end":{"row":55,"column":24},"action":"insert","lines":["e"]},{"start":{"row":55,"column":24},"end":{"row":55,"column":25},"action":"insert","lines":["r"]},{"start":{"row":55,"column":25},"end":{"row":55,"column":26},"action":"insert","lines":["s"]},{"start":{"row":55,"column":26},"end":{"row":55,"column":27},"action":"insert","lines":["e"]}],[{"start":{"row":55,"column":20},"end":{"row":55,"column":21},"action":"insert","lines":["a"],"id":1314},{"start":{"row":55,"column":21},"end":{"row":55,"column":22},"action":"insert","lines":["r"]},{"start":{"row":55,"column":22},"end":{"row":55,"column":23},"action":"insert","lines":["r"]},{"start":{"row":55,"column":23},"end":{"row":55,"column":24},"action":"insert","lines":["a"]},{"start":{"row":55,"column":24},"end":{"row":55,"column":25},"action":"insert","lines":["y"]},{"start":{"row":55,"column":25},"end":{"row":55,"column":26},"action":"insert","lines":["_"]}],[{"start":{"row":55,"column":33},"end":{"row":55,"column":35},"action":"insert","lines":["()"],"id":1315}],[{"start":{"row":55,"column":34},"end":{"row":55,"column":35},"action":"insert","lines":["$"],"id":1316},{"start":{"row":55,"column":35},"end":{"row":55,"column":36},"action":"insert","lines":["d"]},{"start":{"row":55,"column":36},"end":{"row":55,"column":37},"action":"insert","lines":["a"]},{"start":{"row":55,"column":37},"end":{"row":55,"column":38},"action":"insert","lines":["t"]},{"start":{"row":55,"column":38},"end":{"row":55,"column":39},"action":"insert","lines":["a"]}],[{"start":{"row":55,"column":40},"end":{"row":55,"column":41},"action":"insert","lines":[";"],"id":1317}],[{"start":{"row":54,"column":13},"end":{"row":55,"column":0},"action":"insert","lines":["",""],"id":1318},{"start":{"row":55,"column":0},"end":{"row":55,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":55,"column":12},"end":{"row":55,"column":13},"action":"insert","lines":["h"],"id":1319},{"start":{"row":55,"column":13},"end":{"row":55,"column":14},"action":"insert","lines":["a"]},{"start":{"row":55,"column":14},"end":{"row":55,"column":15},"action":"insert","lines":["i"]},{"start":{"row":55,"column":15},"end":{"row":55,"column":16},"action":"insert","lines":["r"]},{"start":{"row":55,"column":16},"end":{"row":55,"column":17},"action":"insert","lines":["e"]},{"start":{"row":55,"column":17},"end":{"row":55,"column":18},"action":"insert","lines":["t"]},{"start":{"row":55,"column":18},"end":{"row":55,"column":19},"action":"insert","lines":["u"]}],[{"start":{"row":55,"column":19},"end":{"row":55,"column":20},"action":"insert","lines":[" "],"id":1320}],[{"start":{"row":55,"column":19},"end":{"row":55,"column":20},"action":"remove","lines":[" "],"id":1321},{"start":{"row":55,"column":18},"end":{"row":55,"column":19},"action":"remove","lines":["u"]},{"start":{"row":55,"column":17},"end":{"row":55,"column":18},"action":"remove","lines":["t"]},{"start":{"row":55,"column":16},"end":{"row":55,"column":17},"action":"remove","lines":["e"]},{"start":{"row":55,"column":15},"end":{"row":55,"column":16},"action":"remove","lines":["r"]},{"start":{"row":55,"column":14},"end":{"row":55,"column":15},"action":"remove","lines":["i"]},{"start":{"row":55,"column":13},"end":{"row":55,"column":14},"action":"remove","lines":["a"]},{"start":{"row":55,"column":12},"end":{"row":55,"column":13},"action":"remove","lines":["h"]}],[{"start":{"row":55,"column":12},"end":{"row":55,"column":14},"action":"insert","lines":["配列"],"id":1322},{"start":{"row":55,"column":14},"end":{"row":55,"column":15},"action":"insert","lines":["を"]}],[{"start":{"row":55,"column":15},"end":{"row":55,"column":19},"action":"insert","lines":["逆に表示"],"id":1323}],[{"start":{"row":55,"column":18},"end":{"row":55,"column":19},"action":"remove","lines":["示"],"id":1324},{"start":{"row":55,"column":17},"end":{"row":55,"column":18},"action":"remove","lines":["表"]}],[{"start":{"row":55,"column":17},"end":{"row":55,"column":19},"action":"insert","lines":["する"],"id":1325}],[{"start":{"row":55,"column":14},"end":{"row":55,"column":15},"action":"insert","lines":["の"],"id":1326}],[{"start":{"row":55,"column":15},"end":{"row":55,"column":17},"action":"insert","lines":["順番"],"id":1327}],[{"start":{"row":55,"column":12},"end":{"row":55,"column":15},"action":"insert","lines":["// "],"id":1328}]]},"ace":{"folds":[],"scrolltop":525,"scrollleft":0,"selection":{"start":{"row":55,"column":20},"end":{"row":55,"column":20},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":42,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1637634610841,"hash":"5c5b890400e929330a65cfc4a52d5ba7dffce720"}