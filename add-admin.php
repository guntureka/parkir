<?php 
    include "koneksi.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $level = 2;

        $sql = "INSERT INTO user (username, password, nama, level) VALUES ('$username', '$password', '$nama', '$level')";
        $result = mysqli_query($koneksi, $sql);

        if ($result) {
            $_SESSION['success'] = "Berhasil menambahkan petugas";
            header("location:home-admin.php");
        } else {
            $_SESSION['fail'] = "Gagal menambahkan petugas";
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    }
?>