<?php
include "koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <?php include "navbar.php"; ?>
    <div class="container-md">
        <div class="row justify-content-between m-5">
            <div class="col m-5">
                <div class="border border-2 p-3 rounded-4" style="min-width: 400px;">
                    <div class="text-start">
                        <h1>Masuk Parkir</h1>
                    </div>
                    <div class="">
                        <form action="proses.php" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Plat Nomor" aria-label="Plat Kendaraan" aria-describedby="basic-addon1" name="plat">
                            </div>
                            <select class="form-select mb-3" aria-label="Default select example" name="jenis">
                                <option selected>Jenis Kendaraan</option>
                                <option value="motor">Motor</option>
                                <option value="mobil">Mobil</option>
                            </select>
                            <div class="input-group mb-3">
                                <input type="datetime-local" class="form-control" placeholder="Waktu" aria-label="Merek Kendaraan" aria-describedby="basic-addon1" name="waktu_masuk">
                            </div>

                            <div class="text-end mb-3">
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col m-5 P">
                <div class="border border-2 p-3 rounded-4" style="min-width: 400px;">
                    <div class="text-center">
                        <h1>Keluar Parkir</h1>
                    </div>
                    <form action="keluar.php" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Plat No" aria-label="Username" aria-describedby="basic-addon1" name="plat">
                        </div>
                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col g-md-5">
                <div class="border border-2 p-4 rounded-4">
                    <div class="text-center">
                        <h1>Kendaraan Parkir</h1>
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
                            $id_petugas = $_SESSION['id_user'];
                            $sql = "SELECT * FROM parkir WHERE id_user = $id_petugas AND waktu_keluar IS NULL";
                            $result = mysqli_query($koneksi, $sql);
                            $i = 1;
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $i . "</th>";
                                    echo "<td>" . $row['plat'] . "</td>";
                                    echo "<td>" . $row['jenis'] . "</td>";
                                    echo "<td>" . $row['waktu_masuk'] . "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>