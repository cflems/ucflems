<?php
define('INTERNAL', 1);
if (!empty($_POST['shorten'])) {
  $dst = filter_var($_POST['dst'], FILTER_VALIDATE_URL);
  $dst_scheme = strtolower(parse_url($dst, PHP_URL_SCHEME));
  if (in_array($dst_scheme, array('http', 'https'), true)) {
    include 'db.inc.php';
    $stmt = $db->prepare('INSERT INTO links (dst) VALUES (?)') or die($db->error);
    $stmt->bind_param('s', $dst) or die($stmt->error);
    $stmt->execute() or die($stmt->error);
    if ($stmt->affected_rows < 1)
      die('Insert failed: ' . $db->error . $stmt->error);
    $src = 'https://u.cflems.net/' . $stmt->insert_id;
    $stmt->close();
    $db->close();
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>ucflems</title>
    <link rel="icon" type="image/svg+xml" href="https://cdn.cflems.net/c6ffca023.svg" />
    <link rel="stylesheet" href="https://cflems.net/css/fonts.css" />
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
<?php
if (empty($src)) {
?>
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
<?php
} else {
?>
        <h2><a href="#" onclick="navigator.clipboard.writeText('<?=addslashes($src);?>'); return false;"><?=htmlentities($src);?></a></h2>
      </div>
      <hr />
      <div id="bubblefoot">
        <a href="https://u.cflems.net/">&larr; Back</a>
      </div>
<?php
}
?>
    </div>
  </div>
  <p id="copy"><span id="copynotice">Copyright &copy; 2016-<?=date('Y');?> Carson Fleming</span></p>
  </body>
</html>
