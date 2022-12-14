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
    <div class="container">
        <div class="login position-absolute top-50 start-50 translate-middle" style="max-width: 350px;">
            <div class="text-center">
                <h1>LOGIN ADMIN</h1>
            </div>
            <div>
                <?php 
                    if(isset($_SESSION['fail'])){
                        echo  "<div class='alert alert-danger' role='alert'>
                                $_SESSION[fail]
                            </div>";
                        unset($_SESSION['fail']);
                    }
                ?>
            </div>
            <form action="login-submit.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="basic-addon1" name="username">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="basic-addon1" name="password">
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            <span>Belum Memiliki Akun? <a href="">Daftar disini</a></span>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>