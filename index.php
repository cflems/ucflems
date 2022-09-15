<?php
define('INTERNAL', 1);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>ucflems</title>
    <link rel="stylesheet" href="https://cflems.net/css/energize.css" />
    <link rel="stylesheet" href="https://cflems.net/css/contact.css" />
    <link rel="stylesheet" href="https://cflems.net/css/nav.css" />
    <link rel="stylesheet" href="local.css" />
  </head>
  <body>
<?php
@require('/home/cflems/site/cflems.net/shared/nav.php');
?>
  <div id="part1">
    <div id="bubble">
      <h1>ucflems</h1>
      <hr />
      <div id="shortener">
        <h2>You know what to do.</h2>
        <form action="" method="post">
          <p><input type="text" name="dst" placeholder="https://pqrstuv.longlinksrus.org/abcd/efgh/ijkl/mnop" /></p>
          <p><input type="submit" name="shorten" value="Shorten" /></p>
        </form>
      </div>
      <hr />
      <div id="bubblefoot">
        <a href="https://cflems.net/">&larr; Home</a>
      </div>
    </div>
    content..
  </div>
  <p id="copy"><span id="copynotice">Copyright &copy; 2016-<?=date('Y');?> Carson Fleming</span></p>
  </body>
</html>
