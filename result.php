<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>メニューに迷ったら! おみくじゴハン。</title>
<link href="css/site.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p>メニューに迷ったらおみくじごはん</p>
<div id="Maincolumn">
  <form id="form1" name="form1" method="post" action="result.php">
  <h1><a href="http://omikujigohan.woopsdez.jp/"><img src="images/mainimages.gif" width="300" height="265" alt="おみくじごはん" /></a></h1>
  <p><input name="submit" type="submit" value="もう一回おみくじする" /></p>
<p class="result">
<?php
$string = array();

for($i=0;$i<10;$i++){
	if(!$_POST['item'.$i]==""){
		$flag = 1;
		$string[$i] = htmlspecialchars($_POST['item'.$i]);
		$string[$i] = strip_tags($string[$i]);
	} 
}

mb_language('Japanese');
mb_internal_encoding('UTF-8');

if(!$flag == 1){
	$string = @file('menu.txt') or die("ファイルが読み込めませんでした。 \n");
	$key = array_rand($string);
	$len = mb_strlen($string[$key])-1;
} else {
	$key = array_rand($string);
	$len = mb_strlen($string[$key]);	
}

$result = $string[$key];

?>
<a href="http://gourmet.livedoor.com/search/restaurant/simple?local=&name=&menu=<?php echo $result; ?>&purpose=&x=0&y=0" target="_blank">
<span>
<?php
$result = str_replace("ー","|",$result);
for($i=0;$i<$len;$i++){
echo mb_substr($result,$i,1)."<br />\n";
}
?>
</span>
</a>
</p>

<div id="Option"> 
 <div id="Items">
    <dl>
      <dt>下のフォームにメニューを入れるとその中のメニューだけでおみくじができるゾ。</dt>
      <dd><input type="text" name="item0" id="item0" value="<?php echo $_POST[item0]; ?>" /></dd>
      <dd><input type="text" name="item1" id="item1" value="<?php echo $_POST[item1]; ?>" /></dd>
      <dd><input type="text" name="item2" id="item2" value="<?php echo $_POST[item2]; ?>" /></dd>
      <dd><input type="text" name="item3" id="item3" value="<?php echo $_POST[item3]; ?>" /></dd>
      <dd><input type="text" name="item4" id="item4" value="<?php echo $_POST[item4]; ?>" /></dd>
      <dd><input type="text" name="item5" id="item5" value="<?php echo $_POST[item5]; ?>" /></dd>
      <dd><input type="text" name="item6" id="item6" value="<?php echo $_POST[item6]; ?>" /></dd>
      <dd><input type="text" name="item7" id="item7" value="<?php echo $_POST[item7]; ?>" /></dd>
      <dd><input type="text" name="item8" id="item8" value="<?php echo $_POST[item8]; ?>" /></dd>
      <dd><input type="text" name="item9" id="item9" value="<?php echo $_POST[item9]; ?>" /></dd>
    </dl>
  
  </div>
  <p id="button"><img src="images/tab_option.gif" alt="候補を入れる" name="btn" width="41" height="132" /></p>
 </div>

 <div class="Clock">
  <p>そろそろお腹が空きましたね。</p>
</div>
 </form>
</div>
<div id="Footer">
  <p><img src="images/footerimages.gif" width="444" height="164" /></p>
  <p>運営：<a href="http://blog.woopsdez.jp">ウープスデザイン</a> | <a href="mailto:woops.mirai@gmail.com">お問い合わせ</a></p>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-413655-9");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>