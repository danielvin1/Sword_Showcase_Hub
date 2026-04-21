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
                max-width: 1440px;
                margin: 0 auto;
                padding: 32px 24px 90px;
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
                flex-wrap: wrap;
                row-gap: 8px;
                overflow-x: auto;
                max-width: 100%;
                white-space: nowrap;
                padding-bottom: 2px;
            }
            .menu a {
                color: inherit;
                text-decoration: none;
                opacity: 0.8;
                transition: opacity 0.2s ease, color 0.2s ease;
            }
            .menu a:hover { opacity: 1; }
            .hamburger {
                display: none;
                flex-direction: column;
                background: none;
                border: none;
                cursor: pointer;
                padding: 0;
                width: 20px;
                height: 20px;
                position: absolute;
                right: 18px;
                top: 50%;
                transform: translateY(-50%);
            }
            .hamburger span {
                display: block;
                width: 100%;
                height: 2px;
                background: #111111;
                margin: 2px 0;
                transition: 0.3s;
            }
            .hamburger.open span:nth-child(1) {
                transform: rotate(-45deg) translate(-4px, 4px);
            }
            .hamburger.open span:nth-child(2) {
                opacity: 0;
            }
            .hamburger.open span:nth-child(3) {
                transform: rotate(45deg) translate(-4px, -4px);
            }
            @media (max-width: 768px) {
                .menu {
                    display: none;
                    position: absolute;
                    top: 100%;
                    left: 0;
                    right: 0;
                    background: rgba(255, 255, 255, 0.95);
                    backdrop-filter: blur(6px);
                    border: 1px solid #e2e2df;
                    border-top: none;
                    border-radius: 0 0 14px 14px;
                    flex-direction: column;
                    padding: 18px;
                    gap: 12px;
                    z-index: 99;
                }
                .menu.open {
                    display: flex;
                }
                .hamburger {
                    display: flex;
                }
            }
            .hero {
                display: grid;
                grid-template-columns: minmax(0, 1.1fr) minmax(320px, 0.9fr);
                gap: 28px;
                align-items: center;
                position: relative;
                overflow: hidden;
                background:
                    radial-gradient(circle at 20% 20%, rgba(217, 168, 103, 0.22), transparent 34%),
                    radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.12), transparent 30%),
                    linear-gradient(180deg, #201d1a 0%, #141210 100%);
                color: #f5f2ea;
                padding: 30px;
                border-radius: 28px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18);
                border: 1px solid rgba(255,255,255,0.08);
            }
            .hero h1 {
                font-size: clamp(30px, 4vw, 52px);
                margin: 0 0 12px;
                line-height: 0.98;
            }
            .hero p {
                margin: 0 0 18px;
                color: #d7d0c3;
                max-width: 34rem;
                line-height: 1.6;
            }
            .hero-actions {
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
            }
            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 12px 18px;
                border-radius: 999px;
                border: 2px solid #d9c7a8;
                background: rgba(217, 167, 103, 0.2);
                text-decoration: none;
                color: #f5f2ea;
                font-weight: 600;
                transition: all 0.2s ease;
            }
            .btn:hover {
                background: #d9a867;
                border-color: #d9a867;
            }
            .btn.primary {
                background: #d9a867;
                color: #1b1b1b;
                border-color: #d9a867;
            }
            .btn.primary:hover {
                background: #c49851;
                border-color: #c49851;
            }
            .hero-copy {
                display: grid;
                gap: 14px;
                align-content: center;
            }
            .hero-stats {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                margin-top: 6px;
            }
            .hero-pill {
                padding: 8px 12px;
                border-radius: 999px;
                border: 1px solid rgba(255,255,255,0.12);
                background: rgba(255,255,255,0.06);
                color: #efe7d7;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: 0.02em;
            }
            .hero-media {
                position: relative;
                min-height: 360px;
                border-radius: 22px;
                overflow: hidden;
                background: radial-gradient(circle at 30% 20%, #ffb45a, transparent 45%),
                            linear-gradient(180deg, #2a1b12 0%, #120f0e 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: inset 0 1px 0 rgba(255,255,255,0.06), 0 18px 34px rgba(0, 0, 0, 0.35);
            }
            .hero-media img {
                width: min(100%, 520px);
                height: auto;
                object-fit: contain;
                filter: drop-shadow(0 18px 30px rgba(0, 0, 0, 0.45));
                transform: translateY(6px);
            }
            .section-title {
                margin: 42px 0 18px;
                font-size: 18px;
                font-weight: 700;
                display: flex;
                align-items: center;
                gap: 10px;
            }
            .section-title::after {
                content: "";
                height: 1px;
                flex: 1;
                background: linear-gradient(90deg, rgba(217, 168, 103, 0.6), rgba(217, 168, 103, 0.08));
            }
            .cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                gap: 20px;
            }
            .card {
                position: relative;
                background: #ffffff;
                border-radius: 20px;
                border: 1px solid #e0e0e0;
                overflow: hidden;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
            }
            .card:hover {
                box-shadow: 0 18px 34px rgba(0, 0, 0, 0.14);
                transform: translateY(-4px);
                border-color: rgba(217, 168, 103, 0.55);
            }
            .card img {
                width: 100%;
                height: 240px;
                object-fit: cover;
            }
            .card-body {
                padding: 18px;
            }
            .card-body h3 {
                margin: 0 0 8px;
                font-size: 19px;
                font-weight: 700;
                color: #111111;
            }
            .card-body p {
                margin: 0 0 12px;
                font-size: 14px;
                color: #666666;
                line-height: 1.5;
            }
            .tag {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                margin-top: 12px;
                font-size: 13px;
                font-weight: 600;
                color: #7a5a2b;
                background: #f3e6d5;
                border-radius: 999px;
                padding: 6px 12px;
            }
            .featured-badge {
                position: absolute;
                top: 14px;
                left: 14px;
                padding: 6px 10px;
                border-radius: 999px;
                background: rgba(25, 22, 19, 0.84);
                color: #f2eadf;
                font-size: 11px;
                font-weight: 700;
                letter-spacing: 0.06em;
                text-transform: uppercase;
                backdrop-filter: blur(8px);
            }
            .site-footer {
                margin-top: 30px;
                padding-top: 16px;
                border-top: 1px solid #ded8ce;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 10px;
                flex-wrap: wrap;
                color: #6f6a62;
                font-size: 13px;
            }
            .site-footer a {
                text-decoration: none;
                color: inherit;
                opacity: 0.9;
            }
            .site-footer a:hover { opacity: 1; }
            @media (max-width: 960px) {
                .hero {
                    grid-template-columns: 1fr;
                    padding: 24px;
                }
                .hero-media {
                    min-height: 280px;
                    order: -1;
                }
            }
            @media (max-width: 640px) {
                .page {
                    padding: 20px 16px 70px;
                }
                .topbar {
                    align-items: flex-start;
                }
                .menu {
                    gap: 12px;
                    row-gap: 8px;
                }
                .hero {
                    padding: 18px;
                    border-radius: 22px;
                }
                .hero h1 {
                    font-size: 30px;
                }
                .hero-media {
                    min-height: 240px;
                }
                .section-title {
                    margin-top: 34px;
                    font-size: 17px;
                }
                .cards {
                    grid-template-columns: 1fr;
                    gap: 16px;
                }
                .card img {
                    height: 200px;
                }
            }
            .theme-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
                background: none;
                border: none;
                cursor: pointer;
                padding: 8px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(6px);
                transition: background 0.2s ease;
            }
            .theme-toggle:hover {
                background: rgba(255, 255, 255, 0.2);
            }
            .theme-toggle svg {
                width: 20px;
                height: 20px;
                fill: #111111;
            }
            .theme-switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
                cursor: pointer;
                border-radius: 999px;
                overflow: hidden;
            }
            .theme-switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }
            .slider {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                transition: .4s;
                border-radius: 34px;
            }
            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                transition: .4s;
                border-radius: 50%;
            }
            input:checked + .slider {
                background-color: #2196F3;
            }
            input:checked + .slider:before {
                transform: translateX(26px);
            }
            .slider-text {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                font-size: 12px;
                font-weight: bold;
                color: #1b1b1b;
                pointer-events: none;
                transition: opacity 0.4s;
            }
            .slider-text.light {
                right: 8px;
                opacity: 0;
            }
            .slider-text.dark {
                left: 8px;
                opacity: 1;
            }
            input:checked + .slider .slider-text.light {
                opacity: 1;
            }
            input:checked + .slider .slider-text.dark {
                opacity: 0;
            }
        </style>
        <script src='/js/theme-mode.js'></script>
        <link rel='stylesheet' href='/css/theme.css'>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const themeToggle = document.getElementById('theme-toggle');
                const currentTheme = localStorage.getItem('profileTheme') || 'dark';
                themeToggle.checked = currentTheme === 'light';
                themeToggle.addEventListener('change', function() {
                    const newTheme = themeToggle.checked ? 'light' : 'dark';
                    localStorage.setItem('profileTheme', newTheme);
                    document.body.classList.toggle('light-mode', newTheme === 'light');
                    document.body.classList.toggle('theme-dark', newTheme === 'dark');
                });
            });
        </script>
