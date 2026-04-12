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
    <title>Upload Sword | Sword Showcase Hub</title>
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
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 22px;
            padding: 14px 18px;
            border: 1px solid #e2e2df;
            border-radius: 14px;
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(6px);
        }
        .brand {
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-size: 12px;
            color: #2c2218;
        }
        .menu {
            display: flex;
            gap: 18px;
            font-size: 14px;
        }
        .menu a {
            color: inherit;
            text-decoration: none;
            opacity: 0.8;
            font-weight: 600;
        }

        .upload-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.15fr) minmax(280px, 0.85fr);
            gap: 22px;
            align-items: start;
        }
        .upload-panel,
        .upload-side {
            background: #ffffff;
            border-radius: 18px;
            border: 1px solid #e7e1d7;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .upload-panel {
            padding: 28px;
        }
        .eyebrow {
            margin: 0 0 10px;
            font-size: 12px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #8a7b64;
            font-weight: 700;
        }
        .upload-title {
            margin: 0;
            font-size: clamp(28px, 4vw, 40px);
            line-height: 1.05;
            font-family: "Playfair Display", "Times New Roman", serif;
            color: #111111;
        }
        .upload-copy {
            margin: 12px 0 0;
            max-width: 58ch;
            color: #6c6c6c;
            font-size: 15px;
            line-height: 1.7;
        }
        .form-grid {
            display: grid;
            gap: 16px;
            margin-top: 28px;
        }
        .field {
            display: grid;
            gap: 8px;
        }
        .field label {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #7e756a;
        }
        .field input,
        .field textarea {
            width: 100%;
            padding: 14px 16px;
            border-radius: 14px;
            border: 1px solid #e2d4bf;
            background: #fffdf9;
            color: #3c2b1c;
            font-size: 15px;
        }
        .field textarea {
            min-height: 140px;
            resize: vertical;
        }
        .field-note {
            color: #8e8478;
            font-size: 13px;
        }
        .form-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
            margin-top: 6px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid #d9c7a8;
            background: transparent;
            color: #111111;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
        }
        .btn.primary {
            background: #d9a867;
            border-color: #d9a867;
        }

        .upload-side {
            padding: 0;
        }
        .side-hero {
            min-height: 220px;
            background:
                linear-gradient(180deg, rgba(17, 17, 17, 0.12), rgba(17, 17, 17, 0.38)),
                url('/images/sword-hero.webp') center/cover;
        }
        .side-body {
            padding: 22px;
            display: grid;
            gap: 16px;
        }
        .side-body h2 {
            margin: 0;
            font-size: 20px;
            color: #111111;
        }
        .side-body p {
            margin: 0;
            color: #6c6c6c;
            line-height: 1.65;
            font-size: 14px;
        }
        .tip-list {
            display: grid;
            gap: 10px;
        }
        .tip {
            padding: 12px 14px;
            border-radius: 14px;
            background: #f8f2e9;
            border: 1px solid #ead9c0;
            color: #4c3a24;
            font-size: 13px;
            line-height: 1.55;
        }
        .tip strong {
            display: block;
            margin-bottom: 4px;
            color: #111111;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .upload-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 720px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }
            .upload-panel {
                padding: 22px;
            }
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

    <div class="upload-layout">
        <main class="upload-panel panel">
            <p class="eyebrow">New Submission</p>
            <h1 class="upload-title">Upload your sword to the showcase.</h1>
            <p class="upload-copy">
                Add the blade name, type, a short description, and an image so it feels right at home in the community feed.
            </p>

            <form class="form-grid" method="POST" action="/swords" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <label for="sword-name">Sword name</label>
                    <input id="sword-name" type="text" name="name" placeholder="Moonlit Katana" required>
                </div>

                <div class="field">
                    <label for="sword-type">Type</label>
                    <input id="sword-type" type="text" name="type" placeholder="Katana, Claymore, Longsword..." required>
                </div>

                <div class="field">
                    <label for="sword-description">Description</label>
                    <textarea id="sword-description" name="description" placeholder="What makes this blade special?"></textarea>
                </div>

                <div class="field">
                    <label for="sword-image">Sword image</label>
                    <input id="sword-image" type="file" name="image" accept="image/*">
                    <div class="field-note">Use a clean, well-lit photo for the best result in the feed.</div>
                </div>

                <div class="form-actions">
                    <button class="btn primary" type="submit">Upload Sword</button>
                    <a class="btn" href="/feed">Back to Feed</a>
                </div>
            </form>
        </main>

        <aside class="upload-side panel" aria-label="Upload guidance">
            <div class="side-hero"></div>
            <div class="side-body">
                <h2>Make it feel like part of the collection</h2>
                <p>
                    The strongest posts are easy to scan, visually clear, and specific about the blade style or story behind it.
                </p>

                <div class="tip-list">
                    <div class="tip">
                        <strong>Name it clearly</strong>
                        Use the proper sword name or the title you want other collectors to remember.
                    </div>
                    <div class="tip">
                        <strong>Call out the type</strong>
                        Keeping the type consistent helps the feed and future filtering feel cleaner.
                    </div>
                    <div class="tip">
                        <strong>Add a quick caption</strong>
                        A short note about origin, design, or handling gives the upload more personality.
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
</body>
</html>
