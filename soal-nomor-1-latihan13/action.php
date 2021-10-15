<?php

// pemanggilan file koneksi
require_once("koneksi.php");

// Status tidak error
$error = 0;

// Memvalidasi inputan
if ( isset($_POST['nis']) ) $nis = $_POST['nis'];
else $error = 1; // Status error

if ( isset($_POST['name']) ) $name = $_POST['name'];
else $error = 1; // Status error

if ( isset($_POST['gender']) ) $gender = $_POST['gender'];
else $error = 1; // Status error

if ( isset($_POST['address']) ) $address = $_POST['address'];
else $error = 1; // Status error

if ( isset($_POST['placeOfBirth']) ) $placeOfBirth = $_POST['placeOfBirth'];
else $error = 1; // Status error

if ( isset($_POST['dateOfBirth']) ) $dateOfBirth = $_POST['dateOfBirth'];
else $error = 1; // Status error

if ( isset($_POST['phone']) ) $phone = $_POST['phone'];
else $error = 1; // Status error

// Mengatasi jika terdapat error pada input
if ($error == 1) {
    echo "Terjadi kesalahan pada proses input data";
    exit();
}

// Menyiapkan Query MySQL untuk dieksekudi
$query = "
    INSERT INTO siswa
    (nis, nama, jk, alamat, tmp_lahir, tgl_lahir, telepon, id_jurusan)
    VALUES
    ('{$nis}', '{$name}', '{$gender}', '{$address}', '{$placeOfBirth}', '{$dateOfBirth}', '{$phone}', 0);";
    
// Mengeksekusi MySQL Query
$insert = mysqli_Query($mysqli, $query);

// Menangani ketika error saat eksekusi query
if ( $insert == false ) {
    echo "Error dalam menambahkan data. <a href='index.php'>Kembali</a>";
}
else {
    header("Location: index.php");
}
?>