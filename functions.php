<?php 
// // local
// define("HOST","localhost");
// define("USER","root");
// define("PASS","");
// define("DB","keripikfirda");
// koneksi ke database 
// mysqli_connect("nama host","username","password","nama database")

//server
// $conn= mysqli_connect("localhost","id19099436_root","FirdasProduct+100", "id19099436_keripikfirda");

// local
$conn= mysqli_connect("localhost","root","", "keripikfirda");


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = []; 
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row; // row = kotak kosong, row = baju yang diambil
    }
    return $rows; // berbentuk array assosiative
}



function tambah_stok($data){
    global $conn;
    // htmlspecialchars agar html dalam input tidak dijalankan
    $nama_toko = htmlspecialchars($data['nama_toko']);
    $produk = 1;
    $jumlah = htmlspecialchars($data['jumlah_stok']);
    $expired_date = htmlspecialchars($data['expired_date']);
    $tanggal_pengiriman = htmlspecialchars($data['tanggal_pengiriman']);
    $stok_terjual = htmlspecialchars($data['stok_terjual']);
    
    // querry insert data
    $querry = "INSERT INTO stok_barang
                VALUES
                ('', '$nama_toko','$produk','$jumlah','$stok_terjual','$tanggal_pengiriman','$expired_date')
            ";
    mysqli_query($conn,$querry); 

    return mysqli_affected_rows($conn);
};


