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
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Move card upward */
            height: 100vh;
            margin: 0;
            padding-top: 380px; /* Add some spacing from the top */
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px); /* Slight upward movement */
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            width: 400px; /* Adjust width */
            height: 160px; /* Adjust height */
            animation: fadeIn 0.8s ease-in-out; /* Apply fade-in animation */
        }
    </style>
</head>
<body>
    <div>
        <div class="card">
            <div class="card-body text-center">
                <h3 class="card-title">Pemesanan Berhasil 
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" style="color: green;" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                    </svg>
                </h3>
                <a>Terimakasih Pemesanan Akan Kami Proses</a>
                <div class="mt-4">
                    <a href="/dashboard" class="btn btn-warning">Selesai</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>