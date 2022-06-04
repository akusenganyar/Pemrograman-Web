<?php
   session_start();    
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <title>hasil tugas 3</title>
   </head>
   <body>
      <div class="card">
         <div class="card-header">
            Hasil
         </div>
         <div class="card-body">
         <ul class="list-group">
            <li class="list-group-item active" aria-current="true"><?= $_SESSION["nama"]?></li>
            <li class="list-group-item">NIM : <?= $_SESSION["NIM"]?></li>
            <li class="list-group-item">email : <?= $_SESSION["email"]?></li>
            <li class="list-group-item">Tanggal Lahir : <?= $_SESSION["dateBirth"]?></li>
            <li class="list-group-item">Jenis Kelamin : <?= $_SESSION["gender"]?></li>
            <li class="list-group-item">Hobi : <?php foreach($_SESSION["hobi"] as $hobi) : ?><?= $hobi; ?><?php endforeach;?></li>
            <li class="list-group-item">Deskripsi : <?= $_SESSION["deskripsi"]?></li>
         </ul>
         <a href="index.php" type="button" class="btn btn-primary mt-2" role="button">Back</a>
         </div>
      </div>
   </body>
</html>