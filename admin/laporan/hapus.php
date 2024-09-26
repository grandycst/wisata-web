<?php
session_start();
$_SESSION['save_success']='Data Berhasil Di hapus';
include "../koneksi.php";
// menerima id 
$id_wisata= $_GET['id_wisata'];

//Query Insert Ke Database
$hapus = mysqli_query($koneksi, "DELETE FROM wisata WHERE id_wisata='$id_wisata'");

// jika berhasl
if ($hapus) {
    echo "<script> alert('data berhasil hapus'); window.location.href='?page=wisata/index'</script>";

    // jika gagal
} else {
    echo "<script> alert('data Gagal dihapus'); window.location.href='?page=wisata/index'</script>";
}