<?php
// Sisipkan file koneksi
include "../koneksi.php";

// Ambil data dari form
$id_video = $_POST['id_video'];
$nama_video = $_POST['judul_video'];
$email = $_POST['deskripsi1_video'];
$facebook = $_POST['deskripsi2_video'];
$instagram = $_POST['link_video'];


// QUERY untuk mengupdate data ke tabel video
$ubah = mysqli_query($koneksi, "UPDATE video SET judul_video='$nama_video', deskripsi1_video='$email', deskripsi2_video='$facebook', link_video='$instagram' WHERE id_video=$id_video");

// Jika berhasil
if ($ubah) {
    echo "<script> alert('data berhasil ditambahkan'); window.location.href='../?page=video/index';</script>";
} else {
    echo "<script> alert('data Gagal ditambahkan'); window.location.href='../?page=video/index';</script>";
}
?>
