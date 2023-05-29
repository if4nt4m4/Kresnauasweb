<?php

include "koneksi.php";
$koneksi= new database();

if (isset($_GET['noUjian'])){
    

    $noUjian = $_GET['noUjian'];

    $query = $koneksi->koneksi->prepare("DELETE FROM pendaftaran WHERE noUjian='$noUjian'");
    $query->execute();
    $hasil_query=$query->get_result();

    header("location:viewdata.php");

    return $query;
}

$koneksi->koneksi->close();
?>