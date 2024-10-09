<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex flex-col items-center justify-center">
    <h2 class="text-3xl font-bold mb-6">Login to Ami Catering</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Login</button>
        </div>
    </form>

</div>
</body>
</html>
