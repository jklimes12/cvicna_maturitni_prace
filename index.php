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
        $sql = $mysqli->prepare("SELECT id_kniha, nazev, strany FROM `knihy`");
        $sql -> execute();
        $result = $sql->get_result();
        while ($book = $result->fetch_assoc()) {
          ?>
          <a href="bookdetail.php?id_kniha=<?php echo $book["id_kniha"]; ?>">
             <?php
             echo $book["nazev"];
             echo $book["id_kniha"];
             echo "<br>";
             ?>
          </a>
          <?php
        };
       ?>

   </body>
 </html>
