<?php
include "../../koneksi.php";

// Ambil data tanggal mulai dan sampai dari URL (GET parameter)
$mulai = isset($_GET['mulai']) ? $_GET['mulai'] : '';
$sampai = isset($_GET['sampai']) ? $_GET['sampai'] : '';

// Validasi input tanggal
if (!empty($mulai) && !empty($sampai)) {
    $laporan = mysqli_query($koneksi, "SELECT * FROM wisata
        JOIN kategori ON wisata.id_kategori = kategori.id_kategori
        WHERE tgl_wisata BETWEEN '$mulai' AND '$sampai'");
} else {
    echo "Tanggal tidak valid.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Wisata</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
   <center><h1>Laporan Wisata</h1></center>
  <center><p>Periode: <?= date('d-m-Y', strtotime($mulai)) ?> s/d <?= date('d-m-Y', strtotime($sampai)) ?></p></center>  
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Judul Wisata</th>
                <th>Tanggal Wisata</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($item = mysqli_fetch_array($laporan)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $item['nama_kategori']; ?></td>
                    <td><?php echo $item['judul_wisata']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($item['tgl_wisata'])); ?></td>
                    <td><img src="../wisata/uploads/<?php echo $item['gambar_wisata']; ?>" alt="Gambar wisata" class="img-thumbnail" style="max-width: 100px;"></td>
                    
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div class="signature" style="text-align: right; margin-right: 50px;">
    <p>Mengetahui,</p>
    <p>Padang, <?php echo date('d-m-Y'); ?></p>
    <div></div>
    <br><br>
    <p>(Pimpinan)</p>
</div>



    
        <script>
        window.print()
    </script>
</body>

</html>
