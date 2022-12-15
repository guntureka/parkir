<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php 
        include "navbar-admin.php"
    ?>
    <div class="container">
        <div class="">
            <h1>PETUGAS</h1>
        </div>
        <?php 
            if(isset($_SESSION['success'])){
                echo "<div class='alert alert-success' role='alert'>
                        ".$_SESSION['success']."
                    </div>";
                unset($_SESSION['success']);
            }else if(isset($_SESSION['fail'])){
                echo "<div class='alert alert-danger' role='alert'>
                        ".$_SESSION['fail']."
                    </div>";
                unset($_SESSION['fail']);
            }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NAMA</th>
                    <!-- <th scope="col">KEHADIRAN</th> -->
                    <th scope="col">GAJI</th>
                    <th scope="col">KET</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM user WHERE id_user != '1'";
                    $query = mysqli_query($koneksi, $sql);
                    $no = 1;
                    $gaji = 4500_000 + 25_000 + 15_000;

                    while($data = mysqli_fetch_array($query)){
                        $nama = $data['nama'];
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $nama ?></td>
                    <!-- <td>25</td> -->
                    <td>Rp. <?php echo number_format($gaji, 0, ',', '.') ?></td>
                    <td>
                        <a href="data-admin-hapus.php?id=<?php echo $data['id_user'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>