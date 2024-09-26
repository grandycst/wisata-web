<?php
session_start();
$_SESSION['update_success']='Data Berhasil Disimpan';
include "koneksi.php";

// Ambil data dari form
$id_armada = $_POST['id_armada'];
$nama_armada = $_POST['nama_armada'];
$jenis_armada = $_POST['jenis_armada'];
$jumlah_armada = $_POST['jumlah_armada'];

// Cek apakah ada file gamabar yang diupload
if ($_FILES['gamabar_armada']['name']) {
    // Ambil gamabar lama dari database
    $query = mysqli_query($koneksi, "SELECT gamabar_armada FROM armada WHERE id_armada = $id_armada");
    $data = mysqli_fetch_assoc($query);
    $gamabar_lama = $data['gamabar_armada'];

    // Hapus gamabar lama dari folder uploads
    if (file_exists("armada/uploads/" . $gamabar_lama) && $gamabar_lama != '') {
        unlink("armada/uploads/" . $gamabar_lama);
    }

    // Upload gamabar Baru
    $gamabar_armada = $_FILES['gamabar_armada']['name'];
    $target_dir = "armada/uploads/";
    $target_file = $target_dir . basename($gamabar_armada);

    // Pindahkan file ke folder uploads
    if (!move_uploaded_file($_FILES['gamabar_armada']['tmp_name'], $target_file)) {
        echo "<script>alert('Gagal mengupload gamabar'); window.location.href='?page=armada/ubah&id_armada=$id_armada';</script>";
        exit();
    }

    // QUERY untuk mengupdate data armada dengan gamabar baru
    $update = mysqli_query($koneksi, "UPDATE armada SET nama_armada = '$nama_armada', jenis_armada = '$jenis_armada',jumlah_armada = '$jumlah_armada', gamabar_armada = '$gamabar_armada' WHERE id_armada = $id_armada");
} else {
    // QUERY untuk mengupdate data armada tanpa mengubah gamabar
    $update = mysqli_query($koneksi, "UPDATE armada SET nama_armada = '$nama_armada', jenis_armada = '$jenis_armada', jumlah_armada = '$jumlah_armada' WHERE id_armada = $id_armada");
}

// Jika berhasil
if ($update) {
    echo "<script>alertwindow.location.href='?page=armada/index';</script>";
} else {
    echo "<script>alert('Data gagal diubah'); window.location.href='?page=armada/ubah&id_armada=$id_armada';</script>";
}
?>
