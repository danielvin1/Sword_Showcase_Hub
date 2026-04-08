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
            background-color: #f4f3f0;
            background-image:
                radial-gradient(circle, rgba(0,0,0,0.08) 1px, transparent 1px),
                linear-gradient(180deg, #f8f7f4 0%, #efefec 45%, #f2f2f0 100%);
            background-size: 22px 22px, auto;
            min-height: 100vh;
            padding: 36px 22px 80px;
        }
        .shell { max-width: 980px; margin: 0 auto; }
        .topbar {
            display: flex; align-items: center; justify-content: space-between;
            gap: 20px; margin-bottom: 22px; padding: 14px 18px;
            border: 1px solid #e2e2df; border-radius: 14px;
            background: rgba(255,255,255,0.75); backdrop-filter: blur(6px);
        }
        .brand { font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; font-size: 12px; color: #2c2218; }
        .menu { display: flex; gap: 18px; font-size: 14px; }
        .menu a { color: inherit; text-decoration: none; opacity: 0.8; font-weight: 600; }

        .feed-header {
            display: flex; align-items: center; justify-content: space-between;
            gap: 20px; flex-wrap: wrap; margin-bottom: 18px;
        }
        .feed-title h1 { margin: 0; font-size: 28px; font-family: "Playfair Display", "Times New Roman", serif; }
        .feed-title p { margin: 6px 0 0; color: #6c6c6c; }
        .feed-actions { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
        .search {
            display: flex; align-items: center; gap: 10px;
            border: 1px solid #e1d9ce; border-radius: 999px; padding: 8px 14px;
            background: #ffffff; min-width: 220px;
        }
        .search input { border: none; outline: none; width: 100%; font-size: 14px; background: transparent; }
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 10px 16px; border-radius: 999px; border: 1px solid #d9c7a8;
            background: transparent; color: #111111; text-decoration: none; font-weight: 600;
        }
        .btn.primary { background: #d9a867; border-color: #d9a867; }

        .section { background: transparent; }
        .section h2 { margin: 0 0 12px; font-size: 18px; }
        .empty {
            background: #ffffff; border-radius: 18px; padding: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08); color: #6c6c6c;
        }

        .fyp-list { display: grid; gap: 18px; justify-items: center; }
        .post-card {
            background: #ffffff; border-radius: 24px;
            border: 1px solid #e7e1d7; overflow: hidden;
            width: 380px; box-shadow: 0 18px 35px rgba(0,0,0,0.08);
        }
        .post-media {
            width: 100%; aspect-ratio: 1 / 1; background: #f3eee5;
            position: relative; display: flex; align-items: center; justify-content: center;
        }
        .post-media img { width: 100%; height: 100%; object-fit: cover; object-position: center; }
        .media-header {
            position: absolute; top: 12px; left: 12px; right: 12px;
            display: flex; align-items: center; justify-content: space-between;
            background: #ffffff; border-radius: 999px; padding: 6px 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.12);
        }
        .media-user { display: flex; align-items: center; gap: 8px; font-weight: 600; }
        .media-actions { display: flex; gap: 10px; font-weight: 700; }
        .post-body { padding: 12px 14px 16px; text-align: left; }
        .post-user { display: flex; align-items: center; gap: 10px; margin-bottom: 8px; }
        .avatar {
            width: 32px; height: 32px; border-radius: 50%;
            background: linear-gradient(180deg, #d9a867 0%, #b98142 100%);
            color: #1b130b; font-weight: 700; display: grid; place-items: center;
        }
        .user-meta { font-size: 12px; color: #6c6c6c; }
        .user-meta strong { display: block; font-size: 13px; color: #111111; }
        .post-title { margin: 0 0 6px; font-size: 14px; }
        .post-caption { margin: 0; font-size: 12px; color: #5f5f5f; }
        .tag-row { display: flex; gap: 6px; flex-wrap: wrap; margin-top: 10px; }
        .tag {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 11px; font-weight: 600;
            color: #7a5a2b; background: #f3e6d5;
            border-radius: 999px; padding: 4px 8px;
        }

        @media (max-width: 600px) {
            .post-card { width: 100%; max-width: 360px; }
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
            <div class="search">
                <span>🔍</span>
                <input type="text" placeholder="Search..." aria-label="Search feed">
            </div>
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
            <div class="fyp-list">
                @foreach ($fypItems as $item)
                    <article class="post-card">
                        <div class="post-media">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                            <div class="media-header">
                                <div class="media-user">
                                    <div class="avatar">{{ strtoupper(substr($item['user'], 0, 1)) }}</div>
                                    <span>{{ $item['user'] }}</span>
                                </div>
                                <div class="media-actions">
                                    <span>♡</span>
                                    <span>+</span>
                                </div>
                            </div>
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
                            <div class="tag-row">
                                <span class="tag">{{ $item['type'] }}</span>
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
