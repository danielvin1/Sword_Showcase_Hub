<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feed | Sword Showcase Hub</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Plus Jakarta Sans", "Poppins", "Trebuchet MS", sans-serif;
            color: #111111;
            background-color: #f2f2f0;
            background-image:
                radial-gradient(circle at 15% 12%, rgba(120, 120, 120, 0.08), transparent 38%),
                radial-gradient(circle at 85% 18%, rgba(0, 0, 0, 0.06), transparent 34%),
                repeating-linear-gradient(135deg, rgba(0, 0, 0, 0.04) 0 1px, transparent 1px 16px),
                linear-gradient(180deg, #f6f6f4 0%, #efefec 45%, #f2f2f0 100%);
            background-size: auto, auto, 24px 24px, auto;
            min-height: 100vh;
            padding: 40px 22px 80px;
        }
        .shell { max-width: 1180px; margin: 0 auto; }
        .topbar {
            display: flex; align-items: center; justify-content: space-between;
            gap: 20px; margin-bottom: 24px; padding: 14px 18px;
            border: 1px solid #e2e2df; border-radius: 14px;
            background: rgba(255,255,255,0.75); backdrop-filter: blur(6px);
        }
        .brand { font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; font-size: 12px; color: #2c2218; }
        .menu { display: flex; gap: 18px; font-size: 14px; }
        .menu a { color: inherit; text-decoration: none; opacity: 0.8; font-weight: 600; }

        .feed-header {
            display: flex; align-items: flex-end; justify-content: space-between; gap: 20px; flex-wrap: wrap;
            margin-bottom: 18px;
        }
        .feed-title h1 { margin: 0; font-size: 34px; font-family: "Playfair Display", "Times New Roman", serif; }
        .feed-title p { margin: 6px 0 0; color: #6c6c6c; }
        .feed-actions { display: flex; gap: 10px; flex-wrap: wrap; }
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 10px 16px; border-radius: 999px; border: 1px solid #d9c7a8;
            background: transparent; color: #111111; text-decoration: none; font-weight: 600;
        }
        .btn.primary { background: #d9a867; border-color: #d9a867; }

        .section {
            background: #ffffff; border-radius: 18px; padding: 18px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08); margin-bottom: 18px;
            border: 1px solid #e7e1d7;
        }
        .section h2 { margin: 0 0 12px; font-size: 18px; }
        .empty {
            background: #ffffff; border-radius: 18px; padding: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08); color: #6c6c6c;
        }

        .feed-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 14px;
        }
        .fyp-grid {
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        }
        .feed-list { display: grid; gap: 12px; }
        .post-row {
            display: grid;
            grid-template-columns: 96px 1fr;
            gap: 12px;
            align-items: flex-start;
            max-width: 520px;
        }
        .post-card {
            background: #ffffff; border-radius: 16px;
            border: 1px solid #e0e0e0; overflow: hidden; display: flex; flex-direction: column;
        }
        .post-media {
            width: 100%; aspect-ratio: 1 / 1; background: #f3eee5; display: flex; align-items: center; justify-content: center;
        }
        .post-media.small { aspect-ratio: 1 / 1; }
        .post-media img { width: 100%; height: 100%; object-fit: cover; object-position: center; }
        .post-body { padding: 8px 10px 10px; text-align: left; }
        .post-user {
            display: flex; align-items: center; gap: 10px; margin-bottom: 8px;
        }
        .avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: linear-gradient(180deg, #d9a867 0%, #b98142 100%);
            color: #1b130b; font-weight: 700; display: grid; place-items: center;
        }
        .user-meta { font-size: 13px; color: #6c6c6c; }
        .user-meta strong { display: block; font-size: 14px; color: #111111; }
        .post-title { margin: 0 0 6px; font-size: 13px; }
        .post-caption { margin: 0; font-size: 12px; color: #5f5f5f; }
        .tag {
            display: inline-flex; align-items: center; gap: 6px;
            margin-top: 10px; font-size: 12px; font-weight: 600;
            color: #7a5a2b; background: #f3e6d5;
            border-radius: 999px; padding: 4px 8px;
        }
        .post-footer {
            margin-top: 12px; display: flex; align-items: center; justify-content: space-between;
            font-size: 12px; color: #8a8074;
        }

        @media (max-width: 900px) {
            .feed-grid { grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); }
            .fyp-grid { grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); }
            .post-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="shell">
    <div class="topbar">
        <div class="brand">Sword Showcase Hub</div>
        <nav class="menu">
            <a href="/welcome">Explore</a>
            <a href="/feed">Feed</a>
            <a href="/profile">Profile</a>
            <a href="/upload">Upload Sword</a>
        </nav>
    </div>

    <div class="feed-header">
        <div class="feed-title">
            <h1>Feed</h1>
            <p>Latest uploads from the community.</p>
        </div>
        <div class="feed-actions">
            <a class="btn primary" href="/upload">Upload Sword</a>
        </div>
    </div>

    @php
        $dir = public_path('swords');
        $files = [];
        if (is_dir($dir)) {
            $files = array_values(array_filter(scandir($dir), function ($file) {
                return preg_match('/\.(jpg|jpeg|png|webp|gif)$/i', $file);
            }));
        }
        $names = ['Avery Cole','Mila Hart','Ronan Vale','Zara Quinn','Theo Marsh','Lena Park','Omar Finch'];
        $handles = ['@averycole','@milahart','@ronanvale','@zaraquinn','@theomarsh','@lenapark','@omarfinch'];
        $types = ['Longsword','Rapier','Katana','Saber','Greatsword','Shortsword','Falchion'];
        $folderPosts = [];
        foreach ($files as $i => $file) {
            $folderPosts[] = [
                'user' => $names[$i % count($names)],
                'handle' => $handles[$i % count($handles)],
                'title' => str_replace(['-', '_'], ' ', pathinfo($file, PATHINFO_FILENAME)),
                'type' => $types[$i % count($types)],
                'caption' => 'Community showcase from the workshop wall.',
                'image' => '/swords/' . $file,
                'time' => ($i + 1) . 'd',
            ];
        }
        $fypItems = [];
        foreach ($swords as $sword) {
            $fypItems[] = [
                'user' => $sword->name,
                'handle' => '@upload',
                'title' => $sword->name,
                'type' => $sword->type,
                'caption' => $sword->description ?: 'No description added yet.',
                'image' => $sword->image ? asset('storage/' . $sword->image) : '/images/katana.jpg',
                'time' => $sword->created_at?->diffForHumans() ?? 'Just now',
            ];
        }
        $fypItems = array_merge($fypItems, $folderPosts);
    @endphp

    <section class="section">
        <h2>For You</h2>
        @if (empty($fypItems))
            <div class="empty">This feed is empty for now.</div>
        @else
            <div class="feed-grid fyp-grid">
                @foreach ($fypItems as $item)
                    <article class="post-card">
                        <div class="post-media">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                        </div>
                        <div class="post-body">
                            <div class="post-user">
                                <div class="avatar">{{ strtoupper(substr($item['user'], 0, 1)) }}</div>
                                <div class="user-meta">
                                    <strong>{{ $item['user'] }}</strong>
                                    {{ $item['handle'] }} · {{ $item['time'] }}
                                </div>
                            </div>
                            <h3 class="post-title">{{ $item['title'] }}</h3>
                            <p class="post-caption">{{ $item['caption'] }}</p>
                            <div class="tag">{{ $item['type'] }}</div>
                            <div class="post-footer">
                                <span>Community</span>
                                <span>Details</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
</div>
</body>
</html>
