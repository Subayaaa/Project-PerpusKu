<?php
require('controller/islogin.php');
require('database/database.php');

$no = $_POST['no_induk'];
$id_cus = $_POST['id_cus'];

$db = new Database();

$db->query("INSERT INTO loans (id_cus, no_induk, start_date) VALUES (:id_cus, :no_induk, now())");

$db->bind(':id_cus', $id_cus);
$db->bind(':no_induk', $no);

$db->execute();

header("Location: data_loans.php");
