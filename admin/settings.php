<?php
    session_start();
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
    else {
        header("Location: index.php");
    }    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin SI Pariwisata Jombang</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="./css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="./css/admin.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand text-uppercase fw-bold ps-3" href="admin.php">Admin Pariwisata</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-earth-asia"></i></div>
                                Tempat Wisata
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="rekomendasi_tempat_wisata.php">Data Rekomendasi</a>
                                    <a class="nav-link" href="tempat_wisata.php">Data Semua</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="settings.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                                Settings
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php
                            include "../koneksi.php";
                            $sql = "SELECT login.id_login,login.username, member.id_member, member.nama, member.alamat, member.telepon, member.email , member.gambar
                                     FROM login INNER JOIN member 
                                     ON login.id_member=member.id_member 
                                     WHERE login.username='$user'"; 
                            $result = $conn->query($sql);
                            $data = $result->fetch_assoc();
                            echo $data['nama'];
                        ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h5 class="mt-2"><i class="fa fa-user"></i> Foto Pengguna </h5>
                                    </div>
                                    <div class="card-body">
                                        <img src="<?php if(empty($data['gambar'])){ echo './assets/img/newuser.jpg'; }else{ echo $data['gambar']; } ?>" alt="#" class="img-fluid w-100" />
                                    </div>
                                    <div class="card-footer">
                                        <form method="POST" action="./process/ganti_foto_profil.php" enctype="multipart/form-data">
                                            <input type="file" accept="image/*" name="foto">
                                            <input type="hidden" name="id_member" value="<?php echo $data['id_member'];?>">
                                            <br><br>	
                                            <button type="submit" class="btn btn-primary btn-md" name="ganti-foto">
                                                <i class="fas fa-edit mr-1"></i>  Ganti Foto
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h5 class="mt-2"><i class="fa fa-user"></i> Kelola Pengguna </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="box-content">
                                            <form class="form-horizontal" method="POST" action="./process/ubah_profil.php">
                                                <fieldset>
                                                    <div class="control-group mb-3">
                                                        <label class="control-label" for="typeahead">Nama </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" style="border-radius:0px;" name="nama"
                                                                data-items="4" value="<?php echo $data['nama']; ?>"
                                                                required="required" />
                                                        </div>
                                                    </div>
                                                    <div class="control-group mb-3">
                                                        <label class="control-label" for="typeahead">Email </label>
                                                        <div class="input-group">
                                                            <input type="email" class="form-control" style="border-radius:0px;" name="email"
                                                                value="<?php echo $data['email']; ?>" required="required" />
                                                        </div>
                                                    </div>
                                                    <div class="control-group mb-3">
                                                        <label class="control-label" for="typeahead">Telepon </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" style="border-radius:0px;" name="telepon"
                                                                value="<?php echo $data['telepon']; ?>" required="required" />
                                                        </div>
                                                    </div>
                                                    <div class="control-group mb-3">
                                                        <label class="control-label" for="typeahead">Alamat </label>
                                                        <div class="controls">
                                                            <textarea name="alamat" rows="3" class="form-control" style="border-radius:0px;"
                                                                required="required"><?php echo $data['alamat']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id_member" value="<?php echo $data['id_member']; ?>">
                                                    <button type="submit" class="btn btn-primary" name="ubah-profil">
                                                        <i class="fas fa-edit"></i> Ubah Profil
                                                    </button>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h5 class="mt-2"><i class="fa fa-lock"></i> Ganti Password</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="box-content">
                                            <form class="form-horizontal" method="POST" action="./process/ganti_password.php">
                                                <fieldset>
                                                    <div class="control-group mb-3">
                                                        <label class="control-label" for="typeahead">Username </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" style="border-radius:0px;" name="username"
                                                                data-items="4" value="<?php echo $data['username'];?>" />
                                                        </div>
                                                    </div>
                                                    <div class="control-group mb-3">
                                                        <label class="control-label" for="typeahead">Password Baru</label>
                                                        <div class="input-group">
                                                            <input type="password" class="form-control" placeholder="Enter Your New Password" id="password" name="password" data-items="4"
                                                                required="required" />
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control" style="border-radius:0px;" name="id_login"
                                                        value="<?php echo $data['id_login'];?>" required="required" />
                                                    <button type="submit" class="btn btn-primary" name="ganti-password"><i class="fas fa-edit"></i> Ubah Password</button>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>