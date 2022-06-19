<?php 

session_start();

// jika belum login, maka akan ditendang ke login.php
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

$harga_jual = query("SELECT harga FROM produk WHERE id_produk = 1")[0];

$peran = $_SESSION['peran'];

if($peran == 'Admin'|| $peran == 'Pemilik'  ){
    $setFitur = '';
} else {
    $setFitur = "hidden";
}




// cek apakah data berhasil ditambahkan atau tidak setelah menggunakan functions.php
if (isset($_POST["submit"])){

    echo"Submit Berjalan";

    // var_dump($_POST);
    // var_dump($_FILES);die;

    if (ubah_harga($_POST)>0){
        echo "berhasil diperbarui";
        // diarahkan ke database_cara2.php
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php?page=pengeluaran';
            </script>
        ";
    }else{
        echo "gagal diperbarui";
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php?page=pengeluaran';
        </script>
    
        ";
    };

}
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
.hidden {
    display: none;
}
</style>

    <div class="container mr-2 bg-light">
    <div class="row mt-2"> 
        <div class="row" >
            <div class="col">
                <a href="index.php?page=tambahPengeluaran" class="btn btn-secondary"><i class="fa fa-plus me-2"></i> Tambah Data </a>
            </div>

                
                <strong class="mt-4"> Harga Jual : <?= rupiah($harga_jual['harga'])?> /pcs</strong>
                
        </div>
        <!-- <div class="card mt-3"  style="height: 600px; ">isi tabel</div> -->
            <div class="row col-12" id ="data">
                <table class="table mt-4">
                    <thead class="table-secondary">
                        <tr>
                            <th>Bahan</th>
                            <th>Jumlah</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data_pemasukan">
                        <?php
                                require_once("./db.php");
                                $sql = "SELECT * FROM pengeluaran";
                                $result = $db->query($sql);

                                while ($pengeluaran = $result->fetch_assoc()) :
                                ?>
                                <tr>
                                    <td><?= $pengeluaran["bahan"]?></td>
                                    <td><?= $pengeluaran["jumlah"]?></td>
                                    <td><?= rupiah($pengeluaran["nominal"])?></td>
                                    <td><?= $pengeluaran["tanggal"]?></td>
                                    <td><?= $pengeluaran["deskripsi"]?></td>
                                    <td>
                                        <a href="index.php?page=editPengeluaran&id_pengeluaran=<?= $pengeluaran["id_pengeluaran"]?>" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square me-2"></i>Edit</a>
                                        <a href="hapusPengeluaran.php?id_pengeluaran=<?= $pengeluaran["id_pengeluaran"]?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="bi bi-trash me-2"></i>Delete</a>
                                    </td>
                                </tr>
                                <?php endwhile ; ?> 
                    
                    </tbody>
                </table>
            </div>
    </div>


    </div>
<script src="script.js"></script>
</php>