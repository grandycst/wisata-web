<?php
session_start();  // Mulai sesi untuk menggunakan variabel sesi
include 'koneksi.php';  // Sertakan koneksi database

// Periksa apakah ID di URL ada
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);  // Ambil ID dari URL dan pastikan sebagai integer

    // Query untuk mendapatkan path gambar berdasarkan ID
    $query = "SELECT image_path FROM destinasi WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $image_path = $data['image_path'];

        // Hapus file gambar dari server
        if (!empty($image_path) && file_exists("uploads/$image_path")) {
            unlink("uploads/$image_path");
        }

        // Query untuk menghapus data dari tabel destinasi
        $query = "DELETE FROM destinasi WHERE id = $id";

        if (mysqli_query($koneksi, $query)) {
            $_SESSION['delete_success'] = "Data destinasi berhasil dihapus!";
            echo "<script> window.location.href='../admin/?page=destinasi/index';</script>"; // Redirect to index page  // Redirect ke halaman index
            exit();  // Pastikan tidak ada kode lain yang dieksekusi
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak diberikan.";
}
?>
