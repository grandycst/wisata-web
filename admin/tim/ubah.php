<?php

// Ambil ID tim dari parameter URL
$id_tim = $_GET['id_tim'];

// QUERY untuk mendapatkan data tim berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM tim WHERE id_tim = $id_tim");

// Cek jika query berhasil dan data ada
if ($query && mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
} else {
    // Jika data tidak ditemukan atau query gagal
    echo "<script>alert('Data tidak ditemukan'); window.location.href='index.php';</script>";
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
                <form method="POST" action="proses_ubah.php" enctype="multipart/form-data">
        <input type="hidden" name="id_tim" value="<?= htmlspecialchars($data['id_tim']); ?>">
        <div class="mb-3">
            <label for="nama_tim" class="form-label">Nama Tim</label>
            <input type="text" class="form-control" id="nama_tim" name="nama_tim" value="<?= htmlspecialchars($data['nama_tim']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="jabatan_tim" class="form-label">Jabatan Tim</label>
            <input type="text" class="form-control" id="jabatan_tim" name="jabatan_tim" value="<?= htmlspecialchars($data['jabatan_tim']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="foto_tim" class="form-label">Foto Tim (Kosongkan jika tidak ingin mengubah)</label>
            <input type="file" class="form-control" id="foto_tim" name="foto_tim">
        </div>
        <div class="mb-3">
            <label class="form-label">Foto Lama</label><br>
            <img src="tim/uploads/<?= htmlspecialchars($data['foto_tim']); ?>" width="100" alt="Foto Lama">
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
                    <span aria-hidden="true">&times;</span>
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
     