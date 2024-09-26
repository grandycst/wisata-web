<?php
session_start();
$_SESSION['save_success']='Data Berhasil Disimpan';
// Sisipkan file koneksi
include "../koneksi.php";

$nama_kategori= $_POST['nama_kategori'];

// QUERY

$tambah = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')");

//jika berjasil

if ($tambah) {
    echo "<script> window.location.href='?page=kategori/index';</script>";
} else {
    echo "<script>  window.location.href='?page=kategori/tambah';</script>";
}
