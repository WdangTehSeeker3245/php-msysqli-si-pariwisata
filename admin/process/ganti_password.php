<?php 
    include "../../koneksi.php";
    if (isset($_POST['ganti-password'])){
        $username= $_POST['username'];
        $password= $_POST['password'];
        $id_login= $_POST['id_login'];
        
        // Proses Data
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE login SET username='$username', password='$passwordHash'  WHERE id_login='$id_login'";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: ../settings.php");
        } else {
            echo "ERROR: Could not execute query: $sql. " . $conn->error;
        }
    }