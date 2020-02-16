<?php
session_start(); 
require 'functions.php';
if(!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}
if(isset($_POST["submit"])) {
    if(tambah($_POST)>0) {
        echo "<script> 
            alert('Data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script> 
            alert('Data gagal ditambahkan!');
            document.location.href = 'index.php';
        </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Mahasiswa Baru</h1>
    <a href="index.php">Kembali</a><br>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
        <li>
        <label for="nama">NRP : </label>
        <input type="text" name="nama" id="nama" required></li>
        <li><label for="nrp">Nama : </label>
        <input type="text" name="nrp" id="nrp" required></li>
        <li><label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" required></li>
        <li><label for="email">Email : </label>
        <input type="text" name="email" id="email" required></li>
        <li><label for="gambar">Foto : </label>
        <input type="file" name="gambar" id="gambar"></li>
        <li><button type="submit" name="submit">Tambah Data</button></li>
    </form>
</body>
</html>