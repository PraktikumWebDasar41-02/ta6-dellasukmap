<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
</head>
<body>
	<form method="POST" action="">
		<h1> REGISTRASI </h1>

	<table>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" maxlength="35" placeholder="Nama" required="Isikan Nama Anda"></td>
		</tr>
		<tr>
			<td>Nim</td>
			<td><input type="text" name="nim" maxlength="10" placeholder="Masukkan NIM" required="Isikan Nim Anda"></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td><input type="radio" name="kelas" value="D3MI4101">D3MI4101<br>
				<input type="radio" name="kelas" value="D3MI4102">D3MI4102<br>
				<input type="radio" name="kelas" value="D3MI4103">D3MI4103<br>
				<input type="radio" name="kelas" value="D3MI4104">D3MI4104<br>
		</td>
		<tr>
			<td>Jenis Kelamin</td>
			<td><input type="radio" name="jeniskelamin" value="Laki-Laki">Laki-Laki<br>
				<input type="radio" name="jeniskelamin" value="Perempuan">Perempuan<br>
			</td>
		</tr>
		<tr>
			<td>Hobi</td>
			<td><input type="checkbox" name="hobi[]" value="Ngoding">Ngoding<br>
				<input type="checkbox" name="hobi[]" value="Tidur">Tidur<br>
				<input type="checkbox" name="hobi[]" value="Jalan">Jalan<br>
				<input type="checkbox" name="hobi[]" value="Makan">Makan<br>
				<input type="checkbox" name="hobi[]" value="Olahraga">Olahraga<br>
				<input type="checkbox" name="hobi[]" value="Nyanyi">Nyanyi<br>
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
  			<td><textarea name="alamat" rows="5" cols="40" placeholder="Masukkan ALamat Sesuai KTP"required="silahkan mengsisi alamat"></textarea></td>
  		</tr>
  		<td>submit</td>
  		<td><input type="submit" name="submit" value="kirim">
	</table>
</form>

</body>
</html>

<?php
	include 'conn.php';
	if (isset($_POST['submit'])) {
		if (str_word_count($_POST['nama'])<=35) {
			$nama = $_POST['nama'];
		}else{
			echo "Nama terlalu panjang <br>";
			}

		if (!is_numeric($_POST['nim'])&&str_word_count($_POST['nim']>10)) {
			echo "NIM harus angka dan max 10 karakter <br>";
		}else{
			$nim = $_POST['nim'];
			}

		$kelas = $_POST['kelas'];
		$jeniskelamin = $_POST['jeniskelamin'];

		$arrhobi = $_POST['hobi'];
		$hobi = implode(",",$arrhobi);
		$fakultas = $_POST['fakultas'];
		$alamat = $_POST['alamat'];
		if (isset($nama)&&isset($nim)&&isset($kelas)&&isset($jeniskelamin)&&isset($hobi)&&isset($fakultas)&&isset($alamat)) {
		$query = mysqli_query($conn,"INSERT INTO t_pendaftaran (nim, nama, kelas, jeniskelamin, hobi, fakultas, alamat) VALUES ('$nim','$nama','$kelas','$jeniskelamin','$hobi','$fakultas','$alamat')");

		if (isset($query)) {
			header("Location:login.php");
		}
		}else{echo "Data masih kosong";}


}

?>