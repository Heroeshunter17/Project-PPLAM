<?php 
session_start();

// jika belum login, maka akan ditendang ke login.php
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

require 'functions.php'; // bisa require atau include tergantung penggunaan
// $mahasiswa = query("SELECT * FROM mahasiswa");
// jika ingin mengurutkan dari bawah ke atas
// $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

// tombol cari ditekan
// if (isset($_POST["cari"])){
//     $mahasiswa = cari($_POST["keyword"]);
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Index</h1>
    <a href="logout.php">Log out</a>
</body>
</html>