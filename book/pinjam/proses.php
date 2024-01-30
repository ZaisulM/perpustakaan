<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include('../../config/koneksi.php');
$koneksi->connect();

if (isset($_POST["tambah"])) {
    $id_transaksi = $_POST["id_transaksi"];
    $nama_anggota = $_POST["nama_anggota"];
    $judul_buku = $_POST["judul_buku"];
    $tgl_peminjaman = $_POST["tgl_peminjaman"];
    $tgl_pengembalian = $_POST["tgl_pengembalian"];

    $sql_select = "SELECT id_buku FROM tb_buku WHERE judul_buku = '$judul_buku'";
    $result_select = $koneksi->query($sql_select);

    if ($result_select === false) {
        die("ERROR in SQL Quert" . $koneksi->$connection->error);
    }

    $row_select = $result_select->fetch_assoc();
    $id_buku = $row_select['id_buku'];

    $cmd = "INSERT INTO transaksi (id_transaksi, nama_anggota, judul_buku, tgl_peminjaman, tgl_pengembalian) VALUES ('$id_transaksi', '$nama_anggota', '$judul_buku', '$tgl_peminjaman', '$tgl_pengembalian')";

    $row_insert = $koneksi->query($cmd);

    if ($row_insert) {
        header("Location: datapinjam.php");
    } else {
        echo "Error: " . $koneksi->$connection->error();
    }
}
$koneksi->disconnect();
?>