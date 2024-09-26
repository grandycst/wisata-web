<?php
session_start();
$_SESSION['save_success']='Data Berhasil Disimpan';
// Include koneksi database
include "koneksi.php";
// Ambil data dari form
$id_armada = $_POST['id_armada'];
$nama_armada = $_POST['nama_armada'];
$jenis_armada = $_POST['jenis_armada'];
$jumlah_armada = $_POST['jumlah_armada'];


// Upload gambar
$gambar_armada = $_FILES['gambar_armada']['name'];
$gambar_tmp = $_FILES['gambar_armada']['tmp_name'];
$gambar_size = $_FILES['gambar_armada']['size'];
$gambar_error = $_FILES['gambar_armada']['error'];

// Tentukan direktori upload
$upload_dir = 'armada/uploads/';
$upload_file = $upload_dir . basename($gambar_armada);

// Validasi gambar
if ($gambar_error === UPLOAD_ERR_OK) {
    if (move_uploaded_file($gambar_tmp, $upload_file)) {
        // Query untuk memasukkan data berita ke dalam database
        $query = "INSERT INTO armada (id_armada, nama_armada, jenis_armada,jumlah_armada, gambar_armada) 
                  VALUES ('$id_armada', '$nama_armada', '$jenis_armada','$jumlah_armada', '$gambar_armada')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script> window.location.href='?page=armada/index';</script>";
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