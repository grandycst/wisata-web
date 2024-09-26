<?php
session_start();
$_SESSION['update_success']='Data Berhasil Disimpan';
// Sisipkan file koneksi
include "../koneksi.php";

// Ambil data dari form
$id_kontak = $_POST['id_kontak'];
$nama_kontak = $_POST['nama_kontak'];
$email = $_POST['email'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];

// QUERY untuk mengupdate data ke tabel kontak
$ubah = mysqli_query($koneksi, "UPDATE kontak SET nama_kontak='$nama_kontak', email='$email', facebook='$facebook', instagram='$instagram', no_telp='$no_telp', alamat='$alamat' WHERE id_kontak=$id_kontak");

// Jika berhasil
if ($ubah) {
    echo "<script>window.location.href='../?page=kontak/index';</script>";
} else {
    echo "<script> alert('data Gagal ditambahkan'); window.location.href='../?page=kontak/index';</script>";
}
?>
