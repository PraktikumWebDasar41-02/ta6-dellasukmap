<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
	<center><h1>Login</h1>
	<table>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" placeholder="Masukkan Nama"></td>
		</tr>
		<tr>
	 		<td>NIM</td>
	 		<td><input type="password" name="nim" placeholder="Masukkan NIM"></td>
	 	</tr>
	 	<tr>
	 		<td><center><input type="submit" name="LOGINs" value="LOGIN"></center></td>
	 	</tr>
	</table>
	</center>
	</form>
</body>
</html>

<?php 
include 'conn.php';
if (isset($_POST['login'])) {
	session_start();
	if (str_word_count($_POST['nama'])<=35) {
			$nama = $_POST['nama'];
		}else{
			echo "Nama terlalu panjang <br>";
		}

		if (!is_numeric($_POST['nim'])&&str_word_count($_POST['nim']>10)) {
			echo "NIM max 10 karakter <br>";
		}else{
			$nim = $_POST['nim'];
		}

		$_SESSION['nama'] = $nama;
		$_SESSION['nim'] = $nim;
		if (isset($nama)&&isset($nim)) {
			$que = mysqli_query($conn,"SELECT * FROM t_pendaftaran WHERE nim='$nim'");
			$arr = mysqli_fetch_array($que);
			if ($nama ==$arr['nama']&&$nim ==$arr['nim']) {
				
				header("Location:halamanawal.php");
			}else{echo "NIM ATAU NAMA YANG ANDA MASUKKAN SALAH!!";}
		}
}
 ?>
