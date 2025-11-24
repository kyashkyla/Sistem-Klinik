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
            height: 250px;
            width: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: start;
            padding-left: 60px;
            color: white;
            font-size: 32px;
            font-weight: 600;
        }

        .header .curve {
            position: absolute;
            left: 0;
            top: 0;
            width: 180px;
            height: 100%;
            background: white;
            border-bottom-right-radius: 100px;
            border-top-right-radius: 100px;
        }

        .header .logo {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header .logo-circle {
            background: white;
            color: #007a79;
            border-radius: 50%;
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: bold;
        }

        /* KOTAK LOGIN */
        .login-section {
            width: 100%;
            margin-top: -40px;
            background-color: #007a79;
            text-align: center;
            padding-top: 50px;
        }

        .login-section h2 {
            color: white;
            font-size: 30px;
            font-weight: bold;
        }

        .login-box {
            margin: 25px auto;
            width: 310px;
        }

        .input-group {
            background: white;
            border-radius: 30px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .input-group i {
            font-size: 20px;
            color: #007a79;
            margin-right: 12px;
        }

        .input-group input {
            border: none;
            width: 100%;
            font-size: 14px;
            outline: none;
            background: transparent;
        }

        .signup-text {
            color: white;
            font-size: 13px;
            margin-top: -10px;
            margin-bottom: 15px;
        }

        .signup-text a {
            color: #d3fdfb;
            text-decoration: none;
            font-weight: bold;
        }

        .login-btn {
            background: white;
            border: none;
            padding: 10px 40px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            color: #007a79;
            cursor: pointer;
        }

        .login-btn:hover {
            background: #e8e8e8;
        }
    </style>
</head>

<body>

    <!-- BAGIAN ATAS -->
    <div class="header">
        <div class="curve"></div>
        <div class="logo">
            <div class="logo-circle">+</div>
            Klinik Sejahtera
        </div>
    </div>

    <!-- FORM LOGIN -->
    <div class="login-section">
        <h2>Login</h2>

        <div class="login-box">
            <form action="/login" method="POST">
                @csrf

                <div class="input-group">
                    <i class="bi bi-person"></i>
                    <input type="text" name="email" placeholder="username" required>
                </div>

                <div class="input-group">
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