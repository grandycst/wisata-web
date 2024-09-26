
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
                  <h6 class="m-0 font-weight-bold text-primary">Form Tambah</h6>
                </div>
                <div class="card-body">
                <form action="?page=testimoni/proses-tambah" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
         <input type="hidden" name="id_testimoni" value="<?php echo $data['id_testimoni'] ?>">
                
            </div>

            <div class="mb-3">
                <label for="Nama_testimoni" class="form-label">Nama testimoni</label>
                <input type="text" class="form-control" id="nama_testimoni" name="nama_testimoni" required>
            </div>

            <div class="mb-3">
                <label for="isi" class="form-label">isi testimoni</label>
                <input type="text" class="form-control" id="isi_testimoni" name="isi_testimoni" required>
            </div>
          

           

            <div class="mb-3">
                <label for="gambar_testimoni" class="form-label">foto testimoni</label>
                <input type="file" class="form-control" id="gambar_testimoni" name="gambar_testimoni" accept="image/*" required>
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

          