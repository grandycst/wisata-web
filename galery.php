<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        .hero-inner {
            background: #333;
            color: #fff;
            padding: 40px 0;
        }
        .hero-inner .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .hero-inner .intro-wrap {
            text-align: center;
        }
        .hero-inner h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .hero-inner p {
            font-size: 1.2rem;
        }
        .media-1 {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            height: 300px; /* Fixed height for image container */
            margin-bottom: 20px;
        }
        .media-1 img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the image covers the container */
            transition: transform 0.3s ease, opacity 0.3s ease;
            cursor: pointer;
        }
        .media-1:hover img {
            transform: scale(1.1);
            opacity: 0.8;
        }
        .media-text {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 15px;
            text-align: center;
            transition: opacity 0.3s ease;
            opacity: 0;
        }
        .media-1:hover .media-text {
            opacity: 1;
        }
        .media-text h3 {
            margin: 0;
            font-size: 1.5rem;
        }
        .media-text .loc {
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5px;
        }
        .icon-room {
            margin-right: 5px;
        }
        /* Ensuring responsive layout */
        @media (max-width: 768px) {
            .media-1 {
                height: 200px; /* Adjust for smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Galery Kami</h1>
                        <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <?php 
            // Query untuk mengambil data galeri dari database
            $query_galeri = "SELECT g.title, g.lokasi, g.image_path FROM gallery g ORDER BY g.id DESC";
            $result_galeri = $koneksi->query($query_galeri);

            if ($result_galeri->num_rows > 0) {
                while ($data = $result_galeri->fetch_assoc()) { ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="media-1">
                            <a href="admin/galery/uploads/<?php echo htmlspecialchars($data['image_path']); ?>" class="d-block" data-fancybox="gallery" data-caption="<?php echo htmlspecialchars($data['title']); ?>">
                                <img src="admin/galery/uploads/<?php echo htmlspecialchars($data['image_path']); ?>" alt="<?php echo htmlspecialchars($data['title']); ?>">
                            </a>
                            <div class="media-text">
                                <h3><?php echo htmlspecialchars($data['title']); ?></h3>
                                <span class="loc">
                                    <i class="fas fa-map-marker-alt icon-room"></i>
                                    <?php echo htmlspecialchars($data['lokasi']); ?>
                                </span>
                            </div>
                        </div>
                    </div>
            <?php 
                }
            } else {
                echo "<p class='text-center'>No gallery items found.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Include necessary scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
</body>
</html>
