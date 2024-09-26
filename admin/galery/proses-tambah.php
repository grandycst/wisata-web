<?php
session_start();
$_SESSION['save_success']='Data Berhasil Disimpan';
// Include koneksi database
include "koneksi.php";
// Ambil data dari form
$id = $_POST['id'];
$title = $_POST['title'];
$lokasi = $_POST['lokasi'];



// Upload gambar
$image_path = $_FILES['image_path']['name'];
$gambar_tmp = $_FILES['image_path']['tmp_name'];
$gambar_size = $_FILES['image_path']['size'];
$gambar_error = $_FILES['image_path']['error'];

// Tentukan direktori upload
$upload_dir = 'galery/uploads/';
$upload_file = $upload_dir . basename($image_path);

// Validasi gambar
if ($gambar_error === UPLOAD_ERR_OK) {
    if (move_uploaded_file($gambar_tmp, $upload_file)) {
        // Query untuk memasukkan data berita ke dalam database
        $query = "INSERT INTO gallery (id, title, lokasi, image_path) 
                  VALUES ('$id', '$title', '$lokasi', '$image_path')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script> window.location.href='?page=galery/index';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan berita: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Gagal mengunggah gambar.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Terjadi kesalahan saat mengunggah gambar.'); window.history.back();</script>";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>