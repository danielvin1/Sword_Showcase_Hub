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
    <title>Shop | Sword Showcase Hub</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap');

        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            padding: 36px 22px 84px;
            font-family: "Cormorant Garamond", Georgia, serif;
            color: #f3ece2;
            background-color: #090807;
            background-image:
                radial-gradient(circle at 16% 14%, rgba(217,168,103,0.12), transparent 34%),
                radial-gradient(circle at 84% 18%, rgba(0, 0, 0, 0.65), transparent 38%),
                repeating-linear-gradient(135deg, rgba(255,255,255,0.04) 0 1px, transparent 1px 16px),
                linear-gradient(180deg, #0d0c0b 0%, #151311 48%, #090807 100%);
        }
        .shell { max-width: 1220px; margin: 0 auto; }
        .topbar {
            display: flex; align-items: center; justify-content: space-between; gap: 18px;
            margin-bottom: 22px; padding: 14px 18px;
            border: 1px solid rgba(255,255,255,0.1); border-radius: 14px;
            background: rgba(18,16,14,0.84); backdrop-filter: blur(10px);
        }
        .brand { font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; font-size: 12px; color: #f1d8a8; }
        .menu { display: flex; gap: 18px; font-size: 14px; flex-wrap: wrap; row-gap: 8px; }
        .menu a { color: #f3ece2; text-decoration: none; opacity: 0.82; font-weight: 600; }
        .menu a:hover { opacity: 1; }
        .hero {
            display: grid;
            grid-template-columns: minmax(0, 1.3fr) minmax(290px, 0.7fr);
            gap: 18px;
            margin-bottom: 22px;
        }
        .hero-copy,
        .hero-stats,
        .board,
        .info-panel {
            border-radius: 24px;
            border: 1px solid rgba(255,255,255,0.08);
            background: linear-gradient(180deg, rgba(30, 27, 24, 0.96), rgba(17, 15, 13, 0.96));
            box-shadow: 0 18px 36px rgba(0,0,0,0.28);
        }
        .hero-copy {
            padding: 28px;
            background:
                radial-gradient(circle at 20% 18%, rgba(217,168,103,0.18), transparent 30%),
                linear-gradient(180deg, rgba(34, 31, 28, 0.98) 0%, rgba(17, 15, 13, 0.98) 100%);
        }
        .eyebrow {
            display: inline-flex; align-items: center; gap: 8px;
            text-transform: uppercase; letter-spacing: 0.16em; font-size: 11px;
            font-weight: 800; color: #f1d8a8; margin-bottom: 12px;
        }
        .eyebrow::before { content: ''; width: 28px; height: 1px; background: #d9a867; }
        .hero-copy h1 {
            margin: 0;
            font-family: "Cinzel", serif;
            font-size: clamp(30px, 4vw, 48px);
            line-height: 1.02;
            letter-spacing: -0.03em;
            color: #f3ece2;
        }
        .hero-copy p {
            margin: 14px 0 0;
            max-width: 680px;
            color: #b9aa97;
            font-size: 15px;
            line-height: 1.7;
        }
        .hero-actions { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 20px; }
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            min-height: 42px; padding: 10px 16px;
            border-radius: 999px; border: 1px solid rgba(198,162,106,0.4);
            background: transparent; color: #f3ece2; text-decoration: none; font-weight: 700; font-size: 14px;
        }
        .btn.primary { background: #d9a867; border-color: #d9a867; color: #1b130b; }
        .btn:hover { transform: translateY(-1px); }
        .hero-stats { padding: 18px; display: grid; gap: 12px; align-content: start; }
        .stat-card {
            padding: 16px; border-radius: 18px; border: 1px solid rgba(255,255,255,0.08);
            background: linear-gradient(180deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.03) 100%);
        }
        .stat-card strong { display: block; font-size: 28px; line-height: 1.1; color: #f3ece2; margin-bottom: 6px; }
        .stat-card span { color: #b9aa97; font-size: 13px; }
        .board { padding: 24px; }
        .board-head {
            display: flex; align-items: flex-end; justify-content: space-between; gap: 16px;
            margin-bottom: 18px; flex-wrap: wrap;
        }
        .board-head h2 { margin: 0; font-size: 20px; letter-spacing: -0.02em; color: #f3ece2; font-family: "Cinzel", serif; }
        .board-head p { margin: 6px 0 0; color: #b9aa97; max-width: 700px; }
        .order-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 16px;
        }
        .order-card {
            border-radius: 22px;
            border: 1px solid rgba(255,255,255,0.08);
            background: linear-gradient(180deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.03) 100%);
            overflow: hidden;
            box-shadow: 0 12px 24px rgba(0,0,0,0.24);
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }
        .order-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 30px rgba(0,0,0,0.32);
            border-color: rgba(217,168,103,0.8);
        }
        .order-card-inner { padding: 18px; display: grid; gap: 14px; }
        .order-head { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; }
        .order-user { display: flex; align-items: center; gap: 10px; min-width: 0; }
        .avatar {
            width: 44px; height: 44px; border-radius: 50%;
            background: linear-gradient(180deg, #d9a867 0%, #b98142 100%);
            color: #1b130b; font-weight: 800; display: grid; place-items: center;
            flex: 0 0 auto;
        }
        .order-user strong { display: block; color: #f3ece2; font-size: 14px; }
        .order-user span {
            display: block; color: #b9aa97; font-size: 12px;
            overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        }
        .status {
            display: inline-flex; align-items: center; justify-content: center;
            min-height: 28px; padding: 0 10px; border-radius: 999px;
            background: rgba(217,168,103,0.14); color: #f1d8a8; font-size: 11px; font-weight: 800;
            text-transform: uppercase; letter-spacing: 0.08em;
        }
        .order-title { margin: 0; font-size: 18px; color: #f3ece2; letter-spacing: -0.01em; }
        .order-type { margin: 0; color: #b9aa97; font-size: 13px; }
        .order-description { margin: 0; color: #d4c6b4; font-size: 13px; line-height: 1.7; }
        .tag-row { display: flex; gap: 8px; flex-wrap: wrap; }
        .tag, .meta-pill {
            display: inline-flex; align-items: center; gap: 6px;
            border-radius: 999px; padding: 6px 10px;
            font-size: 12px; font-weight: 700;
        }
        .tag { background: rgba(217,168,103,0.14); color: #f1d8a8; }
        .meta-pill { background: rgba(255,255,255,0.04); color: #d4c6b4; border: 1px solid rgba(255,255,255,0.08); }
        .order-meta { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; margin-top: 4px; }
        .meta-item { padding: 10px 12px; border-radius: 16px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); }
        .meta-item small { display: block; color: #b9aa97; font-size: 11px; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.08em; }
        .meta-item strong { color: #f3ece2; font-size: 13px; }
        .board-empty { padding: 20px; border-radius: 18px; border: 1px dashed #d9c7a8; color: #b9aa97; background: rgba(255,255,255,0.03); }
        .info-panel {
            margin-top: 18px;
            padding: 22px;
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(260px, 0.9fr);
            gap: 16px;
            align-items: start;
        }
        .info-panel h3 { margin: 0 0 6px; font-size: 18px; color: #f3ece2; font-family: "Cinzel", serif; }
        .info-panel p { margin: 0; color: #b9aa97; line-height: 1.6; }
        .info-card { padding: 16px; border-radius: 18px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); display: grid; gap: 10px; }
        .info-card .btn { width: fit-content; }
        @media (max-width: 900px) {
            body { padding: 26px 16px 72px; }
            .hero, .info-panel { grid-template-columns: 1fr; }
            .topbar { padding: 12px 14px; }
            .hero-copy, .board, .info-panel { padding: 20px; }
        }
        @media (max-width: 640px) {
            .menu { gap: 12px; font-size: 13px; }
            .board-head h2 { font-size: 18px; }
            .order-meta { grid-template-columns: 1fr; }
            .order-user span { max-width: 180px; }
        }
    </style>
    <script src='/js/theme-mode.js'></script>
    <link rel='stylesheet' href='/css/theme.css'>
</head>
<body>
<div class="shell">
    <div class="topbar">
        <div class="brand">Sword Showcase Hub</div>
        <nav class="menu" aria-label="Top navigation">
            <a href="/welcome">Explore</a>
            <a href="/feed">Feed</a>
            <a href="/shop">Shop</a>
            <a href="/profile">Profile</a>
            <a href="/upload">Upload Sword</a>
        </nav>
    </div>

    <section class="hero">
        <div class="hero-copy">
            <div class="eyebrow">Commission board</div>
            <h1>Live sword orders from the community.</h1>
            <p>
                Browse active requests, compare styles, and see what collectors are asking for right now.
                If you want your own custom blade, place an order from your profile and it will appear here.
            </p>
            <div class="hero-actions">
                <a class="btn primary" href="/profile">Place your own order</a>
                <a class="btn" href="/feed">Browse sword feed</a>
            </div>
        </div>

        <div class="hero-stats">
            <div class="stat-card">
                <strong>{{ $orderCount }}</strong>
                <span>Open requests in the board</span>
            </div>
            <div class="stat-card">
                <strong>{{ data_get($orders->first(), 'sword_type', 'Custom') }}</strong>
                <span>Latest requested style</span>
            </div>
            <div class="stat-card">
                <strong>{{ data_get($orders->first(), 'budget', 'Flexible') }}</strong>
                <span>Typical budget range</span>
            </div>
        </div>
    </section>

    <section class="board">
        <div class="board-head">
            <div>
                <h2>Orders from users</h2>
                <p>Each card is a live commission brief with the details a maker needs to respond professionally.</p>
            </div>
        </div>

        @if ($orders->isEmpty())
            <div class="board-empty">No orders have been posted yet. Place the first commission from your profile to populate the board.</div>
        @else
            <div class="order-grid">
                @foreach ($orders as $order)
                    <article class="order-card">
                        <div class="order-card-inner">
                            <div class="order-head">
                                <a class="order-user" href="{{ $order['user_id'] ? '/user/' . $order['user_id'] : '#' }}" style="text-decoration:none; color:inherit;">
                                    <div class="avatar">{{ strtoupper(substr($order['user'], 0, 1)) }}</div>
                                    <div>
                                        <strong>{{ $order['user'] }}</strong>
                                        <span>{{ $order['handle'] }} · {{ $order['time'] }}</span>
                                    </div>
                                </a>
                                <span class="status">{{ $order['status'] }}</span>
                            </div>

                            <div>
                                <h3 class="order-title">{{ $order['sword_name'] }}</h3>
                                <p class="order-type">{{ $order['sword_type'] }}</p>
                            </div>

                            <p class="order-description">{{ $order['description'] }}</p>

                            <div class="tag-row">
                                <span class="tag">Open commission</span>
                                <span class="meta-pill">Budget {{ $order['budget'] }}</span>
                                <span class="meta-pill">Timeline {{ $order['timeline'] }}</span>
                            </div>

                            <div class="order-meta">
                                <div class="meta-item">
                                    <small>Collector</small>
                                    <strong>{{ $order['user'] }}</strong>
                                </div>
                                <div class="meta-item">
                                    <small>Posted</small>
                                    <strong>{{ $order['time'] }}</strong>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>

    <section class="info-panel">
        <div>
            <div class="eyebrow">Next step</div>
            <h3>Use your profile to place a commission brief.</h3>
            <p>
                The profile page now includes a dedicated commission tab for specifying sword name, type, budget, timeline, and notes.
                It keeps the request flow close to the collector and gives the shop board a steady stream of current commissions.
            </p>
        </div>
        <div class="info-card">
            <h3>Ready to post your own request?</h3>
            <p>Open your profile and submit a new commission in a few fields.</p>
            <a class="btn primary" href="/profile">Open profile</a>
        </div>
    </section>
</div>
</body>
</html>
