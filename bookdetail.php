<?php

  require_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "database.php";

 ?>
<!DOCTYPE html>
<html lang="cs" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $idKniha = filter_input(INPUT_GET, "id_kniha");
    $sql = $mysqli->prepare("SELECT * FROM knihy k JOIN autor_knihy ak ON k.id_kniha = ak.id_knihy WHERE k.id_kniha = ?");
    $sql ->bind_param("s", $idKniha);
    $sql ->execute();
    $book = $sql->get_result()->fetch_assoc();
    ?>
    <?php
    echo $book["nazev"];
    echo "<br>";
    echo $book["strany"];
    echo "<br>";
    echo $book["id_kniha"];
    ?>
  </body>
</html>
