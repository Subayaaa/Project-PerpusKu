<?php
require('controller/islogin.php');
require('database/database.php');

$username = $_POST['username'];
$password = $_POST['password'];
$jk = $_POST['jk'];
$status = $_POST['status'];

$db = new Database();

$db->query("INSERT INTO admins (username, password, jk, status) VALUES (:username, :password, :jk, :status)");

// $db->query('INSERT INTO books (no_induk, judul, penulis, tahun, penerbit, subjek) VALUES (:no_induk, :judul, :penulis, :tahun, :penerbit, :subjek');

$db->bind(':username', $username);
$db->bind(':password', md5($password));
$db->bind(':jk', $jk);
$db->bind(':status', $status);

$db->execute();

header("Location: data_admin.php");
