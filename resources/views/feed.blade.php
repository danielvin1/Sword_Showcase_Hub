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
        .filter-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid #d9c7a8;
            background: #ffffff;
            color: #111111;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }
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

        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 12, 8, 0.4);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 18px;
            z-index: 1000;
        }
        .modal-overlay.show { display: flex; }
        .modal {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-radius: 26px;
            border: 1px solid #e7e1d7;
            box-shadow: 0 30px 60px rgba(0,0,0,0.2);
            padding: 22px;
            display: grid;
            gap: 18px;
            text-align: center;
        }
        .modal-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }
        .modal-head h3 { margin: 0; font-size: 18px; }
        .modal-reset {
            border: none;
            background: transparent;
            color: #7a5a2b;
            font-weight: 600;
            cursor: pointer;
        }
        .modal-section {
            display: grid;
            gap: 10px;
            text-align: left;
        }
        .modal-label {
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #8a7b64;
            text-align: center;
        }
        .type-options {
            display: grid;
            gap: 10px;
        }
        .type-option {
            border: 1px solid #e1d9ce;
            border-radius: 16px;
            background: #ffffff;
            padding: 12px;
            display: grid;
            gap: 4px;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.15s ease, box-shadow 0.15s ease, transform 0.15s ease;
        }
        .type-option strong { font-size: 14px; }
        .type-option span { font-size: 12px; color: #6c6c6c; }
        .type-option em { font-style: normal; font-size: 11px; color: #8a7b64; }
        .type-option.active {
            border-color: #d9a867;
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
            transform: translateY(-1px);
        }
        .modal-actions {
            display: grid;
            gap: 10px;
        }
        .modal-apply {
            padding: 12px 18px;
            border-radius: 999px;
            border: 1px solid #1b1b1b;
            background: #1b1b1b;
            color: #ffffff;
            font-weight: 700;
            cursor: pointer;
        }
        .modal-dismiss {
            border: none;
            background: transparent;
            color: #8a7b64;
            font-weight: 600;
            cursor: pointer;
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
            <button class="filter-btn" type="button" id="openFilters">Filter Blades</button>
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
            ];
        }
        $fypItems = [];
        foreach ($swords as $sword) {
            $creatorName = $sword->user?->name ?? 'Community Collector';
            $creatorHandle = '@' . strtolower(str_replace(' ', '', $creatorName));
            $fypItems[] = [
                'user' => $creatorName,
                'handle' => $creatorHandle,
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
                    <article class="post-card" data-type="{{ $item['type'] }}">
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
<div class="modal-overlay" id="filterModal" aria-hidden="true">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="filterTitle">
        <div class="modal-head">
            <h3 id="filterTitle">Filters</h3>
            <button class="modal-reset" type="button" id="resetFilters">Reset</button>
        </div>
        <div class="modal-section">
            <div class="modal-label">Type</div>
            <div class="type-options" role="group" aria-label="Filter blades by type">
                <button class="type-option active" type="button" data-filter="Katana">
                    <strong>Katana</strong>
                    <span>Curved precision</span>
                    <em>Swift draw</em>
                </button>
                <button class="type-option" type="button" data-filter="Broadsword">
                    <strong>Broadsword</strong>
                    <span>Broad profile</span>
                    <em>Heavy cuts</em>
                </button>
                <button class="type-option" type="button" data-filter="Longsword">
                    <strong>Longsword</strong>
                    <span>Versatile reach</span>
                    <em>Cut & thrust</em>
                </button>
                <button class="type-option" type="button" data-filter="Claymore">
                    <strong>Claymore</strong>
                    <span>Two-handed</span>
                    <em>Battlefield power</em>
                </button>
                <button class="type-option" type="button" data-filter="Arming Sword">
                    <strong>Arming Sword</strong>
                    <span>Knightly sidearm</span>
                    <em>Shield-ready</em>
                </button>
            </div>
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
    const typeOptions = Array.from(document.querySelectorAll('.type-option'));
    const cards = Array.from(document.querySelectorAll('.post-card'));

    const showModal = () => {
        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');
    };
    const hideModal = () => {
        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');
    };

    const setActiveOption = (option) => {
        typeOptions.forEach(btn => btn.classList.toggle('active', btn === option));
    };

    const applyFilter = () => {
        const active = typeOptions.find(btn => btn.classList.contains('active'));
        const filterType = active ? active.getAttribute('data-filter') : '';
        if (!filterType) {
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
        typeOptions.forEach(btn => btn.classList.remove('active'));
        cards.forEach(card => { card.style.display = ''; });
    };

    openBtn.addEventListener('click', showModal);
    dismissBtn.addEventListener('click', hideModal);
    modal.addEventListener('click', (event) => {
        if (event.target === modal) hideModal();
    });
    typeOptions.forEach(option => {
        option.addEventListener('click', () => setActiveOption(option));
    });
    applyBtn.addEventListener('click', () => {
        applyFilter();
        hideModal();
    });
    resetBtn.addEventListener('click', resetFilters);
</script>
</body>
</html>
