<?php 
    include "koneksi.php";
    $plat = $_POST['plat'];
    $jenis = $_POST['jenis'];
    $waktu_masuk = $_POST['waktu_masuk'];
    $id_user = $_SESSION['id_user'];

    $sql = "INSERT INTO parkir (plat, jenis, waktu_masuk, id_user) VALUES ('$plat', '$jenis', '$waktu_masuk', '$id_user')";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        header("location:home-petugas.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
?>