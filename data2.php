<?php

require_once("./db.php");

if (isset($_GET["cari"])) {
    $input_cari = $_GET["cari"];
    $sql = "SELECT * FROM bahan_mentah WHERE nama LIKE '%{$input_cari}%' ";
}else {
    $sql = "SELECT * FROM bahan_mentah";
}

$result = $db->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    array_push($data, $row);
}
header("Content-Type: aplication/json");
echo json_encode($data);