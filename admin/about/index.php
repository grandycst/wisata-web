<!-- ketika tekan save mucul alert sukses -->
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

<?php
unset($_SESSION['save_success']);
endif;
?>

<!-- ketika tekan update mucul alert sukses -->
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

<?php
unset($_SESSION['update_success']);
endif;
?>
<!-- ketika tekan delete mucul alert sukses -->
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

<?php
unset($_SESSION['delete_success']);
endif;
?>

<!-- Container Fluid -->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data About</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data About</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5>Data About</h5>
                    <a href="?page=about/tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-bordered" id="dataTable">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>No</th>
                                <th>deskripsi_about</th>
                                <th>Visi</th>
                                <th>Misi</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM about ORDER BY id_about DESC");

                            // Looping data
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr class="text-center">
                                    <td><?php echo $no++; ?></td>
                                    <td><?= htmlspecialchars($data['deskripsi_about']); ?></td>
                                    <td><?= htmlspecialchars($data['visi_about']); ?></td>
                                    <td><?= htmlspecialchars($data['misi_about']); ?></td>
                                    <td>
                                        <img src="about/gambar_about/<?= htmlspecialchars($data['gambar_about']); ?>" 
                                             style="width: 200px; height: 200px; object-fit: cover;" 
                                             alt="<?= htmlspecialchars($data['visi_about']); ?>">
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="?page=about/ubah&id_about=<?= $data['id_about']; ?>" class="btn btn-success mr-3">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a onclick="return confirm('Yakin ingin dihapus?');" 
   href="about/hapus.php?id_about=<?= $data['id_about']; ?>" 
   class="btn btn-danger">
   <i class="fa fa-trash"></i>
</a>

                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->

    
</div>
<!---Container Fluid-->
