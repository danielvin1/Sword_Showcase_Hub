<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Sword Showcase Hub</title>
        <style>
            * {
                box-sizing: border-box;
            }
            body {
                margin: 0;
                font-family: "Nunito", "Trebuchet MS", system-ui, sans-serif;
                color: #111111;
                background-color: #f7f7f5;
                background-image:
                    radial-gradient(circle at 20% 20%, rgba(225, 75, 47, 0.12), transparent 45%),
                    radial-gradient(circle at 80% 10%, rgba(17, 17, 17, 0.08), transparent 50%),
                    repeating-linear-gradient(135deg, rgba(0, 0, 0, 0.04) 0 2px, transparent 2px 10px),
                    radial-gradient(#d7d7d7 1.2px, transparent 1.2px);
                background-size: auto, auto, auto, 18px 18px;
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
    </head>
    <body>
        <div class="panel">
            <h1>Login</h1>
            <p>Enter your details to reach the feed.</p>

            @if (session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif

            <form method="post" action="/login">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
</html>
