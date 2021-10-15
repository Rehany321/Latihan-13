<?php

// panggil file session check
require_once("session_check.php");

// pemanggilan file koneksi
require_once("koneksi.php");

// cek apakah petugas telah login
if ( $sessionStatus == true ) {
    // Mendapatkan data NIS
    if ( isset($_GET["nis"]) ) $nis = $_GET["nis"];
    else {
        echo "NIS TIdak Ditemukan! <a href'index.php'>Kembali</a>";
        exit();
    }
    // Query Get Data Siswa
    $query = "DELETE FROM siswa WHERE nis = '{$nis}'";

    // Eksekusi Query
    $result = mysqli_query($mysqli, $query);

    if (! $result) {
        exit("Gagal Menghapus Data!");
    }

    header("Location: index.php");

}
else if ( $sessionStatus == false ) {
    header("Location: index.php");
}


?>
