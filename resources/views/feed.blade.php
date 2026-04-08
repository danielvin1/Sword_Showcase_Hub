<!doctype html>
<html lang="en">
<head>
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
            padding: 40px 22px;
        }
        .shell { max-width: 1100px; margin: 0 auto; }
        .topbar {
            display: flex; align-items: center; justify-content: space-between;
            gap: 20px; margin-bottom: 22px; padding: 14px 18px;
            border: 1px solid #e2e2df; border-radius: 14px;
            background: rgba(255,255,255,0.75); backdrop-filter: blur(6px);
        }
        .brand { font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; font-size: 12px; }
        .menu { display: flex; gap: 18px; font-size: 14px; }
        .menu a { color: inherit; text-decoration: none; opacity: 0.8; }
        h1 { margin: 0 0 12px; font-size: 30px; }
        .empty {
            background: #ffffff; border-radius: 18px; padding: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08); color: #6c6c6c;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 220px));
            gap: 16px;
            justify-content: start;
        }
        .card {
            background: #ffffff; border-radius: 16px;
            border: 1px solid #e0e0e0; overflow: hidden;
        }
        .card img { width: 100%; height: 140px; object-fit: cover; }
        .card-body { padding: 12px; }
        .card-body h3 { margin: 0 0 6px; font-size: 15px; }
        .card-body p { margin: 0; font-size: 13px; color: #5f5f5f;
            display: -webkit-box; -webkit-line-clamp: 2;
            -webkit-box-orient: vertical; overflow: hidden; }
        .tag {
            display: inline-flex; align-items: center; gap: 6px;
            margin-top: 10px; font-size: 12px; font-weight: 600;
            color: #7a5a2b; background: #f3e6d5;
            border-radius: 999px; padding: 4px 8px;
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

    <h1>Feed</h1>

    @if ($swords->isEmpty())
        <div class="empty">This feed is empty for now.</div>
    @else
        <section class="cards">
            @foreach ($swords as $sword)
                <article class="card">
                    @if ($sword->image)
                        <img src="{{ asset('storage/' . $sword->image) }}" alt="{{ $sword->name }}">
                    @else
                        <img src="/images/katana.jpg" alt="{{ $sword->name }}">
                    @endif
                    <div class="card-body">
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
