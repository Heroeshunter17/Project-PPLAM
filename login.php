<?php 
require 'functions.php';
session_start();

// jika sudah login, maka akan ditendang ke login.php
if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,"SELECT * FROM users 
                WHERE email = '$email'");

    // cek email
    if(mysqli_num_rows($result) === 1){ //menghitung ada berapa baris yang dikembalikan
        // cek password
        $row = mysqli_fetch_assoc($result);
        // password_verify(passwordsebelumdiacak,passwordsetelahdiacak) -> mengecek string apakah sama dengan hashnya (kebalikan password verify)
        if (password_verify($password,$row['password'])) { 
            //set session
            $_SESSION['login'] = true;
            header("Location: index.php");
            exit;
        }

    }
    $error = true;

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="background">
        
    </div>
    <div class="judul text-center">
        <title class="tulisan">Kelompok xx</title>
        <h1 class="tulisan">Selamat datang di aplikasi xx, silahkan<br>
            masukkan username untuk login
        </h1><br>
        
        <?php if(isset($error)):?>
            <p class="error">email/password salah</p>
        <?php endif; ?>

        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-3">
                    <form class="form-container" method="post">
                        <div class="mb-3">
                        <input placeholder="email" type="email" name="email" class="form-control textbox" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                        <input placeholder="password" type="password" name="password"  class="form-control textbox" id="exampleInputPassword1">
                        </div>
                        <button type="submit" name="login" class="btn btn-outline-dark text-center">Submit</button>
                    </form>
                </section>
            </section>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>    
</body>
</html>