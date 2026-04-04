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
            .topbar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
                margin-bottom: 22px;
                padding: 14px 18px;
                border: 1px solid #e2e2df;
                border-radius: 14px;
                background: rgba(255, 255, 255, 0.75);
                backdrop-filter: blur(6px);
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
        </style>
    </head>
    <body>
        <div class="shell">
            <div class="topbar">
                <div class="brand">Sword Showcase Hub</div>
                <nav class="menu" aria-label="Top navigation">
                    <a href="/welcome">Explore</a>
                    <a href="/feed">Collections</a>
                    <a href="/profile">Profile</a>
                </nav>
            </div>
            <div class="card">Profile page placeholder.</div>
        </div>
    </body>
</html>
