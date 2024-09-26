
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
                  <h6 class="m-0 font-weight-bold text-primary">Form Tambah TEAM</h6>
                </div>
                <div class="card-body">
                <form action="?page=armada/proses-tambah" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
         <input type="hidden" name="id_armada" value="<?php echo $data['id_armada'] ?>">
                
            </div>

            <div class="mb-3">
                <label for="Nama_armada" class="form-label">Nama armada</label>
                <input type="text" class="form-control" id="nama_armada" name="nama_armada" required>
            </div>

            <div class="mb-3">
                <label for="jenis" class="form-label">jenis Armada</label>
                <input type="text" class="form-control" id="jenis_armada" name="jenis_armada" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_armada" class="form-label">jumlah Armada</label>
                <input type="text" class="form-control" id="jumlah_armada" name="jumlah_armada" required>
            </div>

           

            <div class="mb-3">
                <label for="gambar_armada" class="form-label">foto armada</label>
                <input type="file" class="form-control" id="gambar_armada" name="gambar_armada" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
    
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

          