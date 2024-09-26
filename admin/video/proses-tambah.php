<?php
// Sisipkan file koneksi
include "koneksi.php";

$judul_video = mysqli_real_escape_string($koneksi, $_POST['judul_video']);
$deskripsi1_video = mysqli_real_escape_string($koneksi, $_POST['deskripsi1_video']);
$deskripsi2_video = mysqli_real_escape_string($koneksi, $_POST['deskripsi2_video']);
$link_video = mysqli_real_escape_string($koneksi, $_POST['link_video']);

// QUERY
$tambah = mysqli_query($koneksi, "INSERT INTO video (judul_video, deskripsi1_video, deskripsi2_video, link_video) 
                                  VALUES ('$judul_video', '$deskripsi1_video', '$deskripsi2_video', '$link_video')");

// jika berhasil
if ($tambah) {
    echo "<script> alert('data berhasil ditambahkan'); window.location.href='?page=video/index';</script>";
} else {
    echo "<script> alert('data Gagal ditambahkan'); window.location.href='?page=video/tambah';</script>";
}
?>
