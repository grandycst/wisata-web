<?php

// Ambil ID armada dari parameter URL
$id_armada = $_GET['id_armada'];

// QUERY untuk mendapatkan data armada berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM armada WHERE id_armada = $id_armada");

// Cek jika query berhasil dan data ada
if ($query && mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
} else {
    // Jika data tidak ditemukan atau query gagal
    echo "<script>alert('Data tidak ditemukan'); window.location.href='?page=armada/index';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">


    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Basics</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active" aria-current="page">Form Basics</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Ubah Team</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="?page=armada/proses-ubah" enctype="multipart/form-data">
        <input type="hidden" name="id_armada" value="<?= htmlspecialchars($data['id_armada']); ?>">
        <div class="mb-3">
            <label for="nama_armada" class="form-label">Nama armada</label>
            <input type="text" class="form-control" id="nama_armada" name="nama_armada" value="<?= htmlspecialchars($data['nama_armada']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="jenis_armada" class="form-label">Jenis armada</label>
            <input type="text" class="form-control" id="jenis_armada" name="jenis_armada" value="<?= htmlspecialchars($data['jenis_armada']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_armada" class="form-label">jumlah armada</label>
            <input type="text" class="form-control" id="jumlah_armada" name="jumlah_armada" value="<?= htmlspecialchars($data['jumlah_armada']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="foto_armada" class="form-label">Foto armada (Kosongkan jika tidak ingin mengubah)</label>
            <input type="file" class="form-control" id="foto_armada" name="foto_armada">
        </div>
        <div class="mb-3">
            <label class="form-label">Foto Lama</label><br>
            <img src="armada/uploads/<?= htmlspecialchars($data['gambar_armada']); ?>" width="100" alt="Foto Lama">
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
                </div>
              </div>

             

             

           
             
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12 text-center">
              <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  bootstrap forms documentations.</a> and <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                  groups documentations</a></p>
            </div>
          </div>

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&armadaes;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
     