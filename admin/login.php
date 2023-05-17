<?php
    include "../koneksi.php";
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $username = mysqli_real_escape_string($conn, $username);

        $password = $_POST['password'];
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM login WHERE username='$username'";
        $sql = $conn->query($sql);
        if($sql){
            $sql = $sql->fetch_assoc();

            // Bcrypt Password Verify
            // =======================
            if(password_verify($password, $sql['password'])){
                session_start();
                $_SESSION['user'] = $sql['username'];
                header('location:admin.php');
            }

            // MD5 Password Verify
            // =======================
            // $hashedpassword = $sql['password'];
            // $hashedenteredpassword = md5($password);
            // if ($hashedpassword === $hashedenteredpassword){
            //     session_start();
            //     $_SESSION['user'] = $sql['username'];
            //     header('location:admin.php');
            // }
            else {
                echo "Password False<br>";
                echo "Please login again <a href= './index.php'>login</a>";
            }   
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>