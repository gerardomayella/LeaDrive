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
            <h1 style= "color: white; font-weight:bold;">Lead the way, Drive the</h1>
            <h2 style= "color: white; font-weight:bold;">Change...</h2>
        </div>
</div>

<div class="container mt-4">
    <div class="mt-4">
        <h3 style= "color: white; font-weight: bold; text-align: center; margin-top: 50px; margin-bottom: 30px;">Daftar Tutor</h3>
    </div>
</div>
    <!-- Carousel -->
@if($instrukturs->count())
<div id="carouselInstruktur" class="carousel slide" data-bs-ride="carousel"> 
    <div class="carousel-indicators">
        @foreach($instrukturs as $index => $i) 
            <button type="button" data-bs-target="#carouselInstruktur" data-bs-slide-to="{{ $index }}" 
                class="{{ $index == 0 ? 'active' : '' }}" 
                aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach($instrukturs as $index => $i) 
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <a href="/pemesanan/{{ $i->nama }}"> 
                <img src="{{ $i->image_url }}"
                style="width: 20%; aspect-ratio: 1 / 1; object-fit: cover; display: block; margin: 0 auto;"
                alt="{{ $i->nama }}">
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h5 style="color: {{ $loop->index % 2 == 0 ? 'white' : 'black' }}; font-weight: bold;">
                    {{ $i->nama }}
                </h5>
                <p style="color: {{ $loop->index % 2 == 0 ? 'white' : 'black' }};
                        background: {{ $loop->index % 2 == 0 ? 'black' : 'white' }};
                        border-radius: 8px; display: inline-block; padding: 4px 12px;">
                    {{ $i->quotes ?? 'Salah masuk gigi? LeaDrive nggak bakal ngegas!' }}
                </p>
                <div class="rating">
                    @for ($star = 0; $star < 5; $star++)
                        <i class="fas fa-star" style="color: gold;"></i>
                    @endfor
                    <span style="color: orange; font-weight: bold;">
                        5.0
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselInstruktur" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselInstruktur" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@else
    <p class="text-center">Belum ada instruktur yang tersedia.</p>
@endif
    <!-- End Carousel -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>