function tambah_pengeluaran($data){
    global $conn;
    // htmlspecialchars agar html dalam input tidak dijalankan
    $bahan = htmlspecialchars($data['bahan']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $nominal = htmlspecialchars($data['nominal']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    
    // querry insert data
    $querry = "INSERT INTO pengeluaran
                VALUES
                ('', '$bahan','$jumlah','$nominal','$tanggal','$deskripsi')
            ";
    mysqli_query($conn,$querry); 

    return mysqli_affected_rows($conn);
};

function tambah_akun($data){
    global $conn;
    // htmlspecialchars agar html dalam input tidak dijalankan
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $domisili = htmlspecialchars($data['domisili']);
    $tanggal_masuk = htmlspecialchars($data['tanggal_masuk']);
    $password = htmlspecialchars($data['password']);
    $peran = htmlspecialchars($data['peran']);
    
    // querry insert data
    $querry = "INSERT INTO users
                VALUES
                ('', $peran,'$nama','$email','$password','$domisili','$tanggal_masuk')
            ";
    mysqli_query($conn,$querry); 

    return mysqli_affected_rows($conn);
};


function ubah_akun($data) {
    global $conn;
    // htmlspecialchars agar html dalam input tidak dijalankan
    $id_users = htmlspecialchars($data['id_users']);
    $id_peran = htmlspecialchars($data['id_peran']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $domisili = htmlspecialchars($data['domisili']);
    $tanggal_masuk = htmlspecialchars($data['tanggal_masuk']);
    $password = htmlspecialchars($data['password']);


        // querry insert data
    $querry = "UPDATE users SET
            id_users = '$id_users',
            id_peran = '$id_peran',
            nama = '$nama',
            email = '$email',
            password = '$password',
            domisili = '$domisili',
            tanggal_masuk = '$tanggal_masuk'
            WHERE id_users= '$id_users'
        ";
    mysqli_query($conn,$querry); 

    return mysqli_affected_rows($conn);
};

function ubah_harga($data) {
    global $conn;
    $id_produk = 1 ;
    $nama = 'Kripik Nangka Firda';
    $jenis_barang = 'Kripik';
    // htmlspecialchars agar html dalam input tidak dijalankan
    $harga = htmlspecialchars($data['keuntungan'] / $data['jumlah_produk']);


        // querry insert data
    $querry = "UPDATE produk SET
            id_produk = '$id_produk' ,
            nama = '$nama',
            jenis_barang = '$jenis_barang',
            harga = '$harga'
            WHERE id_produk = '$id_produk'
        ";
    mysqli_query($conn,$querry); 

    return mysqli_affected_rows($conn);
};

function ubah_pengeluaran($data) {
    global $conn;
    // htmlspecialchars agar html dalam input tidak dijalankan
    $id_pengeluaran = htmlspecialchars($data['id_pengeluaran']);
    $bahan = htmlspecialchars($data['bahan']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $nominal = htmlspecialchars($data['nominal']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $deskripsi = htmlspecialchars($data['deskripsi']);


        // querry insert data
    $querry = "UPDATE pengeluaran SET
            id_pengeluaran = '$id_pengeluaran',
            bahan = '$bahan',
            jumlah = '$jumlah',
            nominal = '$nominal',
            tanggal = '$tanggal',
            deskripsi = '$deskripsi'
            WHERE id_pengeluaran = '$id_pengeluaran'
        ";
    mysqli_query($conn,$querry); 

    return mysqli_affected_rows($conn);
};

function ubah_stok($data) {
    global $conn;
    // htmlspecialchars agar html dalam input tidak dijalankan
    $id_stok = htmlspecialchars($data['id_stok']);
    $id_produk = 1;
    $id_toko = htmlspecialchars($data['nama_toko']);
    $jumlah_stok = htmlspecialchars($data['jumlah_stok']);
    $expired_date = htmlspecialchars($data['expired_date']);
    $tanggal_pengiriman = htmlspecialchars($data['tanggal_pengiriman']);
    $stok_terjual = htmlspecialchars($data['stok_terjual']);


        // querry insert data
    $querry = "UPDATE stok_barang SET
            id_stok = '$id_stok',
            id_toko = '$id_toko',
            id_produk = '$id_produk',
            jumlah = '$jumlah_stok',
            stok_terjual = '$stok_terjual',
            tanggal_pengiriman = '$tanggal_pengiriman',
            tanggal_expired = '$expired_date'
            WHERE id_stok = '$id_stok'
        ";
    mysqli_query($conn,$querry); 

    return mysqli_affected_rows($conn);
};

function hapus_pengeluaran($id_pengeluaran) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pengeluaran WHERE id_pengeluaran=$id_pengeluaran");
    return mysqli_affected_rows($conn); // mengembalikan jumlah baris yang terpengaruh di kueri SELECT, INSERT, UPDATE, REPLACE, atau DELETE sebelumnya.

}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}


// function upload(){
//     // gambar didapat di name
//     $namafile = $_FILES['gambar']['name'];
//     $ukuranfile = $_FILES['gambar']['size'];
//     $error = $_FILES['gambar']['error'];
//     $tempName = $_FILES['gambar']['tmp_name'];

//     // cek apakah tidak ada gambar diupload
//     // error 4 = tidak ada gambar yang diupload (https://www.php.net/manual/en/features.file-upload.errors.php)
//     if ($error === 4){
//         echo "<script>
//             alert('pilih gambar terlebih dahulu');
//         </script>";
//     }

//     // cek apakah yang diupload berupa gambar
//     $ektensiGambarValid = ['jpg','jpeg','png'];
//     //explode(delimiter,string)
//     $ekstensiGambar = explode(".",$namafile);
//     // contoh = rehan.jpg -> explode -> ['rehan','jpg']
//     $ekstensiGambar = strtolower(end($ekstensiGambar));
//     // in_array(needle,haystack) -> needle = jarum , haystack = jerami
//     if(!in_array($ekstensiGambar,$ektensiGambarValid)){
//         echo "<script>
//             alert('file yang anda upload bukan gambar');
//         </script>";
//     }

//     // cek jika ukuran terlalu besar, contoh 1mb = 1.000.000 byte 
//     if($ukuranfile > 1000000){ 
//         echo "<script>
//             alert('ukuran gambar terlalu besar');
//         </script>";
//     }

//     // generate nama gambar baru
//     $namaFileBaru = uniqid();
//     $namaFileBaru .= '.';
//     $namaFileBaru.= $ekstensiGambar;

//     // lolos pengecekan, gambar diupload
//     move_uploaded_file($tempName,'img/'. $namaFileBaru);

//     return $namaFileBaru;



// }






// function hapus($id) {
//     global $conn;
//     mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
//     return mysqli_affected_rows($conn); // mengembalikan jumlah baris yang terpengaruh di kueri SELECT, INSERT, UPDATE, REPLACE, atau DELETE sebelumnya.

// }




// function ubah($data) {
//     global $conn;
//     // htmlspecialchars agar html dalam input tidak dijalankan
//     $id = $data['id'];
//     $NRP = htmlspecialchars($data['NRP']);
//     $nama = htmlspecialchars($data['nama']);
//     $email = htmlspecialchars($data['email']);
//     $jurusan = htmlspecialchars($data['jurusan']);

//     $gambarLama = htmlspecialchars($data['gambarLama']);
    
//     // cek apakah user pilih gambar baru atau tidak
//     if($_FILES['gambar']['error'] === 4){
//         $gambar = $gambarLama;
//     }else{
//         $gambar = upload();
//     };

//         // querry insert data
//     $querry = "UPDATE mahasiswa SET
//             nrp = '$NRP',
//             nama = '$nama',
//             email = '$email',
//             jurusan = '$jurusan',
//             gambar = '$gambar'
//             WHERE id= '$id'
//         ";
//     mysqli_query($conn,$querry); 

//     return mysqli_affected_rows($conn);
// };


// function cari($keyword){
//     $query = "SELECT * FROM mahasiswa
//                 WHERE
//                 nama LIKE '%$keyword%' OR
//                 nrp LIKE '%$keyword%' OR 
//                 email LIKE '%$keyword%' OR
//                 jurusan LIKE '%$keyword%'
//             ";
//     return query($query); //return array assoc
// }




function registrasi($data){
    global $conn;

    $email = strtolower(stripslashes($data['email'])); // menghapus backslash dan membuat huruf kecil
    $password = mysqli_real_escape_string($conn,$data['password']); // memungkinkan user memasukkan tanda kutip sehingga tanda kutip yang masuk ke dalam database itu aman
    $password2 = mysqli_real_escape_string($conn,$data['password2']);


    // cek email sudah dipakai atau belum
    $result = mysqli_query($conn,"SELECT email FROM users 
            WHERE email = '$email'");
    
    if (mysqli_fetch_assoc($result)){
        echo "<script>
            alert('email sudah terdaftar');
        </script>;";
    return false;
    }



    // cek konfirmasi password
    if($password !== $password2){
        echo "<script>
            alert('konfirmasi password tidak sesuai');
        </script>";
        return false;
    }


    // enkripsi password
    // password_hash(password yg mau diacak,algoritma untuk mengacak password)
    $password = password_hash($password,PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn,"INSERT INTO users VALUES ('','$email','$password')");
    
    return mysqli_affected_rows($conn); // untuk menghasilkan angka 1 jika berhasil, dan 0 jika tidak
}






?>