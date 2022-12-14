<?php 
    include "koneksi.php";
?>

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
    <!-- Navbar -->
    <?php 
        include "navbar.php";
    ?>
    <div class="container-md">
        <div class="row justify-content-center m-3 mb-5">
            <div class="col m-2">
                <div class="border border-2 rounded-4" style="min-height: 230px;">
                    <div class="text-center bg-dark rounded-top p-2 text-light rounded-2">
                        <h1>JUMLAH MOTOR</h1>
                    </div>
                    <div class="text-center p-2">
                        <?php 
                            $id_user = $_SESSION['id_user'];

                            //hitung jumlah motor parkir
                            $sql = "SELECT COUNT(*) AS jumlah FROM parkir WHERE jenis = 'motor' AND id_user = '$id_user'";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_fetch_array($query);

                            $jumlah = $data['jumlah'];

                            //hitung total biaya motor
                            $sql = "SELECT SUM(biaya) AS total FROM parkir WHERE jenis = 'motor' AND id_user = '$id_user'";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_fetch_array($query);

                            $total = number_format($data['total'], 0, ',', '.');
                        ?>
                        <h2><?= $jumlah; ?></h2>
                        <span>TOTAL PEMASUKAN</span>
                        <h2><?= 'Rp' . $total; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col m-2">
                <div class="border border-2 rounded-4" style="min-height: 230px;">
                    <div class="text-center bg-dark rounded-top p-2 text-light rounded-2">
                        <h1>JUMLAH MOBIL</h1>
                    </div>
                    <div class="text-center p-2">
                        <?php 
                            $id_user = $_SESSION['id_user'];

                            //hitung jumlah mobil parkir
                            $sql = "SELECT COUNT(*) AS jumlah FROM parkir WHERE jenis = 'mobil' AND id_user = '$id_user'";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_fetch_array($query);

                            $jumlah = $data['jumlah'];

                            //hitung total biaya mobil
                            $sql = "SELECT SUM(biaya) AS total FROM parkir WHERE jenis = 'mobil' AND id_user = '$id_user'";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_fetch_array($query);

                            $total = number_format($data['total'], 0, ',', '.');

                        ?>
                        <h2><?= $jumlah; ?></h2>
                        <span>TOTAL PEMASUKAN</span>
                        <h2><?= 'Rp' . $total; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col m-2">
                <div class="border border-2 rounded-4" style="min-height: 230px;">
                    <div class="text-center bg-dark rounded-top p-2 text-light rounded-2">
                        <h1>TOTAL PEMASUKAN</h1>
                    </div>
                    <div class="mt-4 text-center">
                        <?php 
                            $id_user = $_SESSION['id_user'];

                            //hitung total biaya
                            $sql = "SELECT SUM(biaya) AS total FROM parkir WHERE id_user = '$id_user'";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_fetch_array($query);

                            $total = number_format($data['total'], 0, ',', '.');
                        ?>
                        <h2 class="align-items-center"><?= 'Rp' . $total; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-3 mb-5">
            <div class="col-12">
                <div class="border border-2 rounded-4">
                    <div class="text-center bg-dark rounded-top p-2 text-light rounded-2">
                        <h1>Daftar Kendaraan Parkir</h1>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">PLAT NOMOR</th>
                                <th scope="col">KENDARAAN</th>
                                <th scope="col">WAKTU MASUK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $id_user = $_SESSION['id_user'];

                                $sql = "SELECT * FROM parkir WHERE id_user = '$id_user' AND waktu_keluar IS NULL";
                                $query = mysqli_query($koneksi, $sql);
                                $no = 1;
                                if(mysqli_num_rows($query) == 0){
                                    echo '<tr><td colspan="4" class="text-center">Tidak ada kendaraan parkir</td></tr>';
                                }
                                while($data = mysqli_fetch_array($query)){
                                    $plat_nomor = $data['plat'];
                                    $jenis = $data['jenis'];
                                    $waktu_masuk = $data['waktu_masuk'];
                            ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $plat_nomor; ?></td>
                                <td><?= $jenis; ?></td>
                                <td><?= $waktu_masuk; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row m-3">
            <div class="col-12">
                <div class="border border-2rounded-4">
                    <div class="text-center bg-dark rounded-top p-2 text-light rounded-2">
                        <h1>History Kendaraan Parkir</h1>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">PLAT NOMOR</th>
                                <th scope="col">KENDARAAN</th>
                                <th scope="col">WAKTU MASUK</th>
                                <th scope="col">WAKTU KELUAR</th>
                                <th scope="col">BIAYA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $id_user = $_SESSION['id_user'];

                                $sql = "SELECT * FROM parkir WHERE id_user = '$id_user' AND waktu_keluar IS NOT NULL";
                                $query = mysqli_query($koneksi, $sql);
                                $no = 1;
                                if(mysqli_num_rows($query) == 0){
                                    echo '<tr><td colspan="5" class="text-center">Tidak ada kendaraan parkir</td></tr>';
                                }
                                while($data = mysqli_fetch_array($query)){
                                    $plat_nomor = $data['plat'];
                                    $jenis = $data['jenis'];
                                    $waktu_masuk = $data['waktu_masuk'];
                                    $waktu_keluar = $data['waktu_keluar'];
                                    $biaya = number_format($data['biaya'], 0, ',', '.')
                            ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $plat_nomor; ?></td>
                                <td><?= $jenis; ?></td>
                                <td><?= $waktu_masuk; ?></td>
                                <td><?= $waktu_keluar; ?></td>
                                <td><?= 'Rp' . $biaya; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>