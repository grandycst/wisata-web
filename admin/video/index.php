
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
          <a href="?page=video/tambah" class="btn btn-primary mb-3  mt-3"><i class="fas fa-plus"></i> Tambah Data </a>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
            
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                    <tr>
                      <th>no</th>
                <th>Judul</th>
                <th>deskripsi 1</th>
                <th>deskripsi 2</th>
                <th>Link video youtube</th>
                <th>Action</th>
                
                      </tr>
                      <?php
               
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM video ORDER BY id_video DESC");
              

                ?>
                <?php
                while ($data = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['judul_video'] ?></td>
            <td><?php echo $data['deskripsi1_video'] ?></td>
            <td><?php echo $data['deskripsi2_video'] ?></td>
            <td><?php echo $data['link_video'] ?></td>
            <td>
            <div class="d-flex justify-content-center ">
                                        <a href="?page=video/ubah&id_video=<?= $data['id_video'] ?>"
                                            class="btn btn-success mr-3"><i class="fa fa-pencil-alt"></i></a>    
                                              <a href="?page=video/hapus&id_video=<?=$data['id_video'];?>" class="btn btn-danger " onclick="return confirm('yakin?')";><i class="fas fa-trash"></i>Hapus</a>
            </td>
        </tr>
            </tbody>
            <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            