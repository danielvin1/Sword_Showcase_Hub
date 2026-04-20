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
        <title>{{ $user->name }} | Sword Showcase Hub</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap');

            * { box-sizing: border-box; }
            body {
                margin: 0;
                font-family: "Cormorant Garamond", Georgia, serif;
                color: #111111;
                background-color: #f2f2f0;
                background-image:
                    radial-gradient(circle at 15% 12%, rgba(120, 120, 120, 0.08), transparent 38%),
                    radial-gradient(circle at 85% 18%, rgba(0, 0, 0, 0.06), transparent 34%),
                    repeating-linear-gradient(135deg, rgba(0, 0, 0, 0.04) 0 1px, transparent 1px 16px),
                    linear-gradient(180deg, #f6f6f4 0%, #efefec 45%, #f2f2f0 100%);
                background-size: auto, auto, 24px 24px, auto;
                min-height: 100vh;
                padding: 36px 22px 90px;
            }
            .shell { max-width: 1080px; margin: 0 auto; }

            .profile-wrap {
                background: #ffffff; border-radius: 18px; overflow: hidden;
                box-shadow: 0 20px 40px rgba(0,0,0,0.08);
                border: 1px solid #e7e1d7;
            }
            .banner {
                height: 190px;
                background:
                    radial-gradient(circle at 20% 24%, rgba(198, 162, 106, 0.14), transparent 42%),
                    linear-gradient(120deg, #2a2118 0%, #35281c 46%, #231a13 100%);
                background-size: cover;
                background-position: center;
                border-bottom: 1px solid rgba(255,255,255,0.06);
            }
            .profile-main { padding: 0 26px 20px; position: relative; text-align: left; }
            .profile-content { max-width: 760px; margin: 0; }
            .avatar {
                width: 110px; height: 110px; border-radius: 50%;
                border: 4px solid #ffffff; overflow: hidden;
                position: absolute; top: -55px; left: 26px;
                background: linear-gradient(180deg, #9b7344 0%, #694625 100%);
                display: grid; place-items: center; font-size: 34px; font-weight: 700; color: #1b130b;
            }
            .avatar img { width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; }

            .profile-header {
                display: flex; align-items: center; justify-content: space-between;
                padding-top: 70px; gap: 20px; flex-wrap: wrap;
            }
            .name-block h1 {
                margin: 0 0 6px; font-size: 30px; letter-spacing: -0.01em;
                font-family: "Cinzel", serif;
            }
            .handle-row { display: flex; flex-direction: column; gap: 4px; align-items: flex-start; }
            .handle { color: #6c6c6c; font-size: 14px; }
            .email { color: #8a8074; font-size: 13px; }
            .profile-btn,
            .edit-btn,
            .follow-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                min-height: 42px;
                padding: 10px 18px;
                border-radius: 999px;
                border: 2px solid #d9a867;
                color: #ffffff;
                background: linear-gradient(180deg, #dfb472 0%, #cc9550 100%);
                text-decoration: none;
                font-weight: 700;
                font-size: 14px;
                line-height: 1;
                letter-spacing: 0.01em;
                cursor: pointer;
                box-shadow: 0 10px 18px rgba(169, 113, 44, 0.22);
                transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease, border-color 0.2s ease;
            }
            .profile-btn:hover,
            .edit-btn:hover,
            .follow-btn:hover {
                background: linear-gradient(180deg, #cfa163 0%, #b98242 100%);
                border-color: #c08b49;
                transform: translateY(-1px);
                box-shadow: 0 14px 24px rgba(169, 113, 44, 0.3);
            }
            .profile-btn:active,
            .edit-btn:active,
            .follow-btn:active {
                transform: translateY(0);
                box-shadow: 0 8px 16px rgba(169, 113, 44, 0.2);
            }
            .profile-btn:focus-visible,
            .edit-btn:focus-visible,
            .follow-btn:focus-visible {
                outline: 2px solid #5d3c18;
                outline-offset: 2px;
            }
            .action-bar { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; }
            .action-bar form {
                margin: 0;
            }
            .follow-btn {
                min-width: 132px;
            }
            .follow-btn.following {
                background: linear-gradient(180deg, #f5f2ea 0%, #e5ded2 100%);
                color: #655949;
                border-color: #d1c5b2;
                box-shadow: 0 8px 14px rgba(81, 70, 56, 0.16);
            }
            .follow-btn.following:hover {
                background: linear-gradient(180deg, #ece5d8 0%, #dfd4c2 100%);
                border-color: #bfae95;
            }

            .meta { display: flex; gap: 16px; flex-wrap: wrap; color: #7b7166; margin-top: 10px; font-size: 14px; justify-content: flex-start; }
            .meta span { display: inline-flex; align-items: center; gap: 6px; }
            .dot { width: 6px; height: 6px; border-radius: 50%; background: #c7b9a6; display: inline-block; }

            .stats {
                display: flex;
                gap: 18px;
                margin-top: 14px;
                flex-wrap: nowrap;
                justify-content: flex-start;
                padding-top: 14px;
                border-top: 1px solid #f0ebe2;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            .stat {
                display: inline-flex;
                align-items: baseline;
                gap: 6px;
                white-space: nowrap;
                font-size: 14px;
                color: #6c6c6c;
                flex: 0 0 auto;
            }
            .stat b { color: #111111; font-size: 16px; font-weight: 700; }

            .tabs { display: block; padding: 14px 26px 0; border-bottom: 1px solid #eee7dc; font-weight: 600; color: #8a7f72; }
            .tabs input { display: none; }
            .tab-label { padding: 10px 14px 12px; cursor: pointer; position: relative; white-space: nowrap; color: #8a7f72; transition: color 0.2s ease; }
            .tab-label:hover { color: #d9a867; }
            .tab-label-static { color: #111111; }
            .tab-label-static::after {
                content: ""; position: absolute; left: 0; right: 0; bottom: -1px;
                height: 3px; background: #d9a867; border-radius: 999px;
            }
            .tab-labels { display: flex; gap: 26px; justify-content: flex-start; width: 100%; }
            .tab-panels { padding: 22px 26px 26px; text-align: left; }
            .tab-panel { display: none; text-align: left; }
            .feed-panel { text-align: left; width: 100%; max-width: 640px; margin-left: 0; margin-right: auto; }
            .feed-panel .section-title { text-align: left !important; margin-left: 0; }

            .section-title { margin: 0 0 14px; font-size: 18px; font-weight: 700; text-align: left; width: 100%; color: #111111; letter-spacing: -0.01em; }
            .cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
                gap: 12px;
                justify-content: flex-start;
                max-width: 440px;
                margin-left: 0 !important;
                margin-right: auto;
            }
            .sword-card { background: #ffffff; border-radius: 16px; border: 1px solid #e0e0e0; overflow: hidden; width: 100%; transition: all 0.3s ease; }
            .sword-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
                border-color: #d9a867;
            }
            .sword-card img {
                width: 100%;
                height: auto;
                aspect-ratio: 1 / 1;
                object-fit: cover;
                object-position: center;
                display: block;
                background: #f2f2f0;
            }
            .sword-body { padding: 12px; text-align: left; }
            .sword-body h3 { margin: 0 0 6px; font-size: 15px; color: #111111; }
            .sword-body p {
                margin: 0; font-size: 13px; color: #5f5f5f;
                display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
            }
            .tag {
                display: inline-flex; align-items: center; gap: 6px; margin-top: 10px;
                font-size: 12px; font-weight: 600; color: #7a5a2b; background: #f3e6d5;
                border-radius: 999px; padding: 4px 8px;
            }
            .empty {
                background: #ffffff; border-radius: 16px; padding: 18px;
                border: 1px solid #e6dfd3; color: #6c6c6c; text-align: center;
            }
            .discussion-board { display: grid; gap: 12px; }
            .discussion-card {
                background: #ffffff;
                border-radius: 16px;
                border: 1px solid #e6dfd3;
                padding: 14px;
                display: grid;
                gap: 10px;
            }
            .discussion-head {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 10px;
            }
            .discussion-title { margin: 0; font-size: 16px; color: #111111; }
            .discussion-meta {
                display: flex;
                gap: 10px;
                flex-wrap: wrap;
                color: #7b7166;
                font-size: 12px;
            }
            .discussion-body {
                margin: 0;
                color: #5f5f5f;
                font-size: 13px;
                line-height: 1.65;
            }
            .vote-chip {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-height: 28px;
                padding: 0 10px;
                border-radius: 999px;
                background: #f3e6d5;
                color: #7a5a2b;
                font-size: 12px;
                font-weight: 700;
                white-space: nowrap;
            }
            .reply-list {
                list-style: none;
                margin: 0;
                padding: 0;
                display: grid;
                gap: 8px;
            }
            .reply-item {
                border-left: 2px solid #d9a867;
                background: #faf8f4;
                border-radius: 10px;
                padding: 8px 10px 8px 12px;
            }
            .reply-meta {
                margin: 0 0 4px;
                color: #7a5a2b;
                font-size: 11px;
                font-weight: 600;
            }
            .reply-item p {
                margin: 0;
                color: #5f5f5f;
                font-size: 12px;
                line-height: 1.55;
            }
            .site-footer {
                margin-top: 20px;
                padding-top: 12px;
                border-top: 1px solid #e6dfd3;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 10px;
                flex-wrap: wrap;
                color: #7b7166;
                font-size: 13px;
            }
            .site-footer a {
                color: inherit;
                text-decoration: none;
            }

            @media (max-width: 900px) {
                .profile-header { flex-direction: column; align-items: center; }
                .profile-main { padding: 0 20px 20px; }
                .tabs { padding: 14px 20px 0; }
                .tab-panels { padding: 20px; }
                .cards { grid-template-columns: repeat(auto-fill, minmax(180px, 180px)); }
            }
        </style>
        <script src='/js/theme-mode.js'></script>
        <link rel='stylesheet' href='/css/theme.css'>
</head>
    <body>
        <div class="shell">
            @include('partials.navbar')

            <section class="profile-wrap">
                @php
                    $photo = $user->profile_photo;
                    $banner = $user->banner_photo;
                    $displayName = $user->name;
                    $photoVersion = $user->updated_at?->timestamp ?? time();
                @endphp
                <div class="banner" id="profile-banner" @if ($banner) style="background-image: url('{{ asset('storage/' . $banner) }}?v={{ $photoVersion }}');" @endif></div>
                <div class="profile-main">
                    <div class="avatar" id="profile-avatar">
                        @if ($photo)
                            <img src="{{ asset('storage/' . $photo) }}?v={{ $photoVersion }}" alt="{{ $displayName }}">
                        @else
                            {{ strtoupper(substr($displayName, 0, 1)) }}
                        @endif
                    </div>

                    <div class="profile-content">
                        <div class="profile-header">
                        <div class="name-block">
                            <h1>{{ $displayName }}</h1>
                            <div class="handle-row">
                                <div class="handle">{{ '@' . strtolower(str_replace(' ', '', $displayName)) }}</div>
                                <div class="email">{{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="action-bar">
                            @if (session('user_id') && session('user_id') != $user->id)
                                <form action="/users/{{ $user->id }}/follow" method="POST" style="margin: 0;">
                                    @csrf
                                    <button type="submit" class="follow-btn {{ $isFollowed ? 'following' : '' }}">
                                        {{ $isFollowed ? '✓ Following' : '+ Follow' }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>

                        <div class="meta">
                            <span><span class="dot"></span> Joined {{ $user->created_at->format('M Y') }}</span>
                        </div>

                        <div class="stats">
                            <div class="stat"><b>{{ $swordCount }}</b>Uploads</div>
                            <div class="stat"><b>{{ $followersCount }}</b>Followers</div>
                            <div class="stat"><b>{{ $followingCount }}</b>Following</div>
                        </div>
                    </div>
                </div>

                <div class="tabs">
                    <input type="radio" id="tab-posts" name="tabs" checked>
                    <input type="radio" id="tab-likes" name="tabs">
                    <div class="tab-labels">
                        <label for="tab-posts" class="tab-label">Posts</label>
                        @if (session('user_id') == $user->id)
                            <label for="tab-likes" class="tab-label">Likes</label>
                        @endif
                    </div>
                </div>

                <div class="tab-panels">
                    <div class="tab-panel feed-panel posts-panel" style="display:block;">
                        <div class="section-title">{{ $user->name }}'s Swords</div>

                        @if ($swords->isEmpty())
                            <div class="empty">{{ session('user_id') == $user->id ? 'You have not uploaded any swords yet.' : 'This user has not uploaded any swords yet.' }}</div>
                        @else
                            <section class="cards">
                                @foreach ($swords as $sword)
                                    <article class="sword-card">
                                        @if ($sword->image)
                                            <img src="{{ asset('storage/' . $sword->image) }}" alt="{{ $sword->name }}">
                                        @else
                                            <img src="/images/katana.jpg" alt="{{ $sword->name }}">
                                        @endif
                                        <div class="sword-body">
                                            <h3>{{ $sword->name }}</h3>
                                            <p>{{ $sword->description ?: 'No description added yet.' }}</p>
                                            <div class="tag">{{ $sword->type }}</div>
                                        </div>
                                    </article>
                                @endforeach
                            </section>
                        @endif
                    </div>

                    @if (session('user_id') == $user->id)
                        <div class="tab-panel feed-panel likes-panel">
                            <div class="section-title">Liked Swords</div>

                            @if ($likedSwords->isEmpty())
                                <div class="empty">You haven't liked any swords yet.</div>
                            @else
                                <section class="cards">
                                    @foreach ($likedSwords as $sword)
                                        <article class="sword-card">
                                            @if ($sword->image)
                                                <img src="{{ asset('storage/' . $sword->image) }}" alt="{{ $sword->name }}">
                                            @else
                                                <img src="/images/katana.jpg" alt="{{ $sword->name }}">
                                            @endif
                                            <div class="sword-body">
                                                <h3>{{ $sword->name }}</h3>
                                                <p>{{ $sword->description ?: 'No description added yet.' }}</p>
                                                <div class="tag">{{ $sword->type }}</div>
                                            </div>
                                        </article>
                                    @endforeach
                                </section>
                            @endif
                        </div>
                    @endif

                </div>
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

        <script>
            const hidePanels = () => {
                document.querySelectorAll('.tab-panel').forEach((panel) => {
                    panel.style.display = 'none';
                });
            };

            const showPanel = (selector) => {
                hidePanels();
                const panel = document.querySelector(selector);
                if (panel) {
                    panel.style.display = 'block';
                }
            };

            const postsTab = document.getElementById('tab-posts');
            const likesTab = document.getElementById('tab-likes');
            postsTab?.addEventListener('change', () => showPanel('.posts-panel'));
            likesTab?.addEventListener('change', () => showPanel('.likes-panel'));

            showPanel('.posts-panel');
        </script>
    </body>
</html>
