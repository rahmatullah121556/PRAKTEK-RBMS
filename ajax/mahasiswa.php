<?php
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR email LIKE '%$keyword%'";
$mahasiswa = query($query);
$i = 1;
?>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
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
        <td><a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |<a href="hapus.php?id=<?php echo $row["id"]?>"> Hapus</a></td>
        <td><img src="img/<?php echo $row["gambar"]?>"></td>
        <td><?php echo $row["nrp"] ?></td>
        <td> <?php echo $row["nama"] ?></td>
        <td><?php echo $row["jurusan"] ?></td>
        <td><?php echo $row["email"] ?></td>
    </tr>
    <?php $i++;?>
    <?php endforeach; ?>
</table>
