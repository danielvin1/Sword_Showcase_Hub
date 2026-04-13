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
                padding: 36px 22px 90px;
            }
            .shell { max-width: 1080px; margin: 0 auto; }
            .topbar {
                display: flex; align-items: center; justify-content: space-between;
                gap: 20px; margin-bottom: 22px; padding: 14px 18px;
                border: 1px solid #e2e2df; border-radius: 14px;
                background: rgba(255,255,255,0.75); backdrop-filter: blur(6px);
            }
            .brand { font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; font-size: 12px; color: #2c2218; }
            .menu { display: flex; gap: 18px; font-size: 14px; }
            .menu a { color: inherit; text-decoration: none; opacity: 0.8; font-weight: 600; }

            .profile-wrap {
                background: #ffffff; border-radius: 18px; overflow: hidden;
                box-shadow: 0 20px 40px rgba(0,0,0,0.08);
                border: 1px solid #e7e1d7;
            }
            .banner {
                height: 190px;
                background: linear-gradient(120deg, #dfc198 0%, #d4a86c 40%, #c09a69 100%);
                background-size: cover;
                background-position: center;
            }
            .profile-main { padding: 0 26px 20px; position: relative; text-align: left; }
            .profile-content { max-width: 760px; margin: 0; }
            .avatar {
                width: 110px; height: 110px; border-radius: 50%;
                border: 4px solid #ffffff; overflow: hidden;
                position: absolute; top: -55px; left: 26px;
                background: linear-gradient(180deg, #d9a867 0%, #b98142 100%);
                display: grid; place-items: center; font-size: 34px; font-weight: 700; color: #1b130b;
            }
            .avatar img { width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; }

            .profile-header {
                display: flex; align-items: center; justify-content: space-between;
                padding-top: 70px; gap: 20px; flex-wrap: wrap;
            }
            .name-block h1 {
                margin: 0 0 6px; font-size: 30px; letter-spacing: -0.01em;
                font-family: "Playfair Display", "Times New Roman", serif;
            }
            .handle-row { display: flex; flex-direction: column; gap: 4px; align-items: flex-start; }
            .handle { color: #6c6c6c; font-size: 14px; }
            .email { color: #8a8074; font-size: 13px; }
            .edit-btn {
                padding: 10px 18px; border-radius: 999px; border: 2px solid #d9a867;
                color: #fff; background: #d9a867; text-decoration: none; font-weight: 600;
                transition: all 0.2s ease;
            }
            .edit-btn:hover {
                background: #c49851; border-color: #c49851;
            }
            .action-bar { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; }

            .meta { display: flex; gap: 16px; flex-wrap: wrap; color: #7b7166; margin-top: 10px; font-size: 14px; justify-content: flex-start; }
            .meta span { display: inline-flex; align-items: center; gap: 6px; }
            .dot { width: 6px; height: 6px; border-radius: 50%; background: #c7b9a6; display: inline-block; }

            .stats { display: flex; gap: 18px; margin-top: 14px; flex-wrap: wrap; justify-content: flex-start; }
            .stat { font-size: 14px; color: #6c6c6c; }
            .stat b { color: #111111; font-size: 15px; margin-right: 6px; }

            .tabs { display: block; padding: 14px 26px 0; border-bottom: 1px solid #eee7dc; font-weight: 600; color: #8a7f72; }
            .tabs input { display: none; }
            .tab-label { padding: 10px 2px 12px; cursor: pointer; position: relative; white-space: nowrap; }
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

            .section-title { margin: 0 0 14px; font-size: 18px; font-weight: 700; text-align: left; width: 100%; }
            .cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
                gap: 12px;
                justify-content: flex-start;
                max-width: 440px;
                margin-left: 0 !important;
                margin-right: auto;
            }
            .sword-card { background: #ffffff; border-radius: 16px; border: 1px solid #e0e0e0; overflow: hidden; width: 100%; }
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
                border: 1px solid #e6dfd3; color: #6c6c6c;
            }

            @media (max-width: 900px) {
                .profile-header { flex-direction: column; align-items: center; }
                .profile-main { padding: 0 20px 20px; }
                .tabs { padding: 14px 20px 0; }
                .tab-panels { padding: 20px; }
                .cards { grid-template-columns: repeat(auto-fill, minmax(180px, 180px)); }
            }
        </style>
        <link rel='stylesheet' href='/css/theme.css'>
</head>
    <body>
        <div class="shell">
            <div class="topbar">
                <div class="brand">Sword Showcase Hub</div>
                <nav class="menu" aria-label="Top navigation">
                    <a href="/welcome">Explore</a>
                    <a href="/feed">Feed</a>
                    <a href="/profile">Profile</a>
                    <a href="/upload">Upload Sword</a>
                </nav>
            </div>

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
                                <form action="/users/{{ $user->id }}/follow" method="POST">
                                    @csrf
                                    <button type="submit" class="edit-btn" style="background: {{ $isFollowed ? '#c49851' : '#d9a867' }};">
                                        {{ $isFollowed ? 'Following' : 'Follow' }}
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
                    <div class="tab-panel feed-panel" style="display:block;">
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
                        <div class="tab-panel feed-panel">
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
        </div>

        <script>
            document.getElementById('tab-posts').addEventListener('change', function() {
                document.querySelectorAll('.tab-panel').forEach(p => p.style.display = 'none');
                document.querySelectorAll('.tab-panel')[0].style.display = 'block';
            });
            document.getElementById('tab-likes').addEventListener('change', function() {
                if (document.getElementById('tab-likes')) {
                    document.querySelectorAll('.tab-panel').forEach(p => p.style.display = 'none');
                    document.querySelectorAll('.tab-panel')[1].style.display = 'block';
                }
            });
        </script>
    </body>
</html>
