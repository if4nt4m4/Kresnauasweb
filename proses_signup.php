<?php 
 session_start();
include 'koneksi.php';
$koneksi = new database();

if (isset($_POST['Signup'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query  =$koneksi->koneksi->prepare("INSERT INTO t_login VALUES ('$email', '$username', '$password')");
    

    if ($query) {
        $result = $query->execute();
        header("location:Login.php");
        return $result;
        
    }else {
        die("Oops! Terjadi kesalahan");
    }
}
?>