<?php 
// session_start();

// jika belum login, maka akan ditendang ke login.php
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

require 'functions.php'; // bisa require atau include tergantung penggunaan
// $stok_barang = query("SELECT * FROM stok_barang");
$jumlah_barang = query("SELECT SUM(jumlah) as barang FROM stok_barang ")[0];
$pengeluaran = query("SELECT SUM(nominal) as pengeluaran FROM pengeluaran ")[0];
$harga = query("SELECT harga FROM produk ")[0];

?>

</php>
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
        .slider {
            width: 100%;
            text-align: center;
            overflow: hidden;
            margin: 40px 0;
        }
        
        .slides {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }
        
        .slides::-webkit-scrollbar {
            width: 2px;
            height: 10px;
        }
        
        .slides::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 5px;
        }
        
        .slides::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .slides>div {
            scroll-snap-align: start;
            flex-shrink: 0;
            width: 250px;
            height: 500px;
            margin: 0 15px 0 10px;
            background: #fff;
            transform-origin: center center;
            transform: scale(1);
            transition: transform 0.5s;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            font-size: 100%;
        }
</style>
<div class="container mr-2 bg-light">
<div class="row mt-2"> 
    <form action="" method="GET">
      <h3>Periode</h3> 
      <input type="date" id="setFirst" name="setFirst" min="2022-01-01">
      -
      <input type="date" id="setLast" class="me-3" name="setLast" min="2022-01-01">
      <button type="submit" name="submit" id="submit" class="btn btn-secondary"><i class="bi bi-sd-card me-2"></i>Set</button>

    </form>
  </div>

  <div class="row">
    <div class="col-2 "><h6>Stock Saat Ini</h6></div>
    <div class="col-2"><h6>Harga/pcs</h6></div>
    <div class="col-2"><h6>Pengeluaran</h6></div>
  </div>
  <div class="row">
    <div class="col-2"><?= $jumlah_barang["barang"] ?> bungkus</div>
    <div class="col-2"><?=  rupiah($harga["harga"]) ?></div>
    <div class="col-2 "><?= rupiah($pengeluaran["pengeluaran"]) ?></div>
  </div>

  <br><br>

  <hr ?>

  <div><center> <h3>Stok Pada Setiap Toko </h3> </center></div>

    <div class="slider">
        <div class="slides">
            <?php
            require_once("./db.php"); 
            if (isset($_GET["setFirst"]) && isset($_GET["setLast"]) ) {
              $min = $_GET["setFirst"];
              $max = $_GET["setLast"];
              $sql = "SELECT * FROM stok_barang
              JOIN toko ON stok_barang.id_toko = toko.id_toko 
              WHERE tanggal_pengiriman >= '$min' AND tanggal_pengiriman <= '$max' ";
            }else {
              $sql = "SELECT * FROM stok_barang
              JOIN toko ON stok_barang.id_toko = toko.id_toko ";
            }
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) :
            ?>  
              <div>
                <div class="card m-1" style="width: 40rem; height: 500px; ">
                    <img src="img/<?= $row["id_toko"]?>.jpg" class="card-img-top" alt="..." height="220px">
                    <div class="card-body">
                      <h5 class="card-title"><strong><?= $row["nama toko"] ?></strong></h5>
                      <hr>
                      <p class="card-text"><strong>Jumlah Stok : </strong><?= $row["jumlah"] ?> pcs</p>
                      <p class="card-text"><strong>Expired Date : </strong><?= $row["tanggal_expired"] ?></p>
                      <p class="card-text"><strong>Tgl Pengiriman : </strong><?= $row["tanggal_pengiriman"] ?></p>
                      <p class="card-text"><strong>Deskripsi : </strong> </p>
                      <p><?= $row["deskripsi"] ?></p>
                     
                    </div>
                </div>
              </div>
        
            <?php endwhile; ?>  
            </div>

        </div>
    </div>



          
</div>
<script src="script.js"></script>
</php>