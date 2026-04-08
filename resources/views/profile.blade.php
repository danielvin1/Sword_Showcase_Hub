<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile | Sword Showcase Hub</title>
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
                padding: 40px 22px 90px;
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
            .card {
                background: #ffffff; border-radius: 18px; padding: 24px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.08); margin-bottom: 22px;
            }
            .profile-header { display: flex; align-items: center; gap: 16px; margin-bottom: 16px; }
            .avatar {
                width: 72px; height: 72px; border-radius: 50%;
                display: grid; place-items: center; overflow: hidden; flex-shrink: 0;
                background: linear-gradient(180deg, #d9a867 0%, #b98142 100%);
                color: #1b1b1b; font-size: 28px; font-weight: 700;
            }
            .avatar img { width: 100%; height: 100%; object-fit: cover; }
            h1 { margin: 0 0 6px; font-size: 30px; color: #111111; }
            .subtext { margin: 0; color: #6c6c6c; }
            .photo-form {
                display: flex; gap: 10px; flex-wrap: wrap;
                align-items: center; margin-top: 16px;
            }
            .photo-form input[type="file"] { max-width: 240px; font-size: 13px; }
            .details {
                display: grid; grid-template-columns: repeat(2, minmax(0,1fr));
                gap: 12px; margin-top: 16px;
            }
            .detail {
                border: 1px solid #ece5d9; border-radius: 14px;
                padding: 14px; background: #fcfaf6;
            }
            .detail-label {
                display: block; margin-bottom: 6px; font-size: 12px;
                font-weight: 700; letter-spacing: 0.06em;
                text-transform: uppercase; color: #7e756a;
            }
            .detail-value { color: #111111; font-weight: 600; }
            .stats {
                display: grid; grid-template-columns: minmax(0, 220px);
                gap: 14px; margin-top: 18px;
            }
            .stat {
                border: 1px solid #e6dfd3; border-radius: 14px;
                padding: 16px; background: #fbf8f2;
            }
            .stat-label {
                display: block; font-size: 12px; text-transform: uppercase;
                letter-spacing: 0.08em; color: #7e756a; margin-bottom: 8px;
            }
            .stat-value { font-size: 26px; font-weight: 700; color: #111111; }
            .actions { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 18px; }
            .btn {
                display: inline-flex; align-items: center; justify-content: center;
                padding: 12px 18px; border-radius: 999px;
                border: 1px solid #d9c7a8; background: transparent;
                text-decoration: none; color: #111111; font-weight: 600;
            }
            .btn.primary { background: #d9a867; border-color: #d9a867; }
            .message {
                margin-top: 14px; padding: 10px 12px; border-radius: 10px;
                background: #edf7ed; border: 1px solid #cfe6cf; color: #25603a;
            }
            .section-title { margin: 28px 0 12px; font-size: 18px; font-weight: 700; }
            .cards {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(220px, 220px));
                gap: 16px; justify-content: start;
            }
            .sword-card { background: #ffffff; border-radius: 16px; border: 1px solid #e0e0e0; overflow: hidden; }
            .sword-card img { width: 100%; height: 140px; object-fit: cover; }
            .sword-body { padding: 12px; }
            .sword-body h3 { margin: 0 0 6px; font-size: 15px; color: #111111; }
            .sword-body p {
                margin: 0; font-size: 13px; color: #5f5f5f;
                display: -webkit-box; -webkit-line-clamp: 2;
                -webkit-box-orient: vertical; overflow: hidden;
            }
            .tag {
                display: inline-flex; align-items: center; gap: 6px;
                margin-top: 10px; font-size: 12px; font-weight: 600;
                color: #7a5a2b; background: #f3e6d5;
                border-radius: 999px; padding: 4px 8px;
            }
            .empty {
                background: #ffffff; border-radius: 18px; padding: 24px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.08); color: #6c6c6c;
            }
            @media (max-width: 820px) {
                .details { grid-template-columns: 1fr; }
            }
        </style>
    </head>
    <body>
        <div class="shell">
            <div class="topbar">
                <div class="brand">Sword Showcase Hub</div>
                <nav class="menu" aria-label="Top navigation">
                    <a href="/welcome">Explore</a>
                    <a href="/feed">Collections</a>
                    <a href="/profile">Profile</a>
                    <a href="/upload">Upload Sword</a>
                </nav>
            </div>

            <section class="card">
                <div class="profile-header">
                    <div class="avatar">
                        @if ($profileUser?->profile_photo)
                            <img src="{{ asset('storage/' . $profileUser->profile_photo) }}" alt="{{ $profileUser->name }}">
                        @else
                            {{ strtoupper(substr($profileUser?->name ?? session('user_name', 'G'), 0, 1)) }}
                        @endif
                    </div>
                    <div>
                        <h1>{{ $profileUser?->name ?? session('user_name', 'Guest Collector') }}</h1>
                        <p class="subtext">{{ $profileUser?->email ?? session('user_email', 'No email available') }}</p>
                    </div>
                </div>

                @if (session('success'))
                    <div class="message">{{ session('success') }}</div>
                @endif

                <form class="photo-form" method="POST" action="/profile/photo" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="profile_photo" accept="image/*" required>
                    <button class="btn primary" type="submit">Change Picture</button>
                </form>

                <div class="details">
                    <div class="detail">
                        <span class="detail-label">Member Since</span>
                        <div class="detail-value">{{ $profileUser?->created_at?->format('M Y') ?? 'Recently joined' }}</div>
                    </div>
                    <div class="detail">
                        <span class="detail-label">Latest Upload</span>
                        <div class="detail-value">{{ $swords->first()?->created_at?->format('d M Y') ?? 'No uploads yet' }}</div>
                    </div>
                </div>

                <div class="stats">
                    <div class="stat">
                        <span class="stat-label">Total Uploads</span>
                        <div class="stat-value">{{ $swordCount }}</div>
                    </div>
                </div>

                <div class="actions">
                    <a class="btn primary" href="/upload">Upload New Sword</a>
                    <a class="btn" href="/feed">View Feed</a>
                </div>
            </section>

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
    </body>
</html>
