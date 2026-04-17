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
    <title>Discussions | Sword Showcase Hub</title>

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

        .shell { max-width: 1240px; margin: 0 auto; }

        /* Topbar */
        .topbar {
            display: flex; align-items: center; justify-content: space-between;
            gap: 20px; margin-bottom: 22px; padding: 14px 18px;
            border: 1px solid #e2e2df; border-radius: 14px;
            background: rgba(255,255,255,0.75); backdrop-filter: blur(6px);
            flex-wrap: wrap;
        }

        .brand {
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .nav a {
            color: inherit;
            text-decoration: none;
            opacity: 0.8;
        }

        .nav a:hover {
            opacity: 1;
        }

        /* Header */
        .header h1 {
            margin-bottom: 6px;
            font-size: 30px;
        }

        .header p {
            margin: 0 0 20px;
            color: #666;
        }

        /* Thread list */
        .threads {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .thread {
            background: #fff;
            padding: 20px;
            border-radius: 16px;
            border: 1px solid #e8e1d7;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            transition: 0.2s ease;
        }

        .thread:hover {
            transform: translateY(-2px);
        }

        .thread-title {
            margin: 0;
            font-size: 20px;
        }

        .thread-title a {
            text-decoration: none;
            color: #111;
        }

        .thread-title a:hover {
            text-decoration: underline;
        }

        .thread-meta {
            font-size: 13px;
            color: #777;
            margin: 8px 0;
        }

        .thread-body {
            color: #555;
            margin: 10px 0;
            line-height: 1.6;
        }

        .thread-footer {
            font-size: 13px;
            color: #777;
            display: flex;
            gap: 15px;
        }

        .empty {
            text-align: center;
            background: #fff;
            padding: 30px;
            border-radius: 14px;
            border: 1px solid #e8e1d7;
            color: #777;
        }
    </style>
    <script src='/js/theme-mode.js'></script>
    <link rel='stylesheet' href='/css/theme.css'>
</head>

<body>

<div class="shell">

    <!-- TOPBAR -->
    <div class="topbar">
        <div class="brand">Sword Showcase Hub</div>
        <nav class="menu">
            <a href="/welcome">Explore</a>
            <a href="/feed">Feed</a>
            <a href="/upload">Upload</a>
            <a href="/profile">Profile</a>
            <a href="/discussions">Discussions</a>
        </nav>
    </div>

    <!-- HEADER -->
    <div class="header">
        <h1>Discussions</h1>
        <p>Talk about swords, builds, techniques, and showcases.</p>
    </div>

    <!-- THREAD LIST -->
    @if ($posts->isEmpty())
        <div class="empty">
            No discussions yet. Start the first thread.
        </div>
    @else
        <div class="threads">
            @foreach ($posts as $post)
                <div class="thread">

                    <h2 class="thread-title">
                        <a href="/posts/{{ $post->id }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <div class="thread-meta">
                        Posted by {{ $post->user->name ?? 'Unknown' }}
                        • {{ $post->created_at->diffForHumans() }}
                    </div>

                    <div class="thread-body">
                        {{ \Illuminate\Support\Str::limit($post->content, 120) }}
                    </div>

                    <div class="thread-footer">
                        <span>{{ $post->comments_count ?? 0 }} comments</span>
                    </div>

                </div>
            @endforeach
        </div>
    @endif

</div>

</body>
</html>