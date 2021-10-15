<?php

// pemanggilan file koneksi
require_once("koneksi.php");

// Mendapatkan data NIS
if ( isset($_POST["nis"]) ) $nis = $_POST["nis"];
else {
    echo "NIS TIdak Ditemukan! <a href'index.php'>Kembali</a>";
    exit();
}
// Query Get Data Siswa
$query = "SELECT * FROM siswa WHERE nis = '{$nis}'";

// Eksekusi Query
$result = mysqli_query($mysqli, $query);

// Fetching Data
foreach ($result as $siswa) {
    // $nis = $siswa["nis"];
    $name = $siswa["nama"];
    $gender = $siswa["jk"];
    $address = $siswa["alamat"];
    $placeOfBirth = $siswa["tmp_lahir"];
    $dateOfBirth = $siswa["tgl_lahir"];
    $phone = $siswa["telepon"];

    $maleChecked = "";
    $femaleChecked = "";
    
}


if ( isset($_POST['name']) ) $name = $_POST['name'];

if ( isset($_POST['gender']) ) $gender = $_POST['gender'];

if ( isset($_POST['address']) ) $address = $_POST['address'];

if ( isset($_POST['placeOfBirth']) ) $placeOfBirth = $_POST['placeOfBirth'];

if ( isset($_POST['dateOfBirth']) ) $dateOfBirth = $_POST['dateOfBirth'];

if ( isset($_POST['phone']) ) $phone = $_POST['phone'];


// Menyiapkan Query MySQL untuk dieksekudi
$query = "
    UPDATE siswa SET
        nama = '{$name}',
        jk = '{$gender}',
        alamat = '{$address}',
        tmp_lahir = '{$placeOfBirth}',
        tgl_lahir = '{$dateOfBirth}',
        telepon = '{$phone}'
    WHERE nis = '{$nis}'";
    
// Mengeksekusi MySQL Query
$insert = mysqli_Query($mysqli, $query);

// Menangani ketika error saat eksekusi query
if ( $insert == false ) {
    echo "Error dalam mengubah data. <a href='index.php'>Kembali</a>";
}
else {
    header("Location: index.php");
}

?>
