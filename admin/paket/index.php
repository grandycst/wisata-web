<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Paket Wisata</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-custom {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table thead th {
            background-color: #343a40;
            color: white;
            text-align: center;
        }
        .table td {
            vertical-align: middle;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        h1 {
            margin-bottom: 40px;
            font-weight: bold;
        }
        .modal-body img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Daftar Paket Wisata</h1>
    <a href="?page=paket/tambah" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Tambah Data</a>

    <!-- Tabel Paket Wisata -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-custom">
            <thead>
                <tr>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Itinerary</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP untuk menampilkan data dari database -->
                <?php
                // SQL untuk menggabungkan paket_wisata dengan itinerary dan gambar
                $sql = "SELECT pw.id AS paket_id, pw.nama, pw.harga, pw.durasi, it.hari, it.aktivitas, it.lokasi, gm.path_gambar 
                        FROM paket_wisata pw
                        LEFT JOIN itinerary it ON pw.id = it.paket_id
                        LEFT JOIN gambar gm ON it.id = gm.itinerary_id
                        ORDER BY pw.id, it.hari";
                $result = $koneksi->query($sql);

                $current_paket = null;

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Jika paket baru, tampilkan nama paket, harga, dan durasi
                        if ($current_paket !== $row['paket_id']) {
                            // Jika bukan pertama kali, tutup tag row untuk itinerary sebelumnya
                            if ($current_paket !== null) {
                                echo "</td></tr>";
                            }

                            $current_paket = $row['paket_id'];
                            echo "<tr>
                                    <td>{$row['nama']}</td>
                                    <td>Rp. " . number_format($row['harga'], 0, ',', '.') . "</td>
                                    <td>{$row['durasi']} Hari</td>
                                    <td>";
                        }

                        // Tampilkan itinerary dengan hari, aktivitas, lokasi, dan tombol lihat gambar (dengan modal gallery)
                        echo "<div>
                                <strong>Hari {$row['hari']}:</strong> {$row['aktivitas']} di {$row['lokasi']}
                                <button class='btn btn-sm btn-primary ml-3' data-toggle='modal' data-target='#modalGambar{$row['paket_id']}_{$row['hari']}'>Lihat Gambar</button>
                              </div>";

                        // Modal untuk galeri gambar
                        echo "
                        <div class='modal fade' id='modalGambar{$row['paket_id']}_{$row['hari']}' tabindex='-1' aria-labelledby='modalLabel{$row['paket_id']}_{$row['hari']}' aria-hidden='true'>
                          <div class='modal-dialog modal-lg'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalLabel{$row['paket_id']}_{$row['hari']}'>Gambar Itinerary Hari {$row['hari']}</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>
                              <div class='modal-body'>
                                <img src='{$row['path_gambar']}' alt='Gambar Hari {$row['hari']}'>
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>";
                    }

                    // Tutup tag terakhir setelah loop selesai
                    if ($current_paket !== null) {
                        echo "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
