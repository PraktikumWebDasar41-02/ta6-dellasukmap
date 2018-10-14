<?php 
include 'conn.php';
$que = mysqli_query($conn,"SELECT * FROM t_posting");

 ?>

 <tabel align="center">
 	<tr>
 		<td colspan="3" align="center">SEMUA POSTINGAN</td>
 	</tr><br><br>

 	<?php 
 			while ($arr = mysqli_fetch_array($que)) {
 				$kode = $arr['nim'];
 				$query = mysqli_query($conn,"SELECT * FROM t_pendaftaran WHERE nim='$kode'");
 				$arry1 = mysqli_fetch_array($query);
 				echo "<tr>";
 				echo "<td>".$arr['nim']."<br>".$arry1['nama']."</td>"."<br>";
 				echo "<td>".$arr['cerita']."</td>"."<br>";
 				echo "<td><img src='gambar/".$arr['photo']."' height='140'></td>"."<br>";
 				
 				echo "<tr>"."<br>"."<br>";
 			}
 				 			
 		 ?>

 		 <tr>
 		 	<td colspan="3" align="center"><button><a href="halamanawal.php" style="text-decoration: none">Kembali</a></button></td>
 		 </tr>
 </tabel>
