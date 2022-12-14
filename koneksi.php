<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_parkir";

    $koneksi = mysqli_connect($host, $user, $pass, $db);
    if (!$koneksi) {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }
    session_start();
    $_SESSION['id_user'] = 2;
?>