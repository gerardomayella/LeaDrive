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
    <title>Pemesanan</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('{{ asset("images/BG.png") }}');
        }
        .card {
            width: 600px; /* Adjust width */
            height: 790px; /* Adjust height */
            margin: 0 auto; /* Center horizontally */
            background-color: black; /* Change background color to black */
            color: white; /* Ensure text is visible on black background */
        }
        .form-group {
            margin-bottom: 15px; /* Tambahkan jarak antar elemen */
        }
    </style>
</head>
<body>
    @include('partials.navbarPesan') <!-- Include navbar partial -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pesanan</h4>
                <form action="{{ route('pemesanan.store') }}" method="POST">
                    @csrf
                    <!-- Input untuk nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Instruktur</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ $nama }}" disabled>
                        <input type="hidden" name="nama" value="{{ $nama }}">
                    </div>

                    <!-- Input untuk email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $email }}" disabled>
                        <input type="hidden" name="email" value="{{ $email }}">
                    </div>

                    <!-- Input untuk no_hp -->
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ $no_hp }}" disabled>
                        <input type="hidden" name="no_hp" value="{{ $no_hp }}">
                    </div>
                    <!-- Input untuk jam_pengajar -->
                    <div class="mb-3">
                        <label for="jam_pengajar" class="form-label">Jam Mengajar</label>
                        <input type="text" id="jam_pengajar" name="jam_pengajar" class="form-control" value="{{ $jam_pengajar }}" disabled>
                        <input type="hidden" name="jam_pengajar" value="{{ $jam_pengajar }}">
                    </div>

                    <!-- Input untuk transmisi -->
                    <div class="mb-3">
                        <label for="transmisi" class="form-label">Transmisi</label>
                        <input type="text" id="transmisi" name="transmisi" class="form-control" value="{{ $transmisi }}" disabled>
                        <input type="hidden" name="transmisi" value="{{ $transmisi }}">
                    </div>

                    <!-- Input untuk tanggal -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Masukkan Tanggal Pemesanan Anda</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                    </div>

                    <!-- Input untuk lokasi -->
                    <div class="form-group">
                        <label for="lokasi">Masukkan Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Jl. Contoh No. 123" required>
                    </div>

                    <!-- Input untuk metode pembayaran -->
                    <div class="form-group">
                        <label for="metode-pembayaran">Pilih Metode Pembayaran</label>
                        <select id="metode-pembayaran" name="metode_pembayaran" class="form-control" required>
                            <option value="cash">Cash</option>
                            <option value="transfer">Transfer</option>
                        </select>
                    </div>

                    <!-- Tombol submit -->
                    <div class="d-flex justify-content-center">
                        <a href="/dashboard" class="btn btn-secondary me-4">Kembali</a>
                        <button type="submit" class="btn btn-warning">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>