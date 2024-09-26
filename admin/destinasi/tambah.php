<div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <!-- Container Fluid-->
            <div class="container-fluid" id="container-wrapper">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Form Basics</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item active" aria-current="page">Form Tambah destinasi</li>
                    </ol>
                </div>

                <div class="row">
                    <div class="col-lg-12"> <!-- Ganti col-lg-6 dengan col-lg-12 untuk full width -->
                        <!-- Form Basic -->
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Form Tambah destinasi</h6>
                            </div>
                            <div class="card-body">
                            <form action="?page=destinasi/proses-tambah" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
                <label for="id_kategori" class="form-label">ID Kategori</label>
                <select name="id_kategori" id="id_kategori" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    <?php
                    // Include koneksi database
                    include "koneksi.php";

                    // Ambil data kategori dari tabel `kategori`
                    $query = mysqli_query($koneksi, "SELECT * FROM kategori");

                    // Tampilkan opsi kategori
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<option value="' . $row['id_kategori'] . '">' . $row['nama_kategori'] . '</option>';
                    }
                    ?>
                </select>
            </div>
    <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" class="form-control" id="location" name="location" required>
    </div>
    <div class="form-group">
        <label for="image_path">Gambar:</label>
        <input type="file" class="form-control" id="image_path" name="image_path" required>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Row-->