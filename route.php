<?php
$key = intval(substr($_SERVER['PHP_SELF'], 1));
$found = false;

if ($key > 0) {
  include "db.inc.php";
  $stmt = $db->prepare("SELECT dst FROM links WHERE id = ? LIMIT 1") or die($db->error);
  $stmt->bind_param("i", $key) or die($stmt->error);
  $stmt->execute() or die($stmt->error);
  $stmt->bind_result($dst) or die($stmt->error);
  $found = $stmt->fetch();
  $stmt->close();
  $db->close();
}

if ($found) {     
  if (!empty($_SERVER['QUERY_STRING'])) $dst .= '?' . $_SERVER['QUERY_STRING'];
  header("HTTP/x 301 Moved Permanently");
  header("Location: ".$dst);
} else {
  header("HTTP/x 404 Not Found");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>ucflems</title>
  </head>
  <body>
<?php
if ($found) {
?>
    <p>Moved <a href="<?=$dst; ?>">here</a>.</p>
<?php
} else {
?>
    <p>Not found.</p>
<?php
}
?>
  </body>
</html>
