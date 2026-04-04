<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile | Sword Showcase Hub</title>
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
                padding: 40px 22px 90px;
            }
            .shell {
                max-width: 560px;
                margin: 0 auto;
            }
            .card {
                background: #ffffff;
                border-radius: 18px;
                padding: 24px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
                color: #6c6c6c;
            }
            .nav {
                position: fixed;
                bottom: 18px;
                left: 50%;
                transform: translateX(-50%);
                width: min(520px, calc(100% - 40px));
                background: #fff;
                border-radius: 999px;
                padding: 10px 16px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
                font-weight: 700;
                z-index: 999;
            }
            .nav .pill {
                background: #1a1a1a;
                color: #fff;
                padding: 10px 16px;
                border-radius: 999px;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }
            .nav a {
                text-decoration: none;
                color: inherit;
            }
        </style>
    </head>
    <body>
        <div class="shell">
            <div class="card">Profile page placeholder.</div>
        </div>

        <nav class="nav" aria-label="Primary">
            <a href="/welcome">⌂</a>
            <a href="/feed">Feed</a>
            <span class="pill" aria-current="page">Profile</span>
        </nav>
    </body>
</html>
