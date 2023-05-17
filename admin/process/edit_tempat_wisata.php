<?php
    include "../../koneksi.php";
    if (isset($_POST['edit_tempat_wisata'])){
        $id_tourism = $_POST['id_tourism'];
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
        $sql = "UPDATE tourism SET nama=?, alamat=?, harga_tiket=?, waktu_buka=?, rekomendasi=?, google_map=?, short_desc=?, deskripsi=?, gambar=? WHERE id_tourism=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssi", $nama, $alamat, $harga_tiket, $waktu_buka, $rekomendasi, $google_map, $short_desc, $deskripsi, $url_gambar, $id_tourism);

        if($stmt->execute()){
            echo "Records Upadated successfully.";
            header("Location: ../tempat_wisata.php");
        } else{
            echo "ERROR: Could not execute query: $sql. " . $conn->error;
        }
        $stmt->close();
        $conn->close();
    }