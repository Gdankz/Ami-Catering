<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .ukuran {
            width: 100%; /* Mengatur lebar gambar menjadi 100% dari kontainer */
        }
    </style>
</head>
<body class="bg-white flex min-h-screen">

    <div class="flex w-full">
    <!-- Image section -->
    <div class="flex items-center justify-center w-1/3 ml-4""> <!-- Kontainer untuk gambar, mengambil 1/3 lebar halaman -->
        <img src="/images/Sign_Up_image.png" alt="Gambar 1" class="object-cover ukuran h-auto m-4"> <!-- Menampilkan gambar dengan properti object-cover untuk menjaga rasio, lebar sesuai dengan kelas 'ukuran', tinggi otomatis, dan margin ditambahkan -->
    </div>

 <!-- Form section -->
 <div class="flex flex-col justify-center p-8 w-full md:w-2/4"> <!-- Kontainer untuk form login, disusun secara vertikal (flex-col) dan dipusatkan, mengambil 2/3 lebar halaman -->
    <h2 class="text-xl md:text-2xl font-bold mb-4 text-green-800">Create an account</h2> <!-- Judul halaman dengan ukuran dan warna teks yang telah ditentukan -->

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

            <div>
                <input type="text" name="nama" placeholder="Username"
                       class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 placeholder-gray-400"
                       value="{{ old('nama') }}">
            </div>

            <div>
                <input type="email" name="email" placeholder="Email"
                       class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 placeholder-gray-400"
                       value="{{ old('email') }}">
            </div>

            <div>
                <input type="password" name="password" placeholder="Password"
                       class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 placeholder-gray-400">
            </div>

            <div>
                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                       class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 placeholder-gray-400">
            </div>


        <button type="submit" class="w-full bg-[#143109] text-white px-4 py-2 rounded-full hover:bg-green-600">
                Sign Up
            </button>

            <p class="mt-4 text-center">Already have an account? <a href="{{ route('login') }}" class="font-bold text-black text-sm hover:underline">Login here</a>.</p>
        </form>
    </div>
</div>

</body>
</html>