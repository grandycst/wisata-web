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

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DataTables</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active" aria-current="page">DataTables</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- Datatables -->
   
    <div class="col-lg-12">
    <a href="?page=armada/tambah" class="btn btn-primary mb-3  mt-3"><i class="fas fa-plus"></i> Tambah Data </a>
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data TEAM</h6>
        </div>
        
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
          <thead>
                <tr>
                    <th>no</th>
                    <th>nama</th>
                    <th>jenis</th>
                    <th>jumlah</th>
                    <th>foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM armada ORDER BY id_armada DESC");
               

                ?>
                <?php
                while ($data = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['nama_armada'] ?></td>
            <td><?php echo $data['jenis_armada'] ?></td>
            <td><?php echo $data['jumlah_armada'] ?></td>
            <td><img src="armada/uploads/<?php echo $data['gambar_armada']; ?>" alt="Foto armada" class="img-thumbnail" style="max-width: 100px;"></td>
            <td>
            <div class="d-flex justify-content-center ">
                                        <a href="?page=armada/ubah&id_armada=<?= $data['id_armada'] ?>"
                                            class="btn btn-success mr-3"><i class="fa fa-pencil-alt"></i> Ubah</a>
                            
            <a href="?page=armada/hapus&id_armada=<?=$data['id_armada'];?>" class="btn btn-danger " onclick="return confirm('yakin?')";><i class="fas fa-trash"></i>Hapus</a>
            </td>
        </tr>
            </tbody>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>