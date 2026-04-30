<!doctype html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" sizes="16x16" href="/images/bladeshare-favicon-16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/bladeshare-favicon-32.png">
    <link rel="icon" type="image/png" sizes="48x48" href="/images/bladeshare-favicon-48.png">
    <link rel="icon" type="image/png" sizes="64x64" href="/images/bladeshare-favicon-64.png">
    <link rel="icon" type="image/png" sizes="128x128" href="/images/bladeshare-favicon-128.png">
    <link rel="apple-touch-icon" sizes="128x128" href="/images/bladeshare-favicon-128.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Sword Showcase Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --accent: #b96d1f;
            --accent-dark: #8c5112;
            --panel-border: rgba(17, 17, 17, 0.08);
            --surface: rgba(255, 255, 255, 0.94);
            --text-muted: #666666;
        }
        * {
            box-sizing: border-box;
        }
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
            min-height: 100vh;
        }
        .auth-shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
        }
        .panel {
            background: var(--surface);
            width: min(460px, 100%);
            padding: 30px;
            border-radius: 24px;
            border: 1px solid var(--panel-border);
            box-shadow: 0 24px 50px rgba(0, 0, 0, 0.12);
            backdrop-filter: blur(8px);
        }
        .eyebrow {
            display: inline-flex;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(185, 109, 31, 0.1);
            color: var(--accent-dark);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }
        h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }
        .subtext {
            margin: 0 0 22px;
            color: var(--text-muted);
        }
        .form-control {
            padding: 0.9rem 1rem;
            border-radius: 14px;
            border: 1px solid rgba(17, 17, 17, 0.12);
        }
        .form-control:focus {
            border-color: rgba(185, 109, 31, 0.55);
            box-shadow: 0 0 0 0.2rem rgba(185, 109, 31, 0.14);
        }
        .btn-login {
            padding: 0.95rem 1.25rem;
            border: none;
            border-radius: 999px;
            background: linear-gradient(180deg, var(--accent) 0%, var(--accent-dark) 100%);
            color: #fff;
            font-weight: 700;
            box-shadow: 0 14px 28px rgba(185, 109, 31, 0.25);
        }
        .btn-login:hover {
            background: linear-gradient(180deg, #c77a2d 0%, #7c470f 100%);
            color: #fff;
        }
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 20px 0 16px;
            color: #7a7a7a;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(17, 17, 17, 0.1);
        }
        .social-stack {
            display: grid;
            gap: 10px;
        }
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 0.9rem 1rem;
            border-radius: 14px;
            border: 1px solid rgba(17, 17, 17, 0.1);
            font-weight: 600;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }
        .social-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
        }
        .social-google {
            background: #ffffff;
            color: #1f1f1f;
            border: 1px solid #dadce0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .social-google:hover {
            background: #f8f9fa;
            border-color: #dadce0;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.06);
        }
        .social-google::before {
            content: "";
            width: 18px;
            height: 18px;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="%234285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="%2334A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="%23FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="%23EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-block;
        }
        .register-link {
            margin-top: 18px;
            color: var(--text-muted);
        }
        .register-link a {
            color: #111111;
            font-weight: 700;
            text-decoration: none;
        }
        .site-footer {
            margin-top: 22px;
            color: #6f6a62;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
        }
        .site-footer a {
            text-decoration: none;
            color: inherit;
        }

        body.theme-dark {
            color: #f3ece2 !important;
            background-color: #090807 !important;
            background-image:
                radial-gradient(circle at 14% 10%, rgba(217,168,103,0.14), transparent 32%),
                radial-gradient(circle at 80% 16%, rgba(0, 0, 0, 0.65), transparent 36%),
                repeating-linear-gradient(135deg, rgba(255,255,255,0.04) 0 1px, transparent 1px 16px),
                linear-gradient(180deg, #0d0c0b 0%, #151311 48%, #090807 100%) !important;
        }

        body.theme-dark .panel {
            background: rgba(30, 27, 24, 0.95) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            box-shadow: 0 24px 50px rgba(0, 0, 0, 0.48) !important;
            color: #f3ece2 !important;
        }

        body.theme-dark .subtext,
        body.theme-dark .register-link,
        body.theme-dark .site-footer,
        body.theme-dark .divider {
            color: #b9aa97 !important;
        }

        body.theme-dark .form-control {
            background: rgba(255, 255, 255, 0.08) !important;
            color: #f3ece2 !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
        }

        body.theme-dark .form-control::placeholder {
            color: #8b7d6b !important;
        }

        body.theme-dark .form-control:focus {
            border-color: rgba(217, 168, 103, 0.55) !important;
            background: rgba(255, 255, 255, 0.1) !important;
            box-shadow: 0 0 0 0.2rem rgba(217, 168, 103, 0.14) !important;
        }

        body.theme-dark .register-link a {
            color: #f1d8a8 !important;
        }

        body.theme-dark .eyebrow {
            background: rgba(217, 168, 103, 0.15) !important;
            color: #f1d8a8 !important;
        }

        body.theme-dark h1 {
            color: #f3ece2 !important;
        }

        body.theme-dark .social-btn {
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            background: rgba(255, 255, 255, 0.06) !important;
            color: #f3ece2 !important;
        }

        body.theme-dark .social-google {
            background: #ffffff !important;
            color: #1f1f1f !important;
            border: 1px solid #dadce0 !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15) !important;
        }
        body.theme-dark .social-google:hover {
            background: #f8f9fa !important;
            border-color: #dadce0 !important;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08) !important;
        }

        body.theme-dark .divider::before,
        body.theme-dark .divider::after {
            background: rgba(255, 255, 255, 0.1) !important;
        }
    </style>
    <script src="/js/theme-mode.js"></script>
    <link rel="stylesheet" href="/css/theme.css">
</head>
<body>
    <main class="auth-shell">
        <section class="panel">
            <span class="eyebrow">Member Access</span>
            <h1>Welcome back</h1>
            <p class="subtext">Sign in to manage your profile, upload swords, and join the community feed.</p>

            @if (session('error'))
                <div class="alert alert-danger rounded-4">{{ session('error') }}</div>
            @endif

            @if (session('success'))
                <div class="alert alert-success rounded-4">{{ session('success') }}</div>
            @endif

            <form method="post" action="/login" class="d-grid gap-3">
                @csrf
                <input class="form-control" type="email" name="email" placeholder="Email address" required>
                <input class="form-control" type="password" name="password" placeholder="Password" required>
                <button class="btn btn-login w-100" type="submit">Login to Sword Showcase Hub</button>
            </form>

            <div class="divider">or continue with</div>

            <div class="social-stack">
                <a class="social-btn social-google" href="/auth/google/redirect">Continue with Google</a>
            </div>

            <p class="register-link text-center">New here? <a href="/register">Create your account</a></p>

            <div class="site-footer" aria-label="Site footer">
                <span>&copy; {{ date('Y') }} Sword Showcase Hub</span>
                <span>
                    <a href="/privacy">Privacy</a>
                    &middot;
                    <a href="/terms">Terms</a>
                </span>
            </div>
        </section>
    </main>
</body>
</html>
