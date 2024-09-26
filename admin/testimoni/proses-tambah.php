<?php
session_start();
$_SESSION['save_success']='Data Berhasil Disimpan';
// Include koneksi database
include "koneksi.php";
// Ambil data dari form
$id_testimoni = $_POST['id_testimoni'];
$nama_testimoni = $_POST['nama_testimoni'];
$isi_testimoni = $_POST['isi_testimoni'];



// Upload gambar
$gambar_testimoni = $_FILES['gambar_testimoni']['name'];
$gambar_tmp = $_FILES['gambar_testimoni']['tmp_name'];
$gambar_size = $_FILES['gambar_testimoni']['size'];
$gambar_error = $_FILES['gambar_testimoni']['error'];

// Tentukan direktori upload
$upload_dir = 'testimoni/uploads/';
$upload_file = $upload_dir . basename($gambar_testimoni);

// Validasi gambar
if ($gambar_error === UPLOAD_ERR_OK) {
    if (move_uploaded_file($gambar_tmp, $upload_file)) {
        // Query untuk memasukkan data berita ke dalam database
        $query = "INSERT INTO testimoni (id_testimoni, nama_testimoni, isi_testimoni, gambar_testimoni) 
                  VALUES ('$id_testimoni', '$nama_testimoni', '$isi_testimoni', '$gambar_testimoni')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script> window.location.href='?page=testimoni/index';</script>";
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