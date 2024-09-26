<?php
include "koneksi.php";

// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];

    // Upload Foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto']['name'];
        $target_dir = "user/gambar/";
        $target_file = $target_dir . basename($foto);

        // Cek dan buat direktori jika belum ada
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            // Foto berhasil diunggah, hapus foto lama jika ada
            if (!empty($_POST['foto_lama']) && file_exists($target_dir . $_POST['foto_lama'])) {
                unlink($target_dir . $_POST['foto_lama']);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah foto.";
            exit;
        }
    } else {
        // Jika tidak ada file baru yang diunggah, gunakan foto lama
        $foto = $_POST['foto_lama'];
    }

    // Persiapan query untuk update data
    $query = "UPDATE user SET username=?, password=?, nama_lengkap=?, foto=? WHERE id_user=?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssssi", $username, $password, $nama_lengkap, $foto, $id_user);

    if ($stmt->execute()) {
        // Redirect ke halaman yang diinginkan setelah data berhasil diubah
        header("Location: ?page=user/index");
        exit;
    } else {
        echo "Gagal mengubah data pengguna. Kesalahan: " . $stmt->error;
    }
}
?>
