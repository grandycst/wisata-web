<?php
session_start();
$_SESSION['save_success']='Data Berhasil Disimpan';
// Sisipkan file koneksi
include "../koneksi.php";

// Ambil data dari form
$nama_kontak = $_POST['nama_kontak'];
$email = $_POST['email'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];

// QUERY untuk menambah data ke tabel kontak
$tambah = mysqli_query($koneksi, "INSERT INTO kontak (nama_kontak, email, facebook, instagram, no_telp, alamat) 
                                    VALUES ('$nama_kontak', '$email', '$facebook', '$instagram', '$no_telp', '$alamat')");

// Jika berhasil
if ($tambah) {
    echo "<script>window.location.href='?page=kontak/index';</script>";
} else {
    echo "<script> alert('data Gagal ditambahkan'); window.location.href='?page=kontak/tambah';</script>";
}
