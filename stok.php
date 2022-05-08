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
<div class="row mt-2 "> 
    <div class="card"><h4>Data Stok</h4></div>
    <!-- <div class="card mt-3"  style="height: 600px; ">isi tabel</div> -->
        <div class="row col-9" id ="data">
            <table class="table table-primary table-striped mt-4">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Keterangan Lain</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="data_pemasukan">
                    <?php
                    require_once("./db.php");
                    $sql = "SELECT * FROM pemasukan";
                    $result = $db->query($sql);

                    while ($pemasukan = $result->fetch_assoc()) :
                    ?>
                    <tr>
                        <td><?= $pemasukan["tanggal"]?></td>
                        <td><?= $pemasukan["keterangan"]?></td>
                        <td><?= $pemasukan["jumlah"]?></td>
                        <td><?= $pemasukan["total harga"]?></td>
                        <td><?= $pemasukan["keterangan lain"]?></td>
                    </tr>
                    <?php endwhile ; ?>
                </tbody>
            </table>
        </div>
</div>


</div>
</php>