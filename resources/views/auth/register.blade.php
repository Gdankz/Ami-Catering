<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body class="bg-gray-200">
<div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold mb-6 text-center">Register</h2>
        @if ($errors->any())
            <div class="bg-red-200 text-red-600 p-2 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ old('nama') }}">
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ old('Alamat') }}">
            </div>

            <div class="mb-4">
                <label for="noHP" class="block text-sm font-medium text-gray-700">No HP</label>
                <input type="text" name="noHP" id="noHP" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ old('noHP') }}">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Register</button>
        </form>
        <p class="mt-4 text-center">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login here</a>.</p>
    </div>
</div>
</body>
</html>
