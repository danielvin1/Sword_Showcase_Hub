<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sword Showcase Hub</title>

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
            }
            .page {
                max-width: 1100px;
                margin: 0 auto;
                padding: 32px 22px 90px;
            }
            .topbar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
                margin-bottom: 28px;
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
            .hero {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
                gap: 28px;
                align-items: center;
                background: #1b1b1b;
                color: #f5f2ea;
                padding: 28px;
                border-radius: 24px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18);
            }
            .hero h1 {
                font-size: clamp(28px, 4vw, 46px);
                margin: 0 0 12px;
            }
            .hero p {
                margin: 0 0 18px;
                color: #d4cec2;
            }
            .hero-actions {
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
            }
            .btn {
                padding: 12px 18px;
                border-radius: 999px;
                border: 1px solid #d9c7a8;
                background: transparent;
                text-decoration: none;
                color: #f5f2ea;
                font-weight: 600;
            }
            .btn.primary {
                background: #d9a867;
                color: #1b1b1b;
                border-color: #d9a867;
            }
            .hero-media {
                position: relative;
                height: 260px;
                border-radius: 18px;
                overflow: hidden;
                background: radial-gradient(circle at 30% 20%, #ffb45a, transparent 45%),
                            linear-gradient(180deg, #2a1b12 0%, #120f0e 100%);
            }
            .hero-media img {
                position: absolute;
                right: -10px;
                bottom: -20px;
                height: 320px;
                width: auto;
                filter: drop-shadow(0 18px 30px rgba(0, 0, 0, 0.45));
            }
            .section-title {
                margin: 28px 0 12px;
                font-size: 18px;
                font-weight: 700;
            }
            .cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 16px;
            }
            .card {
                background: #ffffff;
                border-radius: 16px;
                border: 1px solid #e0e0e0;
                overflow: hidden;
            }
            .card img {
                width: 100%;
                height: 140px;
                object-fit: cover;
            }
            .card-body {
                padding: 12px;
            }
            .card-body h3 {
                margin: 0 0 6px;
                font-size: 15px;
            }
            .card-body p {
                margin: 0;
                font-size: 13px;
                color: #5f5f5f;
            }
            .tag {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                margin-top: 10px;
                font-size: 12px;
                font-weight: 600;
                color: #7a5a2b;
                background: #f3e6d5;
                border-radius: 999px;
                padding: 4px 8px;
            }
        </style>
    </head>
    <body>
        <main class="page">
            <div class="topbar">
                <div class="brand">Sword Showcase Hub</div>
                <nav class="menu" aria-label="Top navigation">
                    <a href="/welcome">Explore</a>
                    <a href="/feed">Collections</a>
                    <a href="/profile">Profile</a>
                </nav>
            </div>

            <section class="hero">
                <div>
                    <h1>Forge Your Legacy</h1>
                    <p>Discover legendary blades, real craftsmanship, and the stories behind steel.</p>
                    <div class="hero-actions">
                        <a class="btn primary" href="/feed">Explore Blades</a>
                        <a class="btn" href="/login">Login</a>
                    </div>
                </div>
                <div class="hero-media" aria-hidden="true">
                    <img src="/images/sword-hero.webp" alt="">
                </div>
            </section>

            <div class="section-title">Featured Blades</div>
            <section class="cards">
                <article class="card">
                    <img src="/images/katana.jpg" alt="Katana">
                    <div class="card-body">
                        <h3>Water Dragon</h3>
                        <p>Elegant curvature and refined balance.</p>
                        <div class="tag">Katana</div>
                    </div>
                </article>
                <article class="card">
                    <img src="/images/claymore.webp" alt="Claymore">
                    <div class="card-body">
                        <h3>Highland Oath</h3>
                        <p>Broad steel built for powerful strikes.</p>
                        <div class="tag">Claymore</div>
                    </div>
                </article>
                <article class="card">
                    <img src="/images/bastard-longsword.jpg" alt="Bastard longsword">
                    <div class="card-body">
                        <h3>Guild Bastard</h3>
                        <p>Versatile blade for one or two hands.</p>
                        <div class="tag">Bastard Longsword</div>
                    </div>
                </article>
            </section>
        </main>
    </body>
</html>
