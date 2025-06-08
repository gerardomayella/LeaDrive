<!DOCTYPE html>
<html>
<head>
    <title>Form Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Form Pemesanan Kursus: <span class="text-primary">{{ ucfirst($slug) }}</span></h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('pemesanan.store') }}" method="POST">
            @csrf
            <input type="hidden" name="slug" value="{{ $slug }}">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Anda</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Nomor Telepon</label>
                <input type="text" name="telepon" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pemesanan</button>
        </form>
    </div>
</body>
</html>
