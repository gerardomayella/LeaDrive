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
    <!-- Background body -->

    @include('partials.navbar') <!-- Include navbar partial -->

    <!-- Tabel -->
    <div class="tabel">
        <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Instruktur</th>
                <th>Jenis Mobil</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>27 Mei 2025</td>
                <td><strong>09.00</strong></td>
                <td><strong>12.00</strong></td>
                <td>Mas Irgi</td>
                <td>Manual</td>
                <td>Alun-Alun Lor</td>
                <td><button class="btn-selesai">selesai</button></td>
            </tr>
        </tbody>
    </table>
    </div>
    <!-- End Tabel -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html> 