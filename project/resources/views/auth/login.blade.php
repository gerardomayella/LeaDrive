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
        .form-container input[type="checkbox"] {
            width: auto;
            margin: 10px 0;
        }
        .form-container label {
            display: block;
            margin: 10px 0;
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
        .flex-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            width: 100%;
        }
        .flex-container a {
            color: #0066cc;
            font-size: 14px;
            padding: 5px;
            text-decoration: none;
        }
        .flex-container a:hover {
            text-decoration: underline;
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
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <div style="margin: 10px 0;">
                        <label for="remember_me" style="color: #666;">
                            <input id="remember_me" type="checkbox" name="remember">
                            Remember me
                        </label>
                    </div>

                    <button type="submit">Login</button>
                </form>
                <div class="flex-container">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    @endif
                    <a href="{{ route('register') }}">Register</a>
                </div>
                <button onclick="window.location.href='{{ route('admin.login.view') }}'">Login sebagai admin</button>
            </div>
        </div>
    </div>
</body>
</html>
