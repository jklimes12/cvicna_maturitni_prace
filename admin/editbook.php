<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "header.php" ?>

<?php
$idKniha = filter_input(INPUT_GET, "id_kniha");
$sql = $mysqli->prepare("SELECT * FROM knihy k JOIN autor_knihy ak ON k.id_kniha = ak.id_knihy WHERE k.id_kniha = ?");
$sql ->bind_param("s", $idKniha);
$sql ->execute();
$book = $sql->get_result()->fetch_assoc();
?>

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">kniha</label>
    <input type="text" class="form-control" id="nazev" aria-describedby="nazevknihy" placeholder="nazev knihy" value="<?php echo $book["nazev"] ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">počet stran</label>
    <input type="number" class="form-control" id="strany" aria-describedby="strany" placeholder="strany" value="<?php echo $book["strany"] ?>">
  </div>

  <select class="custom-select">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "footer.php" ?>
