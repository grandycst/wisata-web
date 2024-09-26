<?php
// Ambil ID armada dari parameter URL
$id = $_GET['id'];

// QUERY untuk mendapatkan data armada berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM gallery WHERE id = $id");

// Cek jika query berhasil dan data ada
if ($query && mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
} else {
    // Jika data tidak ditemukan atau query gagal
    echo "<script>alert('Data tidak ditemukan'); window.location.href='?page=galery/index';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Galeri</title>
</head>
<body>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <!-- Container Fluid -->
            <div class="container-fluid" id="container-wrapper">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Form Ubah Galeri</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item active" aria-current="page">Form Ubah</li>
                    </ol>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <!-- Form Ubah -->
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Form Ubah Galeri</h6>
                            </div>
                            <div class="card-body">
                                <form action="?page=galery/proses-ubah" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title']; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="lokasi" class="form-label">Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $data['lokasi']; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image_path" class="form-label">Foto (opsional)</label><br>
                                        <?php if (!empty($data['image_path'])): ?>
                                            <img src="galery/uploads/<?php echo $data['image_path']; ?>" width="100" alt="Gambar Lama"><br><br>
                                        <?php endif; ?>
                                        <input type="file" class="form-control" id="image_path" name="image_path" accept="image/*">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Row-->
            </div>
            <!---Container Fluid-->
        </div>
    </div>
</body>
</html>
