<?php
include "koneksi.php";

// Menentukan kategori aktif dari query parameter
$kategori_aktif = isset($_GET['nama_kategori']) ? $_GET['nama_kategori'] : '';

// Mengambil data wisata dari database (termasuk nama kategori)
$query_wisata = "SELECT b.id_wisata, b.judul_wisata, b.isi_wisata, b.gambar_wisata, b.tgl_wisata, k.nama_kategori 
                 FROM wisata b
                 LEFT JOIN kategori k ON b.id_kategori = k.id_kategori";

if ($kategori_aktif) {
    // Filter berdasarkan kategori jika ada parameter
    $query_wisata .= " WHERE k.nama_kategori = ?";
}

$query_wisata .= " ORDER BY b.id_wisata DESC";
$stmt_wisata = $koneksi->prepare($query_wisata);

if ($kategori_aktif) {
    $stmt_wisata->bind_param('s', $kategori_aktif);
}

$stmt_wisata->execute();
$result_wisata = $stmt_wisata->get_result();

// Mengambil daftar kategori dari database (untuk menampilkan daftar filter kategori)
$sql_kategori = "SELECT * FROM kategori";
$result_kategori = $koneksi->query($sql_kategori);

// Pastikan query kategori berjalan dengan baik
if (!$result_kategori) {
    die("Query kategori gagal: " . $koneksi->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Wisata</title>

    <style>
        .hero-inner {
            background: #343a40;
            padding: 50px 0;
        }

        .hero-inner .intro-wrap h1 {
            font-size: 3rem;
            color: #fff;
        }

        .hero-inner .intro-wrap p {
            color: #ccc;
        }

        .media-1 {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .media-1 img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .media-1 h3 {
            font-size: 1.5rem;
            margin-top: 10px;
        }

        .media-1 p {
            margin: 5px 0;
            color: #555;
        }

        .category-btns {
            margin-bottom: 20px;
        }

        .category-btns a {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <div class="hero hero-inner text-center">
        <div class="container">
            <h1 class="mb-0">Our Services</h1>
            <p class="text-white">
                <?php if ($kategori_aktif) : ?>
                Kategori: <?= htmlspecialchars($kategori_aktif); ?>
                <?php else : ?>
                All Categories
                <?php endif; ?>
            </p>
        </div>
    </div>

    <!-- Filter Kategori -->
    <div class="container category-btns">
        <a href="?page=wisata" class="btn btn-secondary">All Categories</a>
        <?php while ($kategori = $result_kategori->fetch_assoc()) : ?>
        <a href="?page=wisata&nama_kategori=<?= urlencode($kategori['nama_kategori']); ?>" class="btn btn-info">
            <?= htmlspecialchars($kategori['nama_kategori']); ?>
        </a>
        <?php endwhile; ?>
    </div>

    <!-- Gallery Content -->
    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <?php if ($result_wisata->num_rows > 0) : ?>
                <?php while ($h = $result_wisata->fetch_assoc()) : ?>
                <div class="col-6 col-md-6 col-lg-3">
                    <div class="media-1">
                        <a href="?page=detail_wisata&id=<?= $h['id_wisata']; ?>" class="d-block mb-3">
                            <img src="admin/wisata/uploads/<?= htmlspecialchars($h['gambar_wisata']); ?>" alt="Image" class="img-fluid">
                        </a>
                        <div>
                            <h3><a href="?page=detail_wisata&id=<?= $h['id_wisata']; ?>">
                                    <?= htmlspecialchars($h['judul_wisata']); ?>
                                </a></h3>
                            <p><strong>Kategori:</strong> <?= htmlspecialchars($h['nama_kategori']); ?></p>
                            <p><?= htmlspecialchars(substr($h['isi_wisata'], 0, 100)); ?>...</p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php else : ?>
                <p>No results found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

</html>
