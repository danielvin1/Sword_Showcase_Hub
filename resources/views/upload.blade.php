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
            min-height: 100vh;
            color: #e8e1d6;
        }

        .shell {
            max-width: 1180px;
            margin: 0 auto;
            padding: 30px 22px 90px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
            padding: 14px 18px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            background: rgba(28, 25, 22, 0.92);
            backdrop-filter: blur(6px);
        }

        .brand {
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-size: 12px;
            color: #f6eedf;
        }

        .menu {
            display: flex;
            gap: 18px;
            row-gap: 8px;
            flex-wrap: wrap;
            font-size: 14px;
        }

        .menu a {
            color: #e8e1d6;
            text-decoration: none;
            opacity: 0.82;
        }

        .menu a:hover { opacity: 1; }

        .panel {
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: linear-gradient(180deg, rgba(34, 30, 26, 0.96), rgba(20, 18, 16, 0.98));
            box-shadow: 0 18px 36px rgba(0, 0, 0, 0.4);
            padding: 28px;
        }

        .eyebrow {
            margin: 0 0 8px;
            font-size: 12px;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            font-weight: 700;
            color: #d8bc87;
        }

        h1 {
            margin: 0;
            font-size: clamp(28px, 4vw, 38px);
            line-height: 1.05;
            color: #f6eedf;
        }

        .subtitle {
            margin: 10px 0 0;
            color: #bfb6a7;
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
            color: #ddd4c3;
        }

        input[type='text'],
        select,
        textarea {
            width: 100%;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.04);
            color: #f4ede2;
            padding: 12px 14px;
            font-size: 14px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        select {
            appearance: none;
            background-image: linear-gradient(45deg, transparent 50%, #d8bc87 50%), linear-gradient(135deg, #d8bc87 50%, transparent 50%);
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
        textarea:focus {
            outline: none;
            border-color: #d8bc87;
            box-shadow: 0 0 0 3px rgba(216, 188, 135, 0.18);
        }

        .image-upload-wrap {
            display: grid;
            gap: 10px;
        }

        .file-input-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .preview-card {
            width: 100%;
            border-radius: 18px;
            border: 1px solid rgba(216, 188, 135, 0.2);
            background: linear-gradient(180deg, rgba(38, 34, 30, 0.96), rgba(23, 21, 18, 0.98));
            display: grid;
            overflow: hidden;
            color: #e8e1d6;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: border-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        }

        .preview-card:hover {
            border-color: rgba(216, 188, 135, 0.45);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.32);
        }

        .preview-card:focus-visible {
            outline: none;
            border-color: #d8bc87;
            box-shadow: 0 0 0 3px rgba(216, 188, 135, 0.22);
        }

        .preview-chrome {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-bottom: 1px solid rgba(216, 188, 135, 0.16);
            background: rgba(255, 255, 255, 0.03);
            font-size: 11px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: #d8bc87;
        }

        .preview-media {
            min-height: 220px;
            display: grid;
            place-items: center;
            padding: 12px;
        }

        .preview-media img {
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
            text-align: center;
        }

        .preview-plus {
            width: 38px;
            height: 38px;
            border-radius: 999px;
            border: 1px solid rgba(216, 188, 135, 0.45);
            color: #d8bc87;
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
            border: 1px solid rgba(216, 188, 135, 0.42);
            background: transparent;
            color: #f4ede2;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: transform 0.2s ease, border-color 0.2s ease, background 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            border-color: rgba(216, 188, 135, 0.65);
            background: rgba(216, 188, 135, 0.12);
        }

        .btn.primary {
            background: linear-gradient(180deg, #f1d8a8 0%, #b7894e 100%);
            color: #1b130b;
            border-color: transparent;
        }

        .btn.primary:hover {
            background: linear-gradient(180deg, #f1d8a8 0%, #a8793f 100%);
            border-color: transparent;
        }

        .message {
            border-radius: 12px;
            padding: 10px 12px;
            font-size: 13px;
            line-height: 1.45;
        }

        .message.error {
            background: rgba(156, 54, 37, 0.22);
            border: 1px solid rgba(236, 145, 128, 0.28);
            color: #ffd8d1;
        }

        @media (max-width: 760px) {
            .topbar { align-items: flex-start; }
            .panel { padding: 20px; border-radius: 18px; }
            .actions { width: 100%; }
            .actions .btn { width: 100%; }
            .preview-media { min-height: 180px; }
            .preview-media img { height: 180px; }
        }
    </style>
    <script src='/js/theme-mode.js'></script>
    <link rel='stylesheet' href='/css/theme.css'>
    <style>
        body.theme-dark .preview-card {
            border-color: rgba(216, 188, 135, 0.28);
            background: linear-gradient(180deg, rgba(36, 33, 29, 0.96), rgba(24, 22, 19, 0.98));
            color: #e8dbc6;
        }

        body.theme-dark .preview-chrome {
            background: rgba(255, 255, 255, 0.03);
            border-bottom-color: rgba(236, 204, 151, 0.2);
            color: #d7c19b;
        }

        body.theme-dark .preview-media {
            background:
                radial-gradient(circle at 20% 24%, rgba(217, 168, 103, 0.18), transparent 50%),
                linear-gradient(180deg, rgba(45, 39, 33, 0.8), rgba(31, 27, 23, 0.85));
        }

        body.theme-dark .preview-plus {
            border-color: rgba(236, 204, 151, 0.5);
            color: #f1d8a8;
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

        <form class="form-grid" method="POST" action="upload/swords" enctype="multipart/form-data">
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
                <label class="preview-card" id="preview-card" for="sword-image" tabindex="0" role="button" aria-label="Choose sword image">
                    <div class="preview-chrome">
                        <span>Blade Preview</span>
                        <span>Tap To Upload</span>
                    </div>
                    <div class="preview-media">
                        <img id="sword-image-preview" alt="Selected sword preview">
                        <div class="preview-placeholder" id="preview-placeholder" aria-hidden="false">
                            <span class="preview-plus">+</span>
                            <span>Click to choose an image</span>
                            <span class="preview-note">Square or landscape images look best</span>
                        </div>
                    </div>
                </label>
                <input class="file-input-hidden" id="sword-image" type="file" name="image" accept="image/*">
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
        const trigger = document.getElementById('preview-card');

        if (!input || !image || !placeholder || !trigger) return;

        trigger.addEventListener('keydown', function (event) {
            if (event.key !== 'Enter' && event.key !== ' ') return;
            event.preventDefault();
            input.click();
        });

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
