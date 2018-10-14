<!DOCTYPE html>
<html>
<head>
	<title>Posting</title>
</head>
<body>
	<form method="POST" action="semuaposting.php" enctype="multipart/form-data">
	<table align="center">
		<tr>
			<td colspan="2">POSTINGAN</td>
		</tr>

		<tr>
			<td>Cerita:</td>
			<td><textarea name="cerita" rows="20" cols="80"></textarea></td>
		</tr>

		<tr>
			<td>Gambar:</td>
			<td><input type="file" name="photo"></td>
		</tr>

		<tr align="center">
			<td colspan="2"><input type="submit" name="submit" value="SUBMIT">
			</td>
		</tr>
	</table>
</form>
</body>
</html>

<?php 
include 'conn.php';
session_start();
if (isset($_POST['submit'])) {
	if ($_FILES['photo']['name'] != "") {
		$nim = $_SESSION['nim'];
		$photo = $_FILES['photo']['name'];
		if (str_word_count($_POST['cerita'])<=30) {
			$cerita = $_POST['cerita'];
		}else{echo "riwayat harus di bawah 50 karakter";}
		
		if (isset($cerita)&&isset($photo)) {
			$tampil1 = mysqli_query($conn,"INSERT INTO t_posting(nim,cerita,photo) VALUES ('$nim','$cerita','$photo')");
		if (!$tampil1) {
			die("GAGAL");
		}else{echo "BERHASIL";}	
		}
		
	}
}
 ?>
