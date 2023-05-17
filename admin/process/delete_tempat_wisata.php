<?php
    include "../../koneksi.php";
    if (isset($_GET['id_tourism'])){
        $id_tourism = $_GET['id_tourism'];

        // Proses Delete Gambar
        $sql = "SELECT * FROM tourism WHERE id_tourism='$id_tourism'"; 
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        $url_gambar = "../".$data["gambar"];
        unlink($url_gambar);

        // Proses Delete Data
        $sql2 = "DELETE FROM tourism WHERE id_tourism='$id_tourism'";
        $result2 = mysqli_query($conn, $sql2);
        
        header("Location: ../tempat_wisata.php");
        
        mysqli_close($conn);
    }