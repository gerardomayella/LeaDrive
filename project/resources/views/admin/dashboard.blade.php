<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset("images/BG.png") }}');
            background-size: cover;
            background-position: center;
        }
        .table-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
        }
        .btn-edit {
            background-color: orange;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
        }
        .btn-delete {
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
        }
        .btn-add {
            background-color: yellow;
            color: black;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }
        .navbar {
            background-color: transparent;
            color: white;
            font-weight: bold;
        }
        .navbar a {
            color: orange;
            text-decoration: none;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">LeaDrive</span>
            <div>
                <a href="{{ route('admin.dashboard') }}">Home</a>
                <a href="{{ route('admin.jadwalKursus') }}">Jadwal Kursus</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="table-container">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Tutor</th>
                        <th>No. Telepon</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Instrukturs as $Instruktur)
                    <tr>
                        <td>{{ $Instruktur->nama }}</td>
                        <td>{{ $Instruktur->no_hp }}</td>
                        <td>{{ $Instruktur->email }}</td>
                        <td>
                            <img src="{{ asset($Instruktur->image_url) }}" alt="{{ $Instruktur->nama }}" style="width: 50px; height: 50px; border-radius: 50%;">
                        </td>
                        <td>
                            <a href="{{ route('admin.editDatabase', ['id' => $Instruktur->id_instruktur]) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('admin.deleteDatabase', ['id' => $Instruktur->id_instruktur]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center mt-3">
                <a href="{{ route('admin.addDatabase') }}" class="btn btn-add">Tambah</a>
            </div>
        </div>
    </div>
</body>
</html>