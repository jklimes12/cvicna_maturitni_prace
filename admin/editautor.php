<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "header.php" ?>

<?php
$idautor = filter_input(INPUT_GET, "id_autor");
?><h1 class="mt-5">Edit</h1>
<?php

$submit = filter_input(INPUT_POST, "submit");
if ($submit == "potvrdit") {

  $jmeno = filter_input(INPUT_POST, "jmeno");
  $prijmeni = filter_input(INPUT_POST, "prijmeni");
  $sqlU = $mysqli->prepare("UPDATE autor
                            SET
                              jmeno = ?,
                              prijmeni = ?
                            WHERE id_autor = ? ");
$sqlU->bind_param( "ssd", $jmeno, $prijmeni, $idautor);
$sqlU->execute();
echo "provedeno";
};


$sql = $mysqli->prepare("SELECT *
                         FROM autor
                         WHERE id_autor = ?
                         ");
$sql ->bind_param("d", $idautor);
$sql ->execute();
$autor = $sql->get_result()->fetch_assoc();

?>


<form action="editautor.php?id_autor=<?php echo $idautor; ?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">jmeno</label>
    <input type="text" name="jmeno" class="form-control" id="jmeno" aria-describedby="jmenoautora"
    placeholder="jmenoautora" value="<?php echo $autor["jmeno"] ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">přijmení</label>
    <input type="text" name="prijmeni" class="form-control" id="prijmeni" aria-describedby="prijmeniautora" placeholder="prijmeni autora" value="<?php echo $autor["prijmeni"] ?>">
  </div>

  <button type="submit" name="submit" class="btn btn-primary mt-3" value="potvrdit">Submit</button>
</form>
<?php var_dump($submit) ?>

<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "footer.php" ?>
