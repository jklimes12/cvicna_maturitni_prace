<?php

  require_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "database.php";

 ?>
 <!DOCTYPE html>
 <html lang="CS" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
      <?php
        $sql = $mysqli->prepare("SELECT id_autor, jmeno, prijmeni FROM `autor`");
        $sql -> execute();
        $result = $sql->get_result();
        while ($autor = $result->fetch_assoc()) {
          ?>
          <a href="autordetail.php?id_autor=<?php echo $autor["id_autor"]; ?>">
             <?php
             echo $autor["jmeno"];
             echo $autor["prijmeni"];
             echo $autor["id_autor"];
             echo "<br>";
             ?>
          </a>
          <?php
        };
       ?>

   </body>
 </html>
