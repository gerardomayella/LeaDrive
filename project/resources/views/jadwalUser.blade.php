<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>LeaDrive | Jadwal Saya!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <!-- Link Font Awesome untuk icon bintang -->

    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('images/BG.png'); 
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
        }

        .table{
            padding: 50px; /* mengatur jarak antara tabel dan tepi layar */
        }

        table {
            width: 100%;
            margin-top: 200px; /* mengatur jarak antara tabel dan navbar */
            border-collapse: collapse;
            background-color: rgba(0, 0, 0, 0.5); /* transparan hitam */
        }

        th, td {
            border: 2px solid white;
            padding: 15px;
            text-align: center;
            font-size: 1.1em;
        }

        th {
            font-weight: bold;
        }

        .btn-selesai {
            background-color: orange;
            border: none;
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: bold;
            cursor: default;
        }

        .btn-selesai:hover {
            background-color: darkorange;
        }
    </style>
    </head>
    <body>

    @include('partials.navbar') <!-- Include navbar partial -->
<!-- Tabel -->
    <div class="tabel">
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Instruktur</th>
                    <th>Metode Pembayaran</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $j) <!-- Menggunakan variabel $jadwal yang berisi data jadwal dan di iterasi menggunakan foreach -->
                    @if ($j->user_id == auth()->id()) <!-- Memastikan hanya menampilkan jadwal yang sesuai dengan user yang sedang login -->
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($j->tanggal)->translatedFormat('d F Y') }}</td>  <!-- Library Carbon untuk format tanggal -->
                        <td><strong>{{ $j->jam_pengajar }}</strong></td>
                        <td>{{ $j->nama_instruktur }}</td>
                        <td>{{ $j->metode_pembayaran }}</td>
                        <td>{{ $j->harga }}</td>
                        <td>
                            <form action="{{ route('jadwalUser.delete', $j->id_jadwal) }}" method="POST" onsubmit="return confirm('Yakin ingin meyudahi sesi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-selesai">Selesai</button>
                            </form>
                        </td>                    
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
<!-- End Tabel -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>