<?php
    include "../../koneksi.php";
    if (isset($_POST['ganti-foto'])){
        $id_member = $_POST['id_member'];

        // Proses Gambar
        $file_name = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $tmp = explode('.', $file_name);
        $file_ext = strtolower(end($tmp));
        $extensions = array("jpeg","jpg","png");
        $url_gambar = "uploads/user_img/" . $file_name;
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
        $sql = "UPDATE member SET gambar=? WHERE id_member=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si",$url_gambar,$id_member);

        if($stmt->execute()){
            echo "Records inserted successfully.";
            header("Location: ../settings.php");
        } else{
            echo "ERROR: Could not execute query: $sql. " . $mysqli->error;
        }
        $stmt->close();
        $conn->close();
    }