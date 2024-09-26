<?php
session_start();
$_SESSION['update_success']='Data Berhasil Diupdate';
// Sisipkan file koneksi
include "../koneksi.php";

// Ambil data dari form
$id_about = $_POST['id_about'];
$visi = $_POST['visi_about'];
$misi = $_POST['misi_about'];

// Variabel untuk nama gambar
$gambar_about = $_FILES['gambar_about']['name'];
$gambar_tmp = $_FILES['gambar_about']['tmp_name'];
$target_dir = "../about/gambar_about/"; // Sesuaikan dengan direktori penyimpanan gambar Anda

if (!empty($gambar_about)) {
    // Pindahkan file gambar yang diupload ke folder uploads
    $target_file = $target_dir . basename($gambar_about);
    
    if (move_uploaded_file($gambar_tmp, $target_file)) {
        // Jika upload gambar berhasil
        // Query untuk mengupdate data dengan gambar baru
        $sql = "UPDATE about SET 
                    visi_about=?, 
                    misi_about=?, 
                    gambar_about=? 
                WHERE id_about=?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sssi", $visi, $misi, $gambar_about, $id_about);
    } else {
        // Jika upload gambar gagal
        echo "<script>
                alert('Maaf, terjadi kesalahan saat mengunggah gambar.');
                window.location.href='../?page=about/ubah&id_about=$id_about';
              </script>";
        exit;
    }
} else {
    // Query untuk mengupdate data tanpa mengganti gambar
    $sql = "UPDATE about SET 
                visi_about=?, 
                misi_about=? 
            WHERE id_about=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssi", $visi, $misi, $id_about);
}

// Eksekusi query
if ($stmt->execute()) {
    echo "<script>
            alert('Data Berhasil Diupdate');
            window.location.href='../?page=about/index';
          </script>";
} else {
    // Jika query gagal
    echo "<script>
            alert('Data Gagal Diupdate');
            window.location.href='../?page=about/ubah&id_about=$id_about';
          </script>";
}

// Tutup statement dan koneksi
$stmt->close();
$koneksi->close();
?>
