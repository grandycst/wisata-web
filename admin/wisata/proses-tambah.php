<?php
session_start();
$_SESSION['save_success']='Data Berhasil Disimpan';
// Include koneksi database
include "koneksi.php";

// Ambil data dari form
$id_kategori = $_POST['id_kategori'];
$judul_wisata = $_POST['judul_wisata'];
$tgl_wisata = $_POST['tgl_wisata'];
$isi_wisata = $_POST['isi_wisata'];

// Upload gambar
$gambar_wisata = $_FILES['gambar_wisata']['name'];
$gambar_tmp = $_FILES['gambar_wisata']['tmp_name'];
$gambar_size = $_FILES['gambar_wisata']['size'];
$gambar_error = $_FILES['gambar_wisata']['error'];

// Tentukan direktori upload
$upload_dir = 'wisata/uploads/';
$upload_file = $upload_dir . basename($gambar_wisata);

// Validasi gambar
if ($gambar_error === UPLOAD_ERR_OK) {
    if (move_uploaded_file($gambar_tmp, $upload_file)) {
        // Query untuk memasukkan data wisata ke dalam database
        $query = "INSERT INTO wisata (id_kategori, judul_wisata, tgl_wisata, isi_wisata, gambar_wisata) 
                  VALUES ('$id_kategori', '$judul_wisata', '$tgl_wisata', '$isi_wisata', '$gambar_wisata')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script> window.location.href='../admin/?page=wisata/index';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan wisata: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Gagal mengunggah gambar.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Terjadi kesalahan saat mengunggah gambar.'); window.history.back();</script>";
}

// Tutup koneksi database
mysqli_close($koneksi);