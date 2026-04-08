<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile | Sword Showcase Hub</title>
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
            }
            .profile-main { padding: 0 26px 20px; position: relative; text-align: center; max-width: 760px; margin: 0 auto; }
            .avatar {
                width: 110px; height: 110px; border-radius: 50%;
                border: 4px solid #ffffff; overflow: hidden;
                position: absolute; top: -55px; left: 50%; transform: translateX(-50%);
                background: linear-gradient(180deg, #d9a867 0%, #b98142 100%);
                display: grid; place-items: center; font-size: 34px; font-weight: 700; color: #1b130b;
            }
            .avatar img { width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; }

            .profile-header {
                display: flex; align-items: center; justify-content: center;
                padding-top: 70px; gap: 20px; flex-wrap: wrap;
            }
            .name-block h1 {
                margin: 0 0 6px; font-size: 30px; letter-spacing: -0.01em;
                font-family: "Playfair Display", "Times New Roman", serif;
            }
            .handle-row { display: flex; flex-direction: column; gap: 4px; align-items: center; }
            .handle { color: #6c6c6c; font-size: 14px; }
            .email { color: #8a8074; font-size: 13px; }
            .edit-btn {
                padding: 10px 18px; border-radius: 999px; border: 1px solid #d9c7a8;
                color: #111111; background: transparent; text-decoration: none; font-weight: 600;
            }

            .meta { display: flex; gap: 16px; flex-wrap: wrap; color: #7b7166; margin-top: 10px; font-size: 14px; justify-content: center; }
            .meta span { display: inline-flex; align-items: center; gap: 6px; }
            .dot { width: 6px; height: 6px; border-radius: 50%; background: #c7b9a6; display: inline-block; }

            .stats { display: flex; gap: 18px; margin-top: 14px; flex-wrap: wrap; justify-content: center; }
            .stat { font-size: 14px; color: #6c6c6c; }
            .stat b { color: #111111; font-size: 15px; margin-right: 6px; }

            .tabs {
                display: flex; gap: 20px; padding: 14px 26px 0; border-bottom: 1px solid #eee7dc;
                font-weight: 600; color: #8a7f72; overflow-x: auto; justify-content: center;
            }
            .tabs input { display: none; }
            .tab-label { padding: 10px 2px 12px; cursor: pointer; position: relative; white-space: nowrap; }
            #tab-feed:checked ~ .tab-labels label[for="tab-feed"],
            #tab-settings:checked ~ .tab-labels label[for="tab-settings"] {
                color: #111111;
            }
            #tab-feed:checked ~ .tab-labels label[for="tab-feed"]::after,
            #tab-settings:checked ~ .tab-labels label[for="tab-settings"]::after {
                content: ""; position: absolute; left: 0; right: 0; bottom: -1px;
                height: 3px; background: #d9a867; border-radius: 999px;
            }
            .tab-labels { display: flex; gap: 26px; justify-content: center; width: 100%; }
            .tab-panels { padding: 22px 26px 26px; }
            .tab-panel { display: none; }
            #tab-feed:checked ~ .tab-panels .feed-panel { display: block; }
            #tab-settings:checked ~ .tab-panels .settings-panel { display: block; }

            .section-title { margin: 0 0 14px; font-size: 18px; font-weight: 700; text-align: center; }
            .cards {
                display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 220px));
                gap: 16px; justify-content: center;
            }
            .sword-card { background: #ffffff; border-radius: 16px; border: 1px solid #e0e0e0; overflow: hidden; }
            .sword-card img { width: 100%; height: 140px; object-fit: cover; }
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

            .settings-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
            .settings-card { border: 1px solid #e6dfd3; border-radius: 16px; padding: 16px; background: #fbf8f2; text-align: left; }
            .settings-card h3 { margin: 0 0 10px; font-size: 16px; }
            .field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 12px; }
            .field label { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #7e756a; }
            .field input {
                border: 1px solid #e2d4bf; border-radius: 10px; padding: 10px 12px;
                font-size: 14px; background: #fffdf9; color: #3c2b1c;
            }
            .photo-form { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; }
            .photo-form input[type="file"] { max-width: 240px; font-size: 13px; }
            .btn {
                display: inline-flex; align-items: center; justify-content: center;
                padding: 10px 16px; border-radius: 999px; border: 1px solid #d9c7a8;
                background: transparent; color: #111111; text-decoration: none; font-weight: 600;
            }
            .btn.primary { background: #d9a867; border-color: #d9a867; color: #111111; }
            .message {
                margin-top: 12px; padding: 10px 12px; border-radius: 10px;
                background: #edf7ed; border: 1px solid #cfe6cf; color: #25603a;
            }

            @media (max-width: 900px) {
                .profile-header { flex-direction: column; align-items: center; }
                .profile-main { padding: 0 20px 20px; }
                .tabs { padding: 14px 20px 0; }
                .tab-panels { padding: 20px; }
                .settings-grid { grid-template-columns: 1fr; }
                .cards { grid-template-columns: repeat(auto-fill, minmax(180px, 180px)); }
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
                    <a href="/profile">Profile</a>
                    <a href="/upload">Upload Sword</a>
                </nav>
            </div>

            <section class="profile-wrap">
                <div class="banner"></div>
                <div class="profile-main">
                    @php
                        $photo = $profileUser?->profile_photo ?? session('profile_photo');
                        $displayName = $profileUser?->name ?? session('user_name', 'Guest Collector');
                    @endphp
                    <div class="avatar">
                        @if ($photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="{{ $displayName }}">
                        @else
                            {{ strtoupper(substr($displayName, 0, 1)) }}
                        @endif
                    </div>

                    <div class="profile-header">
                        <div class="name-block">
                            <h1>{{ $displayName }}</h1>
                            <div class="handle-row">
                                <div class="handle">{{ '@' . strtolower(str_replace(' ', '', $displayName)) }}</div>
                                <div class="email">{{ $profileUser?->email ?? session('user_email', 'No email available') }}</div>
                            </div>
                        </div>
                        <a class="edit-btn" href="#settings">Edit profile</a>
                    </div>

                    <div class="meta">
                        <span><span class="dot"></span> Location not set</span>
                        <span><span class="dot"></span> Birthday not set</span>
                        <span><span class="dot"></span> Joined {{ $profileUser?->created_at?->format('M Y') ?? 'Recently' }}</span>
                    </div>

                    <div class="stats">
                        <div class="stat"><b>{{ $swordCount }}</b>Uploads</div>
                        <div class="stat"><b>{{ $swords->count() }}</b>Posts</div>
                        <div class="stat"><b>{{ $swords->first()?->created_at?->format('d M Y') ?? '—' }}</b>Latest</div>
                    </div>
                </div>

                <div class="tabs" id="settings">
                    <input type="radio" name="tab" id="tab-feed" checked>
                    <input type="radio" name="tab" id="tab-settings">

                    <div class="tab-labels">
                        <label class="tab-label" for="tab-feed">Posts</label>
                        <label class="tab-label" for="tab-settings">Settings</label>
                    </div>

                    <div class="tab-panels">
                        <div class="tab-panel feed-panel">
                            <div class="section-title">My Swords</div>

                            @if ($swords->isEmpty())
                                <div class="empty">You have not uploaded any swords yet.</div>
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

                        <div class="tab-panel settings-panel">
                            <div class="settings-grid">
                                <div class="settings-card">
                                    <h3>Profile Photo</h3>
                                    <form class="photo-form" method="POST" action="/profile/photo" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="profile_photo" accept="image/*" required>
                                        <button class="btn primary" type="submit">Change Picture</button>
                                    </form>
                                </div>
                                <div class="settings-card">
                                    <h3>Profile Details</h3>
                                    <div class="field">
                                        <label>Name</label>
                                        <input type="text" value="{{ $displayName }}" readonly>
                                    </div>
                                    <div class="field">
                                        <label>Email</label>
                                        <input type="text" value="{{ $profileUser?->email ?? session('user_email', 'No email available') }}" readonly>
                                    </div>
                                    <p class="handle">Add profile edits here when you are ready.</p>
                                </div>
                            </div>

                            @if (session('success'))
                                <div class="message">{{ session('success') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
