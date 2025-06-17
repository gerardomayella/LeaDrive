<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Instruktur</title>
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
        .btn-update {
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
            <h1 class="text-center">Edit Instruktur</h1>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('admin.updateDatabase') }}" method="POST">
                @csrf
                <input type="hidden" name="id_instruktur" value="{{ $Instruktur->id_instruktur }}">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $Instruktur->nama }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. Telepon</label>
                    <input type="text" name="no_hp" id="no_hp" value="{{ $Instruktur->no_hp }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" value="{{ $Instruktur->email }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="image_url" class="form-label">Foto URL</label>
                    <input type="text" name="image_url" id="image_url" value="{{ $Instruktur->image_url }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="jam_pengajar" class="form-label">Jam Pengajar</label>
                    <input type="text" name="jam_pengajar" id="jam_pengajar" value="{{ $Instruktur->jam_pengajar }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" value="{{ $Instruktur->harga }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-update">Update</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-back">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>
