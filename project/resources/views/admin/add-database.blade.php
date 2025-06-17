<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Instruktur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset("images/BG.png") }}');
            background-size: cover;
            background-position: center;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
        }
        .btn-submit {
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }
        .btn-back {
            background-color: orange;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1 class="text-center">Tambah Instruktur</h1>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.storeDatabase') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. Telepon</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="image_url" class="form-label">Foto URL</label>
                    <input type="text" name="image_url" id="image_url" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="jam_pengajar" class="form-label">Jam Pengajar</label>
                    <input type="text" name="jam_pengajar" id="jam_pengajar" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control">
                </div>
                <button type="submit" class="btn btn-submit">Tambah</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-back">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>
