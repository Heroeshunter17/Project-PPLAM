<?php 

// koneksi ke database 
// mysqli_connect("nama host","username","password","nama database")
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



// function tambah($data){
//     global $conn;
//     // htmlspecialchars agar html dalam input tidak dijalankan
//     $NRP = htmlspecialchars($data['NRP']);
//     $nama = htmlspecialchars($data['nama']);
//     $email = htmlspecialchars($data['email']);
//     $jurusan = htmlspecialchars($data['jurusan']);
    
//     // upload gambar dulu
//     $gambar = upload();
//     // gambar === false sama dengan !gambar
//     if (!$gambar){
//         return false;
//     }

    
//     // querry insert data
//     $querry = "INSERT INTO mahasiswa
//                 VALUES
//                 ('', '$NRP','$nama','$email','$jurusan','$gambar')
//             ";
//     mysqli_query($conn,$querry); 

//     return mysqli_affected_rows($conn);
// };


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