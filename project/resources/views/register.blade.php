<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LeaDrive</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .left {
            background-color: black;
            color: white;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .left h1 {
            font-size: 3rem;
            color: orange;
        }
        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .form-container {
            width: 80%;
            max-width: 400px;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 25px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <h1>LD LeaDrive</h1>
        </div>
        <div class="right">
            <div class="form-container">
                <h2>Daftar Akun Pengguna</h2>
                <form action="/register" method="POST">
                    @csrf
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                    <button type="submit">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
