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
        .shell { max-width: 1240px; margin: 0 auto; }
        .feed-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }
        .feed-title h1 { margin: 0; font-size: 28px; }
        .feed-title p { margin: 6px 0 0; color: #6c6c6c; }
        .feed-actions {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
        }
        .search-bar {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 42px;
            padding: 0 14px;
            border: 1px solid rgba(198, 162, 106, 0.35);
            border-radius: 999px;
            background: linear-gradient(180deg, rgba(30, 28, 25, 0.96), rgba(18, 17, 15, 0.96));
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.24);
        }
        .search-icon {
            font-size: 14px;
            color: #c9b08a;
            opacity: 0.95;
        }
        .search-bar input {
            border: none;
            background: transparent;
            outline: none;
            font-size: 14px;
            color: #f2eadf;
            width: 240px;
        }
        .search-bar input::placeholder { color: #a79680; }
        .search-bar:focus-within {
            border-color: rgba(225, 193, 142, 0.7);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.3);
        }
        .filter-btn { cursor: pointer; }
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 10px 16px; border-radius: 999px; border: 1px solid #d9c7a8;
            background: transparent; color: #111111; text-decoration: none; font-weight: 600;
        }
        .btn.primary { background: #d9a867; border-color: #d9a867; }
        .section h2 { margin: 0 0 12px; font-size: 18px; }
        .empty {
            background: #ffffff; border-radius: 18px; padding: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08); color: #6c6c6c;
        }
        .fyp-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 18px;
            align-items: start;
        }
        .post-card {
            background: #ffffff; border-radius: 24px;
            border: 1px solid #e7e1d7; overflow: hidden;
            width: 100%;
            box-shadow: 0 18px 35px rgba(0,0,0,0.08);
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }
        .post-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 40px rgba(0,0,0,0.14);
        }
        .refresh-card {
            display: block;
            padding: 0;
            background: linear-gradient(180deg, rgba(34, 31, 27, 0.95), rgba(18, 16, 14, 0.95));
            color: var(--text);
            cursor: pointer;
            text-align: left;
        }
        .refresh-card:hover {
            text-align: left;
            transform: translateY(-2px);
            box-shadow: 0 22px 40px rgba(0,0,0,0.14);
            border-color: rgba(217, 168, 103, 0.8);
        }
        .refresh-card .refresh-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            min-height: 100%;
            padding: 24px;
            text-align: center;
        }
        .refresh-media {
            background: radial-gradient(circle at 35% 25%, rgba(255, 193, 100, 0.18), transparent 50%),
                        linear-gradient(180deg, #1a120b 0%, #090807 100%);
        }
        .refresh-icon {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            border: 1px solid rgba(217, 168, 103, 0.5);
            background: rgba(217, 168, 103, 0.12);
            color: #f1d8a8;
            font-size: 24px;
            line-height: 1;
        }
        .refresh-card h3 {
            margin: 0;
            font-size: 18px;
            color: #f1d8a8;
        }
        .refresh-card p {
            margin: 0;
            font-size: 13px;
            color: #c8b9a8;
            line-height: 1.5;
            max-width: 220px;
        }
        .refresh-copy {
            font-size: 13px;
            font-weight: 600;
            color: #f2eadf;
            letter-spacing: 0.02em;
        }
        .refresh-card .post-media {
            background: radial-gradient(circle at 35% 25%, rgba(255, 193, 100, 0.18), transparent 50%),
                        linear-gradient(180deg, #1a120b 0%, #090807 100%);
        }
        .refresh-copy {
            font-size: 13px;
            font-weight: 600;
            color: #f2eadf;
            letter-spacing: 0.02em;
        }
        .refresh-card:focus-visible {
            outline: 2px solid rgba(225, 193, 142, 0.85);
            outline-offset: 3px;
        }
        .post-media {
            width: 100%; aspect-ratio: 1 / 1; background: #f3eee5;
            position: relative; display: block;
        }
        .shell .post-media {
            background: #1a1714 !important;
        }
        .shell .post-media img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            object-position: center;
            display: block;
        }
        .media-header {
            position: absolute; top: 12px; left: 12px; right: 12px;
            display: flex; align-items: center; justify-content: space-between;
            background: rgba(24, 22, 20, 0.86);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 999px;
            padding: 7px 10px;
            backdrop-filter: blur(8px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.28);
        }
        .media-user { display: flex; align-items: center; gap: 8px; font-weight: 600; }
        .media-user span {
            max-width: 130px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .media-actions { display: flex; gap: 8px; align-items: center; }
        .post-body { padding: 14px 15px 18px; text-align: left; }
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
        .user-link { color: inherit; text-decoration: none; }
        .user-link:hover { text-decoration: underline; }
        .like-form { margin: 0; }
        .modal-overlay {
            position: fixed; inset: 0; background: transparent; display: none;
            align-items: flex-start; justify-content: flex-start; padding: 0; z-index: 1000;
        }
        .modal-overlay.show { display: flex; }
        .modal {
            width: 100%; max-width: 300px; background: #ffffff; border-radius: 24px;
            border: 1px solid #e9e2d7; box-shadow: 0 18px 36px rgba(0,0,0,0.12);
            padding: 16px; display: grid; gap: 12px; text-align: left;
            position: fixed; right: 24px; top: 110px;
        }
        .modal-head {
            display: flex; align-items: center; justify-content: space-between; gap: 10px;
        }
        .modal-head h3 { margin: 0; font-size: 16px; }
        .modal-reset {
            border: none; background: transparent; color: #7a5a2b; font-weight: 600; cursor: pointer;
        }
        .modal-section { display: grid; gap: 8px; text-align: left; }
        .modal-label {
            font-size: 10px; letter-spacing: 0.12em; text-transform: uppercase; color: #8a7b64; text-align: center;
        }
        .type-select {
            display: block; width: 100%; border: 1px solid #e6ded2; border-radius: 14px;
            padding: 10px 34px 10px 12px; font-size: 12.5px; color: #111111; background: #ffffff;
            text-align: left; appearance: none;
            background-image: linear-gradient(45deg, transparent 50%, #9a8c78 50%),
                              linear-gradient(135deg, #9a8c78 50%, transparent 50%);
            background-position: calc(100% - 18px) calc(50% - 2px), calc(100% - 12px) calc(50% - 2px);
            background-size: 6px 6px, 6px 6px; background-repeat: no-repeat;
        }
        .modal-actions { display: grid; gap: 8px; }
        .modal-apply {
            padding: 10px 16px; border-radius: 999px; border: 1px solid #1b1b1b;
            background: #1b1b1b; color: #ffffff; font-weight: 700; font-size: 13px; cursor: pointer;
        }
        .modal-dismiss {
            border: none; background: transparent; color: #8a7b64; font-weight: 600; font-size: 12px; cursor: pointer;
        }
        @media (max-width: 980px) {
            .feed-header {
                align-items: flex-start;
            }
            .feed-actions {
                width: 100%;
                justify-content: flex-start;
            }
            .search-bar input { width: 180px; }
            .modal {
                right: 16px;
                top: 96px;
            }
        }

        @media (max-width: 600px) {
            .shell { max-width: 100%; }
            .feed-title h1 { font-size: 24px; }
            .feed-title p { font-size: 13px; }
            .feed-actions { gap: 8px; }
            .search-bar { width: 100%; }
            .search-bar input { width: 100%; min-width: 0; }
            .btn { min-height: 40px; }
            .fyp-list { grid-template-columns: 1fr; }
            .post-card { width: 100%; border-radius: 18px; }
            .media-header {
                left: 8px;
                right: 8px;
                top: 8px;
                padding: 6px 8px;
                border-radius: 14px;
                align-items: flex-start;
                gap: 8px;
            }
            .media-user span { max-width: 92px; font-size: 12px; }
            .media-actions { gap: 6px; flex-wrap: wrap; justify-content: flex-end; }
            .modal {
                left: 12px;
                right: 12px;
                top: auto;
                bottom: 12px;
                max-width: none;
                border-radius: 18px;
            }
        }

        body.light-mode .search-bar {
            background: #ffffff;
            border-color: #cfd9de;
            box-shadow: 0 4px 12px rgba(15, 20, 25, 0.08);
        }
        body.light-mode .search-icon { color: #536471; }
        body.light-mode .search-bar input { color: #0f1419; }
        body.light-mode .search-bar input::placeholder { color: #8899a6; }
        body.light-mode .shell .post-media {
            background: #f2f4f7 !important;
        }
        body.light-mode .refresh-card {
            border-color: #d7e0e5;
            background:
                radial-gradient(circle at 20% 18%, rgba(15, 20, 25, 0.06), transparent 40%),
                linear-gradient(180deg, #ffffff 0%, #f7f9fb 100%);
            color: #0f1419;
        }
        body.light-mode .refresh-card .post-media {
            background: linear-gradient(180deg, #f7f9fb 0%, #eef3f4 100%);
        }
        body.light-mode .refresh-card h3 { color: #0f1419; }
        body.light-mode .refresh-card p { color: #536471; }
        body.light-mode .refresh-copy { color: #0f1419; }
        body.light-mode .refresh-icon {
            border-color: #cfd9de;
            background: #eff3f4;
            color: #0f1419;
        }
        .site-footer {
            margin-top: 28px;
            padding-top: 14px;
            border-top: 1px solid #ded8ce;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            color: #6f6a62;
            font-size: 13px;
        }
        .site-footer a {
            text-decoration: none;
            color: inherit;
        }
    </style>
    <script src='/js/theme-mode.js'></script>
    <link rel='stylesheet' href='/css/theme.css'>
</head>
<body>
<div class="shell">
    @include('partials.navbar')

    <div class="feed-header">
        <div class="feed-title">
            <h1>Feed</h1>
            <p>Latest uploads from the community.</p>
        </div>
        <div class="feed-actions">
            <div class="search-bar">
                <span class="search-icon" aria-hidden="true">⌕</span>
                <input type="text" id="searchInput" placeholder="Search swords...">
            </div>
            <button class="btn filter-btn" type="button" id="openFilters">Filter Blades</button>
            <a class="btn primary" href="/upload">Upload Sword</a>
        </div>
    </div>

    @php
        $fypItems = [];
        $sessionUser = session('user_id') ? \App\Models\User::find(session('user_id')) : null;

        foreach ($swords as $sword) {
            $creatorName = $sword->user?->name ?? 'Community Collector';
            $creatorHandle = '@' . strtolower(str_replace(' ', '', $creatorName));
            $isLiked = $sessionUser ? $sword->isLikedBy($sessionUser->id) : false;
            $isFollowed = $sessionUser && $sword->user ? $sessionUser->isFollowing($sword->user->id) : false;

            $fypItems[] = [
                'user' => $creatorName,
                'user_id' => $sword->user?->id,
                'handle' => $creatorHandle,
                'title' => $sword->name,
                'type' => $sword->type,
                'caption' => $sword->description ?: 'No description added yet.',
                'image' => $sword->image_url,
                'time' => $sword->created_at?->diffForHumans() ?? 'Just now',
                'sword_id' => $sword->id,
                'likes_count' => $sword->likes()->count(),
                'is_liked' => $isLiked,
                'is_followed' => $isFollowed,
            ];
        }
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
                                <a href="{{ $item['user_id'] ? '/user/' . $item['user_id'] : '#' }}" class="media-user user-link">
                                    <div class="avatar">{{ strtoupper(substr($item['user'], 0, 1)) }}</div>
                                    <span>{{ $item['user'] }}</span>
                                </a>
                                <div class="media-actions">
                                    <form class="like-form" action="/swords/{{ $item['sword_id'] }}/like" method="POST">
                                        @csrf
                                        <button type="submit" class="feed-action like{{ $item['is_liked'] ? ' is-liked' : '' }}">Like {{ $item['likes_count'] }}</button>
                                    </form>
                                    @if ($item['user_id'] && (! $sessionUser || $sessionUser->id !== $item['user_id']))
                                        <button
                                            class="feed-action follow js-follow-btn{{ $item['is_followed'] ? ' is-following' : '' }}"
                                            type="button"
                                            data-user-id="{{ $item['user_id'] }}"
                                            data-following="{{ $item['is_followed'] ? 'true' : 'false' }}"
                                        >{{ $item['is_followed'] ? 'Following' : 'Follow' }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="post-body">
                            <div class="post-user">
                                <div class="avatar">{{ strtoupper(substr($item['user'], 0, 1)) }}</div>
                                <div class="user-meta">
                                    <strong>
                                        <a href="{{ $item['user_id'] ? '/user/' . $item['user_id'] : '#' }}" class="user-link">{{ $item['user'] }}</a>
                                    </strong>
                                    {{ $item['handle'] }} | {{ $item['time'] }}
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

                <button class="post-card refresh-card" type="button" id="refreshFeedCard" aria-label="Refresh feed and reshuffle swords">
                    <div class="post-media refresh-media">
                        <div class="refresh-inner">
                            <div class="refresh-icon">⟳</div>
                            <div class="refresh-copy">Tap to shuffle the feed</div>
                        </div>
                    </div>
                    <div class="post-body">
                        <h3 class="post-title">Refresh Feed</h3>
                        <p class="post-caption">Load a fresh mix of swords from different users.</p>
                        <div class="tag-row">
                            <span class="tag">Randomize</span>
                        </div>
                    </div>
                </button>
            </div>
        @endif
    </section>

    <footer class="site-footer" aria-label="Site footer">
        <span>© {{ date('Y') }} Sword Showcase Hub</span>
        <span>
            <a href="/privacy">Privacy</a>
            ·
            <a href="/terms">Terms</a>
        </span>
    </footer>
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
    const searchInput = document.getElementById('searchInput');
    const refreshFeedCard = document.getElementById('refreshFeedCard');
    const cards = Array.from(document.querySelectorAll('.post-card:not(.refresh-card)'));
    const followButtons = Array.from(document.querySelectorAll('.js-follow-btn'));
    const currentUserLoggedIn = @json((bool) ($sessionUser ?? null));
    const csrfToken = @json(csrf_token());

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
        const searchTerm = (searchInput ? searchInput.value : '').toLowerCase();
        
        cards.forEach((card) => {
            const cardType = (card.getAttribute('data-type') || '').toLowerCase();
            const cardTitle = (card.querySelector('.post-title')?.textContent || '').toLowerCase();
            const cardUser = (card.querySelector('.media-user')?.textContent || '').toLowerCase();
            
            const typeMatch = !filterType || filterType.toLowerCase() === 'all' || cardType === filterType.toLowerCase();
            const searchMatch = !searchTerm || cardTitle.includes(searchTerm) || cardUser.includes(searchTerm) || cardType.includes(searchTerm);
            
            card.style.display = (typeMatch && searchMatch) ? '' : 'none';
        });
    };

    const resetFilters = () => {
        if (typeSelect) {
            typeSelect.value = 'All';
        }
        if (searchInput) {
            searchInput.value = '';
        }

        cards.forEach((card) => { card.style.display = ''; });
    };

    openBtn.addEventListener('click', showModal);
    dismissBtn.addEventListener('click', hideModal);
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            hideModal();
        }
    });
    applyBtn.addEventListener('click', () => {
        applyFilter();
        hideModal();
    });
    resetBtn.addEventListener('click', resetFilters);

    refreshFeedCard?.addEventListener('click', () => {
        window.location.reload();
    });
    
    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', applyFilter);
    }

    followButtons.forEach((button) => {
        button.addEventListener('click', async () => {
            if (!currentUserLoggedIn) {
                window.location.href = '/login';
                return;
            }

            const userId = button.dataset.userId;

            if (!userId || button.disabled) {
                return;
            }

            const previousLabel = button.textContent;
            button.disabled = true;
            button.textContent = '...';

            try {
                const response = await fetch(`/users/${userId}/follow`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({}),
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Unable to update follow status.');
                }

                button.dataset.following = data.following ? 'true' : 'false';
                button.textContent = data.button_label;
                button.classList.toggle('is-following', data.following);
            } catch (error) {
                button.textContent = previousLabel;
                window.alert(error.message || 'Unable to update follow status.');
            } finally {
                button.disabled = false;
            }
        });
    });
</script>
</body>
</html>
