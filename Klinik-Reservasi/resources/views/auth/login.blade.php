<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Klinik Sejahtera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #007a79;
        }

        /* BAGIAN ATAS */
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

        /* HAPUS OBJEK PUTIH KIRI */
        .curve-left {
            display: none;
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

        /* BAGIAN LOGIN */
        .login-card {
            background: #007a79;
            text-align: center;
            padding-top: 30px;
            padding-bottom: 80px;
        }

        .login-title {
            color: white;
            font-size: 32px;
            font-weight: bold;
            margin-top: 20px;
        }

        /* KOTAK FORM */
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

        /* SIGNUP */
        .signup-text {
            color: white;
            font-size: 13px;
            margin-top: -7px;
            margin-bottom: 18px;
        }

        .signup-text a {
            color: #c9fdfd;
            text-decoration: none;
            font-weight: bold;
        }

        /* TOMBOL LOGIN */
        .login-btn {
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

        .login-btn:hover {
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

    <!-- LOGIN FORM -->
    <div class="login-card">

        <div class="login-title">Login</div>

        <div class="form-box">
            <form action="/login" method="POST">
                @csrf

                <div class="input-wrapper">
                    <i class="bi bi-person"></i>
                    <input type="email" name="email" placeholder="email" required>
                </div>

                <div class="input-wrapper">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" placeholder="password" required>
                </div>

                <p class="signup-text">
                    belum memiliki akun? <a href="/register">sign up</a>
                </p>

                <button class="login-btn" type="submit">Login</button>

            </form>
        </div>

    </div>

</body>
</html>