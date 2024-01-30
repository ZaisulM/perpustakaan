<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Peserta</title>
</head>
<body>
	<h2>Tambah Peserta</h2>
	<form action="aksi.php" method="post">
		<label for="nama">Nama: </label>
		<input type="text" name="nama" id="nama" required><br><br>
		<label for="umur">Umur: </label>
		<input type="text" name="umur" id="umur" required><br><br>
		<label for="alamat">Alamat: </label>
		<input type="text" name="alamat" id="alamat" required><br><br>
		<button type="submit" name="submit">Simpan</button>
	</form>
</body>
</html>