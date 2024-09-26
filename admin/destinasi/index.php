<!-- index.php -->
<?php session_start(); ?>
<?php if (isset($_SESSION['save_success'])): ?>
<script>
  Swal.fire({
    position: "center",
    icon: "success",
    title: "<?= $_SESSION['save_success']; ?>",
    showConfirmButton: false,
    timer: 1500
  });
</script>
<?php unset($_SESSION['save_success']); endif; ?>

<?php if (isset($_SESSION['update_success'])): ?>
<script>
  Swal.fire({
    position: "center",
    icon: "success",
    title: "<?= $_SESSION['update_success']; ?>",
    showConfirmButton: false,
    timer: 1500
  });
</script>
<?php unset($_SESSION['update_success']); endif; ?>

<?php if (isset($_SESSION['delete_success'])): ?>
<script>
  Swal.fire({
    position: "center",
    icon: "success",
    title: "<?= $_SESSION['delete_success']; ?>",
    showConfirmButton: false,
    timer: 1500
  });
</script>
<?php unset($_SESSION['delete_success']); endif; ?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Destinasi</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active" aria-current="page">Data Destinasi</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <a href="?page=destinasi/tambah" class="btn btn-primary mb-3 mt-3"><i class="fas fa-plus"></i> Tambah Data </a>
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Destinasi</h6>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Lokasi</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'koneksi.php';  // Sertakan koneksi database

                                    // Query JOIN untuk mendapatkan data dari tabel destinasi dan kategori
                                    $query = "
                                        SELECT d.id, d.name, d.location, d.image_path, k.nama_kategori 
                                        FROM destinasi d
                                        JOIN kategori k ON d.kategori = k.id_kategori
                                        ORDER BY d.id DESC
                                    ";
                                    $result = mysqli_query($koneksi, $query);

                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['name']; ?></td>
                                        <td><?php echo $data['nama_kategori']; ?></td>
                                        <td><?php echo $data['location']; ?></td>
                                        <td><img src="uploads/<?php echo $data['image_path']; ?>" alt="Image Path" class="img-thumbnail" style="max-width: 100px;"></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="destinasi/ubah.php?id=<?= $data['id'] ?>" class="btn btn-success mr-3"><i class="fa fa-pencil-alt"></i> Ubah</a>
                                                <a href="?page=destinasi/hapus&id=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?');"><i class="fas fa-trash"></i> Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
        </div>
    </div>
</div>
