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
    <title>{{ $post->title }} | Discussions</title>

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

        .topbar {
            margin-bottom: 22px;
            color: #111111;
        }

        /* Post */
        .post {
            background: #fff;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid #e8e1d7;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .post-title {
            margin: 0 0 12px;
            font-size: 26px;
        }

        .post-meta {
            font-size: 13px;
            color: #777;
            margin-bottom: 16px;
        }

        .post-content {
            line-height: 1.7;
            color: #333;
        }

        .comments-section {
            margin-top: 30px;
        }

        .comments-section h3 {
            margin-bottom: 16px;
            font-size: 18px;
        }

        .comment {
            background: #f9f7f2;
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 12px;
            border: 1px solid #e8e1d7;
        }

        .comment-meta {
            font-size: 12px;
            color: #777;
            margin-bottom: 8px;
        }

        .comment-content {
            line-height: 1.6;
        }

        .no-comments {
            text-align: center;
            color: #777;
            font-style: italic;
        }
    </style>
    <script src='/js/theme-mode.js'></script>
    <link rel='stylesheet' href='/css/theme.css'>
</head>

<body>

<div class="shell">

    @include('partials.navbar')

    <!-- POST -->
    <div class="post">
        <h1 class="post-title">{{ $post->title }}</h1>
        <div class="post-meta">
            Posted by {{ $post->user->name ?? 'Unknown' }} • {{ $post->created_at->diffForHumans() }}
        </div>
        <div class="post-content">
            {{ $post->content }}
        </div>
    </div>

    <!-- COMMENTS -->
    <div class="comments-section">
        <h3>Comments</h3>
        @if ($post->comments->isEmpty())
            <div class="no-comments">No comments yet. Be the first to reply.</div>
        @else
            @foreach ($post->comments as $comment)
                <div class="comment">
                    <div class="comment-meta">
                        {{ $comment->user->name ?? 'Unknown' }} • {{ $comment->created_at->diffForHumans() }}
                    </div>
                    <div class="comment-content">
                        {{ $comment->content }}
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.querySelector('.hamburger');
        const menu = document.querySelector('.menu');

        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('open');
            menu.classList.toggle('open');
        });
    });
</script>
</body>
</html>
