<?php
session_start();
$_SESSION['delete_success']='Data Berhasil Di Hapus';
include "../koneksi.php";

// Periksa apakah 'id_about' diset dalam URL dan apakah merupakan angka
if (isset($_GET['id_about']) && is_numeric($_GET['id_about'])) {
    $id_about = $_GET['id_about'];

    // Gunakan prepared statement untuk menghindari SQL injection
    $stmt = $koneksi->prepare("DELETE FROM about WHERE id_about = ?");
    
    if ($stmt === false) {
        die('Prepare statement error: ' . $koneksi->error);
    }

    $stmt->bind_param("i", $id_about);

    if ($stmt->execute()) {
        // Jika query berhasil
        echo "<script>
              
                window.location.href='../?page=about/index';
              </script>";
    } else {
        // Jika query gagal
        echo "<script>
                alert('Data Gagal Dihapus'); 
                window.location.href='../?page=about/index';
              </script>";
    }

    // Tutup statement
    $stmt->close();
} else {
    // Jika 'id_about' tidak valid atau tidak diset
    echo "<script>
            alert('ID tidak valid'); 
            window.location.href='../?page=about/index';
          </script>";
}
include "../koneksi.php";

// Validasi apakah parameter id_about ada dan tidak kosong
if (isset($_GET['id_about']) && !empty($_GET['id_about'])) {
    $id_about = $_GET['id_about'];

    // Escape input untuk mencegah SQL Injection
    $id_about = mysqli_real_escape_string($koneksi, $id_about);

    // Query untuk menghapus data berdasarkan id_about
    $hapus = mysqli_query($koneksi, "DELETE FROM about WHERE id_about='$id_about'");

    if ($hapus) {
        // Jika query berhasil
        echo "<script>
                window.location.href='../?page=about/index';
              </script>";
    } else {
        // Jika query gagal
        echo "<script>
                alert('Data Gagal Dihapus');
                window.location.href='../?page=about/index';
              </script>";
    }
} else {
    // Jika id_about tidak ada atau kosong, tidak melakukan apa-apa
    echo "<script>
            alert('ID tidak valid.');
            window.location.href='../?page=about/index';
          </script>";
}


// Tutup koneksi
$koneksi->close();
?>
