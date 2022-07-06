<?php 
session_start();

// jika belum login, maka akan ditendang ke login.php
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <title>Keripik Firda</title>

    <style>
    .garis_verikal{
      border-left: 1px black solid;
      height:100%;
      width: 0px;
    }
    </style>

</head>
<body class="container bg-light">
<div class="row bg-light">
    <div class="col-3 mt-4 " >
    <center>
    <div class="profile">
              <div class="profile profile">
              <img src="img/user.png" class="img-circle profile_img" height="100" width="100">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h4>Owner</h4>
              </div>
            </div>

            <div>
             <div class="card bg-light">
             <a href="index.php?page=tampil" class="btn btn-light"><i class="fa fa-home"></i> Home </a>
             </div>

             <div class="card mt-3">
             <a href="index.php?page=stok" class="btn btn-light"><i class="fa fa-calendar"></i> Stock </a>
             </div>

             <div class="card bg-light mt-3">
             <a href="index.php?page=pengeluaran" class="btn btn-light"><i class="fa fa-bolt"></i> Pengeluaran </a>
             </div>
             
    </center>
    </div>
    <div class="container col-9 mt-3">
    <?php
      $queries = array();
      parse_str($_SERVER['QUERY_STRING'], $queries);
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      switch ($queries['page']) {
      	case 'tampil':
      		include 'home.php';
		      break;
        case 'stok':
            include 'stok.php';
            break;
        case 'pengeluaran':
            include 'pengeluaran.php';
            break;
        case 'editStok':
            include 'editStok.php';
            break;
        case 'tambahStok':
            include 'tambahStok.php';
            break;
        case 'editPengeluaran':
              include 'editpengeluaran.php';
              break;
        case 'tambahPengeluaran':
              include 'tambahPengeluaran.php';
              break;

        default:
        include 'home.php';
        break;
        }
        ?>

    </div>
      
</div>
</div>
</div>
</body>
</html>