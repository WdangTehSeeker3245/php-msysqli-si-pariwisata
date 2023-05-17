<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Pariwisata Jombang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/tempat_wisata_list.css">
    <script src="https://kit.fontawesome.com/11b57c8cb9.js" crossorigin="anonymous"></script>
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

    <!-- List -->
    <?php
        include "koneksi.php";
        $sql = "SELECT * FROM tourism"; 
        $result = $conn->query($sql);
    ?>
    <br><br>
    <h2 class="text-center text-uppercase text-light fw-bold">List Tempat Wisata Di Jombang</h2>
    <hr class="mx-auto" style="border:3px solid white;width:200px">
    <form action="search_tempat_wisata_list.php" method="GET" class="input-group search-box mt-2 py-3">
      <input type="text" name="search" class="form-control" placeholder="Search Tempat Wisata" aria-label="Recipient's username" aria-describedby="button-addon2">
      <button class="btn btn-secondary" type="submit" name="searchbtn" id="button-addon2"><i class="fas fa-search"></i></button>
    </form>
    <div class="container">
        <br><br>
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="row ms-2 bg-primary shadow g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">'.
                                '<div class="col-auto">'.
                                    '<img width="400" height="250" src="./admin/'.$row['gambar'].'">'.
                                '</div>'.
                                '<div class="col p-4 d-flex flex-column position-static">'.
                                    '<h3 class="mb-0 text-light">'.$row['nama'].'</h3>'.
                                    '<hr style="border:3px solid white">'.
                                    '<p class="card-text text-light">'.$row['short_desc'].'</p>'.
                                    '<br><br>'.
                                    '<a href="detail_tempat_wisata.php?id_tourism='.$row['id_tourism'].'" class="btn btn-secondary text-light">Lihat Detail</a>'.
                                '</div>'.
                           '</div>';
                }
            }
        ?>
        <!-- <div class="row ms-2 bg-primary shadow g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-auto">
                <img width="400" height="250"src="./img/baletani.jpg">
            </div>
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0 text-light">Bale Tani</h3>
                <hr style="border:3px solid white">
                <p class="card-text text-light">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                <br><br>
                <a href="#" class="btn btn-secondary text-light">Lihat Detail</a>
            </div>
        </div>
        <div class="row ms-2 bg-primary shadow g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-auto">
                <img width="400" height="250"src="./img/sumberboto.jpeg">
            </div>
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0 text-light">Sumber Boto</h3>
                <hr style="border:3px solid white">
                <p class="card-text text-light">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                <br><br>
                <a href="#" class="btn btn-secondary text-light">Lihat Detail</a>
            </div>
        </div> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>