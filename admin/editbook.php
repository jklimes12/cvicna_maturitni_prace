<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "header.php" ?>

<?php
$idKniha = filter_input(INPUT_GET, "id_kniha");
?><h1 class="mt-5">Edit</h1>
<?php

$submit = filter_input(INPUT_POST, "submit");
if ($submit == "potvrdit") {
  $nazev = filter_input(INPUT_POST, "nazev");
  $strany = filter_input(INPUT_POST, "strany");
  $rokvydani = filter_input(INPUT_POST, "rok_vydani");

  $sqlU = $mysqli->prepare("UPDATE knihy
                            SET
                              nazev = ?,
                              strany = ?,
                              rok_vydani = ?
                            WHERE id_kniha = ? ");
$sqlU->bind_param( "sssd", $nazev, $strany, $rokvydani, $idKniha);
$sqlU->execute();
echo "provedeno";
};


$sql = $mysqli->prepare("SELECT id_kniha, nazev, strany, rok_vydani, a.id_autor, a.jmeno, a.prijmeni
                         FROM knihy k
                         JOIN autor_knihy ak ON k.id_kniha = ak.id_knihy
                         JOIN autor a ON a.id_autor = ak.id_autor
                         WHERE k.id_kniha = ?");
$sql ->bind_param("s", $idKniha);
$sql ->execute();
$book = $sql->get_result()->fetch_assoc();
?>


<form action="editbook.php?id_kniha=<?php echo $idKniha; ?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Kniha</label>
    <input type="text" name="nazev" class="form-control" id="nazev" aria-describedby="nazevknihy" placeholder="nazev knihy" value="<?php echo $book["nazev"] ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Počet stran</label>
    <input type="number" name="strany" class="form-control" id="strany" aria-describedby="strany" placeholder="strany" value="<?php echo $book["strany"] ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Rok vydání</label>
    <input type="number" name="rok_vydani" class="form-control" id="rok_vydani" aria-describedby="rok_vydani" placeholder="0" value="<?php echo $book["rok_vydani"] ?>">
  </div>
  <?php
    $sql2 = $mysqli->prepare("SELECT *
                               FROM autor");
    $sql2->execute();
    $autors = $sql2->get_result();
    ?>


  <select class="custom-select">
    <?php
      while ($autor = $autors -> fetch_assoc()) {?>

        <option
        <?php if ($book["id_autor"] == $autor["id_autor"]) {
          ?>selected<?php
          }?>
          value="<?php echo $autor["id_autor"];?>">
          <?php echo $autor["jmeno"]. " " .$autor["prijmeni"];?>
        </option>
      <?php } ?>
  </select>
  <button type="submit" name="submit" class="btn btn-primary mt-3" value="potvrdit">Submit</button>
</form>
<?php var_dump($submit) ?>

<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "footer.php" ?>
