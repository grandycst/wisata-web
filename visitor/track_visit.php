<?php
include 'koneksi.php';

$page = basename($_SERVER['PHP_SELF']);
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}
$visitor_ip = $_SERVER['REMOTE_ADDR'];

$sql = "INSERT INTO visits (page, visitor_ip) VALUES ('$page', '$visitor_ip')";
$koneksi->query($sql);
?>
