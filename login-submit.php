<?php 
    include "koneksi.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($koneksi, $sql);

        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_array($result);
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['level'] = $data['level'];

            if($_SESSION['level'] == "1")
                header("location:home-admin.php");
            else if($_SESSION['level'] == "2")
                header("location:home-petugas.php");
        } else {
            $_SESSION['fail'] = "Username atau password salah";
            header("location:login.php");
        }
    }
?>