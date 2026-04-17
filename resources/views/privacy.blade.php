<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Privacy | Sword Showcase Hub</title>
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
    </div>

    <section class="panel">
        <h1>Privacy Policy</h1>
        <p class="meta">Last updated: April 17, 2026</p>

        <h2>1. Information We Store</h2>
        <ul>
            <li>Account details such as name and email.</li>
            <li>Profile content, sword uploads, and discussion posts.</li>
            <li>Order records related to purchases placed through the platform.</li>
        </ul>

        <h2>2. Why We Use It</h2>
        <p>We use data to run the core features: login, profile display, content posting, and purchase records.</p>

        <h2>3. Third-Party Services</h2>
        <p>Payments may be processed through external providers. Their policies may apply to transaction data handled on their side.</p>

        <h2>4. Security and Retention</h2>
        <p>Reasonable technical measures are used to protect user data, and records are retained as needed for platform operations.</p>

        <h2>5. Contact and Requests</h2>
        <p>If you need content removal or account-data help, contact the site owner/admin for support.</p>

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
</body>
</html>
