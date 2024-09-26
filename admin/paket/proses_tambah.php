<?php
// Ambil data dari form paket_wisata
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$durasi = $_POST['durasi'];

// Insert data ke tabel paket_wisata
$sql_paket = "INSERT INTO paket_wisata (nama, deskripsi, harga, durasi) VALUES ('$nama', '$deskripsi', '$harga', '$durasi')";
if ($koneksi->query($sql_paket) === TRUE) {
    $paket_id = $koneksi->insert_id; // Mendapatkan id paket_wisata yang baru saja ditambahkan

    // Insert itinerary ke tabel itinerary
    foreach ($_POST['hari'] as $index => $hari) {
        $aktivitas = $_POST['aktivitas'][$index];
        $lokasi = $_POST['lokasi'][$index];
        $sql_itinerary = "INSERT INTO itinerary (paket_id, hari, aktivitas, lokasi) VALUES ('$paket_id', '$hari', '$aktivitas', '$lokasi')";
        $koneksi->query($sql_itinerary);
        $itinerary_id = $koneksi->insert_id; // Mendapatkan id itinerary

        // Proses upload file gambar yang sesuai dengan itinerary
        if (isset($_FILES['path_gambar']['name'][$index])) {
            $target_dir = "paket/uploads/";
            $target_file = $target_dir . basename($_FILES["path_gambar"]["name"][$index]);
            if (move_uploaded_file($_FILES["path_gambar"]["tmp_name"][$index], $target_file)) {
                $keterangan = $_POST['keterangan'][$index];
                $sql_gambar = "INSERT INTO gambar (itinerary_id, path_gambar, keterangan) VALUES ('$itinerary_id', '$target_file', '$keterangan')";
                $koneksi->query($sql_gambar);
            }
        }
    }

    // Jika berhasil, tampilkan alert sukses
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Data paket wisata, itinerary, dan gambar berhasil ditambahkan!',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '?page=paket/index'; // Arahkan ke halaman index
        }
    });
    </script>";
} else {
    // Jika gagal, tampilkan alert error
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: 'Terjadi kesalahan: " . $koneksi->error . "',
        confirmButtonText: 'Coba Lagi'
    }).then((result) => {
        if (result.isConfirmed) {
            window.history.back(); // Kembali ke halaman sebelumnya
        }
    });
    </script>";
}

$koneksi->close();
?>
