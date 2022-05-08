<?php 
// session_start();

// jika belum login, maka akan ditendang ke login.php
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

require 'functions.php'; // bisa require atau include tergantung penggunaan
// $stok_barang = query("SELECT * FROM stok_barang");
$jumlah_barang = query("SELECT SUM(stok) as barang FROM stok_barang ")[0];
$jumlah_barang_terjual = query("SELECT SUM(stok_terjual) as terjual FROM stok_barang ")[0];
$harga = query("SELECT harga FROM produk ")[0];
$jumlah_pemasukan= query("SELECT SUM(stok_terjual)* harga as pemasukan FROM stok_barang JOIN produk ON stok_barang.id_produk = produk.id_produk ")[0];

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
</style>
<div class="container mr-2 bg-light">
  <div class="row mt-2"> 
    <div class="col-2"> <h3>Periode</h3> </div>
    <div class="col-2" width="100">
      <select  class="bg-light border-0">
      <option value="17 agustus 2022">17 agustus 2022</option>
      <option value="18 agustus 2022">18 agustus 2022</option>
      <option value="19 agustus 2022">19 agustus 2022</option>
      <option value="20 agustus 2022">20 agustus 2022</option>
      </select>
    </div>
    -
    <div class="col">
      <select  class="bg-light border-0">
      <option value="17 agustus 2022">17 agustus 2022</option>
      <option value="18 agustus 2022">18 agustus 2022</option>
      <option value="19 agustus 2022">19 agustus 2022</option>
      <option value="20 agustus 2022">20 agustus 2022</option>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="col-2 "><h6>Stock Saat Ini</h6></div>
    <div class="col-2"><h6>Harga/pcs</h6></div>
    <div class="col-2"><h6>Terjual</h6></div>
    <div class="col-2"><h6>Pemasukan</h6></div>
    <div class="col-2"><h6>Pengeluaran</h6></div>
  </div>
  <div class="row">
    <div class="col-2"><?= $jumlah_barang["barang"] ?> bungkus</div>
    <div class="col-2">Rp.<?= $harga["harga"] ?> </div>
    <div class="col-2"><?= $jumlah_barang_terjual["terjual"] ?>  bungkus</div>
    <div class="col-2">Rp.<?= $jumlah_pemasukan["pemasukan"] ?></div>
    <div class="col-2 ">Rp.10.000.000,00</div>
  </div>

  <br><br>

  <hr ?>

  <div><center> <h3>Stok Pada Setiap Toko </h3> </center></div>

  <div class="row" id ="data">
      <?php
      require_once("./db.php"); 
      $sql = "SELECT * FROM stok_barang
      JOIN toko ON stok_barang.id_toko = toko.id_toko
      JOIN produk ON stok_barang.id_produk = produk.id_produk";
      $result = $db->query($sql);
      while ($row = $result->fetch_assoc()) :
      ?>  
      <div class="col"> <div class="card m-1" style="width: 15rem; height: 420px; ">
            <img src="img/shop.png" class="card-img-top" alt="..." height="200px">
            <div class="card-body">
              <h5 class="card-title"><?= $row["nama toko"] ?></h5>
              <p class="card-text">Stok saat ini : <?= $row["stok"] ?> pcs</p>
              <p class="card-text">Terjual : <?= $row["stok_terjual"] ?> pcs</p>
              <p class="card-text">Stok di masukkan : <?= $row["stok_dimasukkan"] ?> pcs</p>
              <p class="card-text">Pendapatan :Rp.<?= $row["stok_terjual"] * $row['harga'] ?> </p>
            </div>
        </div>
      </div>
      <?php endwhile; ?>   
  </div>
          
</div>
</php>