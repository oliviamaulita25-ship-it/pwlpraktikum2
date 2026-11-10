<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Praktikum Web Lanjut</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 22px 13px;
            font-family: Arial, sans-serif;
            background: white;
        }

        .login-container {
            width: 100%;
            max-width: 547px;
            margin: 0 auto;
            padding: 5px 0 8px;
            background: #f2f2f2;
            border-bottom: 5px solid #fce5d8;
        }

        h2 {
            margin: 0 0 12px;
            text-align: center;
            font-size: 14px;
            color: #333;
        }

        .description {
            text-align: center;
            color: #777;
            font-size: 10px;
            margin-bottom: 19px;
        }

        .form-group {
            margin: 0 0 10px;
            padding: 0 1px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 10px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px 6px;
            border: 1px solid #ddd;
            border-radius: 7px;
            background: #f5f5f5;
            font-size: 11px;
        }

        .error {
            color: #f73030;
            font-size: 10px;
            margin: 5px 0 0;
        }

        button {
            width: calc(100% - 2px);
            margin: 0 1px;
            padding: 9px;
            border: none;
            border-radius: 7px;
            background: #fff;
            color: #333;
            font-weight: bold;
            font-size: 12px;
            cursor: pointer;
        }

        button:hover {
            background: #e8e8e8;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>

        <p class="description">
            Silakan masuk untuk mengakses aplikasi.
        </p>

        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>

                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="Masukkan email" required>

                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input type="password" id="password" name="password" placeholder="Masukkan password" required>

                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>
