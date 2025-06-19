<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LeaDrive</title>
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
            border-radius: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #333;
        }
        .form-container a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: blue;
            text-decoration: none;
        }
        .form-container a:hover {
            text-decoration: underline;
        }
        .remember-me {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin: 10px 0 20px;
            gap: 0.85rem; 
        }

        .remember-me input[type="checkbox"] {
            order: 10;
            margin: 0; 
            padding: 0;
        }

        .remember-me label {
            font-size: 0.85rem;
            color: #333;
            order: 1; 
            white-space: nowrap; 
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <img src="{{ asset('images/LeaDrive_noBackground.png') }}" alt="LeaDrive Logo" style="max-width: 200px; max-height: 200px;">
            <h1>LeaDrive</h1>
        </div>
        <div class="right">
            <div class="form-container">
                <h2>LOGIN</h2>
                @if ($errors->has('login'))
                    <div style="color: red; margin-bottom: 10px;">
                        {{ $errors->first('login') }}
                    </div>
                @endif
                <form action="/login" method="POST">
                    @csrf
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <div class="remember-me">
                         <input type="checkbox" id="remember" name="remember">
                         <label for="remember">Remember Me</label>
                    </div>
                    <button type="submit">Login</button>
                </form>
                <a href="/register">Belum punya akun? Register Akun</a>
            </div>
        </div>
    </div>
</body>
</html>
