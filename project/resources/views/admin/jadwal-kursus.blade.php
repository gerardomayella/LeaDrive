<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kursus</title>
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
            margin-top: 50px;
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
        <div class="table-container">
            <h1 class="text-center">Jadwal Kursus</h1>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>User</th>
                        <th>Tutor</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th>Jam Pengajar</th>
                        <th>Metode Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals as $jadwal)
                    <tr>
                        <td>{{ $jadwal->user ?? 'Unknown' }}</td>
                        <td>{{ $jadwal->nama_instruktur }}</td>
                        <td>{{ $jadwal->tanggal }}</td>
                        <td>{{ $jadwal->harga }}</td>
                        <td>{{ $jadwal->jam_pengajar }}</td>
                        <td>{{ $jadwal->metode_pembayaran }}</td>
                        <td>
                            <form action="{{ route('admin.deleteJadwal', ['id' => $jadwal->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning" onclick="return confirm('Yakin sesi ini sudah selesai?')">Selesai</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center mt-3">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-back">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>
