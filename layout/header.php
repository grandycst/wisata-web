<?php
// Fetching contact data
$query_kontak = "SELECT * FROM kontak ORDER BY id_kontak";
$result_kontak = $koneksi->query($query_kontak);
$kontak = $result_kontak->fetch_assoc();

// Fetching video data
$query_video = "SELECT * FROM video ORDER BY id_video";
$result_video = $koneksi->query($query_video);
$video = $result_video->fetch_assoc();

// Fetching about data
$query_about = "SELECT * FROM about ORDER BY id_about";
$result_about = $koneksi->query($query_about);
$about = $result_about->fetch_assoc();

// Fetching about data
$query_paket = "SELECT * FROM paket_wisata ORDER BY id";
$result_paket = $koneksi->query($query_paket);
$paket = $result_paket->fetch_assoc();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">
    <meta name="description" content="">
    <meta name="keywords" content="bootstrap, bootstrap4">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="assets/css/daterangepicker.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/style.css">
	<!-- Add these in your <head> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>


    <title>Tour Free Bootstrap Template for Travel Agency by Untree.co</title>

 
</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <a href="index.html" class="logo m-0">Tour <span class="text-primary">.</span></a>
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                    <li class="active"><a href="?page=home">Home</a></li>
                    <li class="has-children">
                        <a href="#">Kategori</a>
                        <ul class="dropdown">
                            <?php
                            $kategori = $koneksi->query("SELECT * FROM kategori ORDER BY nama_kategori DESC");
                            while ($row_kat = $kategori->fetch_assoc()) {
                            ?>
                                <li>
                                    <a href="?page=wisata&nama_kategori=<?php echo urlencode($row_kat['nama_kategori']); ?>" class="dropdown-item">
                                        <?php echo htmlspecialchars($row_kat['nama_kategori']); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a href="?page=wisata">Wisata</a></li>
                    <li><a href="?page=galery">Galery</a></li>
                    <li><a href="?page=about">About</a></li>
                    <li><a href="?page=kontak">Contact Us</a></li>
                </ul>
                <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </nav>

    <div class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="intro-wrap">
                        <h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Trip In <span class="typed-words"></span></h1>

                        <!-- Search Form and Package Details -->
                        <div class="container mt-5">
                            <h1 class="mb-4">Cari Paket Wisata</h1>

                            <div class="row mb-2">
                                <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
                                    <form id="paketWisataForm" action="" method="GET">
                                        <select name="paket_wisata_id" id="paketWisataSelect" class="form-control custom-select">
                                            <option value="">Pilih Paket Wisata</option>
                                            <?php
                                            $sql = "SELECT * FROM paket_wisata ORDER BY nama DESC";
                                            $result = $koneksi->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='{$row['id']}'>" . htmlspecialchars($row['nama']) . "</option>";
                                                }
                                            } else {
                                                echo "<option value=''>Tidak ada paket wisata</option>";
                                            }
                                            ?>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
                                    <button type="button" id="searchButton" class="btn btn-primary btn-block">Search</button>
                                </div>
                            </div>

                            <script>
                                document.getElementById("searchButton").addEventListener("click", function() {
                                    const selectElement = document.getElementById("paketWisataSelect");
                                    if (selectElement.value) {
                                        document.getElementById("paketWisataForm").submit();
                                    } else {
                                        alert("Pilih paket wisata terlebih dahulu!");
                                    }
                                });
                            </script>

                            <div class="mt-4">
                                <?php
                                if (isset($_GET['paket_wisata_id']) && !empty($_GET['paket_wisata_id'])) {
                                    $paket_id = $_GET['paket_wisata_id'];

                                    $sql_detail = "SELECT * FROM paket_wisata WHERE id = ?";
                                    $stmt = $koneksi->prepare($sql_detail);
                                    $stmt->bind_param("i", $paket_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        $detail = $result->fetch_assoc();
                                        echo "<h2>Detail Paket Wisata</h2>";
                                        echo "<p><strong>Nama:</strong> " . htmlspecialchars($detail['nama']) . "</p>";
                                        echo "<p><strong>Deskripsi:</strong> " . htmlspecialchars($detail['deskripsi']) . "</p>";
                                        echo "<p><strong>Harga:</strong> Rp" . number_format($detail['harga'], 0, ',', '.') . "</p>";
                                        echo "<p><strong>Durasi:</strong> " . htmlspecialchars($detail['durasi']) . " hari</p>";

                                        // Tombol Lihat Gambar
                                        if (!empty($detail['gambar'])) {
                                            echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#imageModal" onclick="showImage(\'' . htmlspecialchars($detail['gambar']) . '\')">Lihat Gambar</button>';
                                        }

                                        echo "<h3>Itinerary:</h3>";
                                        $sql_itinerary = "SELECT * FROM itinerary WHERE paket_id = ?";
                                        $stmt_itinerary = $koneksi->prepare($sql_itinerary);
                                        $stmt_itinerary->bind_param("i", $paket_id);
                                        $stmt_itinerary->execute();
                                        $result_itinerary = $stmt_itinerary->get_result();

                                        if ($result_itinerary->num_rows > 0) {
                                            while ($row = $result_itinerary->fetch_assoc()) {
                                                echo "<p><strong>Hari {$row['hari']}:</strong> {$row['aktivitas']} di {$row['lokasi']}";
                                                if (!empty($row['gambar'])) {
                                                    echo ' <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#itineraryImageModal" onclick="showItineraryImage(\'' . htmlspecialchars($row['gambar']) . '\')">Lihat Gambar</button>';
                                                }
                                                echo "</p>";
                                            }
                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itineraryModal">Selengkapnya</button>';
                                        } else {
                                            echo "<p>Itinerary tidak ditemukan.</p>";
                                        }
                                    } else {
                                        echo "<p>Detail paket wisata tidak ditemukan.</p>";
                                    }
                                } else {
                                    echo "<p>Silakan pilih paket wisata dan tekan 'Search' untuk melihat detail.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="slides">
                        <img src="assets/images/hero-slider-1.jpg" alt="Image" class="img-fluid active">
                        <img src="assets/images/hero-slider-2.jpg" alt="Image" class="img-fluid">
                        <img src="assets/images/hero-slider-3.jpg" alt="Image" class="img-fluid">
                        <img src="assets/images/hero-slider-4.jpg" alt="Image" class="img-fluid">
                        <img src="assets/images/hero-slider-5.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Image -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="Preview" id="modalImage" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

	<style>
		/* Center the modal dialog */
.modal-dialog {
    max-width: 80%;
    margin: 1.75rem auto; /* Centers the modal vertically and horizontally */
}

/* Modal content styling */
.modal-content {
    border-radius: 8px; /* Rounded corners for a more professional look */
    overflow: hidden; /* Ensures the content does not overflow */
}

/* Header styling */
.modal-header {
    background-color: #f8f9fa; /* Light background color for header */
    border-bottom: 1px solid #dee2e6; /* Subtle border at the bottom */
}

/* Modal body styling */
.modal-body {
    padding: 1.5rem; /* Consistent padding inside the modal body */
    font-size: 16px; /* Readable font size */
    line-height: 1.5; /* Improved readability */
}

/* Gallery styling */
.gallery {
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 15px; /* Space between items */
}

/* Image styling */
.img-gallery {
    width: 100%;
    height: auto;
    cursor: pointer;
    transition: transform 0.3s ease-in-out; /* Slightly slower transition for a smoother effect */
    border-radius: 8px; /* Rounded corners for images */
}

.img-gallery:hover {
    transform: scale(1.1); /* Slightly more zoom effect on hover */
}

/* Text styling next to images */
.gallery p {
    margin: 0; /* Remove default margins for a clean look */
    padding-left: 10px; /* Space between image and text */
    font-size: 14px; /* Slightly smaller font size for descriptions */
    color: #333; /* Darker text color for readability */
}

/* Modal footer styling */
.modal-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    border-top: 1px solid #dee2e6;
    background-color: #f8f9fa;
}

	</style>
	<!-- Modal for Itinerary Details -->
