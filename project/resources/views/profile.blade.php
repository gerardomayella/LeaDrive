<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>LeaDrive | My Profile</title>

    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background-image: url('{{ asset("images/BG.png") }}');
        }

        .form-container1, .form-container2 { /* Sty;e container untuk form profile dan ubah password */
            width: 600px; /* Lebar container */
            height: auto; /* Tinggi otomatis */
            margin: 50px auto; /* Margin atas dan bawah 50px, auto kiri-kanan untuk center */
            padding: 20px; /* Padding dalam container */
            background-color: black; /* Warna latar belakang container */
            border-radius: 10px; /* Membuat sudut container melengkung */
            box-shadow: 0 4px 8px orangered; /* Bayangan container */
        }
        
        form label { /* Style untuk label input */
        color: white; /* Warna teks label */
        font-weight: 600; /* Tebal font label */
        margin-top: 10px; /* Jarak atas label */
        display: block; /* Membuat label sebagai blok(memenuhi lebar penuh container) */
    }

    .input-group {  /*Style untuk input group tiap input */
        position: relative; /* Posisi relative untuk menempatkan icon pensil */
        margin-bottom: 20px; /* Jarak antar input */
    }

    .input-group input { /* Style untuk input */
        width: 100%; /* Lebar penuh */
        padding: 12px 45px 12px 20px; /* Padding untuk memberi ruang bagi icon */
        border-radius: 50px; /* Membuat input berbentuk bulat */
        border: none; /* Tanpa border */
        font-size: 16px; /* Ukuran font */
        background-color: white; /* Warna latar belakang input */
        outline: none; /* Tanpa outline */
    }

    .input-group .pensil { /* Style untuk icon pensil */
        position: absolute; /* Posisi absolute untuk menempatkan icon pensil di dalam input */
        right: 15px; /* Jarak dari kanan */
        top: 50%; /* Menempatkan icon di tengah vertikal input */
        transform: translateY(-50%); /* Mengatur posisi icon agar tepat di tengah */
        height: 24px; /* Tinggi icon */
        width: 24px; /* Lebar icon */
    }
    
    button[type="submit"] { /* Style untuk tombol submit */
        background-color: orange; /* Warna latar belakang tombol */
        color: white; /* Warna teks tombol */
        font-weight: 600; /* Tebal font */
        padding: 12px 25px; /* Padding tombol */
        border: none; /* Tanpa border */
        border-radius: 25px; /* Membuat tombol berbentuk bulat */
        width: 100%; /* Lebar penuh */
        font-size: 16px; /* Ukuran font tombol */
        cursor: pointer; /* Kursor pointer saat hover */
        transition: background 0.3s ease; /* Transisi halus saat hover */
    }

    button[type="submit"]:hover { /* Efek hover pada tombol */
        background-color: salmon; /* Warna latar belakang saat hover */
    }

    .error-message { /* Style untuk pesan error */
        color: yellow; /* Warna kuning untuk pesan error */
        font-size: 14px;   /* Ukuran font pesan error */
        margin-top: -10px; /* Jarak atas untuk mengurangi jarak dengan input */
        margin-bottom: 10px; /* Jarak bawah untuk memberi ruang */
    }
    </style>
</head>

<body>
@include('partials.navbar') <!-- Include navbar partial -->

<div class="form-container1"> 
    @if (session('success')) <!--  Menampilkan pesan sukses (dengan session 'alert-success' manfat menggunakan bootstrap 5) l -->
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <form action="{{ route('profile.updateProfile') }}" method="POST">
        @csrf  <!-- token otomatis dari Laravel untuk keamanan -->  
        @method('PUT') <!-- method PUT untuk update data -->

        <label for="Username">Username</label>
        <div class="input-group">
            <input type="text" name="name" value="{{ $user->name }}" required>
            <img src="{{ asset('images\Pensil.png') }}" alt="Edit" class="pensil">
        </div>

        <label for="Email">Email</label>
        <div class="input-group">
            <input type="email" name="email" value="{{ $user->email }}" required>
            <img src="{{ asset('images\Pensil.png') }}" alt="Edit" class="pensil">
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>


<div class="form-container2">
    <form action="{{ route('profile.ubahPassword') }}" method="POST">
        @csrf
        @method('PUT')

        <label for="current_password">Password Lama</label>
        <div class="input-group">
            <input type="password" id="current_password" name="current_password" required>
            <img src="{{ asset('images\Pensil.png') }}" alt="Edit" class="pensil">
        </div>
        @error('current_password') <!-- Menampilkan pesan error jika ada -->
            <div class="error-message">{{ $message }}</div> <!-- Pesan error jika password lama salah -->
        @enderror

        <label for="new_password">Password Baru</label>
        <div class="input-group">
            <input type="password" id="new_password" name="new_password" required>
            <img src="{{ asset('images\Pensil.png') }}" alt="Edit" class="pensil">
        </div>
        @error('new_password') 
            <div class="error-message">{{ $message }}</div> <!-- Pesan error jika password baru tidak sesuai kriteria -->
        @enderror

        <label for="new_password_confirmation">Konfirmasi Password Baru</label>
        <div class="input-group">
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
            <img src="{{ asset('images\Pensil.png') }}" alt="Edit" class="pensil">
        </div>

        <button type="submit">Ubah Password</button>
    </form>
</div>

</body>
<!-- Script untuk menghilangkan alert setelah 3 detik -->
<script>
    setTimeout(function() { // Fungsi bawaan JavaScript untuk menghilangkan alert
        let alertNode = document.querySelector('.alert'); // Mencari elemen dengan class 'alert'
        if(alertNode){ // Mengecek apakah elemen alert ada
            alertNode.classList.remove('show'); // Menghapus class 'show' untuk menyembunyikan alert
            alertNode.classList.add('fade'); // Menambahkan class 'fade' untuk efek transisi
        }
    }, 3000); // 3 detik
</script>

</html>