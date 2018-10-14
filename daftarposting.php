<?php 
include 'conn.php';
session_start();
if (isset($_POST['submit'])) {
		$nim = $_SESSION['nim'];
		$nama = $_SESSION['nama'];
			$tampil1 = mysqli_query($conn,"INSERT INTO t_posting(nim,nama) VALUES ('$nim','$nama')");
		if (!$tampil1) {
			die("GAGAL");
		}else{echo "BERHASIL";}	
		}
		
 ?>
 <table>
 	<tr>
 		 <td colspan="3" align="center"><button><a href="halamanawal.php" style="text-decoration: none">Kembali</a></button></td>
 		 </tr>
 </table>