<?php
    include "../../koneksi.php";
    if (isset($_POST['ubah-profil'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $alamat = $_POST['alamat'];
        $id_member = $_POST['id_member'];

        // Proses Data
        $sql = "UPDATE member SET nama='$nama', alamat='$alamat', telepon='$telepon', email='$email'  WHERE id_member='$id_member'";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: ../settings.php");
        } else {
            echo "ERROR: Could not execute query: $sql. " . $conn->error;
        }
    }