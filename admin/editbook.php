<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "header.php" ?>

<?php
$query = "SELECT * FROM user WHERE email = '$_SESSION[login]'";
  $userResult = Database::query($query);
  $roleResult = $userResult->fetch_assoc();

if ($roleResult["id_role"] == 1){

  $id_kniha = filter_input(INPUT_GET, "id_kniha");
  $submit = filter_input(INPUT_POST, "submit");
  ?><h1 class="mt-5">Edit</h1>
  <?php
  if ($id_kniha != NULL ) {
    if ($submit == "potvrdit") {
      $nazev = filter_input(INPUT_POST, "nazev");
      $strany = filter_input(INPUT_POST, "strany");
      $rokvydani = filter_input(INPUT_POST, "rok_vydani");
      $id_autor = filter_input(INPUT_POST, "id_autor");

      $sqlU = "UPDATE knihy SET nazev = '$nazev', strany = '$strany', rok_vydani = '$rokvydani' WHERE id_kniha = $id_kniha ";
      $editResult = Database::query($sqlU);
      var_dump($editResult);

$sqlEdit2 = "UPDATE autor_knihy SET id_autor = '$id_autor' WHERE id_knihy = '$id_kniha' ";
$editResult2 = Database::query($sqlEdit2);
var_dump($editResult);
};

$sqlEditBook = "SELECT *
                         FROM knihy k
                         JOIN autor_knihy ak ON k.id_kniha = ak.id_knihy
                         JOIN autor a ON a.id_autor = ak.id_autor
                         WHERE k.id_kniha = $id_kniha";
$bookResult = Database::query($sqlEditBook);
$book = $bookResult->fetch_assoc();
?>
<form action="editbook.php?id_kniha=<?php echo $id_kniha; ?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Kniha</label>
    <input type="text" name="nazev" class="form-control" id="nazev" aria-describedby="nazevknihy" placeholder="nazev" value="<?php echo $book["nazev"] ?>">
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
  $sqlEditAutor = "SELECT * FROM autor";
  $autors = Database::query($sqlEditAutor);
?>
  <select  name="id_autor" class="custom-select">
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
<?php }
else {
  echo "není zadáno id knihy";
}
}
else {
echo "</br></br>nemáš dostatečné práva :*";
}?>
<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "footer.php" ?>
