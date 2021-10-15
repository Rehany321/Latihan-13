<?php

// pemanggilan file koneksi
require_once("koneksi.php");

// Status tidak error
$error = 0;

// Memvalidasi inputan
if ( isset($_POST['id_barang']) ) $id_barang = $_POST['id_barang'];
else $error = 1; // Status error

if ( isset($_POST['name']) ) $name = $_POST['name'];
else $error = 1; // Status error

if ( isset($_POST['harga']) ) $harga = $_POST['harga'];
else $error = 1; // Status error

// Mengatasi jika terdapat error pada input
if ($error == 1) {
    echo "Terjadi kesalahan pada proses input data";
    exit();
}

// Menyiapkan Query MySQL untuk dieksekudi
$query = "
    INSERT INTO barang
    (id_barang, nama_barang, harga)
    VALUES
    ('{$id_barang}', '{$name}', '{$harga}');";
    
// Mengeksekusi MySQL Query
$insert = mysqli_Query($mysqli, $query);

// Menangani ketika error saat eksekusi query
if ( $insert == false ) {
    echo "Terjadi kesalahan dalam menambahkan data. <a href='index.php'>Kembali</a>";
}
else {
    header("Location: index.php");
}
?>