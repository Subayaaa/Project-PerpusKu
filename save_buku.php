<?php
require('controller/islogin.php');
require('database/database.php');

$no = $_POST['no_induk'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];
$penerbit = $_POST['penerbit'];
$subject = $_POST['subject'];

$db = new Database();

$db->query("INSERT INTO books (no_induk, judul, penulis, tahun, penerbit, subjek) VALUES ('$no', '$judul', '$penulis', '$tahun', '$penerbit', '$subject')");

// $db->query('INSERT INTO books (no_induk, judul, penulis, tahun, penerbit, subjek) VALUES (:no_induk, :judul, :penulis, :tahun, :penerbit, :subjek');

// $db->bind(':no_induk', $no);
// $db->bind(':judul', $judul);
// $db->bind(':penulis', $penulis);
// $db->bind(':tahun', $tahun);
// $db->bind(':penerbit', $penerbit);
// $db->bind(':subjek', $subject);

$db->execute();

header("Location: data_buku.php");
