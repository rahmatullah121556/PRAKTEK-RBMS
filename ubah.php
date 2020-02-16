<?php 
session_start();
require 'functions.php';
if(!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}
$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if(isset($_POST["submit"])) {
    if(ubah($_POST)>0) {
        echo "<script> 
            alert('Data berhasil diubah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script> 
            alert('Data gagal diubah!');
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
    <h1>Ubah Data Mahasiswa Baru</h1>
    <a href="index.php">Kembali</a>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
    <input type="hidden" name="gambarLama" value="<? $mhs['gambar'];?>">
        <ul>
            <li><label for="nrp">NRP : </label>
            <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]?>"></li>
            <li><label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]?>"></li>
            <li><label for="jurusan">Jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]?>"></li>
            <li><label for="email">Email : </label>
            <input type="text" name="email" id="email" required value="<?= $mhs["email"]?>"></li>
            <li><label for="gambar">Foto : </label>
            <img src="img/<?= $mhs["gambar"]; ?>" width="40px"><br>
            <input type="file" name="gambar" id="gambar"></li>
            <li><button type="submit" name="submit">Ubah</button></li>
    </form>
</body>
</html>