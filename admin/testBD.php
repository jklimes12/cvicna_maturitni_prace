<?php
require_once __DIR__ . DIRECTORY_SEPARATOR. ".." . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "Database.php";
 ?>
<!DOCTYPE html>
<html lang="cs" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $sqlBooks = "SELECT * FROM knihy;";
    $resultBooks = Database::quarry($sqlBooks);

    while ($book = mysqli_fetch_assoc($resultBooks)) {
      var_dump($book);
    };
    ?>
  </body>
</html>
