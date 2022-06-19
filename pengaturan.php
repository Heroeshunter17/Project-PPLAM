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
    <div >
            <a href="index.php?page=tambahAkun" class="btn btn-secondary"><i class="fa fa-plus me-2"></i> Tambah Data </a>

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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="data_pengaturan">
                    
                <?php
                        require_once("./db.php");
                        $sql = "SELECT * FROM users
                        Join peran ON peran.id_peran = users.id_peran";
                        $result = $db->query($sql);

                        while ($pengaturan = $result->fetch_assoc()) :
                        ?>
                        <tr>
                            <td><?= $pengaturan["nama"]?></td>
                            <td><?= $pengaturan["email"]?></td>
                            <td><?= $pengaturan["domisili"]?></td>
                            <td><?= $pengaturan["tanggal_masuk"]?></td>
                            <td><?= $pengaturan["password"]?></td>
                            <td><?= $pengaturan["peran"]?></td>
                            <td><a href="index.php?page=editAkun&id_users=<?= $pengaturan["id_users"]?>" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square me-2"></i>Edit</a></td>

                        </tr>
                        <?php endwhile ; ?>
                    
                </tbody>
            </table>
        </div>
</div>


</div>
<script src="script.js"></script>
</php>