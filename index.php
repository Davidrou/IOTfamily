<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=5; IE=8">
    <title>Document</title>
</head>
<body>
<div id="search" style="width: 60%;height: 30px; margin: 20px auto; position: relative;">
    <input id="searchInput" type="text" placeholder="请输入id,当前有13805条记录" style="width: 100%;height: 100%; border-radius: 6px; display: block; text-indent: 10px; outline: none">
    <input id="searchStart" type="button" style="width: 40px;height: 100%; text-align: center; line-height: 30px;font-weight: bolder; position: absolute;left: 100%;top: 0; display: block;margin-left: 10px;" value="搜索">
</div>
<?php
require_once "db.php";
ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);
$id=$_GET["id"];
$db = new DB ();

$sql="SELECT * FROM article_list WHERE id = {$id}";
$result= $db->execsql( $sql );
$arr = json_encode($result);
//print_r($arr);
if(empty($result)){
    echo "<h4>请输入正确id</h4>";
}else{
    echo "<h2>".$result[0]['title']."</h2>";
    echo "<p>".$result[0]['read_num']."</p>";
    echo "<p>".$result[0]['content']."</p>";
}

?>
<script>
    var gl={
        searchStart:document.getElementById("searchStart"),
        searchInput:document.getElementById("searchInput"),
    }
    gl.searchStart.onclick=function(e){
        var id = gl.searchInput.value;
        var href = "http://www.hisense.help/Node/?id="+id;
        window.location.href = href;
    };
    function key_up(e){
        var currKey= 0,
            e =e|| event;
        currKey= e.keyCode|| e.which|| w.charCode;
        if(currKey == 13){
            document.getElementById('searchStart').click();
        };
    };
    document.onkeyup=key_up;
</script>
</body>
</html>