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
                padding: 10px 18px; border-radius: 999px; border: 1px solid #d9c7a8;
                color: #111111; background: transparent; text-decoration: none; font-weight: 600;
            }
            .action-bar { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; }

            .meta { display: flex; gap: 16px; flex-wrap: wrap; color: #7b7166; margin-top: 10px; font-size: 14px; justify-content: flex-start; }
            .meta span { display: inline-flex; align-items: center; gap: 6px; }
            .dot { width: 6px; height: 6px; border-radius: 50%; background: #c7b9a6; display: inline-block; }

            .stats { display: flex; gap: 18px; margin-top: 14px; flex-wrap: wrap; justify-content: flex-start; }
            .stat { font-size: 14px; color: #6c6c6c; }
            .stat b { color: #111111; font-size: 15px; margin-right: 6px; }

            .tabs {
                display: block;
                padding: 14px 26px 0;
                border-bottom: 1px solid #eee7dc;
                font-weight: 600;
                color: #8a7f72;
            }
            .tabs input { display: none; }
            .tab-label { padding: 10px 2px 12px; cursor: pointer; position: relative; white-space: nowrap; }
            .tab-label-static { color: #111111; }
            .tab-label-static::after {
                content: ""; position: absolute; left: 0; right: 0; bottom: -1px;
                height: 3px; background: #d9a867; border-radius: 999px;
            }
            #tab-feed:checked ~ .tab-labels label[for="tab-feed"] {
                color: #111111;
            }
            #tab-feed:checked ~ .tab-labels label[for="tab-feed"]::after {
                content: ""; position: absolute; left: 0; right: 0; bottom: -1px;
                height: 3px; background: #d9a867; border-radius: 999px;
            }
            .tab-labels { display: flex; gap: 26px; justify-content: flex-start; width: 100%; }
            .tab-panels { padding: 22px 26px 26px; text-align: left; }
            .tab-panel { display: none; text-align: left; }
            #tab-feed:checked ~ .tab-panels .feed-panel { display: block; }
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

            .field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 12px; }
            .field label { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #7e756a; }
            .field input {
                border: 1px solid #e2d4bf; border-radius: 10px; padding: 10px 12px;
                font-size: 14px; background: #fffdf9; color: #3c2b1c;
            }
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
            .modal-backdrop {
                position: fixed; inset: 0; background: rgba(0,0,0,0.4);
                display: none; align-items: center; justify-content: center;
                padding: 20px; z-index: 1000;
            }
            .modal {
                width: 100%; max-width: 420px; background: #ffffff; border-radius: 16px;
                box-shadow: 0 20px 50px rgba(0,0,0,0.2); border: 1px solid #e6dfd3;
                padding: 18px;
            }
            .modal h3 { margin: 0 0 12px; font-size: 18px; }
            .modal-actions { display: flex; gap: 10px; justify-content: flex-end; margin-top: 12px; }
            .modal-backdrop.show { display: flex; }

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

                    <div class="profile-content">
                        <div class="profile-header">
                        <div class="name-block">
                            <h1>{{ $displayName }}</h1>
                            <div class="handle-row">
                                <div class="handle">{{ '@' . strtolower(str_replace(' ', '', $displayName)) }}</div>
                                <div class="email">{{ $profileUser?->email ?? session('user_email', 'No email available') }}</div>
                            </div>
                        </div>
                        <div class="action-bar">
                            <a class="btn primary" href="/upload">Upload Sword</a>
                            <button class="edit-btn" type="button" id="open-profile-modal">Edit profile</button>
                        </div>
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
                </div>

                <div class="tabs">
                    <div class="tab-labels">
                        <span class="tab-label tab-label-static">Posts</span>
                    </div>
                </div>

                <div class="tab-panels">
                    <div class="tab-panel feed-panel" style="display:block;">
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
                </div>
            </section>
        </div>
        <div class="modal-backdrop" id="profile-modal">
            <div class="modal" role="dialog" aria-modal="true" aria-labelledby="profile-modal-title">
                <h3 id="profile-modal-title">Edit profile</h3>
                <form method="POST" action="/profile/update" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <label for="profile-name">Username</label>
                        <input id="profile-name" type="text" name="name" value="{{ $displayName }}" required>
                    </div>
                    <div class="field">
                        <label for="profile-photo">Profile picture</label>
                        <input id="profile-photo" type="file" name="profile_photo" accept="image/*">
                    </div>
                    <div class="modal-actions">
                        <button class="btn" type="button" id="close-profile-modal">Cancel</button>
                        <button class="btn primary" type="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            const profileModal = document.getElementById('profile-modal');
            const openModalBtn = document.getElementById('open-profile-modal');
            const closeModalBtn = document.getElementById('close-profile-modal');

            openModalBtn?.addEventListener('click', () => profileModal.classList.add('show'));
            closeModalBtn?.addEventListener('click', () => profileModal.classList.remove('show'));
            profileModal?.addEventListener('click', (event) => {
                if (event.target === profileModal) {
                    profileModal.classList.remove('show');
                }
            });
        </script>
    </body>
</html>
