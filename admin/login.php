<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "database.php";
$submit = filter_input(INPUT_POST, "loginSubmit");
 ?>
 <?php

$sql = $mysqli->prepare("SELECT * FROM user WHERE email, password ");
$sql ->bind_param("ss", $email , $hashedPassword);
$sql ->execute();

    if ($submit == "Odeslat") {
      echo "Formulář je odeslán";
      $login = filter_input(INPUT_POST, "email");
      $password = filter_input(INPUT_POST, "password");

      $salt = "huiasgblau19aszdu23asdh65sfdgr8s§dahdlsgaf";

      $result = mysqlli_querry($mysli, "SELECT * FROM user WHERE email = '". $email."' and password = '". md5($password . $salt)"'");

      if (($login == $email) && ($hashedPassword == $password)) {
        session_start();
        $_SESSION["login"] = $email;
        header('location: index.php');
      }
      else {
        echo "</br>Špatné přihlašovací údaje";
      }
    }
    ?>

<link href="//maxcdn.bootstrapcdno/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="style.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class = "container form-signin">

</div>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <p>přihlášení</p>
    </div>
    <!-- Login Form -->
    <form action="login.php" method="post">
      <input type="email" name="login" class="fadeIn second" placeholder="login"id="login" >
      <input type="password" name="password" class="fadeIn third"  placeholder="password" id="password">
      <input type="submit" name="loginSubmit" class="fadeIn fourth" value="Odeslat">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">zapomněl jsi heslo?</a>
    </div>

  </div>
</div>
