<?php
include "../koneksi.php";
// menerima id 
$id_video= $_GET['id_video'];

//Query Insert Ke Database
$hapus = mysqli_query($koneksi, "DELETE FROM video WHERE id_video='$id_video'");

// jika berhasl
if ($hapus) {
    echo "<script> alert('data berhasil hapus'); window.location.href='?page=video/index'</script>";

    // jika gagal
} else {
    echo "<script> alert('data Gagal dihapus'); window.location.href='?page=video/index'</script>";
}