<?php
session_start();
include "koneksi.php";

// Menerima id_armada dari URL
$id = $_GET['id'];

// Query untuk menghapus data dari tabel armada berdasarkan id
$hapus = mysqli_query($koneksi, "DELETE FROM gallery WHERE id='$id'");

// Jika berhasil
if ($hapus) {
    $_SESSION['delete_success'] = 'Data Berhasil Dihapus';
    echo "<script>window.location.href='?page=galery/index';</script>";
} else {
    // Jika gagal
    echo "<script>alert('Data gagal dihapus'); window.location.href='?page=galery/index';</script>";
}
