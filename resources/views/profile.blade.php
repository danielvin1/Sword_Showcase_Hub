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
        <title>Profile | Sword Showcase Hub</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

            * { box-sizing: border-box; }

            :root {
                --text: #f3ece2;
                --gold-soft: #f1d8a8;
                --muted: #c7b9a6;
            }
            body.theme-dark {
                --text: #f3ece2;
                --gold-soft: #f1d8a8;
                --muted: #c7b9a6;
            }
            body.light-mode {
                --text: #0f1419;
                --gold-soft: #0f1419;
                --muted: #536471;
            }
            body {
                min-height: 100vh;
                margin: 0;
                font-family: "Poppins", "Trebuchet MS", sans-serif;
                color: var(--text);
                background-color: #0d0c0b;
                background-image:
                    radial-gradient(circle at 20% 15%, rgba(255, 197, 122, 0.12), transparent 40%),
                    radial-gradient(circle at 80% 20%, rgba(0, 0, 0, 0.5), transparent 45%),
                    radial-gradient(circle at 50% 100%, rgba(255,255,255,0.05) 0 40%, transparent 41%),
                    radial-gradient(circle at 0 0, rgba(255,255,255,0.04) 0 40%, transparent 41%),
                    linear-gradient(180deg, #0b0a09 0%, #171513 100%);
                background-size: auto, auto, 72px 60px, 72px 60px, auto;
                background-position: 0 0, 0 0, 0 0, 36px 30px, 0 0;
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
                margin-bottom: 26px;
                padding: 12px 20px;
                border-radius: 12px;
                border: 1px solid rgba(255, 255, 255, 0.12);
                background: linear-gradient(180deg, rgba(42, 41, 39, 0.95), rgba(20, 19, 18, 0.95));
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            }
            .brand {
                font-family: 'Cinzel', serif;
                font-weight: 600;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                font-size: 12px;
                color: var(--text);
            }
            .menu {
                display: flex;
                gap: 18px;
                font-size: 14px;
            }
            .menu a {
                text-decoration: none;
                color: var(--text);
                opacity: 0.85;
            }
            .menu a:hover { opacity: 1; }
            .profile-wrap {
                background: linear-gradient(180deg, rgba(38, 35, 32, 0.95), rgba(20, 18, 16, 0.95));
                border-radius: 22px;
                overflow: hidden;
                border: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: 0 20px 40px rgba(0,0,0,0.35);
            }
            .banner {
                height: 190px;
                background:
                    radial-gradient(circle at 20% 24%, rgba(198, 162, 106, 0.14), transparent 42%),
                    linear-gradient(120deg, #2a2118 0%, #35281c 46%, #231a13 100%);
                background-size: cover;
                background-position: center;
                border-bottom: 1px solid rgba(255,255,255,0.06);
            }
            .profile-main { padding: 0 26px 24px; position: relative; text-align: left; }
            .profile-content { max-width: 760px; margin: 0; }
            .avatar {
                width: 110px; height: 110px; border-radius: 50%;
                border: 4px solid rgba(255,255,255,0.12); overflow: hidden;
                position: absolute; top: -55px; left: 26px;
                background: linear-gradient(180deg, #9b7344 0%, #694625 100%);
                display: grid; place-items: center; font-size: 34px; font-weight: 700; color: var(--text);
            }
            .avatar img { width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; }
            .profile-header { display: flex; align-items: center; justify-content: space-between; padding-top: 70px; gap: 20px; flex-wrap: wrap; }
            .name-block h1 { margin: 0 0 6px; font-size: 30px; letter-spacing: -0.01em; font-family: "Playfair Display", serif; color: var(--gold-soft); }
            .handle, .email, .meta, .stat, .sword-body p { color: var(--muted); }
            .handle-row { display: flex; flex-direction: column; gap: 4px; align-items: flex-start; }
            .handle { font-size: 14px; }
            .email { font-size: 13px; }
            .stat b { margin-right: 6px; }
            .action-bar { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; position: relative; }
            .btn,
            .edit-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-height: 42px;
                padding: 10px 18px;
                border-radius: 999px;
                border: 1px solid rgba(217,168,103,0.72);
                background: rgba(217,168,103,0.22);
                color: var(--text);
                text-decoration: none;
                font-weight: 700;
                font-size: 14px;
                line-height: 1;
                cursor: pointer;
                transition: background 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
            }
            .btn.btn-upload {
                min-height: 36px;
                padding: 8px 14px;
                font-size: 13px;
            }
            .btn:hover,
            .edit-btn:hover { background: rgba(217,168,103,0.36); }
            .btn:hover,
            .edit-btn:hover {
                border-color: rgba(217,168,103,0.9);
                transform: translateY(-1px);
            }
            .btn:focus-visible,
            .edit-btn:focus-visible {
                outline: 2px solid rgba(241, 216, 168, 0.85);
                outline-offset: 2px;
            }
            .tabs { display: block; padding: 14px 26px 0; border-bottom: 1px solid rgba(255,255,255,0.08); font-weight: 600; color: var(--muted); }
            .tab-label {
                padding: 10px 14px 12px;
                cursor: pointer;
                position: relative;
                white-space: nowrap;
                color: var(--muted);
                transition: color 0.2s ease;
                border: 0;
                background: transparent;
                font: inherit;
            }
            .tab-label:hover { color: var(--gold-soft); }
            .tab-label-static { color: var(--text); }
            .tab-label-static::after { content: ""; position: absolute; left: 0; right: 0; bottom: -1px; height: 3px; background: linear-gradient(180deg, #c7a961, #d9a867); border-radius: 999px; }
            .tab-labels { display: flex; gap: 26px; justify-content: flex-start; width: 100%; }
            .tab-panels { padding: 22px 26px 26px; text-align: left; }
            .tab-panel { display: none; }
            .section-title { margin: 0 0 14px; font-size: 18px; font-weight: 700; color: var(--text); }
            .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 12px; justify-content: flex-start; max-width: 440px; margin-left: 0 !important; margin-right: auto; }
            .sword-card { background: linear-gradient(180deg, rgba(38, 35, 32, 0.95), rgba(20, 18, 16, 0.95)); border-radius: 16px; border: 1px solid rgba(255,255,255,0.08); overflow: hidden; width: 100%; box-shadow: 0 12px 24px rgba(0,0,0,0.26); }
            .sword-card img { width: 100%; height: auto; aspect-ratio: 1 / 1; object-fit: cover; object-position: center; display: block; background: #111; }
            .sword-body { padding: 12px; text-align: left; }
            .sword-body h3 { margin: 0 0 6px; font-size: 15px; color: var(--gold-soft); }
            .tag { display: inline-flex; align-items: center; gap: 6px; margin-top: 10px; font-size: 12px; font-weight: 600; color: #7a5a2b; background: rgba(255,255,255,0.06); border-radius: 999px; padding: 4px 8px; }
            .sword-actions { display: flex; gap: 8px; margin-top: 10px; flex-wrap: wrap; }
            .sword-btn { display: inline-flex; align-items: center; justify-content: center; padding: 10px 16px; border-radius: 999px; border: 1px solid rgba(198,162,106,0.45); background: transparent; color: var(--text); text-decoration: none; font-size: 13px; font-weight: 600; cursor: pointer; transition: background 0.2s ease, transform 0.2s ease, border-color 0.2s ease; }
            .sword-btn:hover { background: rgba(217,168,103,0.14); border-color: rgba(217,168,103,0.65); transform: translateY(-1px); }
            .sword-btn.delete { border-color: rgba(192,57,43,0.45); color: #f4d7d2; background: rgba(192,57,43,0.12); }
            .sword-btn.delete:hover { background: rgba(192,57,43,0.22); }
            .empty { background: rgba(255,255,255,0.04); border-radius: 16px; padding: 18px; border: 1px solid rgba(255,255,255,0.08); color: var(--muted); }
            .dot { display: inline-block; width: 8px; height: 8px; border-radius: 999px; background: var(--gold-soft); margin-right: 8px; vertical-align: middle; }
            .meta { display: flex; flex-wrap: wrap; gap: 14px; margin: 18px 0; font-size: 13px; color: var(--muted); }
            .field label { color: var(--muted); }
            .field input { border: 1px solid rgba(255,255,255,0.12); background: rgba(255,255,255,0.05); color: var(--text); }
            .btn.primary { background: #d9a867; border-color: #d9a867; color: #1b130b; }
            .btn.primary:hover { background: #c69252; border-color: #c69252; }
            .btn.danger { background: #b02a37; border-color: #8f1f27; color: #fff; }
            .settings-panel {
                position: absolute;
                right: 0;
                top: calc(100% + 12px);
                width: 310px;
                background: linear-gradient(180deg, rgba(24, 22, 19, 0.98), rgba(15, 13, 11, 0.98));
                border: 1px solid rgba(241, 216, 168, 0.15);
                border-radius: 18px;
                box-shadow: 0 22px 46px rgba(0,0,0,0.5);
                padding: 16px;
                display: none;
                z-index: 20;
                backdrop-filter: blur(8px);
            }
            .settings-panel.show { display: block; }
            .settings-panel h3 { margin: 0; font-size: 16px; color: var(--gold-soft); }
            .settings-subtitle {
                margin: 4px 0 14px;
                color: var(--muted);
                font-size: 12px;
                letter-spacing: 0.01em;
            }
            .setting-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding: 12px;
                border-radius: 14px;
                border: 1px solid rgba(255,255,255,0.08);
                background: rgba(255,255,255,0.03);
                margin-bottom: 12px;
            }
            .setting-label {
                color: var(--text);
                font-size: 13px;
                font-weight: 700;
            }
            .theme-toggle {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 4px;
                border-radius: 999px;
                background: rgba(10, 9, 8, 0.62);
                border: 1px solid rgba(241, 216, 168, 0.22);
            }
            .theme-option {
                border: 0;
                background: transparent;
                color: var(--muted);
                min-width: 60px;
                padding: 7px 12px;
                border-radius: 999px;
                font-size: 12px;
                font-weight: 700;
                cursor: pointer;
                transition: background 0.2s ease, color 0.2s ease;
            }
            .theme-option:hover { color: var(--text); }
            .theme-option.active {
                background: linear-gradient(180deg, #e0c08a 0%, #b7894e 100%);
                color: #1b130b;
            }
            .logout-btn {
                width: 100%;
                justify-content: center;
                margin-top: 2px;
            }
            .settings-panel small { display: block; margin-top: 10px; color: var(--muted); font-size: 12px; }
            .modal-backdrop { display: none; position: fixed; inset: 0; z-index: 60; background: rgba(3, 2, 1, 0.72); align-items: center; justify-content: center; padding: 24px; overflow: hidden; }
            .modal-backdrop.show { display: flex; }
            body.modal-open { overflow: hidden; }
            .modal { width: min(100%, 560px); max-width: 100%; max-height: calc(100vh - 48px); overflow-y: auto; overflow-x: hidden; border-radius: 24px; background: rgba(15, 13, 11, 0.98); border: 1px solid rgba(255,255,255,0.08); box-shadow: 0 32px 90px rgba(0,0,0,0.55); padding: 30px; color: var(--text); }
            .modal h3 { margin: 0 0 20px; font-size: 22px; color: var(--gold-soft); }
            .field { margin-bottom: 20px; }
            .field label { display: block; margin-bottom: 10px; color: var(--muted); font-size: 14px; font-weight: 600; }
            .field input[type='text'], .field input[type='file'] { width: 100%; border-radius: 14px; border: 1px solid rgba(255,255,255,0.12); background: rgba(255,255,255,0.04); color: var(--text); padding: 12px 14px; font-size: 14px; }
            .modal-photo { display: block; position: relative; width: 100%; border-radius: 18px; padding: 16px; background: rgba(255,255,255,0.04); border: 1px dashed rgba(255,255,255,0.12); cursor: pointer; overflow: hidden; }
            .modal-photo img { width: 100%; height: auto; max-height: 180px; object-fit: cover; border-radius: 14px; display: block; }
            .modal-photo.banner-picker img {
                height: 120px;
                max-height: none;
                object-fit: cover;
            }
            .photo-placeholder {
                width: 100%;
                min-height: 120px;
                border-radius: 14px;
                border: 1px solid rgba(255,255,255,0.12);
                background:
                    radial-gradient(circle at 20% 30%, rgba(217,168,103,0.18), transparent 46%),
                    linear-gradient(180deg, rgba(30, 26, 22, 0.85), rgba(19, 17, 14, 0.9));
                color: var(--muted);
                display: grid;
                place-items: center;
                text-align: center;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: 0.02em;
                padding: 14px;
            }
            .photo-placeholder .placeholder-plus {
                width: 38px;
                height: 38px;
                border-radius: 999px;
                border: 1px solid rgba(241, 216, 168, 0.5);
                display: grid;
                place-items: center;
                color: var(--gold-soft);
                font-size: 24px;
                line-height: 1;
                margin-bottom: 8px;
            }
            .photo-placeholder .placeholder-title {
                font-size: 13px;
                font-weight: 700;
                color: var(--text);
            }
            .photo-placeholder .placeholder-subtitle {
                margin-top: 4px;
                font-size: 11px;
                color: var(--muted);
                opacity: 0.92;
            }
            .banner-photo-placeholder {
                min-height: 120px;
                border: 1px solid rgba(241, 216, 168, 0.2);
                background:
                    linear-gradient(180deg, rgba(255,255,255,0.03), rgba(255,255,255,0.02)),
                    repeating-linear-gradient(135deg, rgba(241, 216, 168, 0.04) 0 1px, transparent 1px 13px),
                    linear-gradient(180deg, rgba(30, 26, 22, 0.86), rgba(19, 17, 14, 0.94));
            }
            .modal-photo > span[id$='-label'] { display: block; margin-top: 14px; color: var(--text); font-weight: 700; }
            .modal-photo > small { display: block; margin-top: 6px; color: var(--muted); font-size: 12px; }
            .modal-photo input[type='file'] { position: absolute; inset: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer; }
            .cropper { position: relative; width: 100%; min-height: 180px; margin-top: 14px; border-radius: 18px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); overflow: hidden; display: none; }
            .cropper.active { display: block; }
            .cropper img { position: absolute; top: 0; left: 0; display: none; touch-action: none; }
            .cropper.active img { display: block; cursor: grab; }
            .cropper.active img:active { cursor: grabbing; }
            .cropper-hint { margin-top: 10px; color: var(--muted); font-size: 12px; display: none; }
            .modal-actions { display: flex; justify-content: flex-end; gap: 12px; flex-wrap: wrap; margin-top: 18px; }
            body.light-mode {
                background-color: #ffffff;
                background-image:
                    radial-gradient(circle at 14% 12%, rgba(15, 20, 25, 0.045), transparent 40%),
                    radial-gradient(circle at 86% 10%, rgba(15, 20, 25, 0.035), transparent 42%),
                    repeating-linear-gradient(135deg, rgba(15, 20, 25, 0.02) 0 1px, transparent 1px 16px),
                    linear-gradient(180deg, #ffffff 0%, #f8fafb 100%);
                color: #0f1419;
            }
            body.light-mode .topbar {
                background: #ffffff;
                border-color: #e6ecf0;
                box-shadow: 0 1px 0 rgba(15, 20, 25, 0.08);
            }
            body.light-mode .brand,
            body.light-mode .menu a,
            body.light-mode .name-block h1,
            body.light-mode .sword-body h3,
            body.light-mode .section-title,
            body.light-mode .setting-label,
            body.light-mode .modal h3 {
                color: #0f1419;
            }
            body.light-mode .profile-wrap,
            body.light-mode .sword-card,
            body.light-mode .modal,
            body.light-mode .settings-panel,
            body.light-mode .empty {
                background: #ffffff;
                border-color: #e6ecf0;
                box-shadow: 0 6px 20px rgba(15, 20, 25, 0.06);
            }
            body.light-mode .banner {
                background: linear-gradient(180deg, #f7f9f9 0%, #eef3f4 100%);
            }
            body.light-mode .avatar {
                background: #eff3f4;
                color: #0f1419;
                border-color: #ffffff;
            }
            body.light-mode .handle,
            body.light-mode .email,
            body.light-mode .meta,
            body.light-mode .stat,
            body.light-mode .sword-body p,
            body.light-mode .settings-subtitle,
            body.light-mode .settings-panel small,
            body.light-mode .field label,
            body.light-mode .cropper-hint,
            body.light-mode .modal-photo small,
            body.light-mode .photo-placeholder .placeholder-subtitle {
                color: #536471;
            }
            body.light-mode .setting-row {
                background: #f7f9f9;
                border-color: #e6ecf0;
            }
            body.light-mode .theme-toggle {
                background: #eff3f4;
                border-color: #d7e0e5;
            }
            body.light-mode .theme-option { color: #536471; }
            body.light-mode .theme-option:hover { color: #0f1419; }
            body.light-mode .theme-option.active {
                background: #0f1419;
                color: #ffffff;
            }
            body.light-mode .btn,
            body.light-mode .edit-btn,
            body.light-mode .sword-btn {
                background: #ffffff;
                color: #0f1419;
                border-color: #cfd9de;
            }
            body.light-mode .btn:hover,
            body.light-mode .edit-btn:hover,
            body.light-mode .sword-btn:hover {
                background: #f7f9f9;
                border-color: #b7c5cc;
            }
            body.light-mode .btn.primary {
                background: #0f1419;
                color: #ffffff;
                border-color: #0f1419;
            }
            body.light-mode .btn.primary:hover {
                background: #1d2730;
                border-color: #1d2730;
            }
            body.light-mode .btn.danger { background: #d73a49; color: #fff; border-color: #cf2e3d; }
            body.light-mode .tabs {
                border-bottom-color: #e6ecf0;
                color: #536471;
            }
            body.light-mode .tab-label-static { color: #0f1419; }
            body.light-mode .tab-label-static::after { background: #0f1419; }
            body.light-mode .dot { background: #536471; }
            body.light-mode .tag {
                color: #536471;
                background: #f7f9f9;
                border: 1px solid #e6ecf0;
            }
            body.light-mode .field input,
            body.light-mode .field input[type='text'],
            body.light-mode .field input[type='file'] {
                background: #ffffff;
                color: #0f1419;
                border-color: #cfd9de;
            }
            body.light-mode .modal-backdrop { background: rgba(15, 20, 25, 0.35); }
            body.light-mode .modal-photo,
            body.light-mode .cropper {
                background: #f7f9f9;
                border-color: #dce4e8;
            }
            body.light-mode .photo-placeholder {
                border-color: #dce4e8;
                background: #f7f9f9;
                color: #536471;
            }
            body.light-mode .photo-placeholder .placeholder-plus {
                border-color: #c7d3d9;
                color: #0f1419;
            }
            body.light-mode .photo-placeholder .placeholder-title { color: #0f1419; }
            body.light-mode .banner-photo-placeholder {
                border-color: #dce4e8;
                background:
                    repeating-linear-gradient(135deg, rgba(83, 100, 113, 0.07) 0 1px, transparent 1px 12px),
                    #f4f7f8;
            }
            @media (max-width: 900px) {
                .profile-header { flex-direction: column; align-items: center; }
                .profile-main { padding: 0 20px 20px; }
                .tabs { padding: 14px 20px 0; }
                .tab-panels { padding: 20px; }
                .cards { grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); }
                .btn.btn-upload { min-height: 34px; padding: 7px 12px; }
                .modal-backdrop { padding: 12px; }
                .modal { max-height: calc(100vh - 24px); padding: 20px; border-radius: 18px; }
                .settings-panel {
                    width: min(320px, calc(100vw - 42px));
                    right: 50%;
                    transform: translateX(50%);
                }
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

            <section class="profile-wrap">
                @php
                    $photo = $profileUser?->profile_photo ?? session('profile_photo');
                    $banner = $profileUser?->banner_photo ?? session('profile_banner');
                    $displayName = $profileUser?->name ?? session('user_name', 'Guest Collector');
                    $photoVersion = $profileUser?->updated_at?->timestamp ?? time();
                    $profilePhotoUrl = $profileUser?->profile_photo_url ?: '';
                    $bannerPhotoUrl = $profileUser?->banner_photo_url ?: '';
                @endphp
                <div class="banner" id="profile-banner" @if ($bannerPhotoUrl) style="background-image: url('{{ $bannerPhotoUrl }}?v={{ $photoVersion }}');" @endif></div>
                <div class="profile-main">
                    <div class="avatar" id="profile-avatar">
                        @if ($profilePhotoUrl)
                            <img src="{{ $profilePhotoUrl }}?v={{ $photoVersion }}" alt="{{ $displayName }}">
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
                        <div class="action-bar settings-container">
                            @if ($isOwnProfile)
                                <a class="btn primary btn-upload" href="/upload">Upload Sword</a>
                                <button class="btn" type="button" id="open-settings" aria-haspopup="true" aria-expanded="false">Settings</button>
                                <button class="edit-btn" type="button" id="open-profile-modal">Edit profile</button>

                                <div class="settings-panel" id="settingsPanel" aria-hidden="true">
                                    <h3>Settings</h3>
                                    <p class="settings-subtitle">Appearance and account</p>
                                    <div class="setting-row">
                                        <span class="setting-label">Theme</span>
                                        <div class="theme-toggle" role="group" aria-label="Theme mode">
                                            <button type="button" class="theme-option" id="theme-dark-btn" aria-pressed="false">Dark</button>
                                            <button type="button" class="theme-option" id="theme-light-btn" aria-pressed="false">Light</button>
                                        </div>
                                    </div>
                                    <form method="POST" action="/logout">
                                        @csrf
                                        <button type="submit" class="btn danger logout-btn">Log out</button>
                                    </form>
                                    <small>Theme preference is saved on this browser.</small>
                                </div>
                            @elseif ($profileUser)
                                <button class="btn primary js-profile-follow-btn{{ $isFollowing ? ' is-following' : '' }}" type="button" data-user-id="{{ $profileUser->id }}">{{ $isFollowing ? 'Following' : 'Follow' }}</button>
                            @endif
                        </div>
                    </div>

                        <div class="meta">
                            <span><span class="dot"></span> Joined {{ $profileUser?->created_at?->format('M Y') ?? 'Recently' }}</span>
                        </div>

                        <div class="stats">
                            <div class="stat"><b>{{ $swordCount }}</b>Uploads</div>
                            <div class="stat"><b>{{ $swords->count() }}</b>Posts</div>
                            @if (! $isOwnProfile)
                                <div class="stat"><b class="js-follower-count">{{ $followerCount ?? 0 }}</b>Followers</div>
                                <div class="stat"><b>{{ $followingCount ?? 0 }}</b>Following</div>
                            @endif
                            <div class="stat"><b>{{ $swords->first()?->created_at?->format('d M Y') ?? '-' }}</b>Latest</div>
                        </div>
                    </div>
                </div>

                <div class="tabs">
                    <div class="tab-labels">
                        <button type="button" class="tab-label tab-label-static" data-tab-target="posts-panel">Posts</button>
                        <button type="button" class="tab-label" data-tab-target="likes-panel">Likes</button>
                    </div>
                </div>

                <div class="tab-panels">
                    <div class="tab-panel feed-panel posts-panel" style="display:block;">
                        <div class="section-title">{{ $isOwnProfile ? 'My Swords' : $displayName . '\'s Swords' }}</div>

                        @if ($swords->isEmpty())
                            <div class="empty">{{ $isOwnProfile ? 'You have not uploaded any swords yet.' : 'No swords uploaded yet.' }}</div>
                        @else
                            <section class="cards">
                                @foreach ($swords as $sword)
                                    <article class="sword-card">
                                        @if ($sword->image_url)
                                            <img src="{{ $sword->image_url }}" alt="{{ $sword->name }}">
                                        @else
                                            <img src="/images/katana.jpg" alt="{{ $sword->name }}">
                                        @endif
                                        <div class="sword-body">
                                            <h3>{{ $sword->name }}</h3>
                                            <p>{{ $sword->description ?: 'No description added yet.' }}</p>
                                            <div class="tag">{{ $sword->type }}</div>
                                            @if ($isOwnProfile)
                                                <div class="sword-actions">
                                                    <a class="sword-btn" href="/swords/{{ $sword->id }}/edit">Edit</a>
                                                    <form method="POST" action="/swords/{{ $sword->id }}" onsubmit="return confirm('Delete this sword?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="sword-btn delete" type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </article>
                                @endforeach
                            </section>
                        @endif
                    </div>

                    <div class="tab-panel feed-panel likes-panel">
                        <div class="section-title">{{ $isOwnProfile ? 'Swords I Like' : $displayName . '\'s Likes' }}</div>

                        @if ($likedSwords->isEmpty())
                            <div class="empty">{{ $isOwnProfile ? 'You have not liked any swords yet.' : $displayName . ' has not liked any swords yet.' }}</div>
                        @else
                            <section class="cards">
                                @foreach ($likedSwords as $sword)
                                    <article class="sword-card">
                                        @if ($sword->image_url)
                                            <img src="{{ $sword->image_url }}" alt="{{ $sword->name }}">
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
        @if ($isOwnProfile)
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
                            <label>Profile picture</label>
                            <label class="modal-photo" for="profile-photo">
                                @if ($profilePhotoUrl)
                                    <img id="profile-photo-preview" src="{{ $profilePhotoUrl }}?v={{ $photoVersion }}" alt="Profile preview">
                                @else
                                    <img id="profile-photo-preview" src="" alt="Profile preview" style="display:none;">
                                @endif
                                <div class="photo-placeholder" id="profile-photo-placeholder" @if ($profilePhotoUrl) style="display:none;" @endif>
                                    <span class="placeholder-plus">+</span>
                                    <span class="placeholder-title">Add profile photo</span>
                                    <span class="placeholder-subtitle">Square crop recommended</span>
                                </div>
                                <span id="profile-photo-label">{{ $photo ? 'Change photo' : 'Add photo' }}</span>
                                <small>Drag to crop</small>
                                <input id="profile-photo" type="file" name="profile_photo" accept="image/*">
                            </label>
                            <div class="cropper" id="profile-cropper">
                                <img id="cropper-image" src="" alt="Crop preview">
                            </div>
                            <div class="cropper-hint" id="cropper-hint">Drag the photo to position it.</div>
                        </div>
                        <div class="field">
                            <label>Banner image</label>
                            <label class="modal-photo banner-picker" for="banner-photo">
                                @if ($bannerPhotoUrl)
                                    <img id="banner-photo-preview" src="{{ $bannerPhotoUrl }}?v={{ $photoVersion }}" alt="Banner preview">
                                @else
                                    <img id="banner-photo-preview" src="" alt="Banner preview" style="display:none;">
                                @endif
                                <div class="photo-placeholder banner-photo-placeholder" id="banner-photo-placeholder" @if ($bannerPhotoUrl) style="display:none;" @endif>
                                    <span class="placeholder-plus">+</span>
                                    <span class="placeholder-title">Add banner image</span>
                                    <span class="placeholder-subtitle">Wide format works best</span>
                                </div>
                                <span id="banner-photo-label">{{ $banner ? 'Change banner' : 'Add banner' }}</span>
                                <small>Drag to crop</small>
                                <input id="banner-photo" type="file" name="banner_photo" accept="image/*">
                            </label>
                            <div class="cropper banner" id="banner-cropper">
                                <img id="banner-cropper-image" src="" alt="Banner crop preview">
                            </div>
                            <div class="cropper-hint" id="banner-cropper-hint">Drag the banner to position it.</div>
                        </div>
                        <div class="modal-actions">
                            <button class="btn" type="button" id="close-profile-modal">Cancel</button>
                            <button class="btn primary" type="submit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const currentUserLoggedIn = @json((bool) ($currentUser ?? null));
                const csrfToken = @json(csrf_token());
                const profileFollowButton = document.querySelector('.js-profile-follow-btn');
                const followerCount = document.querySelector('.js-follower-count');
                const settingsButton = document.getElementById('open-settings');
                const settingsPanel = document.getElementById('settingsPanel');
                const themeDarkBtn = document.getElementById('theme-dark-btn');
                const themeLightBtn = document.getElementById('theme-light-btn');
                const profileModal = document.getElementById('profile-modal');
                const openModalBtn = document.getElementById('open-profile-modal');
                const closeModalBtn = document.getElementById('close-profile-modal');
                const photoInput = document.getElementById('profile-photo');
                const photoPreview = document.getElementById('profile-photo-preview');
                const photoPlaceholder = document.getElementById('profile-photo-placeholder');
                const photoLabel = document.getElementById('profile-photo-label');
                const avatar = document.getElementById('profile-avatar');
                const cropper = document.getElementById('profile-cropper');
                const cropperImage = document.getElementById('cropper-image');
                const cropperHint = document.getElementById('cropper-hint');
                const bannerInput = document.getElementById('banner-photo');
                const bannerPreview = document.getElementById('banner-photo-preview');
                const bannerPlaceholder = document.getElementById('banner-photo-placeholder');
                const bannerLabel = document.getElementById('banner-photo-label');
                const bannerCropper = document.getElementById('banner-cropper');
                const bannerCropperImage = document.getElementById('banner-cropper-image');
                const bannerCropperHint = document.getElementById('banner-cropper-hint');
                const bannerEl = document.getElementById('profile-banner');
                const form = profileModal?.querySelector('form');
                const cropSize = 240;
                const bannerCrop = { width: 320, height: 120 };
                const cropState = {
                    naturalWidth: 0,
                    naturalHeight: 0,
                    scale: 1,
                    offsetX: 0,
                    offsetY: 0,
                    displayWidth: 0,
                    displayHeight: 0,
                };
                const bannerState = {
                    naturalWidth: 0,
                    naturalHeight: 0,
                    scale: 1,
                    offsetX: 0,
                    offsetY: 0,
                    displayWidth: 0,
                    displayHeight: 0,
                };

                const applyTheme = (theme) => {
                    document.body.classList.toggle('light-mode', theme === 'light');
                    document.body.classList.toggle('theme-dark', theme === 'dark');
                    localStorage.setItem('profileTheme', theme);
                    if (themeDarkBtn && themeLightBtn) {
                        themeDarkBtn.classList.toggle('active', theme === 'dark');
                        themeLightBtn.classList.toggle('active', theme === 'light');
                        themeDarkBtn.setAttribute('aria-pressed', String(theme === 'dark'));
                        themeLightBtn.setAttribute('aria-pressed', String(theme === 'light'));
                    }
                };

                applyTheme(localStorage.getItem('profileTheme') === 'light' ? 'light' : 'dark');

                settingsButton?.addEventListener('click', () => {
                    if (!settingsPanel || !settingsButton) return;
                    const isOpen = settingsPanel.classList.toggle('show');
                    settingsButton.setAttribute('aria-expanded', String(isOpen));
                    settingsPanel.setAttribute('aria-hidden', String(!isOpen));
                });

                document.addEventListener('click', (event) => {
                    if (!settingsPanel || !settingsButton) return;
                    if (settingsPanel.contains(event.target) || settingsButton.contains(event.target)) {
                        return;
                    }
                    settingsPanel.classList.remove('show');
                    settingsPanel.setAttribute('aria-hidden', 'true');
                    settingsButton.setAttribute('aria-expanded', 'false');
                });

                themeDarkBtn?.addEventListener('click', () => applyTheme('dark'));
                themeLightBtn?.addEventListener('click', () => applyTheme('light'));

                profileFollowButton?.addEventListener('click', async () => {
                    if (!currentUserLoggedIn) {
                        window.location.href = '/login';
                        return;
                    }

                    const userId = profileFollowButton.dataset.userId;

                    if (!userId || profileFollowButton.disabled) {
                        return;
                    }

                    const previousLabel = profileFollowButton.textContent;
                    profileFollowButton.disabled = true;
                    profileFollowButton.textContent = '...';

                    try {
                        const response = await fetch(`/users/${userId}/follow`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({}),
                        });

                        const data = await response.json();

                        if (!response.ok) {
                            throw new Error(data.message || 'Unable to update follow status.');
                        }

                        profileFollowButton.textContent = data.button_label;
                        profileFollowButton.classList.toggle('is-following', data.following);

                        if (followerCount) {
                            followerCount.textContent = data.follower_count;
                        }
                    } catch (error) {
                        profileFollowButton.textContent = previousLabel;
                        window.alert(error.message || 'Unable to update follow status.');
                    } finally {
                        profileFollowButton.disabled = false;
                    }
                });

                const openProfileModal = () => {
                    if (!profileModal) {
                        return;
                    }
                    profileModal.classList.add('show');
                    document.body.classList.add('modal-open');
                };

                const closeProfileModal = () => {
                    if (!profileModal) {
                        return;
                    }
                    profileModal.classList.remove('show');
                    document.body.classList.remove('modal-open');
                };

                openModalBtn?.addEventListener('click', openProfileModal);
                closeModalBtn?.addEventListener('click', closeProfileModal);
                profileModal?.addEventListener('click', (event) => {
                    if (event.target === profileModal) {
                        closeProfileModal();
                    }
                });
                document.addEventListener('keydown', (event) => {
                    if (event.key === 'Escape' && profileModal?.classList.contains('show')) {
                        closeProfileModal();
                    }
                });

                const tabButtons = Array.from(document.querySelectorAll('[data-tab-target]'));
                const tabPanels = Array.from(document.querySelectorAll('.tab-panel'));

                const setActiveTab = (targetClass) => {
                    tabButtons.forEach((button) => {
                        const isActive = button.dataset.tabTarget === targetClass;
                        button.classList.toggle('tab-label-static', isActive);
                    });

                    tabPanels.forEach((panel) => {
                        panel.style.display = panel.classList.contains(targetClass) ? 'block' : 'none';
                    });
                };

                tabButtons.forEach((button) => {
                    button.addEventListener('click', () => {
                        if (!button.dataset.tabTarget) {
                            return;
                        }

                        setActiveTab(button.dataset.tabTarget);
                    });
                });

                const clamp = (value, min, max) => Math.min(Math.max(value, min), max);

                const syncPreviewState = (preview, placeholder) => {
                    if (!preview) {
                        return;
                    }

                    const hasSrc = Boolean(preview.getAttribute('src'));
                    preview.style.display = hasSrc ? 'block' : 'none';

                    if (placeholder) {
                        placeholder.style.display = hasSrc ? 'none' : 'grid';
                    }

                    preview.addEventListener('error', () => {
                        preview.style.display = 'none';
                        if (placeholder) {
                            placeholder.style.display = 'grid';
                        }
                    });
                };

                const syncCropperState = (cropperEl, imageEl, hintEl) => {
                    if (!cropperEl || !imageEl) {
                        return;
                    }

                    const hasImage = Boolean(imageEl.getAttribute('src'));
                    cropperEl.classList.toggle('active', hasImage);

                    if (hintEl) {
                        hintEl.style.display = hasImage ? 'block' : 'none';
                    }
                };

                syncPreviewState(photoPreview, photoPlaceholder);
                syncPreviewState(bannerPreview, bannerPlaceholder);
                syncCropperState(cropper, cropperImage, cropperHint);
                syncCropperState(bannerCropper, bannerCropperImage, bannerCropperHint);

                const updateCropper = (file) => {
                    if (!file || !cropper || !cropperImage) {
                        return;
                    }
                    const objectUrl = URL.createObjectURL(file);
                    const img = new Image();
                    img.onload = () => {
                        cropState.naturalWidth = img.naturalWidth;
                        cropState.naturalHeight = img.naturalHeight;
                        cropState.scale = Math.max(cropSize / img.naturalWidth, cropSize / img.naturalHeight);
                        cropState.displayWidth = img.naturalWidth * cropState.scale;
                        cropState.displayHeight = img.naturalHeight * cropState.scale;
                        cropState.offsetX = (cropSize - cropState.displayWidth) / 2;
                        cropState.offsetY = (cropSize - cropState.displayHeight) / 2;

                        cropperImage.src = objectUrl;
                        cropperImage.style.width = `${cropState.displayWidth}px`;
                        cropperImage.style.height = `${cropState.displayHeight}px`;
                        cropperImage.style.left = `${cropState.offsetX}px`;
                        cropperImage.style.top = `${cropState.offsetY}px`;
                        cropper.classList.add('active');
                        if (cropperHint) {
                            cropperHint.style.display = 'block';
                        }
                        if (photoPreview) {
                            photoPreview.src = objectUrl;
                            photoPreview.style.display = 'block';
                        }
                        if (photoPlaceholder) {
                            photoPlaceholder.style.display = 'none';
                        }
                        if (photoLabel) {
                            photoLabel.textContent = 'Change photo';
                        }
                    };
                    img.src = objectUrl;
                };

                let dragging = false;
                let startX = 0;
                let startY = 0;
                let startOffsetX = 0;
                let startOffsetY = 0;

                cropperImage?.addEventListener('pointerdown', (event) => {
                    dragging = true;
                    startX = event.clientX;
                    startY = event.clientY;
                    startOffsetX = cropState.offsetX;
                    startOffsetY = cropState.offsetY;
                    cropperImage.setPointerCapture(event.pointerId);
                });

                cropperImage?.addEventListener('pointermove', (event) => {
                    if (!dragging) {
                        return;
                    }
                    const dx = event.clientX - startX;
                    const dy = event.clientY - startY;
                    const minX = cropSize - cropState.displayWidth;
                    const minY = cropSize - cropState.displayHeight;
                    cropState.offsetX = clamp(startOffsetX + dx, minX, 0);
                    cropState.offsetY = clamp(startOffsetY + dy, minY, 0);
                    cropperImage.style.left = `${cropState.offsetX}px`;
                    cropperImage.style.top = `${cropState.offsetY}px`;
                });

                const endDrag = () => { dragging = false; };
                cropperImage?.addEventListener('pointerup', endDrag);
                cropperImage?.addEventListener('pointercancel', endDrag);

                const buildCroppedBlob = (file) => new Promise((resolve) => {
                    const img = new Image();
                    const objectUrl = URL.createObjectURL(file);
                    img.onload = () => {
                        const scale = cropState.scale || 1;
                        const sx = Math.max(0, Math.round((0 - cropState.offsetX) / scale));
                        const sy = Math.max(0, Math.round((0 - cropState.offsetY) / scale));
                        const sSize = Math.min(img.naturalWidth - sx, img.naturalHeight - sy, Math.round(cropSize / scale));
                        const canvas = document.createElement('canvas');
                        const targetSize = 400;
                        canvas.width = targetSize;
                        canvas.height = targetSize;
                        const ctx = canvas.getContext('2d');
                        if (!ctx) {
                            resolve(null);
                            return;
                        }
                        ctx.drawImage(img, sx, sy, sSize, sSize, 0, 0, targetSize, targetSize);
                        canvas.toBlob((blob) => {
                            URL.revokeObjectURL(objectUrl);
                            resolve(blob);
                        }, 'image/jpeg', 0.92);
                    };
                    img.src = objectUrl;
                });

                const updateBannerCropper = (file) => {
                    if (!file || !bannerCropper || !bannerCropperImage) {
                        return;
                    }
                    const objectUrl = URL.createObjectURL(file);
                    const img = new Image();
                    img.onload = () => {
                        bannerState.naturalWidth = img.naturalWidth;
                        bannerState.naturalHeight = img.naturalHeight;
                        bannerState.scale = Math.max(bannerCrop.width / img.naturalWidth, bannerCrop.height / img.naturalHeight);
                        bannerState.displayWidth = img.naturalWidth * bannerState.scale;
                        bannerState.displayHeight = img.naturalHeight * bannerState.scale;
                        bannerState.offsetX = (bannerCrop.width - bannerState.displayWidth) / 2;
                        bannerState.offsetY = (bannerCrop.height - bannerState.displayHeight) / 2;

                        bannerCropperImage.src = objectUrl;
                        bannerCropperImage.style.width = `${bannerState.displayWidth}px`;
                        bannerCropperImage.style.height = `${bannerState.displayHeight}px`;
                        bannerCropperImage.style.left = `${bannerState.offsetX}px`;
                        bannerCropperImage.style.top = `${bannerState.offsetY}px`;
                        bannerCropper.classList.add('active');
                        if (bannerCropperHint) {
                            bannerCropperHint.style.display = 'block';
                        }
                        if (bannerPreview) {
                            bannerPreview.src = objectUrl;
                            bannerPreview.style.display = 'block';
                        }
                        if (bannerPlaceholder) {
                            bannerPlaceholder.style.display = 'none';
                        }
                        if (bannerLabel) {
                            bannerLabel.textContent = 'Change banner';
                        }
                    };
                    img.src = objectUrl;
                };

                let bannerDragging = false;
                let bannerStartX = 0;
                let bannerStartY = 0;
                let bannerStartOffsetX = 0;
                let bannerStartOffsetY = 0;

                bannerCropperImage?.addEventListener('pointerdown', (event) => {
                    bannerDragging = true;
                    bannerStartX = event.clientX;
                    bannerStartY = event.clientY;
                    bannerStartOffsetX = bannerState.offsetX;
                    bannerStartOffsetY = bannerState.offsetY;
                    bannerCropperImage.setPointerCapture(event.pointerId);
                });

                bannerCropperImage?.addEventListener('pointermove', (event) => {
                    if (!bannerDragging) {
                        return;
                    }
                    const dx = event.clientX - bannerStartX;
                    const dy = event.clientY - bannerStartY;
                    const minX = bannerCrop.width - bannerState.displayWidth;
                    const minY = bannerCrop.height - bannerState.displayHeight;
                    bannerState.offsetX = clamp(bannerStartOffsetX + dx, minX, 0);
                    bannerState.offsetY = clamp(bannerStartOffsetY + dy, minY, 0);
                    bannerCropperImage.style.left = `${bannerState.offsetX}px`;
                    bannerCropperImage.style.top = `${bannerState.offsetY}px`;
                });

                const endBannerDrag = () => { bannerDragging = false; };
                bannerCropperImage?.addEventListener('pointerup', endBannerDrag);
                bannerCropperImage?.addEventListener('pointercancel', endBannerDrag);

                const buildBannerBlob = (file) => new Promise((resolve) => {
                    const img = new Image();
                    const objectUrl = URL.createObjectURL(file);
                    img.onload = () => {
                        const scale = bannerState.scale || 1;
                        const sx = Math.max(0, Math.round((0 - bannerState.offsetX) / scale));
                        const sy = Math.max(0, Math.round((0 - bannerState.offsetY) / scale));
                        const sWidth = Math.min(img.naturalWidth - sx, Math.round(bannerCrop.width / scale));
                        const sHeight = Math.min(img.naturalHeight - sy, Math.round(bannerCrop.height / scale));
                        const canvas = document.createElement('canvas');
                        const targetWidth = 1200;
                        const targetHeight = 450;
                        canvas.width = targetWidth;
                        canvas.height = targetHeight;
                        const ctx = canvas.getContext('2d');
                        if (!ctx) {
                            resolve(null);
                            return;
                        }
                        ctx.drawImage(img, sx, sy, sWidth, sHeight, 0, 0, targetWidth, targetHeight);
                        canvas.toBlob((blob) => {
                            URL.revokeObjectURL(objectUrl);
                            resolve(blob);
                        }, 'image/jpeg', 0.92);
                    };
                    img.src = objectUrl;
                });

                photoInput?.addEventListener('change', (event) => {
                    const file = event.target.files?.[0];
                    updateCropper(file);
                });

                bannerInput?.addEventListener('change', (event) => {
                    const file = event.target.files?.[0];
                    updateBannerCropper(file);
                });

                form?.addEventListener('submit', async (event) => {
                    event.preventDefault();
                    const file = photoInput?.files?.[0];
                    const bannerFile = bannerInput?.files?.[0];

                    if (file && photoInput) {
                        const blob = await buildCroppedBlob(file);
                        if (blob) {
                            const croppedFile = new File([blob], file.name.replace(/\.[^.]+$/, '') + '-crop.jpg', { type: 'image/jpeg' });
                            const dt = new DataTransfer();
                            dt.items.add(croppedFile);
                            photoInput.files = dt.files;

                            const avatarImg = avatar?.querySelector('img');
                            const previewUrl = URL.createObjectURL(croppedFile);
                            if (avatarImg) {
                                avatarImg.src = previewUrl;
                            } else if (avatar) {
                                avatar.textContent = '';
                                const newImg = document.createElement('img');
                                newImg.src = previewUrl;
                                newImg.alt = 'Profile preview';
                                avatar.appendChild(newImg);
                            }
                        }
                    }

                    if (bannerFile && bannerInput) {
                        const bannerBlob = await buildBannerBlob(bannerFile);
                        if (bannerBlob) {
                            const croppedBanner = new File([bannerBlob], bannerFile.name.replace(/\.[^.]+$/, '') + '-banner.jpg', { type: 'image/jpeg' });
                            const dtBanner = new DataTransfer();
                            dtBanner.items.add(croppedBanner);
                            bannerInput.files = dtBanner.files;
                            if (bannerEl) {
                                bannerEl.style.backgroundImage = `url(${URL.createObjectURL(croppedBanner)})`;
                            }
                        }
                    }

                    form.submit();
                });
            });
        </script>
    </body>
</html>


