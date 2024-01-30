<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("koneksi gagal" . $conn->connect_error);
}else{
	echo "Berhasil";
}

$nama = $_POST['nama'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO peserta (nama, umur, alamat) VALUES ('$nama', '$umur', '$alamat')";
if ($conn->query($sql) === TRUE) {
	header("location: tambah_peserta.php");
	exit();
}else{
	echo "Error" . $sql . "<br>" .  $conn->error;
}
$conn->close();
?>