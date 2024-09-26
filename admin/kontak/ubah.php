<?php

// Cek apakah id_kontak ada dalam URL
if (isset($_GET['id_kontak'])) {
    $id_kontak = $_GET['id_kontak'];
    
    // Menggunakan prepared statement untuk keamanan
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM kontak WHERE id_kontak=?");
    mysqli_stmt_bind_param($stmt, "i", $id_kontak);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_array($result);
    
    // Cek apakah data ditemukan
    if (!$data) {
        echo "<script>alert('ID kontak tidak ditemukan.'); window.location.href='../?page=kontak';</script>";
        exit;
    }

} else {
    echo "<script>alert('ID kontak tidak ditemukan di URL.'); window.location.href='../?page=kontak';</script>";
    exit;
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
              <li class="breadcrumb-item active" aria-current="page">Ubah Kontak</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6>
                </div>
                <div class="card-body">
                <form action="kontak/proses-ubah.php" method="post">
            <input type="hidden" name="id_kontak" value="<?php echo $data['id_kontak'] ?>">
            <div class="form-group">
            <div class="mb-3">
                    <label for="nama_kontak" class="form-label">Nama Kontak</label>
                    <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" value="<?php echo htmlspecialchars($data['nama_kontak']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Nama Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="faceboook" class="form-label">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo htmlspecialchars($data['facebook']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo htmlspecialchars($data['instagram']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="notelp" class="form-label">No Telp</label>
                    <input type="text" class="form-control" id="notelp" name="no_telp" value="<?php echo htmlspecialchars($data['no_telp']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo htmlspecialchars($data['alamat']); ?>" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
     