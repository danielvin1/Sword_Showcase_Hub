<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sword Showcase Hub</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            }
            .page {
                max-width: 560px;
                margin: 0 auto;
                padding: 40px 22px 90px;
                text-align: center;
            }
            h1 {
                margin: 8px 0 12px;
                font-size: 34px;
                font-weight: 800;
            }
            h1 em {
                font-style: normal;
                border-bottom: 4px solid #e14b2f;
            }
            .lead {
                margin: 0 auto 20px;
                color: #6c6c6c;
                font-size: 18px;
                max-width: 360px;
            }
            .actions {
                display: flex;
                gap: 12px;
                justify-content: center;
                margin: 18px 0 28px;
            }
            .btn {
                padding: 12px 20px;
                border-radius: 999px;
                border: 1.5px solid #111111;
                background: #fff;
                text-decoration: none;
                color: #111111;
                font-weight: 700;
                min-width: 130px;
            }
            .btn.primary {
                background: #1a1a1a;
                color: #fff;
                border-color: #1a1a1a;
            }
            .hero-blade {
                width: 240px;
                margin: 0 auto 10px;
                filter: drop-shadow(0 18px 36px rgba(0, 0, 0, 0.25));
                position: relative;
                z-index: 1;
            }
            .hero-blade img {
                width: 100%;
                height: auto;
                display: block;
            }
            .card {
                background: #4b4b4b;
                color: #fff;
                padding: 18px;
                border-radius: 26px;
                margin: -50px auto 0;
                max-width: 320px;
                text-align: left;
                box-shadow: 0 0 0 4px rgba(110, 231, 255, 0.55);
                position: relative;
                z-index: 2;
                padding-top: 18px;
            }
            .card .image {
                background: #fff;
                border-radius: 16px;
                padding: 16px;
                margin-bottom: 14px;
                text-align: center;
            }
            .card img {
                width: 100%;
                height: auto;
                display: block;
                border-radius: 12px;
            }
            .card-title {
                font-size: 18px;
                margin: 0 0 8px;
            }
            .card-meta {
                display: flex;
                gap: 10px;
                align-items: center;
                font-size: 14px;
                color: #d9d9d9;
            }
            .chip {
                background: #fff;
                color: #111;
                border-radius: 999px;
                padding: 6px 10px;
                font-weight: 700;
                font-size: 12px;
            }
            .cta-bottom {
                margin: 42px 0 18px;
                font-size: 26px;
                font-weight: 700;
            }
            .cta-bottom em {
                font-style: normal;
                border-bottom: 4px solid #e14b2f;
            }
            .footer-btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: #1a1a1a;
                color: #fff;
                padding: 12px 28px;
                border-radius: 999px;
                text-decoration: none;
                font-weight: 700;
                box-shadow: 0 12px 28px rgba(0, 0, 0, 0.18);
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
        <main class="page">
            <h1>Fan of <em>blades</em>?</h1>
            <p class="lead">We made this platform for swordsmiths, collectors, and lore hunters.</p>

            <div class="actions">
                <a class="btn" href="/welcome">Discover</a>
                <a class="btn primary" href="/login">Login</a>
            </div>

            <div class="hero-blade" aria-hidden="true">
                <img src="/images/sword-hero.webp" alt="Ornate sword hero">
            </div>

            <section class="card">
                <div class="image">
                    <img src="/images/sword-card.jpg" alt="Featured sword">
                </div>
                <h2 class="card-title">Anduril</h2>
                <div class="card-meta">
                    <span class="chip">Longsword</span>
                    <span>by A. Steel</span>
                </div>
            </section>

            <div class="cta-bottom">Got your <em>own sword</em>?</div>
            <a class="footer-btn" href="/login">Showcase it</a>
        </main>

        <nav class="nav" aria-label="Primary">
            <span class="pill" aria-current="page">⌂</span>
            <a href="/feed">Feed</a>
            <a href="/profile">Profile</a>
        </nav>
    </body>
</html>
