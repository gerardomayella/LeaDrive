<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>LeaDrive | Dashboard!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <!-- Link Font Awesome untuk icon bintang -->
    </head>
    <body>
    <!-- Background body -->
<body style="background-image: url('{{ asset("images/BG.png") }}');">

@include('partials.navbar') <!-- Include navbar partial -->

<div class="container mt-4">
        <div class="mt-4">
            <h1 style="color: white; font-weight: bold;">Lead the way, Drive the</h1>
            <h2 style="color: white; font-weight:bold;">Change...</h2>
        </div>
</div>

<div class="container mt-4">
    <div class="mt-4">
        <h3 style= "color: white; font-weight: bold; text-align: center; margin-top: 50px; margin-bottom: 30px;">Daftar Tutor</h3>
    </div>
</div>
    <!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="/pemesanan/mas_Irgi"> <!-- Link ke halaman pemesanan dinamis ke Mas Irgi -->
            <img src="{{ asset('images/Irgivensa.jpg') }}" style="width: 20%; aspect-ratio: 1 / 1; object-fit: cover; display: block; margin: 0 auto;"  alt="Mas Irgi">
        <div class="carousel-caption d-none d-md-block">
            <h5 style= "color: white; font-weight: bold;">Mas Irgi</h5>
            <p style="color: white; text-shadow: black; background: black; border-radius: 8px; display: inline-block; padding: 4px 12px;">Apa wae tak tabrak yen menjadi penghalang</p>
            <div class="rating">
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <span style="color: white; font-weight: bold;">5.0</span>
            </div>
        </div>
    </div>
        <div class="carousel-item">
            <a href="/pemesanan/gerardo"> <!-- Link ke halaman pemesanan dinamis ke Gerardo -->
            <img src="{{ asset('images/Ardo.jpg') }}" style="width: 20%; aspect-ratio: 1 / 1; object-fit: cover; display: block; margin: 0 auto;" alt="Gerardo">
            <div class="carousel-caption d-none d-md-block">
            <h5 style="color: white; font-weight: bold;">Gerardo</h5>
            <p style="color: white; text-shadow: black; background: black; border-radius: 8px; display: inline-block; padding: 4px 12px;">We wok de tok not anle tok de tok</p>
            <div class="rating">
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <span style="color: white; font-weight: bold;">5.0</span>
            </div>
        </div>
    </div>
        <div class="carousel-item">
            <a href="/pemesanan/ditus"> <!-- Link ke halaman pemesanan dinamis ke Ditus -->
            <img src="{{ asset('images/Ditus.jpg') }}" style="width: 20%; aspect-ratio: 1 / 1; object-fit: cover; display: block; margin: 0 auto;"  alt="Ditus">
        <div class="carousel-caption d-none d-md-block">
            <h4 style="color: white; font-weight: bold;">Ditus</h4>
            <p style="color: black; text-shadow: danger; background: white; border-radius: 8px; display: inline-block; padding: 4px 12px;">Siap me-racingkan anda sepenuh hati</p>
            <div class="rating">
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <span style="color: white; font-weight: bold;">5.0</span>
            </div>
        </div>
    </div>
        <div class="carousel-item">
            <a href="/pemesanan/samuel"> <!-- Link ke halaman pemesanan dinamis ke Samuel -->
            <img src="{{ asset('images/Samuel.jpg') }}" style="width: 20%; aspect-ratio: 1 / 1; object-fit: cover; display: block; margin: 0 auto;"  alt="Samuel">
        <div class="carousel-caption d-none d-md-block">
            <h5 style="color: black; font-weight: bold; text-shadow: danger;">Samuel</h5>
            <p style="color: black; text-shadow: danger; background: white; border-radius: 8px; display: inline-block; padding: 4px 12px;">
                Auto gas ngeng sat set ke hatinya
            </p>
            <div class="rating">
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <i class="fas fa-star" style="color: gold;"></i>
                <span style="color: black; font-weight: bold;">5.0</span>
            </div>
        </div>
    </div>
    </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
    </button>
</div>
    <!-- End Carousel -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>