<?php

// Local
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DB","keripikfirda");

// // Server
// define("HOST","localhost");
// define("USER","id19099436_root");
// define("PASS","FirdasProduct+100");
// define("DB","id19099436_keripikfirda");

$db = new mysqli(HOST,USER,PASS, DB);
if ($db->connect_error) {
    die("Koneksi Gagal");
}