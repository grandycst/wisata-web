<?php
include "../koneksi.php";

// Ambil data dari form
$id_tim = $_POST['id_tim'];
$nama_tim = $_POST['nama_tim'];
$jabatan_tim = $_POST['jabatan_tim'];

// Cek apakah ada file foto yang diupload
if ($_FILES['foto_tim']['name']) {
    // Ambil foto lama dari database
    $query = mysqli_query($koneksi, "SELECT foto_tim FROM tim WHERE id_tim = $id_tim");
    $data = mysqli_fetch_assoc($query);
    $foto_lama = $data['foto_tim'];

    // Hapus foto lama dari folder uploads
    if (file_exists("tim/uploads/" . $foto_lama) && $foto_lama != '') {
        unlink("tim/uploads/" . $foto_lama);
    }

    // Upload Foto Baru
    $foto_tim = $_FILES['foto_tim']['name'];
    $target_dir = "tim/uploads/";
    $target_file = $target_dir . basename($foto_tim);

    // Pindahkan file ke folder uploads
    if (!move_uploaded_file($_FILES['foto_tim']['tmp_name'], $target_file)) {
        echo "<script>alert('Gagal mengupload foto'); window.location.href='ubah.php?id_tim=$id_tim';</script>";
        exit();
    }

    // QUERY untuk mengupdate data tim dengan foto baru
    $update = mysqli_query($koneksi, "UPDATE tim SET nama_tim = '$nama_tim', jabatan_tim = '$jabatan_tim', foto_tim = '$foto_tim' WHERE id_tim = $id_tim");
} else {
    // QUERY untuk mengupdate data tim tanpa mengubah foto
    $update = mysqli_query($koneksi, "UPDATE tim SET nama_tim = '$nama_tim', jabatan_tim = '$jabatan_tim' WHERE id_tim = $id_tim");
}

// Jika berhasil
if ($update) {
    echo "<script>alert('Data berhasil diubah'); window.location.href='?page=tim/index';</script>";
} else {
    echo "<script>alert('Data gagal diubah'); window.location.href='?page=tim/index';</script>";
}
?>
