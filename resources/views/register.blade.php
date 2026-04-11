<!doctype html>
<html lang="en">
<head>
    <link rel=""icon"" type=""image/png"" sizes=""16x16"" href=""/images/bladeshare-favicon-16.png"">
    <link rel=""icon"" type=""image/png"" sizes=""32x32"" href=""/images/bladeshare-favicon-32.png"">
    <link rel=""icon"" type=""image/png"" sizes=""48x48"" href=""/images/bladeshare-favicon-48.png"">
    <link rel=""icon"" type=""image/png"" sizes=""64x64"" href=""/images/bladeshare-favicon-64.png"">
    <link rel=""icon"" type=""image/png"" sizes=""128x128"" href=""/images/bladeshare-favicon-128.png"">
    <link rel=""apple-touch-icon"" sizes=""128x128"" href=""/images/bladeshare-favicon-128.png""><meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Sword Showcase Hub</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Poppins", "Trebuchet MS", sans-serif;
            background-color: #f2f2f0;
            display: grid;
            place-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .panel {
            background: white;
            width: min(400px, 100%);
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            margin-bottom: 10px;
            font-size: 26px;
        }
        p {
            color: #555;
            margin-bottom: 20px;
        }
        form {
            display: grid;
            gap: 12px;
            text-align: left;
        }
        input {
            padding: 10px 12px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
            width: 100%;
        }
        button {
            padding: 12px 0;
            border-radius: 999px;
            border: none;
            background: black;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }
        .error {
            background: #ffe6e6;
            border: 1px solid #ffb3b3;
            color: #8a2c2c;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 12px;
        }
        .login-link {
            margin-top: 12px;
            text-align: center;
        }
        .login-link a {
            text-decoration: none;
            color: black;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="panel">
    <h1>Register</h1>
    <p>Create your account to showcase your swords.</p>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/register" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="file" name="profile_photo">
        <button type="submit">Register</button>
    </form>

    <div class="login-link">
        Already have an account? <a href="/login">Login</a>
    </div>
</div>

</body>
</html>

