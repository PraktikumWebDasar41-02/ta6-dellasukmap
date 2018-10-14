<?php 
	include 'conn.php';
	session_start();
	$nim = $_SESSION['nim'];
	$query = mysqli_query($conn,"SELECT * FROM `t_pendaftaran` WHERE nim='$nim'");
	$tampil = mysqli_fetch_array($query);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
	<table border="0">
 	<tr>
 		<td colspan="5"><center><h1>MENU AWAL</h1><hr></center></td>
 	</tr>
 	<tr>
 		<td>Nim</td>
 		<td colspan="4" align="right"><?php echo $tampil['nim']; ?></td>
 	</tr>

 	<tr>
 		<td>Nama</td>
 		<td colspan="4" align="right"><?php echo $tampil['nama']; ?></td>
 	</tr>

 	<tr>
 		<td>Kelas</td>
 		<td colspan="4" align="right"><?php echo $tampil['kelas']; ?></td>
 	</tr>

 	<tr>
 		<td>Jenis Kelamin</td>
 		<td colspan="4" align="right"><?php echo $tampil['jeniskelamin']; ?></td>
 	</tr>

 	<tr>
 		<td>Hobi</td>
 		<td colspan="4" align="right"><?php echo $tampil['hobi']; ?></td>
 	</tr>

 	<tr>
 		<td>Fakultas</td>
 		<td colspan="4" align="right"><?php echo $tampil['fakultas']; ?></td>
 	</tr>

 	<tr>
 		<td>Alamat</td>
 		<td colspan="4" align="right"><?php echo $tampil['alamat']; ?></td>
 	</tr>
 	<tr>
 		<td ><button><a href="posting.php" style="text-decoration: none">POSTING</a></button></td>
 		<td><button><a href="semuaposting.php" style="text-decoration: none">SEMUA POSTINGAN</a></button></td>
 		<td><button><a href="daftarposting.php" style="text-decoration: none">DFTAR USER</a></button></td>
 		<td><button><a href="editprofile.php" style="text-decoration: none">EDIT PROFILE</a></button></td>
 		<td><button><a href="keluar.php" style="text-decoration: none">KELUAR</a></button></td>

 	</tr>
 </table>
</center>

</body>
</html>
