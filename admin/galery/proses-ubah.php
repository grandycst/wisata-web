<?php
session_start();
$_SESSION['update_success'] = 'Data Berhasil Diubah';
include "koneksi.php";

// Ambil data dari form
$id = $_POST['id'];
$title = $_POST['title'];
$lokasi = $_POST['lokasi'];

// Cek apakah ada file gambar yang diupload
if ($_FILES['image_path']['name']) {
    // Ambil gambar lama dari database
    $query = mysqli_query($koneksi, "SELECT image_path FROM gallery WHERE id = $id");
    $data = mysqli_fetch_assoc($query);
    $gambar_lama = $data['image_path'];

    // Hapus gambar lama dari folder uploads
    if (file_exists("galery/uploads/" . $gambar_lama) && $gambar_lama != '') {
        unlink("galery/uploads/" . $gambar_lama);
    }

    // Upload gambar baru
    $image_path = $_FILES['image_path']['name'];
    $target_dir = "galery/uploads/";
    $target_file = $target_dir . basename($image_path);

    // Pindahkan file ke folder uploads
    if (!move_uploaded_file($_FILES['image_path']['tmp_name'], $target_file)) {
        echo "<script>alert('Gagal mengupload gambar'); window.location.href='?page=galery/ubah&id=$id';</script>";
        exit();
    }

    // QUERY untuk mengupdate data galeri dengan gambar baru
    $update = mysqli_query($koneksi, "UPDATE gallery SET title = '$title', lokasi = '$lokasi', image_path = '$image_path' WHERE id = $id");
} else {
    // QUERY untuk mengupdate data galeri tanpa mengubah gambar
    $update = mysqli_query($koneksi, "UPDATE gallery SET title = '$title', lokasi = '$lokasi' WHERE id = $id");
}

// Jika berhasil
if ($update) {
    echo "<script>alert('Data berhasil diubah'); window.location.href='?page=galery/index';</script>";
} else {
    echo "<script>alert('Data gagal diubah'); window.location.href='ubah.php?id=$id';</script>";
}
?>
