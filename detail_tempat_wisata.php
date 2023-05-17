<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Pariwisata Jombang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body class="bg-info">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-light text-uppercase fw-bold" href="#">Website Pariwisata Jombang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link text-light text-uppercase fw-bold btn btn-info mx-2 nav-margin-mobile" aria-current="page" href="index.php">Home</a>
                </li>
                <a class="nav-link text-light text-uppercase fw-bold btn btn-info mx-2 nav-margin-mobile" aria-current="page" href="tempat_wisata_list.php">Tempat Wisata</a>
            </ul>
            </div>
        </div>
    </nav>
    <?php
        include "koneksi.php";
        if (isset($_GET['id_tourism'])){
            $id_tourism = $_GET['id_tourism'];
            $sql = "SELECT * FROM tourism WHERE id_tourism='$id_tourism'"; 
            $result = $conn->query($sql);
            $data = $result->fetch_assoc();
        }
    ?>
    <!-- Header Detail -->
    <div class="p-4 p-md-5 mb-4 text-bg-dark" style="height:32rem;background-image:url(./admin/<?php echo $data['gambar'];?>);background-size:cover">
        <div class="col-md-6 px-0 mt-5">
            <h1 class="display-4 fst-italic fw-bold" style="text-shadow: 2px 2px 5px red;"><?php echo $data['nama'];?></h1>
            <p class="lead my-3 fw-bold" style="text-shadow: 2px 2px 5px red;"><?php echo $data['short_desc'];?></p>
            <p class="lead mb-0"><a href="#" class="btn btn-primary text-uppercase" data-bs-toggle="modal" data-bs-target="#lokasiTempatWisataModal">Cek Lokasi</a></p>
        </div>
    </div>
    <!-- Modal Lokasi -->
    <div class="modal modal-lg fade" id="lokasiTempatWisataModal" tabindex="-1" aria-labelledby="lokasiTempatWisataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="lokasiTempatWisataModalLabel">Lokasi Tempat Wisata</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <?php echo $data['google_map'];?>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail -->
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="text-light pb-4 ms-4 mb-4 fst-italic border-bottom">
                Deskripsi Tempat Wisata
            </h3>
            <p class="ms-4 text-light"><?php echo $data['deskripsi'];?></p>
        </div>

        <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
            <div class="p-4 mb-3 bg-light rounded me-2">
                <h4 class="fst-italic">About</h4>
                <hr>
                <p>Harga Tiket : Rp.<?php echo number_format($data['harga_tiket']);?>,-</p>
                <p>Waktu Buka : <?php echo $data['waktu_buka'];?></p>
                <p>Alamat :</p>
                <p><?php echo $data['alamat'];?></p>
            </div>

            <div class="p-4">
            <h4 class="fst-italic">Tempat Wisata Lainnya</h4>
            <?php
                $sql = "SELECT * FROM tourism WHERE rekomendasi='Ya'"; 
                $result = $conn->query($sql);
            ?>
            <ol class="list-unstyled">
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li><a href="detail_tempat_wisata.php?id_tourism='.$row['id_tourism'].'">'.$row['nama'].'</a></li>';
                        }
                    }
                ?>
                <!-- <li><a href="#">Sumber Boto</a></li> -->
            </ol>
            </div>
        </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  
</body>
</html>