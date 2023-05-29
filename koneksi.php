<?php

class database{

   var $host = "localhost";
   var $uname = "root";
   var $pass = "";
   var $db = "uasweb";
   var $koneksi = "";
   
       function __construct(){
           $this->koneksi = mysqli_connect($this->host,$this->uname,$this->pass,$this->db);
           
           if(!$this->koneksi){
               echo"Koneksi database gagal";
           }else{
               
           }
       }

       function tampilData(){
        $statment = $this->koneksi->prepare("SELECT * FROM pendaftaran ORDER BY noUjian ASC");
        $statment->execute(); 

        $hasil=$statment->get_result();
        while($baris = mysqli_fetch_array($hasil)){
            $tampilan[] = $baris;
        }

        
		return $tampilan;
        
        
        }

        function cariData($cari){
            $perintah = $this->koneksi->prepare("SELECT * FROM pendaftaran WHERE nama='$cari'");
            $perintah->execute();

            $hasil=$perintah->get_result();
            return $hasil;
        
        }


        function editData($data){
            $statment = $this->koneksi->prepare("SELECT * FROM pendaftaran WHERE noUjian='$data'");
            $statment->execute();

            $hasil=$statment->get_result();
            return $hasil;
        }


        function updateData($noUjian,$nama,$tempat,$tgllahir,$alamat,$noHp,$jurusan,$prodi,$email){
            $statment = $this->koneksi->prepare("UPDATE pendaftaran SET noUjian = '$noUjian', nama = '$nama', tempat ='$tempat', tgllahir = '$tgllahir', alamat = '$alamat',noHp = '$noHp', jurusan = '$jurusan', prodi = '$prodi', email = '$email' WHERE noUjian = '$noUjian'");
            $statment->execute();

            $hasil=$statment->get_result();
            return $hasil;
        }
}
?>