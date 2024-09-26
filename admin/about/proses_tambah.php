<?php
session_start();
$_SESSION['save_success']='Data Berhasil Disimpan';
// Sisipkan file koneksi
include "../koneksi.php";

// Validasi apakah form telah dikirim dengan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dengan validasi
    $visi = isset($_POST['visi_about']) ? $_POST['visi_about'] : '';
    $misi = isset($_POST['misi_about']) ? $_POST['misi_about'] : '';

    // Ambil informasi gambar
    if (isset($_FILES['gambar_about']) && $_FILES['gambar_about']['error'] == 0) {
        $gambar_about = $_FILES['gambar_about']['name'];
        $gambar_tmp = $_FILES['gambar_about']['tmp_name'];
        $target_dir = "../about/gambar_about/"; // Sesuaikan dengan direktori penyimpanan gambar Anda
        $target_file = $target_dir . basename($gambar_about);

        // Validasi file gambar
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file gambar adalah gambar sebenarnya
        $check = getimagesize($gambar_tmp);
        if ($check === false) {
            echo "<script>
                    alert('File bukan gambar.');
                    window.location.href='../?page=about/tambah';
                  </script>";
            $uploadOk = 0;
        }

        // Cek ukuran file gambar
        if ($_FILES['gambar_about']['size'] > 5000000) { // Maksimal 5MB
            echo "<script>
                    alert('Maaf, ukuran file terlalu besar.');
                    window.location.href='../?page=about/tambah';
                  </script>";
            $uploadOk = 0;
        }

        // Cek format file gambar
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "<script>
                    alert('Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.');
                    window.location.href='../?page=about/tambah';
                  </script>";
            $uploadOk = 0;
        }

        // Jika validasi gagal
        if ($uploadOk == 0) {
            echo "<script>
                    alert('Maaf, gambar tidak dapat diunggah.');
                    window.location.href='../?page=about/tambah';
                  </script>";
            exit;
        }

        // Pindahkan file gambar yang diupload ke folder
        if (move_uploaded_file($gambar_tmp, $target_file)) {
            // Query untuk memasukkan data ke database
            $sql = "INSERT INTO about (visi_about, misi_about, gambar_about) VALUES (?, ?, ?)";
            $stmt = $koneksi->prepare($sql);

            if ($stmt === false) {
                die('Prepare statement error: ' . $koneksi->error);
            }

            $stmt->bind_param("sss", $visi, $misi, $gambar_about);

            if ($stmt->execute()) {
                echo "<script>
                       
                        window.location.href='../?page=about/index';
                      </script>";
            } else {
                echo "<script>
                        alert('Data Gagal Ditambahkan: " . $stmt->error . "');
                        window.location.href='../?page=about/tambah';
                      </script>";
            }

            // Tutup statement
            $stmt->close();
        } else {
            echo "<script>
                    alert('Maaf, terjadi kesalahan saat mengunggah gambar.');
                    window.location.href='../?page=about/tambah';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Maaf, tidak ada gambar yang diunggah atau terjadi kesalahan.');
                window.location.href='../?page=about/tambah';
              </script>";
    }
} else {
    echo "<script>
            alert('Invalid request.');
            window.location.href='../?page=about/tambah';
          </script>";
}

// Tutup koneksi
$koneksi->close();
?>
