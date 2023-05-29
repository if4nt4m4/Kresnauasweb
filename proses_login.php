<?php 
 session_start();
require_once("koneksi.php");
$db = new database();
$conn = $db->koneksi;

if(isset($_POST['Login'])){
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

$query_sql = "SELECT * FROM t_login WHERE username = '$username' AND password= '$password'";

$result = mysqli_query($conn, $query_sql);

if(mysqli_num_rows($result) > 0){
    header("location:dashboard.php");
}else{
    
    header("location:Signup.php");
}
}

?>