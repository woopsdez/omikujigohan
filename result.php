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
    <form id="form1" name="form1" method="GET" action="result.php">
      <h1><a href="http://omikujigohan.woopsdez.jp/"><img src="images/mainimages.gif" width="300" height="265" alt="おみくじごはん" /></a></h1>
      <p><input name="submit" type="submit" value="もう一回おみくじする" /></p>
      <p class="result">

        <?php
        mb_language('Japanese');
        mb_internal_encoding('UTF-8');

        //========== 変数定義 ==========//
        $result = null;

        //========== 関数定義 ==========//
        function remove_tags($args){
          $args = htmlspecialchars($args);
          $args = strip_tags($args);
          return $args;
        }

        //========== 実行部分 ==========//

        // フォームからのデータ受けとり
        foreach ($_GET['item'] as $key => $value) {
          if ($value != '') {
            $str = remove_tags($value);
            $menu[$key] = $str;
          }
        }

        if (isset($menu)) {
          // menuが定義されている
          // 取得したフォームからの入力データからランダムでひとつ選ぶ
          $rand_keys = array_rand($menu);
          $result = $menu[$rand_keys];
        } else {
          // お品書きを読み込むランダムでひとつ選ぶ
          $string = @file('menu.txt') or die("ファイルが読み込めませんでした。 \n");
          $key = array_rand($string);
          $len = mb_strlen($string[$key])-1;
          $result = $string[$key];
        }
        ?>
        
        <a href="https://www.google.co.jp/#q=<?php echo $result; ?>" target="_blank">
          <span><?php echo $result; ?></span>
        </a>
      </p>

      <div id="Option"> 
       <div id="Items">
        <dl>
          <dt>下のフォームにメニューを入れるとその中のメニューだけでおみくじができるゾ。</dt>
          <?php foreach ($_GET['item'] as $key => $value) {
            echo '<dd><input type="text" name="item[]" id="item'.$key.'" value="'.$value.'" /></dd>';
          } ?>
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
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-413655-9', 'auto');
ga('send', 'pageview');
</script>
</body>
</html>