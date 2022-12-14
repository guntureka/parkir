<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        #input-parkir, #keluar-parkir{
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="input-parkir" class="bg-dark text-light mb-5">
            <div class="form-container">
                <h1 class="text-center">Input Parkir</h1>
                <form action="proses.php" method="post">
                    <div class="mb-3">
                        <label for="plat" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" id="plat" name="plat" placeholder="Masukkan Plat Nomor">
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Kendaraan</label>
                        <select class="form-select" aria-label="Default select example" name="jenis">
                            <option selected>Pilih Jenis Kendaraan</option>
                            <option value="mobil">Mobil</option>
                            <option value="motor">Motor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                        <input type="datetime-local" class="form-control" id="waktu_masuk" name="waktu_masuk">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div id="keluar-parkir" class="bg-dark text-light">
            <div class="form-container">
                <h1 class="text-center">Keluar Parkir</h1>
                <form action="keluar.php" method="post">
                    <div class="mb-3">
                        <label for="plat" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" id="plat" name="plat" placeholder="Masukkan Plat Nomor">
                    </div>
                    <button type="submit" class="btn btn-primary">Keluar</button>
                </form>
        </div>
    </div>
</body>
</html>