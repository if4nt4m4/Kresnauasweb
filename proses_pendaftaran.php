<?php

include "koneksi.php";
$db = new database();

if (isset($_POST['daftar'])){

    $noUjian = $_POST['noUjian'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tgllahir'];
    $alamat = $_POST['alamat'];
    $noHp = $_POST['noHp'];
    $jurusan =$_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];

    $query = $db->koneksi->prepare("INSERT INTO pendaftaran VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param('sssssssss', $noUjian, $nama, $tempat, $tanggal, $alamat, $noHp, $jurusan, $prodi, $email);

    $query->execute();

    header("location:viewdata.php");
    return $query; 
    
}
$db->koneksi->close();
?>