<div class="modal fade" id="itineraryModal" tabindex="-1" role="dialog" aria-labelledby="itineraryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itineraryModalLabel">Detail Itinerary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_GET['paket_wisata_id']) && !empty($_GET['paket_wisata_id'])) {
                    $paket_id = $_GET['paket_wisata_id'];

                    // Query untuk mengambil itinerary berdasarkan paket_id
                    $sql_itinerary = "SELECT * FROM itinerary WHERE paket_id = ?";
                    $stmt_itinerary = $koneksi->prepare($sql_itinerary);
                    $stmt_itinerary->bind_param("i", $paket_id);
                    $stmt_itinerary->execute();
                    $result_itinerary = $stmt_itinerary->get_result();

                    if ($result_itinerary->num_rows > 0) {
                        while ($row = $result_itinerary->fetch_assoc()) {
                            echo "<p><strong>Hari {$row['hari']}:</strong> {$row['aktivitas']} di {$row['lokasi']}</p>";

                            // Ambil gambar berdasarkan itinerary_id
                            $itinerary_id = $row['id'];
                            $sql_gambar = "SELECT * FROM gambar WHERE itinerary_id = ?";
                            $stmt_gambar = $koneksi->prepare($sql_gambar);
                            $stmt_gambar->bind_param("i", $itinerary_id);
                            $stmt_gambar->execute();
                            $result_gambar = $stmt_gambar->get_result();

                            if ($result_gambar->num_rows > 0) {
                                echo "<div class='gallery'>";
                                while ($row_gambar = $result_gambar->fetch_assoc()) {
                                    echo "<div class='col-md-4 mb-3'>";
                                    echo "<a href='admin/{$row_gambar['path_gambar']}' data-toggle='lightbox' data-gallery='gallery' data-title='{$row_gambar['keterangan']}'>";
                                    echo "<img src='admin/{$row_gambar['path_gambar']}' class='img-fluid img-gallery' alt='{$row_gambar['keterangan']}'/>";
                                    echo "</a>";
                                    echo "<p>{$row_gambar['keterangan']}</p>";
                                    echo "</div>";
                                }
                                echo "</div>";
                            } else {
                                echo "<p>Tidak ada gambar untuk itinerary ini.</p>";
                            }
                        }
                    } else {
                        echo "<p>Itinerary tidak ditemukan.</p>";
                    }
                }
                ?>
            </div>
            <div class="modal-footer">
    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20memesan%20paket%20wisata%20<?php echo $paket['nama']; ?>" target="_blank" class="btn btn-primary">
        Booking Now
    </a>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

        </div>
    </div>
</div>

         
        </div>
    </div>
</div>


                </div>
            </div>
        </div>
    </div>

   

 

    <script>
        function showImage(src) {
            document.getElementById('modalImage').src = src;
            $('#imageModal').modal('show');
        }

        function showItineraryImage(src) {
            document.getElementById('itineraryModalImage').src = src;
            $('#itineraryImageModal').modal('show');
        }
    </script>
</body>
</html>
