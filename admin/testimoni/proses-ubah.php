<?php
session_start();
$_SESSION['update_success']='Data Berhasil Disimpan';
include "koneksi.php";

// Ambil data dari form
$id_testimoni = $_POST['id_testimoni'];
$nama_testimoni = $_POST['nama_testimoni'];
$isi_testimoni = $_POST['isi_testimoni'];


// Cek apakah ada file gamabar yang diupload
if ($_FILES['gamabar_testimoni']['name']) {
    // Ambil gamabar lama dari database
    $query = mysqli_query($koneksi, "SELECT gamabar_testimoni FROM testimoni WHERE id_testimoni = $id_testimoni");
    $data = mysqli_fetch_assoc($query);
    $gamabar_lama = $data['gamabar_testimoni'];

    // Hapus gamabar lama dari folder uploads
    if (file_exists("testimoni/uploads/" . $gamabar_lama) && $gamabar_lama != '') {
        unlink("testimoni/uploads/" . $gamabar_lama);
    }

    // Upload gamabar Baru
    $gamabar_testimoni = $_FILES['gamabar_testimoni']['name'];
    $target_dir = "testimoni/uploads/";
    $target_file = $target_dir . basename($gamabar_testimoni);

    // Pindahkan file ke folder uploads
    if (!move_uploaded_file($_FILES['gamabar_testimoni']['tmp_name'], $target_file)) {
        echo "<script>alert('Gagal mengupload gamabar'); window.location.href='?page=testimoni/ubah&id_testimoni=$id_testimoni';</script>";
        exit();
    }

    // QUERY untuk mengupdate data testimoni dengan gamabar baru
    $update = mysqli_query($koneksi, "UPDATE testimoni SET nama_testimoni = '$nama_testimoni', isi_testimoni = '$isi_testimoni', gamabar_testimoni = '$gamabar_testimoni' WHERE id_testimoni = $id_testimoni");
} else {
    // QUERY untuk mengupdate data testimoni tanpa mengubah gamabar
    $update = mysqli_query($koneksi, "UPDATE testimoni SET nama_testimoni = '$nama_testimoni', isi_testimoni = '$isi_testimoni' WHERE id_testimoni = $id_testimoni");
}

// Jika berhasil
if ($update) {
    echo "<script>window.location.href='?page=testimoni/index';</script>";
} else {
    echo "<script>alert('Data gagal diubah'); window.location.href='?page=testimoni/ubah&id_testimoni=$id_testimoni';</script>";
}
?>
