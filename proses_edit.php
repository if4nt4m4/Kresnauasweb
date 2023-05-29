<?php 
if (isset($_POST['edit'])){

    include("koneksi.php");
    $db = new database();

    $noUjian = $_POST["noUjian"];
    $nama = $_POST["nama"];
    $tempat = $_POST["tempat"];
    $tanggal = $_POST["tgllahir"];
    $alamat = $_POST["alamat"];
    $noHp = $_POST["noHp"];
    $jurusan = $_POST["jurusan"];
    $prodi = $_POST["prodi"];
    $email = $_POST["email"];


    $result = $db->updateData($noUjian,$nama,$tempat,$tanggal,$alamat,$noHp,$jurusan,$prodi,$email);

    header("location:viewdata.php");
    return $result;

}
?>