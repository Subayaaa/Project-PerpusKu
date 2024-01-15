<?php

session_start();

require('../database/database.php');
$db = new Database();

$username = $_POST['username'];
$password = $_POST['password'];

$db->query('SELECT * FROM admins WHERE username=:username AND password = MD5(:password)');

$db->bind(':username', $username);
$db->bind(':password', $password);

$admin = $db->single();

if(@$admin) {
    $_SESSION['username'] = $admin['username'];
    $_SESSION['jk'] = $admin['jk'];
    $_SESSION['status'] = $admin['status'];
    $_SESSION['islogin'] = true;

    header("Location: ../index2.php");
} else {
    header("Location: ../login.php");
}