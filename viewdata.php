<?php 
include "koneksi.php";
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
	<title> VIEW DATA -Selamat Datang- </title>
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
				<li><a href="logout.php">Logout</a></li>
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
    <h1 class="display: block;margin-bottom: 1rem;text-align:center;">Tabel Pendaftaran</h1>
    <?php 
      if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
      }
      ?><br>
            <table border="1" align="center">
            <tr>
                <th>No. Ujian</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Jurusan</th>
                <th>Prodi</th>
                <th>Email</th>
                <th>Pilihan</th>
            </tr>
            <?php
           if(isset($_GET['cari'])){
			$cari = $_GET['cari'];
			$query = $db->koneksi->prepare("SELECT * FROM pendaftaran WHERE nama='$cari'");
			$query->execute();
			$hasil=$query->get_result();				
		  }else{
			$query = $db->koneksi->prepare("SELECT * FROM pendaftaran ORDER BY noUjian ASC ");
			$query->execute();
			$hasil=$query->get_result();		
		  } 

		  
		  while ($data = mysqli_fetch_array($hasil))
		  {
                echo "<tr>";
                echo "<td>$data[noUjian]</td>";
                echo "<td>$data[nama]</td>";
                echo "<td>$data[tempat]<?td>";
                echo "<td>$data[tgllahir]<?td>";
                echo "<td>$data[alamat]<?td>";
                echo "<td>$data[noHp]</td>";
                echo "<td>$data[jurusan]</td>";
                echo "<td>$data[prodi]</td>";
                echo "<td>$data[email]<?td>";
                echo '<td>
                    <a href="edit.php?noUjian='.$data['noUjian'].'"><input type="submit" name="edit" value="Edit"></a> /
                    <a href="hapus.php?noUjian='.$data['noUjian'].'"
                        onclick="return confirm(\'Anda yakin akan menghapus data?\')"><input type="submit" name="hapus" value="Hapus"></a>
                </td>';
                echo "</tr>";
            }
            ?>
        </table>
	</section>

</body>
</html>
