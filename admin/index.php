<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin SI Pariwisata Jombang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">,<script src="https://kit.fontawesome.com/11b57c8cb9.js" crossorigin="anonymous"></script><link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="login-box shadow-lg">
            <div class="header-login">
                <h2 class="text-uppercase text-center text-light fw-bold mt-2">Login Admin</h2>
            </div>
            <div>
                <form action="login.php" method="POST" class="mx-5">
                    <div class="mb-4" style="margin-top: 40px;">
                        <input type="text" name="username" class="form-control input-lg" id="username" placeholder="Username">
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password">
                        <span class="input-group-text btn btn-secondary" onclick="password_show_hide()">
                            <i class="fa-solid fa-eye mt-1" id="show_eye"></i>
                            <i class="fa-solid fa-eye-slash d-none mt-1" id="hide_eye"></i>
                        </span>
                    </div>
                    <br>
                    <button type="submit" name="login" class="btn btn-primary" style="width:100%;">SUBMIT</button>
            </form>
        </div>
    </div >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script  src="./js/login.js"></script>
</body>
</html>
