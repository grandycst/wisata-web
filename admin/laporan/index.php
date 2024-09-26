<?php
include "koneksi.php";
// Session start (jika belum)
session_start();

// Alert sukses save
if (isset($_SESSION['save_success'])): ?>
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

<!-- Alert sukses update -->
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

<!-- Alert sukses delete -->
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
    <div class="col-lg-12">
    <!-- Form untuk filter berdasarkan tanggal -->
    <form action="" method="post">
    <div class="row mt-5">
        <div class="col-md-4">
            <label for="tgl_mulai">Tanggal Mulai</label>
            <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" required 
            value="<?= isset($_POST['tgl_mulai']) ? $_POST['tgl_mulai'] : '' ?>">
        </div>
        <div class="col-md-4">
            <label for="tgl_sampai">Tanggal Sampai</label>
            <input type="date" name="tgl_sampai" id="tgl_sampai" class="form-control" required 
            value="<?= isset($_POST['tgl_sampai']) ? $_POST['tgl_sampai'] : '' ?>">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <label for="filter"></label>
            <button type="submit" name="filter" class="btn btn-primary ml-2"><i class="fa fa-search"></i></button>
            <a href="#" class="btn btn-secondary ml-2" onclick="openPrintWindow()">
                <i class="fa fa-print"></i> Print
            </a>
        </div>
    </div>
</form>

<script>
function openPrintWindow() {
  var tglMulai = document.getElementById('tgl_mulai').value;
  var tglSampai = document.getElementById('tgl_sampai').value;
  var url = 'laporan/print.php?mulai=' + tglMulai + '&sampai=' + tglSampai;
  window.open(url, '_blank');
}
</script>

         
</a>
        </div>
    </div>
    </form>

    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
      </div>

      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>ID Wisata</th>
              <th>Kategori</th>
              <th>Judul Wisata</th>
              <th>Tanggal</th>
              <th>Isi</th>
              <th>Gambar</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          
          // Proses filter berdasarkan tanggal
          if (isset($_POST['filter'])) {
              $tgl_mulai = $_POST['tgl_mulai'];
              $tgl_sampai = $_POST['tgl_sampai'];
              
              // Validasi input tanggal
              if (!empty($tgl_mulai) && !empty($tgl_sampai) && $tgl_mulai <= $tgl_sampai) {
                  $kategori = mysqli_query($koneksi, "SELECT * FROM wisata 
                      JOIN kategori ON wisata.id_kategori=kategori.id_kategori
                      WHERE tgl_wisata BETWEEN '$tgl_mulai' AND '$tgl_sampai'
                      ORDER BY id_wisata DESC");
              } else {
                  echo "<script>alert('Masukkan rentang tanggal yang valid!');</script>";
              }
          } else {
              // Menampilkan semua data jika filter tidak digunakan
              $kategori = mysqli_query($koneksi, "SELECT * FROM wisata 
                  JOIN kategori ON wisata.id_kategori=kategori.id_kategori");
          }

          // Tampilkan hasil query
          while ($data = mysqli_fetch_array($kategori)) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['id_wisata']; ?></td>
              <td><?php echo $data['nama_kategori']; ?></td>
              <td><?php echo $data['judul_wisata']; ?></td>
              <td><?php echo date('d-m-y', strtotime($data['tgl_wisata'])); ?></td>
              <td><?php echo substr($data['isi_wisata'], 0, 50); ?></td>
              <td>
                <img src="wisata/uploads/<?php echo $data['gambar_wisata']; ?>" alt="Gambar wisata" class="img-thumbnail" style="max-width: 100px;">
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  <a href="?page=wisata/ubah&id_wisata=<?= $data['id_wisata'] ?>" class="btn btn-success mr-3"><i class="fa fa-pencil-alt"></i> Ubah</a>
                  <a href="?page=wisata/hapus&id_wisata=<?= $data['id_wisata']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus wisata ini?')"><i class="fas fa-trash"></i> Hapus</a>
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
