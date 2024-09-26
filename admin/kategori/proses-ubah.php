<?php
// Sisipkan file koneksi
include "../koneksi.php";

// Mengambil data dari form
$nama_kategori = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
$id_kategori = mysqli_real_escape_string($koneksi, $_POST['id_kategori']); // Pastikan $id_kategori dikirimkan melalui form

// QUERY
$ubah = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");

// Cek jika query berhasil
if ($ubah) {
    echo "<script> alert('data berhasil ditambahkan'); window.location.href='?page=tim/index';</script>";
} else {
    echo "<script> alert('data Gagal ditambahkan'); window.location.href='?page=tim/index';</script>";
}
?>
