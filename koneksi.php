<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tourism_db";

// Membuat Koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Check Koneksi
if ($conn->connect_error) {
  die("Gagal Koneksi : " . $conn->connect_error);
}
