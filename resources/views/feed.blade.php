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
    <title>Feed | Sword Showcase Hub</title>
    <style>
        * { box-sizing: border-box; }
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
            padding: 36px 22px 80px;
        }
        .shell { max-width: 980px; margin: 0 auto; }
        .topbar {
            display: flex; align-items: center; justify-content: space-between;
            gap: 20px; margin-bottom: 22px; padding: 14px 18px;
            border: 1px solid #e2e2df; border-radius: 14px;
            background: rgba(255,255,255,0.75); backdrop-filter: blur(6px);
        }
        .brand { font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; font-size: 12px; }
        .menu { display: flex; gap: 18px; font-size: 14px; }
        .menu a { color: inherit; text-decoration: none; opacity: 0.8; }

        .feed-header {
            display: flex; align-items: center; justify-content: space-between;
            gap: 20px; flex-wrap: wrap; margin-bottom: 18px;
        }
        .feed-title h1 { margin: 0; font-size: 28px; }
        .feed-title p { margin: 6px 0 0; color: #6c6c6c; }
        .feed-actions { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
        .filter-btn { cursor: pointer; }
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 10px 16px; border-radius: 999px; border: 2px solid #d9a867;
            background: #fef9f6; color: #8b5e3c; text-decoration: none; font-weight: 600;
            transition: all 0.2s ease;
        }
        .btn:hover {
            background: #d9a867; color: #fff;
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
            width: 600px; box-shadow: 0 18px 35px rgba(0,0,0,0.08);
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
        .media-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            padding: 4px 8px;
            transition: transform 0.2s ease;
            display: flex;
            align-items: center;
            gap: 4px;
            color: #111;
            font-weight: 600;
            font-size: 13px;
        }
        .media-btn:hover {
            transform: scale(1.2);
        }
        .media-btn.liked {
            filter: drop-shadow(0 0 3px rgba(217, 167, 103, 0.6));
        }
        .media-btn.followed {
            color: #d9a867;
            font-weight: bold;
        }
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
        
        .post-actions {
            display: flex; gap: 14px; margin-top: 12px; padding-top: 12px;
            border-top: 1px solid #f0eae2;
        }
        .action-btn {
            display: flex; align-items: center; gap: 6px;
            background: none; border: none; cursor: pointer;
            color: #8a7f72; font-weight: 600; font-size: 12px;
            padding: 0; transition: all 0.2s ease;
        }
        .action-btn:hover {
            color: #d9a867;
        }
        .action-btn.liked {
            color: #d9a867;
        }

        @media (max-width: 600px) {
            .post-card { width: 100%; max-width: 360px; }
        }

        .modal-overlay {
            position: fixed;
            inset: 0;
            background: transparent;
            display: none;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 0;
            z-index: 1000;
        }
        .modal-overlay.show { display: flex; }
        .modal {
            width: 100%;
            max-width: 300px;
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e9e2d7;
            box-shadow: 0 18px 36px rgba(0,0,0,0.12);
            padding: 16px;
            display: grid;
            gap: 12px;
            text-align: left;
            position: fixed;
            right: 160px;
            top: 140px;
        }
        .modal-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }
        .modal-head h3 { margin: 0; font-size: 16px; }
        .modal-reset {
            border: 2px solid transparent;
            background: transparent;
            color: #8b5e3c;
            font-weight: 600;
            cursor: pointer;
            padding: 8px 14px;
            border-radius: 999px;
            transition: all 0.2s ease;
        }
        .modal-reset:hover {
            background: #fef9f6;
            border-color: #d9a867;
        }
        .modal-section {
            display: grid;
            gap: 8px;
            text-align: left;
        }
        .modal-label {
            font-size: 10px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #8a7b64;
            text-align: center;
        }
        .type-select {
            display: block;
            width: 100%;
            border: 1px solid #e6ded2;
            border-radius: 14px;
            padding: 10px 12px;
            font-size: 12.5px;
            color: #111111;
            background: #ffffff;
            text-align: left;
            appearance: none;
            background-image: linear-gradient(45deg, transparent 50%, #9a8c78 50%),
                              linear-gradient(135deg, #9a8c78 50%, transparent 50%);
            background-position: calc(100% - 18px) calc(50% - 2px),
                                 calc(100% - 12px) calc(50% - 2px);
            background-size: 6px 6px, 6px 6px;
            background-repeat: no-repeat;
            padding-right: 34px;
        }
        .modal-actions {
            display: grid;
            gap: 8px;
        }
        .modal-apply {
            padding: 10px 16px;
            border-radius: 999px;
            border: 2px solid #d9a867;
            background: #d9a867;
            color: #ffffff;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .modal-apply:hover {
            background: #c49851;
            border-color: #c49851;
        }
        .modal-dismiss {
            border: 2px solid transparent;
            background: transparent;
            color: #8b5e3c;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            padding: 6px 12px;
            border-radius: 999px;
            transition: all 0.2s ease;
        }
        .modal-dismiss:hover {
            background: #fef9f6;
            border-color: #d9a867;
        }
    </style>
    <link rel='stylesheet' href='/css/theme.css'>
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
            <button class="btn filter-btn" type="button" id="openFilters">Filter Blades</button>
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
        $showcaseMeta = [
            'bastard-longsword.jpg' => [
                'title' => 'Warden Bastard Sword',
                'type' => 'Bastard Sword',
                'caption' => 'A balanced hand-and-a-half blade built for tight guard work, with enough reach and weight to shift into two-handed cuts when the fight opens up.',
            ],
            'claymore.webp' => [
                'title' => 'Highland Claymore',
                'type' => 'Claymore',
                'caption' => 'A broad Scottish greatsword with a long grip and sweeping profile, made for committed two-handed strikes and battlefield presence.',
            ],
            '1338_1st-600x1271.jpg' => [
                'title' => 'Ridgecrest Broadsword',
                'type' => 'Broadsword',
                'caption' => 'A stout, single-handed blade with a wide profile and sturdy guard, built for reliable cuts and confident parries.',
            ],
            'dark-sister-sword-of-daemon-targaryen-1_a5a69c40-8d3b-4963-a919-01518bfb4540.webp' => [
                'title' => 'Nightborne Longsword',
                'type' => 'Longsword',
                'caption' => 'A lean, dark-forged blade with a long grip and agile balance, favoring swift thrusts and tight, precise footwork.',
            ],
            'il_570xN.3117585570_8lbi.webp' => [
                'title' => 'Crestwind Arming Sword',
                'type' => 'Arming Sword',
                'caption' => 'A compact knightly sidearm with a lively point and clean recovery, dependable in close duels and shield work.',
            ],
            'katana.jpg' => [
                'title' => 'Moonlit Katana',
                'type' => 'Katana',
                'caption' => 'A curved single-edged blade with a fast draw and clean follow-through, prized for precision cuts and disciplined handling.',
            ],
            'sword-card.jpg' => [
                'title' => 'Kingsguard Arming Sword',
                'type' => 'Arming Sword',
                'caption' => 'A straight, lively sidearm designed for one-handed use with a shield, reliable in close engagements and quick to recover.',
            ],
            'sword-card.webp' => [
                'title' => 'Blackreef Saber',
                'type' => 'Saber',
                'caption' => 'A light cavalry saber with a pronounced curve and agile point control, built for speed, slashing angles, and mounted momentum.',
            ],
            'sword-hero.webp' => [
                'title' => 'Lionheart Longsword',
                'type' => 'Longsword',
                'caption' => 'A versatile cruciform longsword with a stiff thrusting tip and enough blade presence to transition smoothly between cut and thrust.',
            ],
        ];
        $folderPosts = [];
        foreach ($files as $i => $file) {
            $meta = $showcaseMeta[$file] ?? [
                'title' => ucwords(str_replace(['-', '_'], ' ', pathinfo($file, PATHINFO_FILENAME))),
                'type' => 'Sword',
                'caption' => 'A featured blade from the community showcase.',
            ];
            $folderPosts[] = [
                'user' => $names[$i % count($names)],
                'handle' => $handles[$i % count($handles)],
                'title' => $meta['title'],
                'type' => $meta['type'],
                'caption' => $meta['caption'],
                'image' => '/swords/' . $file,
                'time' => ($i + 1) . 'd',
                'user_id' => null,
                'is_followed' => false,
                'sword_id' => null,
                'likes_count' => rand(8, 127),
                'is_liked' => false,
            ];
        }
        $fypItems = [];
        foreach ($swords as $sword) {
            $creatorName = $sword->user?->name ?? 'Community Collector';
            $creatorHandle = '@' . strtolower(str_replace(' ', '', $creatorName));
            $isLiked = session('user_id') ? $sword->isLikedBy(session('user_id')) : false;
            $isFollowed = session('user_id') && $sword->user ? \App\Models\User::find(session('user_id'))->isFollowing($sword->user->id) : false;
            $fypItems[] = [
                'user' => $creatorName,
                'handle' => $creatorHandle,
                'title' => $sword->name,
                'type' => $sword->type,
                'caption' => $sword->description ?: 'No description added yet.',
                'image' => $sword->image ? asset('storage/' . $sword->image) : '/images/katana.jpg',
                'time' => $sword->created_at?->diffForHumans() ?? 'Just now',
                'user_id' => $sword->user?->id ?? null,
                'is_followed' => $isFollowed,
                'sword_id' => $sword->id,
                'likes_count' => $sword->likes()->count(),
                'is_liked' => $isLiked,
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
                    <article class="post-card" data-type="{{ $item['type'] }}">
                        <div class="post-media">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                            <div class="media-header">
                                <a href="{{ $item['user_id'] ? '/user/' . $item['user_id'] : '#' }}" style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: 8px;">
                                    <div class="avatar">{{ strtoupper(substr($item['user'], 0, 1)) }}</div>
                                    <span>{{ $item['user'] }}</span>
                                </a>
                                <div class="media-actions">
                                    @if (isset($item['sword_id']) && $item['sword_id'])
                                        <form action="/swords/{{ $item['sword_id'] }}/like" method="POST" style="margin: 0;">
                                            @csrf
                                            <button type="submit" class="media-btn {{ $item['is_liked'] ? 'liked' : '' }}" title="{{ $item['likes_count'] }} likes">❤️ {{ $item['likes_count'] }}</button>
                                        </form>
                                    @else
                                        <span class="media-btn" style="cursor: default; opacity: 0.5;">❤️ {{ $item['likes_count'] }}</span>
                                    @endif
                                    @if ($item['user_id'] && session('user_id') && session('user_id') != $item['user_id'])
                                        <form action="/users/{{ $item['user_id'] }}/follow" method="POST" style="margin: 0;">
                                            @csrf
                                            <button type="submit" class="media-btn {{ $item['is_followed'] ? 'followed' : '' }}">
                                                {{ $item['is_followed'] ? '✓' : '+' }}
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="post-body">
                            <div class="post-user">
                                <div class="avatar">{{ strtoupper(substr($item['user'], 0, 1)) }}</div>
                                <div class="user-meta">
                                    <strong><a href="{{ $item['user_id'] ? '/user/' . $item['user_id'] : '#' }}" style="color: inherit; text-decoration: none;">{{ $item['user'] }}</a></strong>
                                    {{ $item['handle'] }} � {{ $item['time'] }}
                                </div>
                            </div>
                            <h3 class="post-title">{{ $item['title'] }}</h3>
                            <p class="post-caption">{{ $item['caption'] }}</p>
                            <div class="tag-row">
                                <span class="tag">{{ $item['type'] }}</span>
                            </div>
                            @if (isset($item['sword_id']))
                                <div class="post-actions">
                                    @php
                                        $likeCount = $item['likes_count'] ?? 0;
                                        $isLiked = $item['is_liked'] ?? false;
                                    @endphp
                                    <form action="/swords/{{ $item['sword_id'] }}/like" method="POST" style="margin: 0;">
                                        @csrf
                                        <button type="submit" class="action-btn {{ $isLiked ? 'liked' : '' }}">
                                            <span>❤️</span> {{ $likeCount }}
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
</div>
<div class="modal-overlay" id="filterModal" aria-hidden="true">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="filterTitle">
        <div class="modal-head">
            <h3 id="filterTitle">Filters</h3>
            <button class="modal-reset" type="button" id="resetFilters">Reset</button>
        </div>
        <div class="modal-section">
            <div class="modal-label">Type</div>
            <select class="type-select" id="typeSelect" aria-label="Filter blades by type">
                <option value="All">All</option>
                <option value="Katana">Katana</option>
                <option value="Broadsword">Broadsword</option>
                <option value="Longsword">Longsword</option>
                <option value="Claymore">Claymore</option>
                <option value="Arming Sword">Arming Sword</option>
            </select>
        </div>
        <div class="modal-actions">
            <button class="modal-apply" type="button" id="applyFilters">Apply Filters</button>
            <button class="modal-dismiss" type="button" id="dismissFilters">Dismiss</button>
        </div>
    </div>
</div>
<script>
    const modal = document.getElementById('filterModal');
    const openBtn = document.getElementById('openFilters');
    const dismissBtn = document.getElementById('dismissFilters');
    const applyBtn = document.getElementById('applyFilters');
    const resetBtn = document.getElementById('resetFilters');
    const typeSelect = document.getElementById('typeSelect');
    const cards = Array.from(document.querySelectorAll('.post-card'));

    const showModal = () => {
        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');
    };
    const hideModal = () => {
        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');
    };

    const applyFilter = () => {
        const filterType = typeSelect ? typeSelect.value : '';
        if (!filterType || filterType.toLowerCase() === 'all') {
            cards.forEach(card => { card.style.display = ''; });
            return;
        }
        cards.forEach(card => {
            const cardType = (card.getAttribute('data-type') || '').toLowerCase();
            const matches = cardType === filterType.toLowerCase();
            card.style.display = matches ? '' : 'none';
        });
    };

    const resetFilters = () => {
        if (typeSelect) typeSelect.value = 'All';
        cards.forEach(card => { card.style.display = ''; });
    };

    openBtn.addEventListener('click', showModal);
    dismissBtn.addEventListener('click', hideModal);
    modal.addEventListener('click', (event) => {
        if (event.target === modal) hideModal();
    });
    applyBtn.addEventListener('click', () => {
        applyFilter();
        hideModal();
    });
    resetBtn.addEventListener('click', resetFilters);
</script>
</body>
</html>









