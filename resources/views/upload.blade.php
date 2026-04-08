<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Sword | Sword Showcase Hub</title>
    <style>
        * { box-sizing: border-box; margin:0; padding:0; }
        body {
            font-family: "Poppins", "Trebuchet MS", sans-serif;
            background-color: #f2f2f0;
            background-image:
                radial-gradient(circle at 10% 10%, rgba(120,120,120,0.05), transparent 35%),
                radial-gradient(circle at 90% 15%, rgba(0,0,0,0.03), transparent 40%);
            color: #111;
            min-height: 100vh;
        }

        header {
            background: #1a1a1a;
            color: #fff;
            padding: 24px 40px;
            text-align: center;
        }

        header h1 {
            font-size: 36px;
            letter-spacing: 2px;
        }

        nav {
            margin-top: 12px;
        }

        nav a {
            color: #f2f2f0;
            text-decoration: none;
            margin: 0 14px;
            font-weight: 600;
            opacity: 0.85;
        }

        nav a:hover { opacity: 1; }

        main {
            max-width: 800px;
            margin: 40px auto;
            padding: 32px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        main h2 {
            text-align: center;
            margin-bottom: 24px;
            font-size: 28px;
            color: #1a1a1a;
        }

        form {
            display: grid;
            gap: 16px;
        }

        input, textarea {
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid #d0d0d0;
            font-size: 15px;
        }

        textarea { resize: vertical; min-height: 100px; }

        button {
            padding: 14px 0;
            border-radius: 999px;
            border: none;
            background: #1a1a1a;
            color: white;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover { background: #333; }

        .footer {
            text-align: center;
            margin: 40px 0;
            color: #6c6c6c;
            font-size: 14px;
        }
    </style>
</head>
<body>

<header>
    <h1>Sword Showcase Hub</h1>
    <nav>
        <a href="/welcome">Explore</a>
        <a href="/feed">Feed</a>
        <a href="/profile">Profile</a>
    </nav>
</header>

<main>
    <h2>Upload Your Sword</h2>
    <form method="POST" action="/swords" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Sword Name" required>
        <input type="text" name="type" placeholder="Type (Katana, Claymore etc)" required>
        <textarea name="description" placeholder="Description"></textarea>
        <input type="file" name="image">
        <button type="submit">Upload</button>
    </form>
</main>


</body>
</html>
