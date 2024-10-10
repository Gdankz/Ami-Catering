<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-md rounded-lg flex flex-col md:flex-row max-w-4xl w-full">
    <!-- Image section -->
    <div class="bg-green-100 p-4 md:p-8 flex items-center justify-center md:w-1/2 w-full rounded-t-lg md:rounded-l-lg md:rounded-tr-none">
        <div>
            <img src="/images/Sign_Up_image.png" alt="Broccoli" class="w-full md:w-64 mx-auto">
        </div>
    </div>

    <!-- Form section -->
    <div class="p-4 md:p-8 flex-1">
        <h2 class="text-xl md:text-2xl font-bold mb-4 md:mb-6 text-green-800">Create an account</h2>

        <!-- Jika ada error, tampilkan pesan -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <input type="text" name="nama" placeholder="Username"
                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                   value="{{ old('nama') }}">
            <input type="email" name="email" placeholder="Email"
                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                   value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password"
                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">

            <button type="submit" class="w-full bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-600">
                Sign Up
            </button>
            <p class="mt-4 text-center">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login here</a>.</p>
        </form>
    </div>
</div>

</body>
</html>
