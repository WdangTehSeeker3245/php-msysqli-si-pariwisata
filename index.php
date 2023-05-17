<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Pariwisata Jombang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/home.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<body>
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
    <!-- Carousel -->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-target="#myCarousel" data-bs-interval="3000">
                <div class="overlay-image" style="background-image:url('./img/slider/baletani.jpg');">
                    <div class="con">
                        <center>
                        <h2 class="text-danger fw-bold text-uppercase" style="text-shadow: 2px 2px 5px white;">Selamat Datang Di Website Pariwisata Jombang</h2>
                        <p class="fw-bold text-uppercase" style="text-shadow: 2px 2px 5px red;">Berbagi keindahan bersama seluruh wisatawan di luar maupun dalam jombang</p>
                        <a href="tempat_wisata_list.php" class="btn btn-lg btn-primary text-uppercase fw-bold">Cari Tempat Wisata</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-target="#myCarousel" data-bs-interval="3000">
                <div class="overlay-image" style="background-image:url('./img/slider/sumberboto.jpeg');">
                    <div class="con">
                        <center>
                        <h2 class="text-danger fw-bold text-uppercase" style="text-shadow: 2px 2px 5px white;">Selamat Datang Di Website Pariwisata Jombang</h2>
                        <p class="fw-bold text-uppercase" style="text-shadow: 2px 2px 5px red;">Berbagi keindahan bersama seluruh wisatawan di luar maupun dalam jombang</p>
                        <a href="tempat_wisata_list.php" class="btn btn-lg btn-primary text-uppercase fw-bold">Cari Tempat Wisata</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="bg-info">
        <center>
        <iframe class="mt-5 mb-2 rounded" width="80%" height="500px" src="https://www.youtube.com/embed/BGTLWVjjHSc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </center>
    </div>
    <!-- Rekomendasi Destinasi Wisata -->
    <?php
        include "koneksi.php";
        $sql = "SELECT * FROM tourism WHERE rekomendasi='Ya'"; 
        $result = $conn->query($sql);
    ?>
    <div class="bg-info">
        <br><br>
        <h2 class="text-center text-uppercase text-light fw-bold">Rekomendasi Destinasi Wisata</h2>
        <hr class="mx-auto" style="border:3px solid white;width:200px">
        <br><br>
        <div class="row row-cols-1 row-cols-lg-3 g-1 g-lg-3 ms-5">
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col my-2">'.
                                '<div class="card" style="width: 18rem;">'.
                                    '<img class="card-img-top" src="./admin/'.$row['gambar'].'" alt="Card image cap">'.
                                    '<div class="card-body">'.
                                        '<h5 class="card-title">'.$row['nama'].'</h5>'.
                                        '<p class="card-text">'.$row['short_desc'].'</p>'.
                                        '<a href="detail_tempat_wisata.php?id_tourism='.$row['id_tourism'].'" class="btn btn-primary">Lihat Detail</a>'.
                                    '</div>'.
                                '</div>'.
                            '</div>';  
                    }
                }
            ?>
            <!-- <div class="col my-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="./img/baletani.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Bale Tani</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col my-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="./img/sumberboto.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Sumber Boto</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div> -->
        </div>
        <br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>