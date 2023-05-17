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
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-2">
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
                            $sql2 = "SELECT login.username, member.nama FROM login INNER JOIN member ON login.id_member=member.id_member WHERE login.username='$user'"; 
                            $result2 = $conn->query($sql2);
                            $data2 = $result2->fetch_assoc();
                            echo $data2['nama'];
                        ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <?php
                        if (isset($_GET['id_tourism'])){
                            $id_tourism = $_GET['id_tourism'];
                            $sql = "SELECT * FROM tourism WHERE id_tourism='$id_tourism'"; 
                            $result = $conn->query($sql);
                            $data = $result->fetch_assoc();
                        }
                    ?>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Detail Tempat Wisata</h1>
                        <hr>
                        <h2 class="text-center"><?php echo $data["nama"];?></h2>
                        <center>
                        <img src="<?php echo $data["gambar"];?>" alt="Gambar" style="width:300px;height:240px;">
                        </center>
                        <h4>Alamat :</h4>
                        <p><?php echo $data["alamat"];?></p>
                        <h4>Harga Tiket :</h4>
                        <p><?php echo "Rp.".number_format($data["harga_tiket"]).",-";?></p>
                        <h4>Waktu Buka :</h4>
                        <p><?php echo $data["waktu_buka"];?></p>
                        <h4>Rekomendasi :</h4>
                        <p><?php echo $data["rekomendasi"];?></p>
                        <h4>Google Map :</h4>
                        <p><?php echo $data["google_map"];?></p>
                        <h4>Deskripsi Singkat :</h4>
                        <p><?php echo $data["short_desc"];?></p>
                        <h4>Deskripsi :</h4>
                        <p><?php echo $data["deskripsi"];?></p>
                        <br><br>
                        <center>
                        <a href="#" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#tambahTempatWisataModal">Edit</a>
                        <a href="./process/delete_tempat_wisata.php?id_tourism=<?php echo $data["id_tourism"] ; ?>" class="btn btn-danger mb-5">Delete</a>
                        </center>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="tambahTempatWisataModal" tabindex="-1" aria-labelledby="tambahTempatWisataModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="tambahTempatWisataModalLabel">Form Edit Tempat Wisata</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="./process/edit_tempat_wisata.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="id_tourism" class="form-label">ID :</label>
                                        <input type="text" name="id_tourism" class="form-control" id="id_tourism" placeholder="ID Tourism" value="<?php echo $data["id_tourism"]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Tempat Wisata :</label>
                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Tempat Wisata" value="<?php echo $data["nama"]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Tempat Wisata :</label>
                                        <textarea name="alamat" class="form-control" id="alamat" rows="3"><?php echo $data["alamat"]; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga_tiket" class="form-label">Harga Tiket :</label>
                                        <input type="text" name="harga_tiket" class="form-control" id="harga_tiket" placeholder="Harga Tiket" value="<?php echo $data["harga_tiket"]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="waktu_buka" class="form-label">Waktu Buka :</label>
                                        <input type="text" name="waktu_buka" class="form-control" id="waktu_buka" placeholder="Waktu Buka" value="<?php echo $data["waktu_buka"]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="rekomendasi" class="form-label">Rekomendasi :</label>
                                        <select id="rekomendasi" name="rekomendasi" class="form-select">
                                            <?php
                                                if($data["rekomendasi"]==="Tidak"){
                                                    echo '<option value="Tidak">Tidak</option>';
                                                    echo '<option value="Ya">Ya</option>';
                                                } else {
                                                    echo '<option value="Ya">Ya</option>';
                                                    echo '<option value="Tidak">Tidak</option>';
                                                }
                                            ?>
                                            <!-- <option value="Tidak">Tidak</option>
                                            <option value="Ya">Ya</option> -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="google_map" class="form-label">Google Map :</label>
                                        <textarea name="google_map" class="form-control" id="google_map" rows="3"><?php echo $data["google_map"]; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="short_desc" class="form-label">Deskripsi Singkat :</label>
                                        <textarea name="short_desc" class="form-control" id="short_desc" rows="3"><?php echo $data["short_desc"]; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi :</label>
                                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"><?php echo $data["deskripsi"]; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Choose an image:</label>
                                        <input type="file" class="form-control" id="gambar" name="gambar">
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="edit_tempat_wisata" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
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