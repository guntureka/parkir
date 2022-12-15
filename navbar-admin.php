<?php 
    include "koneksi.php";
    if(!isset($_SESSION['id_user'])){
        header("location:login.php");
    }
?>
<div class="d-flex justify-content-between p-4" style="background-color: rgba(115, 192, 73, 0.786);">
    <div>
        <h1>ADMIN</h1>
    </div>
    <div>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="parkiran-admin.php">DATA PARKIRAN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data-admin.php">PEGAWAI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="home-admin.php">ADD PEGAWAI</a>
            </li>
        </ul>
    </div>
    <div>
        <a href="logout.php"><button type="submit" class="btn btn-danger">Logout</button></a>
    </div>
</div>