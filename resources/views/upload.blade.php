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

        .shell {
            max-width: 980px;
            margin: 0 auto;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
            padding: 14px 18px;
            border: 1px solid #e2e2df;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(6px);
        }

        .brand {
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-size: 12px;
        }

        .menu {
            display: flex;
            gap: 18px;
            row-gap: 8px;
            flex-wrap: wrap;
            font-size: 14px;
        }

        .menu a {
            color: inherit;
            text-decoration: none;
            opacity: 0.82;
        }

        .menu a:hover { opacity: 1; }

        .panel {
            border-radius: 24px;
            border: 1px solid #e7e1d7;
            background: #ffffff;
            box-shadow: 0 18px 36px rgba(0, 0, 0, 0.1);
            padding: 28px;
        }

        .eyebrow {
            margin: 0 0 8px;
            font-size: 12px;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            font-weight: 700;
            color: #8a7b64;
        }

        h1 {
            margin: 0;
            font-size: clamp(28px, 4vw, 38px);
            line-height: 1.05;
            color: #1b1b1b;
        }

        .subtitle {
            margin: 10px 0 0;
            color: #666666;
            line-height: 1.6;
            max-width: 58ch;
        }

        .form-grid {
            margin-top: 22px;
            display: grid;
            gap: 14px;
        }

        .field {
            display: grid;
            gap: 8px;
        }

        .field label {
            font-size: 13px;
            font-weight: 700;
            color: #4f4a43;
        }

        input[type='text'],
        select,
        textarea,
        input[type='file'] {
            width: 100%;
            border-radius: 14px;
            border: 1px solid #d8d3c8;
            background: #ffffff;
            color: #1b1b1b;
            padding: 12px 14px;
            font-size: 14px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        select {
            appearance: none;
            background-image: linear-gradient(45deg, transparent 50%, #8a7b64 50%), linear-gradient(135deg, #8a7b64 50%, transparent 50%);
            background-position: calc(100% - 18px) calc(50% - 3px), calc(100% - 12px) calc(50% - 3px);
            background-size: 6px 6px, 6px 6px;
            background-repeat: no-repeat;
            padding-right: 34px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input[type='text']:focus,
        select:focus,
        textarea:focus,
        input[type='file']:focus {
            outline: none;
            border-color: #d9a867;
            box-shadow: 0 0 0 3px rgba(217, 168, 103, 0.2);
        }

        .image-upload-wrap {
            display: grid;
            gap: 10px;
        }

        .preview-card {
            width: 100%;
            min-height: 190px;
            border-radius: 16px;
            border: 1px dashed #d8c7ad;
            background:
                radial-gradient(circle at 20% 28%, rgba(217, 168, 103, 0.18), transparent 50%),
                linear-gradient(180deg, #fbf8f3 0%, #f2ece3 100%);
            display: grid;
            place-items: center;
            overflow: hidden;
            text-align: center;
            color: #7a6a52;
            font-size: 13px;
            font-weight: 600;
            padding: 14px;
        }

        .preview-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            object-position: center;
            border-radius: 14px;
            display: none;
        }

        .preview-placeholder {
            display: grid;
            place-items: center;
            gap: 6px;
        }

        .preview-plus {
            width: 38px;
            height: 38px;
            border-radius: 999px;
            border: 1px solid #bda27b;
            color: #8a6b3e;
            display: grid;
            place-items: center;
            font-size: 24px;
            line-height: 1;
        }

        .preview-note {
            font-size: 11px;
            opacity: 0.85;
        }

        .actions {
            margin-top: 6px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 10px 18px;
            border-radius: 999px;
            border: 1px solid #d9c7a8;
            background: transparent;
            color: #1b1b1b;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: transform 0.2s ease, border-color 0.2s ease, background 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            border-color: #d0a66f;
            background: rgba(217, 168, 103, 0.16);
        }

        .btn.primary {
            background: linear-gradient(180deg, #e0bf8d 0%, #c99756 100%);
            color: #1b130b;
            border-color: #bf8d4a;
        }

        .btn.primary:hover {
            background: linear-gradient(180deg, #d6b079 0%, #b78342 100%);
            border-color: #b78342;
        }

        .message {
            border-radius: 12px;
            padding: 10px 12px;
            font-size: 13px;
            line-height: 1.45;
        }

        .message.error {
            background: #ffe9e6;
            border: 1px solid #ffc8be;
            color: #8a2c1d;
        }

        @media (max-width: 760px) {
            .topbar { align-items: flex-start; }
            .panel { padding: 20px; border-radius: 18px; }
            .actions { width: 100%; }
            .actions .btn { width: 100%; }
            .preview-card img { height: 180px; }
        }
    </style>
    <script src='/js/theme-mode.js'></script>
    <link rel='stylesheet' href='/css/theme.css'>
</head>
<body>
<div class="shell">
    <div class="topbar">
        <div class="brand">Sword Showcase Hub</div>
        <nav class="menu" aria-label="Top navigation">
            <a href="/welcome">Explore</a>
            <a href="/feed">Feed</a>
            <a href="/shop">Shop</a>
            <a href="/profile">Profile</a>
            <a href="/upload">Upload Sword</a>
        </nav>
    </div>

    <main class="panel">
        <p class="eyebrow">Create Post</p>
        <h1>Upload your sword</h1>
        <p class="subtitle">Showcase your blade with a clear title, type, and story so it looks polished in the feed and profile cards.</p>

        @if ($errors->any())
            <div class="message error" role="alert">
                <strong>Please fix the following:</strong>
                <ul style="margin: 8px 0 0 18px; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-grid" method="POST" action="/swords" enctype="multipart/form-data">
            @csrf

            <div class="field">
                <label for="sword-name">Sword name</label>
                <input id="sword-name" type="text" name="name" value="{{ old('name') }}" placeholder="Ex: Shadowfang Dagger" required>
            </div>

            <div class="field">
                <label for="sword-type">Type</label>
                <select id="sword-type" name="type" required>
                    <option value="" disabled {{ old('type') ? '' : 'selected' }}>Select a sword type</option>
                    <option value="Longsword" {{ old('type') === 'Longsword' ? 'selected' : '' }}>Longsword</option>
                    <option value="Katana" {{ old('type') === 'Katana' ? 'selected' : '' }}>Katana</option>
                    <option value="Claymore" {{ old('type') === 'Claymore' ? 'selected' : '' }}>Claymore</option>
                    <option value="Rapier" {{ old('type') === 'Rapier' ? 'selected' : '' }}>Rapier</option>
                    <option value="Scimitar" {{ old('type') === 'Scimitar' ? 'selected' : '' }}>Scimitar</option>
                    <option value="Sabre" {{ old('type') === 'Sabre' ? 'selected' : '' }}>Sabre</option>
                    <option value="Dagger" {{ old('type') === 'Dagger' ? 'selected' : '' }}>Dagger</option>
                    <option value="Shortsword" {{ old('type') === 'Shortsword' ? 'selected' : '' }}>Shortsword</option>
                    <option value="Broadsword" {{ old('type') === 'Broadsword' ? 'selected' : '' }}>Broadsword</option>
                    <option value="Greatsword" {{ old('type') === 'Greatsword' ? 'selected' : '' }}>Greatsword</option>
                    <option value="Falchion" {{ old('type') === 'Falchion' ? 'selected' : '' }}>Falchion</option>
                    <option value="Bastard Sword" {{ old('type') === 'Bastard Sword' ? 'selected' : '' }}>Bastard Sword</option>
                    <option value="Fantasy Blade" {{ old('type') === 'Fantasy Blade' ? 'selected' : '' }}>Fantasy Blade</option>
                </select>
            </div>

            <div class="field">
                <label for="sword-description">Description</label>
                <textarea id="sword-description" name="description" placeholder="Tell collectors what makes this blade special.">{{ old('description') }}</textarea>
            </div>

            <div class="field image-upload-wrap">
                <label for="sword-image">Image</label>
                <div class="preview-card" id="preview-card">
                    <img id="sword-image-preview" alt="Selected sword preview">
                    <div class="preview-placeholder" id="preview-placeholder" aria-hidden="false">
                        <span class="preview-plus">+</span>
                        <span>Choose an image to preview</span>
                        <span class="preview-note">Square or landscape images look best</span>
                    </div>
                </div>
                <input id="sword-image" type="file" name="image" accept="image/*">
            </div>

            <div class="actions">
                <button class="btn primary" type="submit">Upload Sword</button>
                <a class="btn" href="/feed">Back to Feed</a>
            </div>
        </form>
    </main>
</div>

<script>
    (function () {
        const input = document.getElementById('sword-image');
        const image = document.getElementById('sword-image-preview');
        const placeholder = document.getElementById('preview-placeholder');

        if (!input || !image || !placeholder) return;

        input.addEventListener('change', function () {
            const file = input.files && input.files[0];
            if (!file) {
                image.removeAttribute('src');
                image.style.display = 'none';
                placeholder.style.display = 'grid';
                placeholder.setAttribute('aria-hidden', 'false');
                return;
            }

            const reader = new FileReader();
            reader.onload = function (event) {
                image.src = event.target && event.target.result ? event.target.result : '';
                image.style.display = 'block';
                placeholder.style.display = 'none';
                placeholder.setAttribute('aria-hidden', 'true');
            };
            reader.readAsDataURL(file);
        });
    })();
</script>
</body>
</html>
