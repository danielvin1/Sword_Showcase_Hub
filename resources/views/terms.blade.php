<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terms | Sword Showcase Hub</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Poppins", "Trebuchet MS", sans-serif;
            color: #141414;
            background:
                radial-gradient(circle at 14% 12%, rgba(217,168,103,0.16), transparent 36%),
                linear-gradient(180deg, #f6f4f0 0%, #efebe4 100%);
            padding: 26px 16px 50px;
        }
        .shell { max-width: 920px; margin: 0 auto; }
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 12px 14px;
            border: 1px solid #ded8ce;
            border-radius: 14px;
            background: rgba(255,255,255,0.72);
            backdrop-filter: blur(6px);
            margin-bottom: 18px;
        }
        .brand { font-weight: 700; font-size: 12px; letter-spacing: 0.09em; text-transform: uppercase; }
        .menu {
            display: flex;
            gap: 14px;
            font-size: 14px;
            overflow-x: auto;
            white-space: nowrap;
            max-width: 100%;
            padding-bottom: 2px;
        }
        .menu a { color: inherit; text-decoration: none; opacity: 0.82; }
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
                border: 1px solid #ded8ce;
                border-top: none;
                border-radius: 0 0 14px 14px;
                flex-direction: column;
                padding: 18px;
                gap: 12px;                z-index: 99;            }
            .menu.open {
                display: flex;
            }
            .hamburger {
                display: flex;
            }
        }
        .panel {
            border: 1px solid #e5dfd4;
            border-radius: 20px;
            background: #ffffff;
            padding: 22px;
            box-shadow: 0 18px 34px rgba(0,0,0,0.08);
        }
        h1 { margin: 0 0 8px; font-size: clamp(26px, 4vw, 40px); }
        .meta { margin: 0 0 18px; color: #6f6a62; font-size: 14px; }
        h2 { margin: 20px 0 8px; font-size: 18px; }
        p, li { line-height: 1.7; color: #3a3530; }
        ul { margin: 0; padding-left: 20px; }
        .footer {
            margin-top: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            color: #6f6a62;
            font-size: 13px;
        }
        .footer a { color: inherit; text-decoration: none; }
    </style>
    <style>
        .topbar { position: relative; }
        .menu { display: flex; gap: 18px; font-size: 14px; flex-wrap: nowrap; overflow-x: auto; max-width: 100%; white-space: nowrap; padding-bottom: 2px; }
        .menu a { color: inherit; text-decoration: none; opacity: 0.8; }
        .menu a:hover { opacity: 1; }
        .hamburger { display: none; flex-direction: column; background: none; border: none; cursor: pointer; padding: 0; width: 20px; height: 20px; position: absolute; right: 18px; top: 50%; transform: translateY(-50%); }
        .hamburger span { display: block; width: 100%; height: 2px; background: #111111; margin: 2px 0; transition: 0.3s; }
        .hamburger.open span:nth-child(1) { transform: rotate(-45deg) translate(-4px, 4px); }
        .hamburger.open span:nth-child(2) { opacity: 0; }
        .hamburger.open span:nth-child(3) { transform: rotate(45deg) translate(-4px, -4px); }
        @media (max-width: 768px) {
            .menu { display: none; position: absolute; top: 100%; left: 0; right: 0; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(6px); border: 1px solid #e2e2df; border-top: none; border-radius: 0 0 14px 14px; flex-direction: column; padding: 18px; gap: 12px; z-index: 99; }
            .menu.open { display: flex; }
            .hamburger { display: flex; }
        }
    </style>
</head>
<body>
<div class="shell">
    <div class="topbar">
        <div class="brand">Sword Showcase Hub</div>
        <nav class="menu" aria-label="Top navigation">
            <a href="/welcome">Explore</a>
            <a href="/feed">Feed</a>
            <a href="/shop">Shop</a>
            <a href="/discussions">Discussions</a>
            <a href="/profile">Profile</a>
        </nav>
        <button class="hamburger" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <section class="panel">
        <h1>Terms of Use</h1>
        <p class="meta">Last updated: April 17, 2026</p>

        <h2>1. Platform Scope</h2>
        <p>Sword Showcase Hub is a community platform for showcasing swords, discussing craftsmanship, and placing requests. Listings and posts are user-generated content.</p>

        <h2>2. User Conduct</h2>
        <ul>
            <li>Do not upload illegal, stolen, or misleading content.</li>
            <li>Do not impersonate other makers or collectors.</li>
            <li>Keep communication respectful in comments, posts, and profile content.</li>
        </ul>

        <h2>3. Marketplace and Payments</h2>
        <p>Checkout and payment processing may use third-party providers. You are responsible for verifying item details before purchase.</p>

        <h2>4. Content Ownership</h2>
        <p>You keep ownership of your uploaded content, but grant the platform permission to display it inside the service.</p>

        <h2>5. Service Changes</h2>
        <p>Features, layouts, and policies may change over time to improve platform quality, safety, and reliability.</p>

        <div class="footer">
            <span>© {{ date('Y') }} Sword Showcase Hub</span>
            <span>
                <a href="/privacy">Privacy</a>
                ·
                <a href="/terms">Terms</a>
            </span>
        </div>
    </section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.querySelector('.hamburger');
        const menu = document.querySelector('.menu');

        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('open');
            menu.classList.toggle('open');
        });
    });
</script>
</body>
</html>
