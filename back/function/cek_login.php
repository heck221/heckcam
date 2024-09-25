<?php
include '../../function/connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$username'");
$user = mysqli_fetch_assoc($login);

if ($user && password_verify($password, $user['password'])) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    $_SESSION['level'] = "admin";
    header("location:../template/");
} else {
    header("location:../index.php");
}
?>
