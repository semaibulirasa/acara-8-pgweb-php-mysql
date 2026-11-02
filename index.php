<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penduduk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h2 {
            margin-bottom: 15px;
            color: #333;
        }
        .btn-input {
            display: inline-block;
            padding: 8px 16px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .btn-input:hover {
            background-color: #555;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px 12px;
            text-align: left;
        }
        th {
            background-color: #e0e0e0;
            color: #333;
            font-weight: bold;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
       
        tr:hover {
            background-color: #e9e9e9;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>

    <!-- Judul Halaman -->
    <h2>Data Jumlah Penduduk</h2>

    <!-- Tombol Input Data -->
    <a href="input/index.html" class="btn-input">Input Data Baru</a>

<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "latihan_acara8pgweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
    <tr>
        <th>ID</th>
        <th>Kecamatan</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Luas</th>
        <th class='text-right'>Jumlah Penduduk</th>
    </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["kecamatan"]."</td>
            <td>".$row["longitude"]."</td>
            <td>".$row["latitude"]."</td>
            <td>".$row["luas"]."</td>
            <td class='text-right'>".number_format($row["jumlah_penduduk"])."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Data tidak ditemukan.</p>";
}

$conn->close();
?>

</body>
</html>