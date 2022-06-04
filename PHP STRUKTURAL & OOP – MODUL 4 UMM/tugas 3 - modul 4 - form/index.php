<?php
    session_start();
    // input value error variables
    $nama_error = $NIM_error = $email_error = $dateBirth_error = $gender_error = $hobi_error = $deskripsi_error = "";
    // input value readiness variables
    $nama_ready = $NIM_ready = $email_ready = $dateBirth_ready = $gender_ready = $hobi_ready = $deskripsi_ready = false;
    // error format
    $_error = "is required";
    // checked checkbox variables
    $check_hobi1 = $check_hobi2 = $check_hobi3 = "";
    // checked checkbox format
    $_check = "checked";

    // input value validation statements
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["nama"])) $nama_error = "Nama " . $_error;
        else $nama_ready = true;

        if(empty($_POST["NIM"])) $NIM_error = "NIM " . $_error;
        else {
            if(!preg_match("/^[0-9]*$/",$_POST["NIM"])){
                $NIM_error = "NIM must integer number";
            }else $NIM_ready = true;
        }

        if(empty($_POST["email"])) $email_error = "Email  " . $_error;
        else {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $email_error = "Invalid email format";
            }else $email_ready = true;
        }

        if(empty($_POST["dateBirth"])) $dateBirth_error = "Tanggal lahir  " . $_error;
        else $dateBirth_ready = true;

        if(empty($_POST["gender"])) $gender_error = "Jenis-kelamin  " . $_error;
        else {
            $gender = test_input($_POST["gender"]);
            $gender_ready = true;
        }

        if(empty($_POST["hobi"])) $hobi_error = "Hobi  " . $_error;
        else {
            foreach($_POST["hobi"] as $h){
                if(!empty($h) && $h == "Hobi 1")$check_hobi1 = $_check;
                if(!empty($h) && $h == "Hobi 2")$check_hobi2 = $_check;
                if(!empty($h) && $h == "Hobi 3")$check_hobi3 = $_check;
            }
            $hobi_ready = true;
        }

        if(empty($_POST["deskripsi"])) $deskripsi_error = "Deskripsi  " . $_error;
        else $deskripsi_ready = true;
    }

    // all input expression for result page and redirect to it
    if($nama_ready && $NIM_ready && $email_ready && $dateBirth_ready && $gender_ready && $hobi_ready && $deskripsi_ready){
        $_SESSION["nama"] = $_POST["nama"];
        $_SESSION["NIM"] = $_POST["NIM"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["dateBirth"] = $_POST["dateBirth"];
        $_SESSION["gender"] = $_POST["gender"];
        $_SESSION["hobi"] = $_POST["hobi"];
        $_SESSION["deskripsi"] = $_POST["deskripsi"];
        header("Location: result.php");
        exit();
    }

    // checked multiple answer value
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <title>tugas 3</title>
   </head>
   <body>
      <div class="card">
         <div class="card-header">
            FORM
         </div>
         <div class="card-body">
            <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
               <!-- input untuk nama -->
               <div class="form-group">
                  <label>Nama : </label>
                  <input class="form-control" type="text" placeholder="Masukan Nama" name="nama" value=<?= isset($_POST["nama"]) ? $_POST["nama"] : "";?> >
                  <!-- error message -->
                  <small class="form-text text-danger"><?= $nama_error; ?></small>
               </div>
               <!-- input untuk NIM -->
               <div class="form-group">
                  <label>NIM : </label>
                  <input class="form-control" type="text" placeholder="Masukan NIM" name="NIM" value=<?= isset($_POST["NIM"]) ? $_POST["NIM"] : "";?>>
                  <!-- error message -->
                  <small class="form-text text-danger"><?= $NIM_error; ?></small>
               </div>
               <!-- input untuk email -->
               <div class="form-group">
                  <label>Email : </label>
                  <input type="email" class="form-control" placeholder="Enter email" name="email" value=<?= isset($_POST["email"]) ? $_POST["email"] : ""; ?>>
                  <!-- error message -->
                  <small class="form-text text-danger"><?= $email_error; ?></small>
               </div>
               <!-- input untuk tanggal lahir -->
               <div class="form-group">
                  <label>Tanggal Lahir : </label>
                  <br>
                  <input type="date" id="dateBirth" name="dateBirth" value=<?= isset($_POST["dateBirth"]) ? $_POST["dateBirth"] : "";?>>
                  <!-- error message -->
                  <small class="form-text text-danger"><?= $dateBirth_error; ?></small>
               </div>
               <!-- input untuk jenis kelamin -->
               <div class="form-group">
                  <label>Jenis Kelamin : </label>
                  <br>
                  <input type="radio" id="Laki-laki" name="gender" value="Laki-laki" <?php if(isset($gender) && $gender=="Laki-laki") echo "checked"; ?>>
                  <label>Laki-laki</label>
                  <input type="radio" id="Perempuan" name="gender" value="Perempuan" <?php if(isset($gender) && $gender=="Perempuan") echo "checked"; ?>>
                  <label>Perempuan</label>
                  <!-- error message -->
                  <small class="form-text text-danger"><?= $gender_error; ?></small>
               </div>
               <!-- input untuk hobi -->
               <div class="form-group">
                  <label>Hobi : </label>
                  <br>
                  <input type="checkbox" class="form-check-input ml-1" name="hobi[]" value="Hobi 1" <?= $check_hobi1?>>
                  <label class="form-check-label mr-4 ml-4">Memancing</label>
                  <input type="checkbox" class="form-check-input" name="hobi[]" value="Hobi 2" <?= $check_hobi2?>>
                  <label class="form-check-label mr-4">Joging</label>
                  <input type="checkbox" class="form-check-input" name="hobi[]" value="Hobi 3" <?= $check_hobi3?>>
                  <label class="form-check-label mr-4">Mengoding</label>
                  <!-- error message -->
                  <small class="form-text text-danger"><?= $hobi_error; ?></small>
               </div>
               <div class="form-group">
                  <label>Deskripsi : </label>
                  <textarea class="form-control" rows="3" name="deskripsi"><?= isset($_POST["deskripsi"]) ? $_POST["deskripsi"] : ""; ?></textarea>
                  <!-- error message -->
                  <small class="form-text text-danger"><?= $deskripsi_error; ?></small>
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
   </body>
</html>