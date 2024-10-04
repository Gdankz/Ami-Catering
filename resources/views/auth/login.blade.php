<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<form action="{{ url('/login') }}" method="POST">
    @csrf
    <div>
        <label for="Email">Email</label>
        <input type="email" name="Email" required>
    </div>
    <div>
        <label for="Password">Password</label>
        <input type="password" name="Password" required>
    </div>
    <button type="submit">Login</button>
</form>
</body>
</html>
