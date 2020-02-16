<?php
session_start();
if(!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}
    //koneksi ke database
require 'functions.php';
$mahasiswa = mysqli_query($conn,"SELECT * FROM mahasiswa");
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
    //ambil data mahasiswa dari object result
    //mysql_fetch_array => array numerik & asosiatif
    //mysql_fetch_assoc => hanya array asosiatif
    //mysql_fetch_row => array numerik
    //mysql_fetch_object
// while($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs);
// }
$i = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Admin</title>
    <style>
        @media print {
            .logout, .tambah, .form-cari, .aksi {
                display:none;
            }
        }
    </style>
</head>
<body>
<a href="logout.php" class="logout">Log Out</a>
<h1> Daftar Mahasiswa</h1>
<a href="tambah.php" class="tambah">Tambah Mahasiswa</a>
<br><br>
<form action="" method="post" class="form-cari">
    <input type="text" name="keyword" size="40" autofocus placeholder="mau nyari apa?" autocomplete="off" id="keyword" >
    <button type="submit" name="cari" id="search">Cari</button>
</form>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th  class="aksi">Aksi</th>
        <th>Foto Mahasiswa</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Email</th>
    </tr>
    <?php ?>
    <tr>
    <?php foreach ($mahasiswa as $row) : ?>
        <td><?php echo $i ?></td>
        <td  class="aksi"><a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |<a href="hapus.php?id=<?php echo $row["id"]?>"> Hapus</a></td>
        <td><img src="img/<?php echo $row["gambar"]?>"></td>
        <td><?php echo $row["nrp"] ?></td>
        <td> <?php echo $row["nama"] ?></td>
        <td><?php echo $row["jurusan"] ?></td>
        <td><?php echo $row["email"] ?></td>
    </tr>
    <?php $i++;?>
    <?php endforeach; ?>
</table>
</div>
<script src="js/script.js"></script>
</body>
</html>