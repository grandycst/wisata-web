<?php
session_start();  // Start session to use session variables


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];  // Get the name
    $id_kategori = $_POST['id_kategori'];  // Get the selected category ID
    $location = $_POST['location'];  // Get the location
    
    // Handle the file upload
    $image_path = $_FILES['image_path']['name'];  // Get the image file name
    $target_dir = "uploads/";  // Directory where files will be saved
    $target_file = $target_dir . basename($image_path);  // Full file path

    // Move uploaded file to the target directory
    if (move_uploaded_file($_FILES['image_path']['tmp_name'], $target_file)) {
        // File upload success, insert data into the database
        $query = "INSERT INTO destinasi (name, kategori, location, image_path) 
                  VALUES ('$name', '$id_kategori', '$location', '$image_path')";
        
        if (mysqli_query($koneksi, $query)) {
            $_SESSION['save_success'] = "Data destinasi berhasil ditambahkan!";
            echo "<script> window.location.href='../admin/?page=destinasi/index';</script>"; // Redirect to index page
            exit();  // Ensure no further code is executed
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Error uploading file.";
    }
}
?>
