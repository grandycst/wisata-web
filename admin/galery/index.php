<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Gambar</title>
    <style>
        /* Set equal height for card images */
        .card-img-top {
            width: 100%;
            height: 250px; /* Set a fixed height for all images */
            object-fit: cover; /* Ensures images fit within the specified dimensions without distortion */
        }
    </style>
</head>

<body>

    <!-- Alert messages -->
    <?php if (isset($_SESSION['save_success'])): ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?= $_SESSION['save_success']; ?>',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php unset($_SESSION['save_success']); endif; ?>

    <?php if (isset($_SESSION['update_success'])): ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?= $_SESSION['update_success']; ?>',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php unset($_SESSION['update_success']); endif; ?>

    <?php if (isset($_SESSION['delete_success'])): ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?= $_SESSION['delete_success']; ?>',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php unset($_SESSION['delete_success']); endif; ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Galeri Gambar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Galeri Gambar</h2>
            <a href="?page=galery/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Gambar</a>
        </div>

        <!-- Galeri -->
        <div class="row">
            <?php
            // Query to get all images from gallery
            $query = $koneksi->query("SELECT * FROM gallery ORDER BY id DESC");
            while ($data = $query->fetch_assoc()) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="galery/uploads/<?php echo $data['image_path']; ?>" class="card-img-top" alt="<?php echo $data['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['title']; ?></h5>
                            <p class="card-text"><?php echo $data['lokasi']; ?></p>
                            <div class="d-flex justify-content-between">
                                <a href="?page=galery/ubah&id=<?php echo $data['id']; ?>" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Ubah</a>
                                <a href="?page=galery/hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    
</body>

</html>
