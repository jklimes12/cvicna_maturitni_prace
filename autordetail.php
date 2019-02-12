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
    $idautor =filter_input(INPUT_GET, "idautor");

    $sql = $mysqli->prepare("SELECT * FROM autor WHERE id_autor = ?");
    $sql -> bind_param("s", $idautor);
    $sql -> execute();
    $result = $sql->get_result();
    $autor = $result->fetch_assoc();

    ?>

    <h1>Autor<?php echo $autor["jmeno"] . "" . $autor["prijmeni"];?><h1>

    <h2>napsal tyto knihy<h2>
    <?php
    $sql2 = $mysqli->prepare("SELECT * FROM knihy k JOIN autor_knihy ak ON k.id_kniha = ak.id_knihy WHERE ak.id_autor = ?");
    $sql2 -> bind_param("s", $idautor);
    $sql2 -> execute();
    $result2 = $sql2->get_result();
    while ($book = $result2->fetch_assoc()) {
      ?>
      <a href="bookdetail.php?idknihy=<?php echo $book["id_kniha"];?>">
        <?php echo $book["nazev"]; ?>
      </a><br>
      <?php
      }
      ?>



  </body>
</html>
