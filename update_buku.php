<?php

require('database/database.php');
$db = new Database();

$no = $_POST['no_induk'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];
$penerbit = $_POST['penerbit'];
$subject = $_POST['subject'];

$db->query('UPDATE books SET judul = :judul, penulis = :penulis, tahun = :tahun, penerbit = :penerbit, subjek = :subjek WHERE no_induk = :no_induk');

$db->bind(':no_induk', $no);
$db->bind(':judul', $judul);
$db->bind(':penulis', $penulis);
$db->bind(':tahun', $tahun);
$db->bind(':penerbit', $penerbit);
$db->bind(':subjek', $subject);

$db->execute();

header("Location: data_buku.php");
