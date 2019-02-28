<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "header.php" ?>

<?php
$idKniha = filter_input(INPUT_GET, "id_kniha");
$sql = $mysqli->prepare("SELECT id_kniha, nazev, strany, rok_vydani, a.id_autor, a.jmeno, a.prijmeni
                         FROM knihy k
                         JOIN autor_knihy ak ON k.id_kniha = ak.id_knihy
                         JOIN autor a ON a.id_autor = ak.id_autor
                         WHERE k.id_kniha = ?");
$sql ->bind_param("s", $idKniha);
$sql ->execute();
$book = $sql->get_result()->fetch_assoc();
?>

<form>
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
    <input type="number" name="rok_vydani" class="form-control" id="RokVydani" aria-describedby="RokVydani" placeholder="0" value="<?php echo $book["rok_vydani"] ?>">
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

        <option value="<?php echo $autor["id_autor"];?>">
          <?php echo $autor["jmeno"]. " " .$autor["prijmeni"];?>
        </option>
      <?php } ?>
  </select>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>

<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "footer.php" ?>
