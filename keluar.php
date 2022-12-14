<?php 
    include "koneksi.php";
    $plat = $_POST['plat'];
    $sql = "SELECT * FROM parkir WHERE plat = '$plat'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($result);
    if($data){
        //get system datetime
        date_default_timezone_set('Asia/Jakarta');
        $waktu_keluar = date("Y-m-d H:i:s");
        
        //hitung biaya
        $waktu_masuk = $data['waktu_masuk'];
        $jam = (strtotime($waktu_keluar) - strtotime($waktu_masuk)) / 3600;
        $biaya = 0;

        if ($data['jenis'] == "mobil") {
            if ($jam <= 2) {
                $biaya = 3000;
            } else {
                $biaya = 3000 + (($jam - 2) * 1000);
            }

            if($biaya > 10000){
                $biaya = 10000;
            }
        } else if($data['jenis'] == "motor") {
            if ($jam <= 2) {
                $biaya = 1500;
            } else {
                $biaya = 1500 + (($jam - 1) * 500);
            }

            if($biaya > 5000){
                $biaya = 5000;
            }
        }

        $sql = "UPDATE parkir SET waktu_keluar = '$waktu_keluar', biaya = '$biaya' WHERE plat = '$plat'";
        $result = mysqli_query($koneksi, $sql);
        if ($result) {
            header("location:home-petugas.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }


    } else {
        echo "Plat tidak ditemukan";
    }
    
?>