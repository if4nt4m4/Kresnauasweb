<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title> PROFILE -Selamat Datang- </title>
	<link rel="icon" type="png/jpg" href="gambar/icon.png" sizes="16x16">
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		header {
			background-color: navy;
			color: #fff;
			padding: 20px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		h1 {
			margin: 0;
		}

		nav {
			background-color: black;
			color: #fff;
			padding: 10px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		nav ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			display: flex;
		}

		nav ul li {
			margin-right: 20px;
		}

		nav ul li a {
			color:white;
			text-decoration: none;
			padding: 10px;
			border-radius: 5px;
			transition: background-color 0.3s ease-in-out;
		}

		nav ul li a:hover {
			background-color: skyblue;
		}

		.search-container {
			display: flex;
			align-items: center;
			position: relative;
		}

		.search-container input[type="text"] {
			padding: 10px;
			border-radius: 5px;
			border: none;
			width: 200px;
		}

		.search-container button {
			background-color: #fff;
			color: #333;
			padding: 10px;
			border-radius: 5px;
			border: none;
			position: absolute;
			right: 0;
		}

        section {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
            align-items: center;
            flex-direction: column;
			margin: 20px;
		}

		.card {
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			border-radius: 5px;
			padding: 20px;
			margin-bottom: 20px;
			width: calc(33% - 20px);
		}

		.card h2 {
			margin-top: 0;
		}

		.card p {
			margin: 0;
		}
        input[type=submit] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: navy;
            background-position: 10px 10px; 
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin: center;
            color: #fff;
			transition: background-color 0.3s ease-in-out;
        }

	</style>
</head>
<body>
	<header>
		<h1>Politeknik Negeri Madiun</h1>
		<nav>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="viewdata.php">Mahasiswa</a></li>
				<li><a href="pendaftaran.php">pendaftaran</a></li>
				<li><a href="Login.php">Login</a></li>
			</ul>
			<div class="search-container">
                <form action="viewdata.php" method="get">
                    <input type="text" placeholder="Cari..." name="cari">
                    <button type="submit" value="cari">Cari</button>
                </form>
			</div>
		</nav>
	</header>

    <section>
    <center><h1>Profile Saya</h1></center><br>
    <?php 
      if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
      }
      ?><br>
            <div class="card">
                <p>Nama: Kresnabayu Dwirifanto</p>
                <p>NIM: 223307046</p>
                <p>Kelas: 2B</p>
                <p>Instragram: @Tanya_ajaaaaa</p>
                <p>Facebook: Kresnabayu</p>
            </div>
            <?php
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $query = "SELECT * FROM t_pendaftaran WHERE nama='$cari'";				
              }else{
                $query = "SELECT * FROM t_pendaftaran ORDER BY noUjian ASC ";		
              }
            $result = mysqli_query($link, $query);

            if(!$result){
                die("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
            }
            ?>
        </table>
	</section>

</body>
</html>
