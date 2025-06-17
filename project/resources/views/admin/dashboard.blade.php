<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
</head>
<body>
    <!-- Background body -->
<body style="background-image: url('{{ asset("images/BG.png") }}');">

<!-- Admin Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LeaDrive Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.jadwal_kursus') }}">Jadwal Kursus</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link" style="color: white; text-decoration: none;">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="mt-4 text-center" style="background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
        <h1 style="color: white; font-weight: bold;">Lead the way, Drive the</h1>
        <h2 style="color: white; font-weight: bold;">Change...</h2>
    </div>
</div>

<div class="container mt-4">
    <div class="mt-4 text-center" style="background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
        <h3 style="color: white; font-weight: bold; margin-top: 50px; margin-bottom: 30px;">Daftar Instruktur</h3>
    </div>
</div>

<div class="container">
    <div style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px;">
        <h1>Kelola Instruktur</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($instructors as $instructor)
                <tr>
                    <td>{{ $instructor->nama }}</td>
                    <td>{{ $instructor->no_hp }}</td>
                    <td>{{ $instructor->email }}</td>
                    <td>{{ $instructor->created_at }}</td>
                    <td>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>