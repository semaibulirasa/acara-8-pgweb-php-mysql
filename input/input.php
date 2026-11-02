<?php
$kecamatan       = $_POST['kecamatan'];
$longitude       = $_POST['longitude'];
$latitude        = $_POST['latitude'];
$luas            = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "latihan_acara8pgweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "INSERT INTO penduduk (kecamatan, longitude, latitude, luas, jumlah_penduduk)
        VALUES ('$kecamatan', '$longitude', '$latitude', $luas, $jumlah_penduduk)";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 