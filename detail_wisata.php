<?php
// Mendapatkan ID wisata dari URL
$id_wisata = isset($_GET['id']) ? $_GET['id'] : '';

// Mengambil data wisata dari database berdasarkan ID
$sql_wisata = "SELECT b.id_wisata, b.judul_wisata, b.isi_wisata, b.gambar_wisata, b.tgl_wisata, k.nama_kategori 
               FROM wisata b
               LEFT JOIN kategori k ON b.id_kategori = k.id_kategori
               WHERE b.id_wisata = '$id_wisata'";
$result_wisata = $koneksi->query($sql_wisata);

// Cek apakah wisata ditemukan
if ($result_wisata->num_rows == 0) {
    echo "Wisata tidak ditemukan.";
    exit();
}

$row_wisata = $result_wisata->fetch_assoc();
?>
<div class="untree_co-section">
    <div class="container my-5">
        <div class="mb-5"></div>
        <div class="row justify-content-center">
            <!-- Single Product Start -->
            <div class="row g-4">
    <div class="col-lg-8">
        <div class="mb-4">
            <a href="#" class="h1 display-5"><?= $row_wisata['judul_wisata']; ?></a>
        </div>
        <div class="position-relative rounded overflow-hidden mb-3">
            <img src="admin/wisata/uploads/<?= $row_wisata['gambar_wisata']; ?>" 
                 alt="<?= $row_wisata['judul_wisata']; ?>" 
                 class="img-fluid mb-5" width="100%">
        </div>
        <div class="d-flex justify-content-between">
            <a href="#" class="text-dark link-hover me-3">
                <i class="fa fa-clock"></i> 06 minute read
            </a>
            <a href="#" class="text-dark link-hover me-3">
                <i class="fa fa-eye"></i> 3.5k Views
            </a>
            <a href="#" class="text-dark link-hover me-3">
                <i class="fa fa-comment-dots"></i> 05 Comment
            </a>
            <a href="#" class="text-dark link-hover">
                <i class="fa fa-arrow-up"></i> 1.5k Share
            </a>
        </div>
        <p class="my-4">
            <?= nl2br(substr($row_wisata['isi_wisata'], 0, 100)) . '...'; ?>
        </p>
        <div class="bg-light p-4 mb-4 rounded border-start border-3 border-primary">
            <h1 class="mb-2">
                <a href="#" class="h1 display-5"><?= $row_wisata['judul_wisata']; ?></a>
            </h1>
        </div>
        <p class="my-4">
            <?= nl2br($row_wisata['isi_wisata']); ?>
        </p>
    </div>
</div>

        </div>
    </div>
</div>
