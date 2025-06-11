<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pemesanan</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('{{ asset("images/BG.png") }}');
        }
        .card {
            width: 600px; /* Adjust width */
            height: 630px; /* Adjust height */
            margin: 0 auto; /* Center horizontally */
        }
    </style>
</head>
<body>
    @include('partials.navbarPesan') <!-- Include navbar partial -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pesanan</h4>
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Metode Pembayaran</label>
                    <select id="payment_method" name="payment_method" class="form-select" required>
                        <option value="cash">Cash</option>
                        <option value="transfer">Transfer</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a href="/dashboard" class="btn btn-warning">Bayar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>