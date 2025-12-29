<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Klinik Sejahtera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #007a79;
        }

        /* HEADER */
        .header {
            background-color: #007a79;
            height: 280px;
            width: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
            font-weight: 600;
        }

        .header-content {
            display: flex;
            align-items: center;
            z-index: 10;
        }

        .logo-circle {
            background: white;
            color: #007a79;
            border-radius: 50%;
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            font-weight: 900;
            margin-right: 12px;
        }

        /* BOX FORM */
        .register-card {
            background: #007a79;
            text-align: center;
            padding-top: 30px;
            padding-bottom: 80px;
        }

        .register-title {
            color: white;
            font-size: 32px;
            font-weight: bold;
            margin-top: 20px;
        }

        .form-box {
            margin: 20px auto;
            width: 330px;
            padding: 20px 15px;
        }

        .input-wrapper {
            background: white;
            border-radius: 25px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            margin-bottom: 18px;
            height: 45px;
        }

        .input-wrapper i {
            font-size: 18px;
            color: #007a79;
            margin-right: 12px;
        }

        .input-wrapper input {
            border: none;
            width: 100%;
            font-size: 14px;
            outline: none;
            background: transparent;
        }

        /* LOGIN LINK */
        .login-text {
            color: white;
            font-size: 13px;
            margin-top: -7px;
            margin-bottom: 18px;
        }

        .login-text a {
            color: #c9fdfd;
            text-decoration: none;
            font-weight: bold;
        }

        /* BUTTON */
        .register-btn {
            background: white;
            border: none;
            padding: 10px 40px;
            border-radius: 30px;
            font-size: 15px;
            font-weight: bold;
            color: #007a79;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        .register-btn:hover {
            background: #e6e6e6;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <div class="header-content">
            <div class="logo-circle">+</div>
            <span>Klinik Sejahtera</span>
        </div>
    </div>

    <!-- REGISTER FORM -->
    <div class="register-card">

        <div class="register-title">Sign Up</div>

        <div class="form-box">
            <!-- ERROR MESSAGES -->
            @if ($errors->any())
                <div style="background: #ff6b6b; color: white; padding: 12px; border-radius: 10px; margin-bottom: 15px; font-size: 13px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/register" method="POST">
                @csrf

                <div class="input-wrapper" style="border: @error('name') 2px solid #ff6b6b @enderror;">
                    <i class="bi bi-person-circle"></i>
                    <input type="text" name="name" placeholder="nama lengkap" value="{{ old('name') }}" required>
                </div>

                <div class="input-wrapper" style="border: @error('email') 2px solid #ff6b6b @enderror;">
                    <i class="bi bi-envelope"></i>
                    <input type="email" name="email" placeholder="email" value="{{ old('email') }}" required>
                </div>

                <div class="input-wrapper" style="border: @error('password') 2px solid #ff6b6b @enderror;">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" placeholder="password" required>
                </div>

                <div class="input-wrapper" style="border: @error('password') 2px solid #ff6b6b @enderror;">
                    <i class="bi bi-lock-fill"></i>
                    <input type="password" name="password_confirmation" placeholder="konfirmasi password" required>
                </div>

                <p class="login-text">
                    sudah punya akun? <a href="/login">login</a>
                </p>

                <button class="register-btn" type="submit">Sign Up</button>

            </form>
        </div>

    </div>

</body>
</html>
