<?php
session_start();
$_SESSION['update_success']='Data Berhasil Di update';
// Include koneksi database
include "koneksi.php";

// Ambil data dari form
$id_wisata = $_POST['id_wisata'];
$id_kategori = $_POST['id_kategori'];
$judul_wisata = $_POST['judul_wisata'];
$tgl_wisata = $_POST['tgl_wisata'];
$isi_wisata = $_POST['isi_wisata'];
$foto_lama = $_POST['foto_lama'];

// Cek apakah ada file gambar yang diupload
if ($_FILES['gambar_wisata']['name']) {
    // Hapus gambar lama dari folder images jika ada
    if (file_exists("wisata/uploads/" . $foto_lama) && $foto_lama != '') {
        unlink("wisata/uploads/" . $foto_lama);
    }

    // Upload gambar baru
    $gambar_wisata = $_FILES['gambar_wisata']['name'];
    $target_dir = "wisata/uploads/";
    $target_file = $target_dir . basename($gambar_wisata);

    // Pindahkan file ke folder images
    if (!move_uploaded_file($_FILES['gambar_wisata']['tmp_name'], $target_file)) {
        echo "<script>alert('Gagal mengupload gambar'); window.location.href='../?page=wisata/index&id=$id_wisata';</script>";
        exit();
    }

    // Update wisata dengan gambar baru
    $update = mysqli_query($koneksi, "UPDATE wisata SET id_kategori = '$id_kategori', judul_wisata = '$judul_wisata', tgl_wisata = '$tgl_wisata', isi_wisata = '$isi_wisata', gambar_wisata = '$gambar_wisata' WHERE id_wisata = '$id_wisata'");
} else {
    // Update wisata tanpa mengubah gambar
    $update = mysqli_query($koneksi, "UPDATE wisata SET id_kategori = '$id_kategori', judul_wisata = '$judul_wisata', tgl_wisata = '$tgl_wisata', isi_wisata = '$isi_wisata' WHERE id_wisata = '$id_wisata'");
}

// Jika berhasil
if ($update) {
    echo "<script> alert('data berhasil ditambahkan'); window.location.href='?page=wisata/index';</script>";
} else {
    echo "<script> alert('data Gagal ditambahkan'); window.location.href='?page=wisata/index';</script>";
}
?>
