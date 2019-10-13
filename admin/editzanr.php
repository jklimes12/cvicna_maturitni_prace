<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "header.php" ?>

<?php
$sqluser = $mysqli->prepare("SELECT * FROM user WHERE email = ?;");
$sqluser->bind_param("s", $_SESSION["login"]);
$sqluser->execute();
$user = $sqluser->get_result()->fetch_assoc();
if ($user["id_role"] == 1){
?>

 <h1 class="mt-5">Edit</h1>
<?php

$submit = filter_input(INPUT_POST, "submit");
$idzanr = filter_input(INPUT_GET, "id_zanr");
if ($idzanr != NULL ) {
if ($submit == "potvrdit") {
$zanr = filter_input(INPUT_POST, "zanr");
  $sqlU = $mysqli->prepare("UPDATE zanr
                            SET
                              zanr = ?
                            WHERE id_zanr = ? ");
$sqlU->bind_param( "sd", $zanr, $idzanr);
$sqlU->execute();
echo "provedeno";
};

$sql = $mysqli->prepare("SELECT *
                         FROM zanr
                         WHERE id_zanr = ?
                         ");
$sql ->bind_param("d", $idzanr);
$sql ->execute();
$zanr = $sql->get_result()->fetch_assoc();
?>

<form action="editzanr.php?id_zanr=<?php echo $idzanr; ?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">zanr</label>
    <input type="text" name="zanr" class="form-control" id="zanr" aria-describedby="zanr"vcplaceholder="zanr" value="<?php echo $zanr["zanr"] ?>">
  </div>
  <button type="submit" name="submit" class="btn btn-primary mt-3" value="potvrdit">Submit</button>
</form>
<?php }
else {
  echo "není zadáno id zanru";
}
}
else {
echo "</br></br>nemáš dostatečné práva :*";
}?>
<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "footer.php" ?>
