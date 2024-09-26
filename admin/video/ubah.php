<?php

// Cek apakah id_video ada dalam URL
if (isset($_GET['id_video'])) {
    $id_video = $_GET['id_video'];
    
    // Menggunakan prepared statement untuk keamanan
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM video WHERE id_video=?");
    mysqli_stmt_bind_param($stmt, "i", $id_video);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_array($result);
    
    // Cek apakah data ditemukan
    if (!$data) {
        echo "<script>alert('ID video tidak ditemukan.'); window.location.href='../?page=video';</script>";
        exit;
    }

} else {
    echo "<script>alert('ID video tidak ditemukan di URL.'); window.location.href='../?page=video';</script>";
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
              <li class="breadcrumb-item active" aria-current="page">Ubah video</li>
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
                <form action="video/proses-ubah.php" method="post">
            <input type="hidden" name="id_video" value="<?php echo $data['id_video'] ?>">
            <div class="form-group">
            <div class="mb-3">
                    <label for="judul_video" class="form-label">judul video</label>
                    <input type="text" class="form-control" id="judul_video" name="judul_video" value="<?php echo htmlspecialchars($data['judul_video']); ?>" required>
                </div>
                <div class="mb-3">
    <label for="deskripsi1_video" class="form-label">Deskripsi 1</label>
    <textarea class="form-control" id="deskripsi1_video" name="deskripsi1_video" required><?php echo htmlspecialchars($data['deskripsi1_video']); ?></textarea>
</div>
<div class="mb-3">
    <label for="deskripsi2_video" class="form-label">Deskripsi 2</label>
    <textarea class="form-control" id="deskripsi2_video" name="deskripsi2_video" required><?php echo htmlspecialchars($data['deskripsi2_video']); ?></textarea>
</div>

                <div class="mb-3">
                    <label for="link_video" class="form-label">link</label>
                    <input type="text" class="form-control" id="link_video" name="link_video" value="<?php echo htmlspecialchars($data['link_video']); ?>" required>
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
     