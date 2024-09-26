<?php
include "koneksi.php";
// menerima id 
$id_tim= $_GET['id_tim'];

//Query Insert Ke Database
$hapus = mysqli_query($koneksi, "DELETE FROM tim WHERE id_tim='$id_tim'");

// jika berhasl
if ($hapus) {
    echo "<script> alert('data berhasil hapus'); window.location.href='?page=tim/index'</script>";

    // jika gagal
} else {
    echo "<script> alert('data Gagal dihapus'); window.location.href='?page=tim/index'</script>";
}