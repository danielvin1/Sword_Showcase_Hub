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
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap');

        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            padding: 34px 20px 80px;
            font-family: "Cormorant Garamond", Georgia, serif;
            color: #f3ece2;
            background-color: #090807;
            background-image:
                radial-gradient(circle at 14% 10%, rgba(217,168,103,0.14), transparent 32%),
                radial-gradient(circle at 80% 16%, rgba(0, 0, 0, 0.65), transparent 36%),
                repeating-linear-gradient(135deg, rgba(255,255,255,0.04) 0 1px, transparent 1px 16px),
                linear-gradient(180deg, #0d0c0b 0%, #151311 48%, #090807 100%);
        }
        .shell { max-width: 1180px; margin: 0 auto; }
        .topbar {
            margin-bottom: 22px;
            color: #111111;
            font-family: "Poppins", "Trebuchet MS", sans-serif;
        }
        .discussion-shell {
            border-radius: 20px;
            border: 1px solid rgba(255,255,255,0.08);
            background: linear-gradient(180deg, rgba(30,27,24,0.96), rgba(17,15,13,0.96));
            box-shadow: 0 16px 34px rgba(0,0,0,0.24);
            padding: 20px;
        }
        .discussion-headline {
            margin: 0 0 8px;
            font-family: "Cinzel", serif;
            font-size: clamp(26px, 3.4vw, 38px);
            letter-spacing: -0.01em;
            color: #f3ece2;
        }
        .discussion-subtext {
            margin: 0 0 14px;
            color: #b9aa97;
            font-size: 14px;
            line-height: 1.6;
        }
        .discussion-form {
            display: grid;
            gap: 10px;
            margin-bottom: 14px;
        }
        .discussion-input,
        .discussion-textarea {
            width: 100%;
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            background: rgba(255,255,255,0.04);
            color: #f3ece2;
            padding: 10px 12px;
            font-size: 14px;
            font-family: inherit;
        }
        .discussion-textarea { min-height: 96px; resize: vertical; line-height: 1.55; }
        .discussion-input::placeholder,
        .discussion-textarea::placeholder { color: #a99884; }
        .discussion-post-btn {
            justify-self: flex-start;
            border: 1px solid rgba(217,168,103,0.6);
            background: rgba(217,168,103,0.2);
            color: #f3ece2;
            border-radius: 999px;
            min-height: 36px;
            padding: 8px 14px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }
        .discussion-post-btn:hover { background: rgba(217,168,103,0.34); }
        .featured-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin: 4px 0 10px;
            flex-wrap: wrap;
        }
        .featured-head h2 {
            margin: 0;
            color: #f3ece2;
            font-size: 20px;
            letter-spacing: -0.01em;
        }
        .featured-note {
            color: #b9aa97;
            font-size: 12px;
        }
        .featured-list {
            display: grid;
            gap: 10px;
            margin-bottom: 16px;
        }
        .featured-item {
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            background: rgba(255,255,255,0.03);
            padding: 11px 12px;
            display: grid;
            gap: 8px;
        }
        .featured-item-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
        }
        .featured-title {
            margin: 0;
            color: #f3ece2;
            font-size: 16px;
            line-height: 1.35;
        }
        .featured-votes {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 26px;
            padding: 0 9px;
            border-radius: 999px;
            border: 1px solid rgba(217,168,103,0.45);
            background: rgba(217,168,103,0.18);
            color: #f1d8a8;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }
        .featured-body {
            margin: 0;
            color: #d7c6ae;
            font-size: 13px;
            line-height: 1.6;
        }
        .featured-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            color: #b9aa97;
            font-size: 12px;
        }
        .featured-replies {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 7px;
        }
        .featured-replies li {
            border-left: 2px solid rgba(217,168,103,0.6);
            background: rgba(255,255,255,0.03);
            border-radius: 9px;
            padding: 8px 10px;
        }
        .featured-replies strong {
            display: block;
            margin-bottom: 4px;
            color: #f1d8a8;
            font-size: 11px;
            font-weight: 700;
        }
        .featured-replies p {
            margin: 0;
            color: #d7c6ae;
            font-size: 12px;
            line-height: 1.55;
        }
        .divider {
            margin: 14px 0;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.18) 15%, rgba(255,255,255,0.18) 85%, transparent 100%);
        }
        .live-head {
            margin: 0 0 10px;
            color: #f3ece2;
            font-size: 18px;
        }
        .discussion-list { display: grid; gap: 10px; }
        .discussion-item {
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            background: rgba(255,255,255,0.03);
            padding: 10px 12px;
            display: grid;
            gap: 6px;
        }
        .discussion-item strong { font-size: 13px; color: #f1d8a8; }
        .discussion-item p { margin: 0; font-size: 13px; color: #d7c6ae; line-height: 1.6; }
        .discussion-empty {
            color: #b9aa97;
            font-size: 13px;
            border: 1px dashed rgba(255,255,255,0.2);
            border-radius: 10px;
            padding: 10px 12px;
        }
        .site-footer {
            margin-top: 22px;
            padding-top: 14px;
            border-top: 1px solid rgba(255,255,255,0.12);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            color: #b9aa97;
            font-size: 13px;
        }
        .site-footer a {
            text-decoration: none;
            color: inherit;
        }
        @media (max-width: 720px) {
            .topbar { padding: 12px; }
            .menu { gap: 12px; font-size: 13px; row-gap: 8px; }
            body { padding: 20px 14px 70px; }
        }
    </style>
    <script src='/js/theme-mode.js'></script>
    <link rel='stylesheet' href='/css/theme.css'>
</head>
<body>
<div class="shell">
    @include('partials.navbar')

    <section class="discussion-shell" id="discussions">
        <h1 class="discussion-headline">Discussions</h1>
        <p class="discussion-subtext">A place to talk swords, share takes, and ask the stuff you’d normally ask in a workshop or group chat.</p>

        @php
            $featuredThreads = collect([
                [
                    'title' => 'Where do you like the balance on a longsword?',
                    'votes' => 41,
                    'body' => 'I’m working on a blade and can’t decide if I want it a touch point-heavy or sitting closer to the guard. What feels best in your hand?',
                    'meta' => '@forgewatch · 2h ago · Longsword',
                    'replies' => [
                        ['meta' => '@steelquill · 1h ago', 'body' => 'I keep mine just a little forward. It feels alive without getting twitchy.'],
                        ['meta' => '@wardensmith · 52m ago', 'body' => 'Same. If the hilt is light, I let the point do a bit more work.'],
                    ],
                ],
                [
                    'title' => 'Anyone got a hamon they’re proud of this week?',
                    'votes' => 28,
                    'body' => 'I had a decent run with clay today and the line came out cleaner than I expected. Would love to see what everyone else got.',
                    'meta' => '@muneedge · 5h ago · Katana',
                    'replies' => [
                        ['meta' => '@matt18 · 4h ago', 'body' => 'Thin clay on the spine has been my sweet spot lately.'],
                        ['meta' => '@grainhound · 3h ago', 'body' => 'I got a nicer line once I stopped rushing the quench.'],
                    ],
                ],
                [
                    'title' => 'What guard shape are you using on arming swords lately?',
                    'votes' => 19,
                    'body' => 'I’m torn between a straight guard and a slight downturn. One looks cleaner, the other feels better. Curious what you all like.',
                    'meta' => '@crossguarded · 8h ago · Arming Sword',
                    'replies' => [
                        ['meta' => '@falconforge · 6h ago', 'body' => 'A slight downturn is my pick. It just feels friendlier in the hand.'],
                        ['meta' => '@lumenblade · 5h ago', 'body' => 'Straight is my default. Hard to mess up and it always looks right.'],
                    ],
                ],
                [
                    'title' => 'How are you pricing commissions these days?',
                    'votes' => 34,
                    'body' => 'I’m trying not to overcomplicate quotes, but I also don’t want to undersell the work. What’s been working for you?',
                    'meta' => '@guildledger · 11h ago · Commissioning',
                    'replies' => [
                        ['meta' => '@ashengrave · 10h ago', 'body' => 'I do a base price and then add-ons if people want extras.'],
                        ['meta' => '@quenchline · 9h ago', 'body' => 'Three rough tiers made it easier for me to answer messages fast.'],
                    ],
                ],
                [
                    'title' => 'Matte or mirror finish for display pieces?',
                    'votes' => 22,
                    'body' => 'Trying to figure out what looks best on a wall piece without turning it into a fingerprint magnet. What do you prefer?',
                    'meta' => '@vaultkeeper · 14h ago · Finishing',
                    'replies' => [
                        ['meta' => '@polishline · 13h ago', 'body' => 'I lean satin. It ages better and doesn’t fight the lighting so much.'],
                        ['meta' => '@nightforge · 12h ago', 'body' => 'Mirror looks great for about ten seconds and then the fingerprints show up.'],
                    ],
                ],
                [
                    'title' => 'What wood do you keep coming back to for grips?',
                    'votes' => 17,
                    'body' => 'Walnut keeps calling my name, but I’ve seen some great oak and maple builds too. What’s your go-to when you want something that feels good in the hand?',
                    'meta' => '@oakforge · 16h ago · Handles',
                    'replies' => [
                        ['meta' => '@silverpommel · 15h ago', 'body' => 'Stabilized maple has been the easiest for me to trust long-term.'],
                        ['meta' => '@resinburn · 15h ago', 'body' => 'Walnut with an oil finish just feels right every time.'],
                    ],
                ],
            ])->shuffle()->take(4)->values();
        @endphp

        <div class="featured-head">
            <h2>Featured Threads</h2>
            <span class="featured-note">A few random threads to get things moving</span>
        </div>
        <section class="featured-list">
            @foreach ($featuredThreads as $thread)
                <article class="featured-item">
                    <div class="featured-item-head">
                        <h3 class="featured-title">{{ $thread['title'] }}</h3>
                        <span class="featured-votes">{{ $thread['votes'] }} upvotes</span>
                    </div>
                    <p class="featured-body">{{ $thread['body'] }}</p>
                    <div class="featured-meta">
                        <span>{{ $thread['meta'] }}</span>
                        <span>• {{ count($thread['replies']) }} replies</span>
                    </div>
                    <ul class="featured-replies">
                        @foreach ($thread['replies'] as $reply)
                            <li>
                                <strong>{{ $reply['meta'] }}</strong>
                                <p>{{ $reply['body'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </section>

        <div class="divider"></div>
        <h2 class="live-head">Recent Community Posts</h2>

        <form class="discussion-form" method="POST" action="/discussions" id="discussion-form">
            @csrf
            <input class="discussion-input" id="discussion-author" name="author" type="text" placeholder="Your name (optional)">
            <textarea class="discussion-textarea" id="discussion-text" name="content" placeholder="Type your discussion here..." required></textarea>
            <button class="discussion-post-btn" type="submit">Post Discussion</button>
        </form>

        <div class="discussion-list" id="discussion-list">
            @if (session('success'))
                <article class="discussion-item"><strong>System</strong><p>{{ session('success') }}</p></article>
            @endif

            @if (session('error'))
                <article class="discussion-item"><strong>System</strong><p>{{ session('error') }}</p></article>
            @endif

            @if (($discussions ?? collect())->isEmpty())
                <div class="discussion-empty" id="discussion-empty">Nothing here yet. Start the first conversation.</div>
            @else
                @foreach ($discussions as $discussion)
                    <article class="discussion-item">
                        <strong>{{ $discussion->author ?: ($discussion->user?->name ?? 'Anonymous Collector') }} · {{ $discussion->created_at?->diffForHumans() }}</strong>
                        <p>{{ $discussion->content }}</p>
                    </article>
                @endforeach
            @endif
        </div>

        <footer class="site-footer" aria-label="Site footer">
            <span>© {{ date('Y') }} Sword Showcase Hub</span>
            <span>
                <a href="/privacy">Privacy</a>
                ·
                <a href="/terms">Terms</a>
            </span>
        </footer>
    </section>
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
