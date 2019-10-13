<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "Database.php";
session_start();
$submit = filter_input(INPUT_POST, "loginSubmit");
 ?>
 <?php


    if (!empty($submit)) {
      echo "Formulář je odeslán";
      $email = filter_input(INPUT_POST, "login");
      $password = filter_input(INPUT_POST, "password");

      define('SALT', "huiasgblau19aszdu23asdh65sfdgr8s§dahdlsgaf");
      $hashedPassword = md5($password . SALT);

      $query = "SELECT * FROM user WHERE email LIKE '$email' AND password LIKE '$hashedPassword'";
      echo $query;
      $userResult = Database::query($query);
      $user = $userResult->fetch_assoc();

      if (($email == $user["email"]) && ($hashedPassword == $user["password"])) {
        $_SESSION["login"] = $email;
        header('location: index.php');
      }
      else {
        echo "</br>Špatné přihlašovací údaje";?><br><?php
        echo $hashedPassword;
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
