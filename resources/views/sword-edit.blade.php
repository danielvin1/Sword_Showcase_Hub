<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Sword | Sword Showcase Hub</title>
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
            .shell { max-width: 560px; margin: 0 auto; }
            .topbar {
                display: flex; align-items: center; justify-content: space-between;
                gap: 20px; margin-bottom: 22px; padding: 14px 18px;
                border: 1px solid #e2e2df; border-radius: 14px;
                background: rgba(255,255,255,0.75); backdrop-filter: blur(6px);
            }
            .brand { font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; font-size: 12px; }
            .menu { display: flex; gap: 18px; font-size: 14px; }
            .menu a { color: inherit; text-decoration: none; opacity: 0.8; }
            .panel {
                background:#fff;
                padding:26px;
                border-radius:18px;
                box-shadow:0 20px 40px rgba(0,0,0,0.12);
            }
            form { display:grid; gap:12px; }
            input, textarea, button {
                font-size:14px;
                padding:12px;
                border-radius:10px;
                border:1px solid #d0d0d0;
            }
            textarea { resize:none; }
            button {
                border:none;
                background:#1a1a1a;
                color:white;
                font-weight:700;
                cursor:pointer;
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
                </nav>
            </div>

            <div class="panel">
                <h1>Edit Sword</h1>
                <form method="POST" action="/swords/{{ $sword->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $sword->name }}" required>
                    <input type="text" name="type" value="{{ $sword->type }}" required>
                    <textarea name="description" placeholder="Description">{{ $sword->description }}</textarea>
                    <input type="file" name="image">
                    <button type="submit">Save Changes</button>
                </form>
            </div>
        </div>
    </body>
</html>
