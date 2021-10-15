<?php

// pemanggilan file koneksi
require_once("koneksi.php");

// Mendapatkan data ID Barang
if ( isset($_POST["id_barang"]) ) $id_barang = $_POST["id_barang"];
else {
    echo "ID Barang TIdak Ditemukan! <a href'index.php'>Kembali</a>";
    exit();
}
// Query Get Data Barang
$query = "SELECT * FROM barang WHERE id_barang = '{$id_barang}'";

// Eksekusi Query
$result = mysqli_query($mysqli, $query);

// Fetching Data
foreach ($result as $barang) {
    // $id_barang = $barang["id_barang"];
    $name = $barang["nama_barang"];
    $harga = $barang["harga"];
}


if ( isset($_POST['name']) ) $name = $_POST['name'];

if ( isset($_POST['harga']) ) $harga = $_POST['harga'];

// Menyiapkan Query MySQL untuk dieksekudi
$query = "
    UPDATE barang SET
        nama_barang = '{$name}',
        harga = '{$harga}'
    WHERE id_barang = '{$id_barang}'";
    
// Mengeksekusi MySQL Query
$insert = mysqli_Query($mysqli, $query);

// Menangani ketika error saat eksekusi query
if ( $insert == false ) {
    echo "Terjadi kesalahan dalam mengubah data. <a href='index.php'>Kembali</a>";
}
else {
    header("Location: index.php");
}

?>
