<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register | Sword Showcase Hub</title>
</head>
<body>

<h1>Register</h1>

@if ($errors->any())
    <div style="color:red">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="/register" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>

    <input type="file" name="profile_photo"><br><br>

    <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="/login">Login</a></p>

</body>
</html>