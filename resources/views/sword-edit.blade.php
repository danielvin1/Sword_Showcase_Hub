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
    <title>Edit Sword | Sword Showcase Hub</title>
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
            margin-bottom: 22px;
            color: #2c2218;
        }

        .edit-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.15fr) minmax(280px, 0.85fr);
            gap: 22px;
            align-items: start;
        }
        .edit-panel,
        .preview-panel {
            background: #ffffff;
            border-radius: 18px;
            border: 1px solid #e7e1d7;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .edit-panel {
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
        .edit-title {
            margin: 0;
            font-size: clamp(28px, 4vw, 40px);
            line-height: 1.05;
            font-family: "Playfair Display", "Times New Roman", serif;
            color: #111111;
        }
        .edit-copy {
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

        .preview-media {
            min-height: 260px;
            background: #efe7dc;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .preview-media img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            object-position: center;
            display: block;
        }
        .preview-placeholder {
            padding: 24px;
            text-align: center;
            color: #8a7b64;
            font-size: 14px;
        }
        .preview-body {
            padding: 22px;
            display: grid;
            gap: 12px;
        }
        .preview-body h2 {
            margin: 0;
            font-size: 22px;
            color: #111111;
        }
        .preview-type {
            display: inline-flex;
            align-items: center;
            width: fit-content;
            padding: 6px 10px;
            border-radius: 999px;
            background: #f3e6d5;
            color: #7a5a2b;
            font-size: 12px;
            font-weight: 700;
        }
        .preview-body p {
            margin: 0;
            color: #6c6c6c;
            line-height: 1.7;
            font-size: 14px;
        }

        @media (max-width: 900px) {
            .edit-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 720px) {
            .edit-panel {
                padding: 22px;
            }
        }
    </style>
    <script src='/js/theme-mode.js'></script>
    <link rel='stylesheet' href='/css/theme.css'>
</head>
<body>
<div class="shell">
    @include('partials.navbar')

    <div class="edit-layout">
        <main class="edit-panel panel">
            <p class="eyebrow">Update Submission</p>
            <h1 class="edit-title">Edit your sword details.</h1>
            <p class="edit-copy">
                Refine the name, type, description, or image so your post stays polished and consistent across the showcase.
            </p>

            <form class="form-grid" method="POST" action="/swords/{{ $sword->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="sword-name">Sword name</label>
                    <input id="sword-name" type="text" name="name" value="{{ $sword->name }}" required>
                </div>

                <div class="field">
                    <label for="sword-type">Type</label>
                    <input id="sword-type" type="text" name="type" value="{{ $sword->type }}" required>
                </div>

                <div class="field">
                    <label for="sword-description">Description</label>
                    <textarea id="sword-description" name="description" placeholder="Description">{{ $sword->description }}</textarea>
                </div>

                <div class="field">
                    <label for="sword-image">Replace image</label>
                    <input id="sword-image" type="file" name="image" accept="image/*">
                    <div class="field-note">Leave this empty if you want to keep the current image.</div>
                </div>

                <div class="form-actions">
                    <button class="btn primary" type="submit">Save Changes</button>
                    <a class="btn" href="/profile">Back to Profile</a>
                </div>
            </form>
        </main>

        <aside class="preview-panel panel" aria-label="Current sword preview">
            <div class="preview-media">
                @if ($sword->image_url)
                    <img src="{{ $sword->image_url }}" alt="{{ $sword->name }}">
                @else
                    <div class="preview-placeholder">No image uploaded for this sword yet.</div>
                @endif
            </div>
            <div class="preview-body">
                <h2>{{ $sword->name }}</h2>
                <div class="preview-type">{{ $sword->type }}</div>
                <p>{{ $sword->description ?: 'Add a description to give this sword more personality in the showcase.' }}</p>
            </div>
        </aside>
    </div>
</div>
</body>
</html>
