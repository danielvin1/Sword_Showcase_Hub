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

            :root {
                --text: #111111;
                --gold-soft: #2c2218;
                --muted: #6c6c6c;
            }
            body.theme-dark {
                --text: #f3ece2;
                --gold-soft: #f1d8a8;
                --muted: #c7b9a6;
            }
            body { min-height: 100vh; }
            .profile-wrap {
                background: rgba(15, 13, 11, 0.94);
                border-radius: 22px;
                overflow: hidden;
                border: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: 0 20px 40px rgba(0,0,0,0.35);
            }
            .banner {
                height: 190px;
                background: linear-gradient(120deg, rgba(198, 162, 106, 0.16), rgba(255,255,255,0.06), rgba(198, 162, 106, 0.16));
                background-size: cover;
                background-position: center;
            }
            .profile-main { padding: 0 26px 24px; position: relative; text-align: left; }
            .profile-content { max-width: 760px; margin: 0; }
            .avatar {
                width: 110px; height: 110px; border-radius: 50%;
                border: 4px solid rgba(255,255,255,0.12); overflow: hidden;
                position: absolute; top: -55px; left: 26px;
                background: linear-gradient(180deg, rgba(217,168,103,0.18), rgba(112,76,38,0.26));
                display: grid; place-items: center; font-size: 34px; font-weight: 700; color: var(--text);
            }
            .avatar img { width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; }
            .profile-header { display: flex; align-items: center; justify-content: space-between; padding-top: 70px; gap: 20px; flex-wrap: wrap; }
            .name-block h1 { margin: 0 0 6px; font-size: 30px; letter-spacing: -0.01em; font-family: "Playfair Display", serif; color: var(--gold-soft); }
            .handle, .email, .meta, .stat, .sword-body p { color: var(--muted); }
            .handle-row { display: flex; flex-direction: column; gap: 4px; align-items: flex-start; }
            .handle { font-size: 14px; }
            .email { font-size: 13px; }
            .action-bar { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; position: relative; }
            .edit-btn {
                padding: 10px 18px; border-radius: 999px; border: 1px solid rgba(217,168,103,0.7);
                background: rgba(217,168,103,0.22); color: var(--text); text-decoration: none; font-weight: 600;
            }
            .edit-btn:hover { background: rgba(217,168,103,0.36); }
            .tabs { display: block; padding: 14px 26px 0; border-bottom: 1px solid rgba(255,255,255,0.08); font-weight: 600; color: var(--muted); }
            .tab-label { padding: 10px 14px 12px; cursor: pointer; position: relative; white-space: nowrap; color: var(--muted); transition: color 0.2s ease; }
            .tab-label:hover { color: var(--gold-soft); }
            .tab-label-static { color: var(--text); }
            .tab-label-static::after { content: ""; position: absolute; left: 0; right: 0; bottom: -1px; height: 3px; background: linear-gradient(180deg, #c7a961, #d9a867); border-radius: 999px; }
            .tab-labels { display: flex; gap: 26px; justify-content: flex-start; width: 100%; }
            .tab-panels { padding: 22px 26px 26px; text-align: left; }
            .section-title { margin: 0 0 14px; font-size: 18px; font-weight: 700; color: var(--text); }
            .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 12px; justify-content: flex-start; max-width: 440px; margin-left: 0 !important; margin-right: auto; }
            .sword-card { background: rgba(255,255,255,0.05); border-radius: 16px; border: 1px solid rgba(255,255,255,0.08); overflow: hidden; width: 100%; }
            .sword-card img { width: 100%; height: auto; aspect-ratio: 1 / 1; object-fit: cover; object-position: center; display: block; background: #111; }
            .sword-body { padding: 12px; text-align: left; }
            .sword-body h3 { margin: 0 0 6px; font-size: 15px; color: var(--gold-soft); }
            .tag { display: inline-flex; align-items: center; gap: 6px; margin-top: 10px; font-size: 12px; font-weight: 600; color: #7a5a2b; background: rgba(255,255,255,0.06); border-radius: 999px; padding: 4px 8px; }
            .sword-actions { display: flex; gap: 8px; margin-top: 10px; flex-wrap: wrap; }
            .sword-btn { display: inline-flex; align-items: center; justify-content: center; padding: 7px 10px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.06); color: var(--text); text-decoration: none; font-size: 12px; font-weight: 600; cursor: pointer; }
            .sword-btn.delete { border-color: rgba(192,57,43,0.35); color: #e7babb; background: rgba(192,57,43,0.1); }
            .empty { background: rgba(255,255,255,0.04); border-radius: 16px; padding: 18px; border: 1px solid rgba(255,255,255,0.08); color: var(--muted); }
            .field label { color: var(--muted); }
            .field input { border: 1px solid rgba(255,255,255,0.12); background: rgba(255,255,255,0.05); color: var(--text); }
            .btn { border: 1px solid rgba(217,168,103,0.6); background: rgba(217,168,103,0.18); color: var(--text); }
            .btn.primary { background: #d9a867; border-color: #d9a867; color: #1b130b; }
            .btn.primary:hover { background: #c69252; border-color: #c69252; }
            .btn.danger { background: #b02a37; border-color: #8f1f27; color: #fff; }
            .settings-panel { position: absolute; right: 0; top: calc(100% + 10px); width: 250px; background: rgba(15,13,11,0.98); border: 1px solid rgba(255,255,255,0.08); border-radius: 18px; box-shadow: 0 18px 36px rgba(0,0,0,0.45); padding: 16px; display: none; z-index: 20; }
            .settings-panel.show { display: block; }
            .settings-panel h3 { margin: 0 0 10px; font-size: 15px; color: var(--gold-soft); }
            .settings-panel .option { display: flex; align-items: center; gap: 10px; width: 100%; padding: 10px 12px; border-radius: 14px; border: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.04); color: var(--text); font-weight: 600; cursor: pointer; }
            .settings-panel .option:hover { background: rgba(255,255,255,0.08); }
            .settings-panel small { display: block; margin-top: 10px; color: var(--muted); font-size: 12px; }
            body.light-mode .profile-wrap { background: #ffffff; border-color: #e7e1d7; }
            body.light-mode .sword-card { background: #ffffff; border-color: #e0e0e0; }
            body.light-mode .sword-body h3, body.light-mode .name-block h1 { color: #111; }
            body.light-mode .handle, body.light-mode .email, body.light-mode .meta, body.light-mode .stat, body.light-mode .sword-body p { color: #6c6c6c; }
            body.light-mode .settings-panel { background: #ffffff; color: #111; border-color: #e7e1d7; }
            body.light-mode .settings-panel .option { background: #f7f3ea; color: #111; }
            @media (max-width: 900px) {
                .profile-header { flex-direction: column; align-items: center; }
                .profile-main { padding: 0 20px 20px; }
                .tabs { padding: 14px 20px 0; }
                .tab-panels { padding: 20px; }
                .cards { grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); }
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
                @php
                    $photo = $profileUser?->profile_photo ?? session('profile_photo');
                    $banner = $profileUser?->banner_photo ?? session('profile_banner');
                    $displayName = $profileUser?->name ?? session('user_name', 'Guest Collector');
                    $photoVersion = $profileUser?->updated_at?->timestamp ?? time();
                @endphp
                <div class="banner" id="profile-banner" @if ($banner) style="background-image: url('{{ asset('storage/' . $banner) }}?v={{ $photoVersion }}');" @endif></div>
                <div class="profile-main">
                    <div class="avatar" id="profile-avatar">
                        @if ($photo)
                            <img src="{{ asset('storage/' . $photo) }}?v={{ $photoVersion }}" alt="{{ $displayName }}">
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
                            <a class="btn primary" href="/upload">Upload Sword</a>
                            <button class="btn" type="button" id="open-settings" aria-haspopup="true" aria-expanded="false">⚙️ Settings</button>
                            <button class="edit-btn" type="button" id="open-profile-modal">Edit profile</button>

                            <div class="settings-panel" id="settingsPanel" aria-hidden="true">
                                <h3>Profile settings</h3>
                                <button type="button" class="option" id="toggleTheme">🌗 Switch light/dark</button>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="btn danger logout-btn">🚪 Log out</button>
                                </form>
                                <small>Use light/dark mode for better accessibility.</small>
                            </div>
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
                            <div class="stat"><b>{{ $swords->first()?->created_at?->format('d M Y') ?? '�' }}</b>Latest</div>
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
                                            <div class="sword-actions">
                                                <a class="sword-btn" href="/swords/{{ $sword->id }}/edit">Edit</a>
                                                <form method="POST" action="/swords/{{ $sword->id }}" onsubmit="return confirm('Delete this sword?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="sword-btn delete" type="submit">Delete</button>
                                                </form>
                                            </div>
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
                        <label>Profile picture</label>
                        <label class="modal-photo" for="profile-photo">
                            @if ($photo)
                                <img id="profile-photo-preview" src="{{ asset('storage/' . $photo) }}?v={{ $photoVersion }}" alt="Profile preview">
                            @else
                                <img id="profile-photo-preview" src="" alt="Profile preview" style="display:none;">
                            @endif
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
                        <label class="modal-photo" for="banner-photo">
                            @if ($banner)
                                <img id="banner-photo-preview" src="{{ asset('storage/' . $banner) }}?v={{ $photoVersion }}" alt="Banner preview">
                            @else
                                <img id="banner-photo-preview" src="" alt="Banner preview" style="display:none;">
                            @endif
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
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const profileModal = document.getElementById('profile-modal');
                const openModalBtn = document.getElementById('open-profile-modal');
                const closeModalBtn = document.getElementById('close-profile-modal');
                const photoInput = document.getElementById('profile-photo');
                const photoPreview = document.getElementById('profile-photo-preview');
                const photoLabel = document.getElementById('profile-photo-label');
                const avatar = document.getElementById('profile-avatar');
                const cropper = document.getElementById('profile-cropper');
                const cropperImage = document.getElementById('cropper-image');
                const cropperHint = document.getElementById('cropper-hint');
                const bannerInput = document.getElementById('banner-photo');
                const bannerPreview = document.getElementById('banner-photo-preview');
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

                openModalBtn?.addEventListener('click', () => profileModal?.classList.add('show'));
                closeModalBtn?.addEventListener('click', () => profileModal?.classList.remove('show'));
                profileModal?.addEventListener('click', (event) => {
                    if (event.target === profileModal) {
                        profileModal.classList.remove('show');
                    }
                });

                const settingsButton = document.getElementById('open-settings');
                const settingsPanel = document.getElementById('settingsPanel');
                const toggleThemeBtn = document.getElementById('toggleTheme');

                const applyTheme = (theme) => {
                    document.body.classList.toggle('light-mode', theme === 'light');
                    localStorage.setItem('profileTheme', theme);
                };

                const initialTheme = localStorage.getItem('profileTheme') || 'dark';
                applyTheme(initialTheme);

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

                toggleThemeBtn?.addEventListener('click', () => {
                    const nextTheme = document.body.classList.contains('light-mode') ? 'dark' : 'light';
                    applyTheme(nextTheme);
                });

                const clamp = (value, min, max) => Math.min(Math.max(value, min), max);

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


