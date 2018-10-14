<?php 
include 'conn.php';
	session_start();
	$nim = $_SESSION['nim'];
	$query = mysqli_query($conn,"SELECT * FROM `t_pendaftaran` WHERE nim='$nim'");
	$tampil = mysqli_fetch_array($query);
	$array = explode(",", $tampil['hobi']);
	// print_r($array);
 ?>

<!DOCTYPE html>
<html>
<head>
 	<title></title>
</head>
<body>
 	<form method="post">
	<table>
		<tr>
			<td>Nama:</td>
			<td><?php echo "<input type='text' name='nama' value='".$tampil['nama']."''>"; ?></td>	
		</tr>
		
		<tr>
			<td>Kelas</td>
			<td><input type="radio" name="kelas" value="		D3MI4101"<?php echo ($tampil['kelas']=='		D3MI-41-01')?'checked':'' ?>>D3MI4101<br>
				<input type="radio" name="kelas" value="D3MI4102"<?php echo ($tampil['kelas']=='D3MI-41-02')?'checked':'' ?>>D3MI4102<br>
				<input type="radio" name="kelas" value="D3MI4103"<?php echo ($tampil['kelas']=='D3MI-41-03')?'checked':'' ?>>D3MI4103<br>
				<input type="radio" name="kelas" value="D3MI4104"<?php echo ($tampil['kelas']=='D3MI-41-01')?'checked':'' ?>>D3MI4104<br>
			</td>
		</tr>

		<tr>
			<td>Jeniskelamin:</td>
			<td><input type="radio" name="jeniskelamin" value="Laki-Laki"<?php echo ($tampil['jeniskelamin']=='laki-laki')?'checked':'' ?>>Laki-Laki<br>
				<input type="radio" name="jeniskelamin" value="Perempuan"<?php echo ($tampil['jeniskelamin']=='perempuan')?'checked':'' ?>>Perempuan<br>
			</td>
		</tr>

		<tr>
			<td>Hobi</td>
			<td><input type="checkbox" name="hobi[]" value="	Ngoding"<?php if(in_array('Ngoding', $array)){echo "checked=checked";}?>>Ngoding<br>
				<input type="checkbox" name="hobi[]" value="Tidur"<?php if(in_array('Tidur', $array)){echo "checked=checked";}?>>Tidur<br>
				<input type="checkbox" name="hobi[]" value="Jalan"<?php if(in_array('Jalan', $array)){echo "checked=checked";}?>>Jalan<br>
				<input type="checkbox" name="hobi[]" value="Makan"<?php if(in_array('Makan', $array)){echo "checked=checked";}?>>Makan<br>
				<input type="checkbox" name="hobi[]" value="Olahraga"<?php if(in_array('Olahraga', $array)){echo "checked=checked";}?>>Olahraga<br>
				<input type="checkbox" name="hobi[]" value="Nyanyi"<?php if(in_array('Nyanyi', $array)){echo "checked=checked";}?>>Nyanyi<br>
			</td>
		</tr>

		<tr>
			<td>Fakultas</td>
			<td><select name="fakultas" id="fakultas">
					<option value="FRI">FRI</option>
  					<option value="FEB">FEB</option>
  					<option value="FIT">FIT</option>
  					<option value="FTE">FTE</option>
  					<option value="FTI">FTI</option>	
  			</select>
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
  			<td><?php echo "<textarea name='alamat'".">".$tampil['alamat']."</textarea>"; ?> </td>
		</tr>

		<tr>
			<td><input type="submit" name="simpan" value="submit"></td>
			<td><button><a href="menuawal.php" style="text-decoration: none">kembali</a></button></td>
		</tr>
	</table>
	<br>

	<br>
	
	</form>
</body>
</html>
 
<?php 
if (isset($_POST['simpan'])) {
		if (str_word_count($_POST['nama'])<=35) {
			$nama = $_POST['nama'];
		}else{echo "Nama terlalu panjang <br>";}

		$kelas = $_POST['kelas'];
		$jeniskelamin = $_POST['jeniskelamin'];

		$arrhobi = $_POST['hobi'];
		$hobi = implode(",",$arrhobi);
		$fakultas = $_POST['fakultas'];
		$alamat = $_POST['alamat'];

		$upd = mysqli_query($conn,"UPDATE t_pendaftaran SET nama='$nama',kelas='$kelas',jeniskelamin='$jeniskelamin',hobi='$hobi',fakultas='$fakultas',alamat='$alamat' WHERE nim='$nim'");
		if (isset($upd)) {
			echo "berhasil";
			header("Location:edit.php");
		}
		}

 ?>
 