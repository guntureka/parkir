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
        <div class="text-center">
            <h1>KETERANGAN</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">MOTOR</th>
                    <th scope="col">MOBIL</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">PETUGAS</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM parkir join user on parkir.id_user = user.id_user";
                    $query = mysqli_query($koneksi, $sql);
                    $no = 1;
                    $tanggalOld = '';

                    while($data = mysqli_fetch_array($query)){
                        $tanggal = date('Y-m-d', strtotime($data['waktu_masuk']));
                        if($tanggalOld == $tanggal){
                            continue;
                        }
                        $tanggalOld = $tanggal;
                        $sql2 = "SELECT * FROM parkir WHERE waktu_masuk LIKE '$tanggal%'";
                        $query2 = mysqli_query($koneksi, $sql2);
                        $motor = 0;
                        $mobil = 0;
                        while($data2 = mysqli_fetch_array($query2)){
                            if($data2['jenis'] == 'motor'){
                                $motor++;
                            }else if($data2['jenis'] == 'mobil'){
                                $mobil++;
                            }
                        }
                        $total = $motor + $mobil;
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $tanggal ?></td>
                    <td><?php echo $motor ?></td>
                    <td><?php echo $mobil ?></td>
                    <td><?php echo $total ?></td>
                    <td><?php echo $data['nama'] ?></td>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>