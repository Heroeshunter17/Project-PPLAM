<?php 

session_start();

// jika belum login, maka akan ditendang ke login.php
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

require 'functions.php';



// cek apakah data berhasil ditambahkan atau tidak setelah menggunakan functions.php
if (isset($_POST["submit"])){

    echo"Submit Berjalan";

    // var_dump($_POST);
    // var_dump($_FILES);die;

    if (tambah_pengeluaran($_POST)>0){
        echo "data berhasil ditambahkan!";
        // diarahkan ke database_cara2.php
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php?page=pengeluaran';
            </script>
        ";
    }else{
        echo "data gagal ditambahkan";
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php?page=tambahPengeluaran';
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
    <form action="" method="post">
        <div class="container mr-2 bg-light">
        <div class="row mt-2"> 
            <div >

                <button type="submit" name="submit" class="btn btn-secondary"><i class="bi bi-sd-card me-2"></i>Simpan</button>
            
        </div>
        <!-- <div class="card mt-3"  style="height: 600px; ">isi tabel</div> -->
            <div class="row col-9" id ="data">
                <table class="table mt-4">
                    <thead class="table-secondary">
                        <tr>
                            <th>Bahan</th>
                            <th>Jumlah</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody id="data_pengeluaran">
                        
                        <tr>
                        <td>
                                <div class="input-group mb-3">
                                    <input type="text" id="bahan" name="bahan" class="form-control" placeholder="Bahan" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="text" id="nominal" name="nominal" class="form-control" placeholder="Nominal" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="text" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="deskripsi" aria-describedby="basic-addon2">
                                </div>
                            </td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
    </div>


    </div>
</form>
<script src="script.js"></script>
</php>