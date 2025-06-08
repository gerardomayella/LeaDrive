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
    <div class="container mt-5">
        <h2>Pemesanan Kursus: <span class="text-primary">{{ $nama }}</span></h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>Email:</strong> {{ $email }}</li>
            <li class="list-group-item"><strong>No HP:</strong> {{ $no_hp }}</li>
            <li class="list-group-item"><strong>Jam:</strong> {{ $jam }}</li>
        </ul>

        <form action="{{ route('pemesanan.store') }}" method="POST">
            @csrf
            <input type="hidden" name="slug" value="{{ $slug }}">
            <input type="hidden" name="nama" value="{{ $nama }}">
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Kursus</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning">Pesan</button>
        </form>
    </div>
</body>
</html>
