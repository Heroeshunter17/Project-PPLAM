<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body class="bg-light">
    <div class="container mt-3">
          <div class="font-monospace text-dark mb-2">
            <h2>PENCARIAN
            </h2>
            </div>
           <div class="">
              <form class="d-flex position-relative">
              <input class="form border-0 col-5 me-3" type="text" placeholder="Search" aria-label="Search" id="cari" name="cari" >
              <i class="bi bi-search"></i>
              </form>
            </div>
    </div>

    <div class="container">
      <table class="table table-primary table-striped mt-4">
        <thead>
            <tr>
                <th></th>
                <th>Nama</th>
                <th>Stok Barang</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody class="table table-primary table-striped mt-4" id="datacari" >
            <?php
            require_once("./db.php");
            $sql = "SELECT * FROM bahan_mentah";
            $result = $db->query($sql);

            while ($row = $result->fetch_assoc()) :
            ?>
            <tr>
                <td><img src="./img/<?= $row["gambar"]?>" alt="gambar <?= $row["nama"]?>" width="200"></td>
                <td><?= $row["nama"]?></td>
                <td><?= $row["banyak_barang"]." "?><?= $row["jumlah"]?></td>
                <td><?= $row["harga"]." / "?><?= $row["jumlah"]?></td>
            </tr>
            <?php endwhile ; ?>
        </tbody>
      </table>

      


    </div>
     <!-- Jquery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="script.js"></script>
</body>
</html>