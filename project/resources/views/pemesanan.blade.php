<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('{{ asset("images/BG.png") }}');
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
    <h2 class="mb-4">Pesan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pemesanan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="slug" value="{{ $slug }}">

        <div class="mb-3">
            <label class="form-label">Nama Intrusktur</label>
            <input type="text" class="form-control" value="{{ $kursus['nama'] }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor HP</label>
            <input type="text" class="form-control" value="{{ $kursus['telepon'] }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" value="{{ $kursus['email'] }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Kursus</label>
            <input type="text" class="form-control" value="{{ $kursus['jam'] }}" readonly>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Masukkan Tanggal Kursus</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-warning">Pesan</button>
        </div>
    </form>
</div>
</body>
</html>
