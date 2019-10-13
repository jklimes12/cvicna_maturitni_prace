<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "header.php" ;
?><br> <br> <?php

$sqluser = "SELECT * FROM user WHERE email = ". $_SESSION['login'] . ";";
$loggedUser = Database::query($sqluser);

$sqluser2 = "SELECT * FROM user;";
$userResult = Database::query($sqluser2);
$result = $userResult->fetch_assoc()
?>
  <!DOCTYPE html>
  <html lang="cs" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>id uživatele</th>
              <th>email</th>
              <th>jmeno</th>
              <th>id role</th>
            </tr>
          </thead>
          <?php if ($result["id_role"] == 1) {
            while ($list = $userResult->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $list["id_user"];?></td>
              <td><?php echo $list["email"];?></td>
              <td><?php echo $list["name"];?></td>
              <td><?php echo $list["id_role"];?></td>
              <td><?php if ($result["id_role"] == 1) {
              ?><a class="btn btn-primary" href="admin/edituser.php?id_user=<?php echo $list["id_user"]; ?>">edit</a> <?php }; ?></td>
            </tr>
            <?php
          }
        }
        else {
          echo "nemáš práva prcku!!";
        }?>
    </html>
  </body>
</html>
