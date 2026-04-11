<!doctype html>
<html lang="en">
    <head>
    <link rel='icon' type='image/png' sizes='16x16' href='/images/bladeshare-favicon-16.png'>
    <link rel='icon' type='image/png' sizes='32x32' href='/images/bladeshare-favicon-32.png'>
    <link rel='icon' type='image/png' sizes='48x48' href='/images/bladeshare-favicon-48.png'>
    <link rel='icon' type='image/png' sizes='64x64' href='/images/bladeshare-favicon-64.png'>
    <link rel='icon' type='image/png' sizes='128x128' href='/images/bladeshare-favicon-128.png'>
    <link rel='apple-touch-icon' sizes='128x128' href='/images/bladeshare-favicon-128.png'>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Sword Showcase Hub</title>
        <style>
            * {
                box-sizing: border-box;
            }
            body {
                margin: 0;
                font-family: "Poppins", "Trebuchet MS", sans-serif;
                color: #111111;
                background-color: #f2f2f0;
                background-image:
                    radial-gradient(circle at 15% 12%, rgba(120, 120, 120, 0.08), transparent 38%),
                    radial-gradient(circle at 85% 18%, rgba(0, 0, 0, 0.06), transparent 34%),
                    repeating-linear-gradient(135deg, rgba(0, 0, 0, 0.04) 0 1px, transparent 1px 16px),
                    linear-gradient(180deg, #f6f6f4 0%, #efefec 45%, #f2f2f0 100%);
                background-size: auto, auto, 24px 24px, auto;
                min-height: 100vh;
                display: grid;
                place-items: center;
                padding: 24px;
            }
            .panel {
                background: #ffffff;
                width: min(420px, 100%);
                padding: 26px;
                border-radius: 18px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
                text-align: center;
            }
            .topbar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
                margin: 0 auto 22px;
                padding: 14px 18px;
                border: 1px solid #e2e2df;
                border-radius: 14px;
                background: rgba(255, 255, 255, 0.75);
                backdrop-filter: blur(6px);
                width: min(520px, 100%);
            }
            .brand {
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                font-size: 12px;
            }
            .menu {
                display: flex;
                gap: 18px;
                font-size: 14px;
            }
            .menu a {
                color: inherit;
                text-decoration: none;
                opacity: 0.8;
            }
            h1 {
                margin: 0 0 8px;
                font-size: 28px;
            }
            p {
                margin: 0 0 18px;
                color: #6c6c6c;
            }
            form {
                display: grid;
                gap: 12px;
                text-align: left;
            }
            input {
                padding: 12px 14px;
                border-radius: 10px;
                border: 1px solid #d0d0d0;
                font-size: 14px;
            }
            button {
                padding: 12px 16px;
                border-radius: 999px;
                border: none;
                background: #1a1a1a;
                color: #fff;
                font-weight: 700;
                cursor: pointer;
            }
            .error {
                background: #ffe9e6;
                border: 1px solid #ffc8be;
                color: #8a2c1d;
                padding: 10px 12px;
                border-radius: 10px;
                margin-bottom: 12px;
                text-align: left;
            }
        </style>
        <link rel='stylesheet' href='/css/theme.css'>
</head>
    <body>
        <div class="topbar">
            <div class="brand">Sword Showcase Hub</div>
            <nav class="menu" aria-label="Top navigation">
                <a href="/welcome">Explore</a>
                <a href="/feed">Feed</a>
                <a href="/profile">Profile</a>
            </nav>
        </div>

        <div class="panel">
            <h1>Login</h1>
            <p>Enter your details to reach the feed.</p>

            @if (session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif

            <form method="post" action="/login" enctype="multipart/form-data">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="file" name="profile_photo" accept="image/*">
                <button type="submit">Login</button>
                <p style="margin-top: 14px; text-align:center;">

               <a href="/register" style="
    display: block;
    margin-top: 10px;
    padding: 10px;
    background: lightgray;
    color: black;
    text-align: center;
    text-decoration: none;
    border-radius: 20px;
">
    Create Account
</a>
   
            </form>
        </div>
    </body>
</html>









