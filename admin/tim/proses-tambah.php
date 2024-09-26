<?php
// Include koneksi database
include ('koneksi.php');

// Ambil data dari form
$id_tim = $_POST['id_tim'];
$nama_tim = $_POST['nama_tim'];
$jabatan_tim = $_POST['jabatan_tim'];


// Upload foto
$foto_tim = $_FILES['foto_tim']['name'];
$foto_tmp = $_FILES['foto_tim']['tmp_name'];
$foto_size = $_FILES['foto_tim']['size'];
$foto_error = $_FILES['foto_tim']['error'];

// Tentukan direktori upload
$upload_dir = 'tim/uploads/';
$upload_file = $upload_dir . basename($foto_tim);

// Validasi foto
if ($foto_error === UPLOAD_ERR_OK) {
    if (move_uploaded_file($foto_tmp, $upload_file)) {
        // Query untuk memasukkan data berita ke dalam database
        $query = "INSERT INTO tim (id_tim, nama_tim, jabatan_tim, foto_tim) 
                  VALUES ('$id_tim', '$nama_tim', '$jabatan_tim', '$foto_tim')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Berita berhasil ditambahkan!'); window.location.href='?page=tim/index';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan berita: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Gagal mengunggah foto.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Terjadi kesalahan saat mengunggah foto.'); window.history.back();</script>";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>