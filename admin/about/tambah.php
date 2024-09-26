<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="mb-0 text-gray-800">Tambah Data About</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Data About</li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data About</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data About</h6>
                    <a href="?page=about/index" class="btn btn-primary"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="about/proses_tambah.php" enctype="multipart/form-data">
                        <!-- Kolom Visions -->
                        <div class="form-group mb-3">
                            <label for="visi_about">Visi</label>
                            <textarea id="visi_about" name="visi_about" class="form-control" rows="5" required></textarea>
                        </div>

                        <!-- Kolom Missions -->
                        <div class="form-group mb-3">
                            <label for="misi_about">Misi</label>
                            <textarea id="misi_about" name="misi_about" class="form-control" rows="5" required></textarea>
                        </div>

                        <!-- Kolom Image -->
                        <div class="form-group mb-3">
                            <label for="gambar_about">Gambar</label>
                            <input type="file" id="gambar_about" name="gambar_about" class="form-control-file" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->
