<?php 


session_start();

// jika belum login, maka akan ditendang ke login.php
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}


require 'functions.php';

$id_pengeluaran = $_GET["id_pengeluaran"];

if (hapus_pengeluaran($id_pengeluaran)>0){
    echo "
    <script>
        alert('data berhasil dihapus!');
        document.location.href = 'index.php?page=pengeluaran';
    </script>
";
}else{
echo "
    <script>
        alert('data gagal dihapus!');
        document.location.href = 'index.php?page=pengeluaran';
    </script>

";
};



?>