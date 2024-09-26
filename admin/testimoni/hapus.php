<?php
session_start();
$_SESSION['delete_success']='Data Berhasil Disimpan';

include "koneksi.php";
// menerima id 
$id_armada= $_GET['id_armada'];

//Query Insert Ke Database
$hapus = mysqli_query($koneksi, "DELETE FROM armada WHERE id_armada='$id_armada'");

// jika berhasl
if ($hapus) {
    echo "<script>  window.location.href='?page=armada/index'</script>";

    // jika gagal
} else {
    echo "<script> alert('data Gagal dihapus'); window.location.href='?page=armada/index'</script>";
}