</head>
    <body>
        <main class="page">
            @include('partials.navbar')

            <section class="hero">
                <div class="hero-copy">
                    <h1>Forge Your Legacy</h1>
                    <p>Discover legendary blades, real craftsmanship, and the stories behind steel.</p>
                    <div class="hero-stats" aria-hidden="true">
                        <span class="hero-pill">Curated blades</span>
                        <span class="hero-pill">Community showcase</span>
                        <span class="hero-pill">Fresh uploads</span>
                    </div>
                    <div class="hero-actions">
                        <a class="btn primary" href="/feed">Explore Blades</a>
                        <a class="btn" href="/login">Login</a>
                        <label class="theme-switch">
                            <input type="checkbox" id="theme-toggle">
                            <span class="slider">
                                <span class="slider-text light">Light</span>
                                <span class="slider-text dark">Dark</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="hero-media" aria-hidden="true">
                    <img src="/images/ezgif.com-gif-maker-4.webp" alt="Sword showcase animation">
                </div>
            </section>

            <div class="section-title">Featured Blades</div>
            <section class="cards">
                <article class="card">
                    <span class="featured-badge">Featured</span>
                    <img src="/images/katana.jpg" alt="Katana">
                    <div class="card-body">
                        <h3>Water Dragon</h3>
                        <p>Elegant curvature and refined balance.</p>
                        <div class="tag">Katana</div>
                    </div>
                </article>
                <article class="card">
                    <span class="featured-badge">Featured</span>
                    <img src="/images/claymore.webp" alt="Claymore">
                    <div class="card-body">
                        <h3>Highland Oath</h3>
                        <p>Broad steel built for powerful strikes.</p>
                        <div class="tag">Claymore</div>
                    </div>
                </article>
                <article class="card">
                    <span class="featured-badge">Featured</span>
                    <img src="/images/bastard-longsword.jpg" alt="Bastard longsword">
                    <div class="card-body">
                        <h3>Guild Bastard</h3>
                        <p>Versatile blade for one or two hands.</p>
                        <div class="tag">Bastard Longsword</div>
                    </div>
                </article>
            </section>

            <footer class="site-footer" aria-label="Site footer">
                <span>© {{ date('Y') }} Sword Showcase Hub</span>
                <span>
                    <a href="/privacy">Privacy</a>
                    ·
                    <a href="/terms">Terms</a>
                </span>
            </footer>
        </main>
    </body>
</html>









