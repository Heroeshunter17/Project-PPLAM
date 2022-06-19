<?php 

session_start();

// jika belum login, maka akan ditendang ke login.php
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

require 'functions.php';


// ambil data di URL
$id_users= $_GET["id_users"];



// querry data mahasiswa berdasarkan id
$akun = query("SELECT * FROM users WHERE id_users = $id_users")[0]; // setelah querynya dijalankan maka kita langsung mengambil indeks ke 0 nya, karena nilai yang dikembalikan berupa array numerik



// cek apakah data berhasil diubah atau tidak setelah menggunakan functions.php
if (isset($_POST["submit"])){
    if (ubah_akun($_POST)>0){
        // echo "data berhasil ditambahkan!";
        // diarahkan ke database_cara2.php
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php?page=pengaturan';
            </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal diubah!');
            document.location.href = 'index.php?page=editAkun';
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
<form action="" method="POST">
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Domisili</th>
                            <th>Tanggal Masuk</th>
                            <th>Password</th>
                            <th>Peran</th>
                        </tr>
                    </thead>
                    <tbody id="data_akun">
                    
                    <tr>
                        <input type="hidden" id="id_users" name="id_users" value="<?= $akun["id_users"];?>">
                            <td>
                                    <div class="input-group mb-3">
                                        <input type="text" id="nama" name="nama" value="<?= $akun['nama'];?>" class="form-control" placeholder="Nama" aria-describedby="basic-addon2" >
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input type="text" id="email" name="email" value="<?= $akun['email'];?>" class="form-control" placeholder="Email" aria-describedby="basic-addon2">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input type="text" id="domisili" name="domisili" value="<?= $akun['domisili'];?>" class="form-control" placeholder="Domisili" aria-describedby="basic-addon2">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input type="text" id="tanggal_masuk" name="tanggal_masuk" value="<?= $akun['tanggal_masuk'];?>" class="form-control" placeholder="Tanggal Masuk" aria-describedby="basic-addon2">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input type="text" id="password" name="password" value="<?= $akun['password'];?>" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="id_peran"  name="id_peran" value="<?= $akun['id_peran'];?>" >
                                            <option value="1">Admin</option>
                                            <option value="2">Pemilik</option>
                                            <option value="3">Pegawai Tetap</option>
                                            <option value="4">pegawai Sementara</option>
                                        </select>
                                        <label for="peran"> </label>
                                    </div>
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