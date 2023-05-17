<?php
    include "../../koneksi.php";
    if (isset($_POST['add_tempat_wisata'])){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $harga_tiket = $_POST['harga_tiket'];
        $waktu_buka = $_POST['waktu_buka'];
        $rekomendasi = $_POST['rekomendasi'];
        $google_map = $_POST['google_map'];
        $short_desc = $_POST['short_desc'];
        $deskripsi = $_POST['deskripsi'];
        
        // Proses Gambar
        $file_name = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $tmp = explode('.', $file_name);
        $file_ext = strtolower(end($tmp));
        $extensions = array("jpeg","jpg","png");
        $url_gambar = "uploads/img/" . $file_name;
        if (file_exists($url_gambar)) {
            unlink($url_gambar);
        }
        if(in_array($file_ext, $extensions) === false){
            echo "Extension not allowed, please choose a JPEG or PNG file.";
        } else {
            move_uploaded_file($file_tmp, "../".$url_gambar);
            echo "Image uploaded successfully.";
        }

        // Proses Data
        $sql = "INSERT INTO tourism (nama, alamat, harga_tiket, waktu_buka, rekomendasi, google_map, short_desc, deskripsi, gambar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $nama, $alamat, $harga_tiket, $waktu_buka, $rekomendasi, $google_map, $short_desc, $deskripsi, $url_gambar);

        if($stmt->execute()){
            echo "Records inserted successfully.";
            header("Location: ../tempat_wisata.php");
        } else{
            echo "ERROR: Could not execute query: $sql. " . $conn->error;
        }
        $stmt->close();
        $conn->close();
    }