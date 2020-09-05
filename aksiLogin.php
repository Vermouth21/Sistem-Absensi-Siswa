<?php
session_start();

require_once('config/koneksi.php');

// if (isset($_POST['login'])) {

$username = mysqli_real_escape_string($konek, $_POST['username']);
$password = mysqli_real_escape_string($konek, $_POST['pass']);

// echo "SELECT * FROM user WHERE username ='$username' AND password ='$password'";

$login = $konek->query("SELECT * FROM user WHERE username ='$username' AND password ='$password'");

//cek jumlah user
$cek = mysqli_num_rows($login);
$row = mysqli_fetch_assoc($login);

if ($cek >= 1) {

    echo "1"; // log in
    $_SESSION['user'] = $row;
} else {

    echo "0";
}
