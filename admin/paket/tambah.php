<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket Wisata, Itinerary, dan Gambar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Tambah Paket Wisata, Itinerary, dan Gambar</h1>
    
    <form action="?page=paket/proses_tambah" method="POST" enctype="multipart/form-data">
        <!-- Paket Wisata -->
        <h2>Paket Wisata</h2>
        <div class="form-group">
            <label for="nama">Nama Paket Wisata</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
        </div>

        <div class="form-group">
            <label for="durasi">Durasi (hari)</label>
            <input type="number" class="form-control" id="durasi" name="durasi" required>
        </div>

        <!-- Itinerary Section -->
        <h2>Itinerary</h2>
        <div id="itinerary-container">
            <div class="itinerary-item">
                <div class="form-group">
                    <label for="hari[]">Hari Itinerary</label>
                    <input type="number" class="form-control" name="hari[]" required>
                </div>

                <div class="form-group">
                    <label for="aktivitas[]">Aktivitas</label>
                    <textarea class="form-control" name="aktivitas[]" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="lokasi[]">Lokasi</label>
                    <input type="text" class="form-control" name="lokasi[]" required>
                </div>

                <!-- Gambar Section -->
                <div class="gambar-section">
                    <h4>Gambar Itinerary</h4>
                    <div class="form-group">
                        <label for="path_gambar[]">Pilih Gambar</label>
                        <input type="file" class="form-control-file" name="path_gambar[]" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan[]">Keterangan Gambar</label>
                        <input type="text" class="form-control" name="keterangan[]" required>
                    </div>
                </div>
                <button type="button" class="btn btn-danger remove-itinerary-btn">Hapus Itinerary</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mt-3" id="add-itinerary-btn">+ Tambah Itinerary</button>
        <br><br>
        <button type="submit" class="btn btn-primary">Simpan Semua</button>
    </form>
</div>

<script>
    document.getElementById('add-itinerary-btn').addEventListener('click', function() {
        const itineraryContainer = document.getElementById('itinerary-container');
        const itineraryItem = document.querySelector('.itinerary-item').cloneNode(true);
        itineraryContainer.appendChild(itineraryItem);

        itineraryItem.querySelector('.remove-itinerary-btn').addEventListener('click', function() {
            itineraryItem.remove();
        });
    });

    document.querySelectorAll('.remove-itinerary-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            button.closest('.itinerary-item').remove();
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
