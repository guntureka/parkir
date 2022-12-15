<?php 
    include "koneksi.php";
    $id_user = $_GET['id'];

    $sql = "DELETE FROM user WHERE id_user = '$id_user'";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        $_SESSION['success'] = 'Data berhasil dihapus';
        header("Location: data-admin.php");
    }else{
        $_SESSION['fail'] = 'Data gagal dihapus';
        header("Location: data-admin.php");
    }
?>