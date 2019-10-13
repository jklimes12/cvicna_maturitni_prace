<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "database.php";
session_start();
$submit = filter_input(INPUT_POST, "registrationSubmit");
 ?>
 <?php

    if (!empty($submit)) {
      echo "Formulář je odeslán";

      $email = filter_input(INPUT_POST, "email");
      $name = filter_input(INPUT_POST, "name");
      $password = filter_input(INPUT_POST, "password");

      $salt = "huiasgblau19aszdu23asdh65sfdgr8s§dahdlsgaf";
      $hashedPassword = MD5($password . $salt);

      $sqlI = $mysqli->prepare("
      INSERT INTO user (name, email , password)
      VALUES (?,?,?);
      ");

      $sqlI->bind_param('sss',$name , $email , $hashedPassword);
      $sqlI->execute();
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
      <p>registrace</p>
    </div>
    <!-- Login Form -->
    <form action="registrace.php" method="post">
      <input type="name" name="name" class="fadeIn second" placeholder="name"id="name" >
      <input type="email" name="email" class="fadeIn second" placeholder="email"id="login" >
      <input type="password" name="password" class="fadeIn third" placeholder="password" id="password">
      <input type="submit" name="registrationSubmit" class="fadeIn fourth" value="registrovat">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">zapomněl jsi heslo?</a>
    </div>

  </div>
</div>
