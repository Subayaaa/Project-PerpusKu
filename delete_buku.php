<?php
require('database/database.php');
$db = new Database();

$no = $_GET['no'];

$db->query('DELETE FROM books WHERE no_induk=:no_induk');

$db->bind(':no_induk', $no);

$db->execute();

header("Location: data_buku.php");
