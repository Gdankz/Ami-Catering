<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding untuk halaman -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan responsif untuk perangkat mobile -->
    <title>Login</title> <!-- Judul halaman -->
    <script src="https://cdn.tailwindcss.com"></script> <!-- Mengimpor Tailwind CSS untuk styling -->
    <style>
        .ukuran {
            width: 100%; /* Mengatur lebar gambar menjadi 100% dari kontainer */
        }
    </style>
</head>
<body class="bg-white flex min-h-screen"> <!-- Mengatur latar belakang putih dan menjadikan body sebagai flex container dengan tinggi minimal penuh layar -->

<div class="flex w-full"> <!-- Container utama untuk flexbox, membagi lebar menjadi dua bagian -->

    <!-- Image section -->
    <div class="flex items-center justify-center w-1/3 ml-4""> <!-- Kontainer untuk gambar, mengambil 1/3 lebar halaman -->
        <img src="/images/Sign_Up_image2.png" alt="Gambar 2" class="object-cover ukuran h-auto m-4"> <!-- Menampilkan gambar dengan properti object-cover untuk menjaga rasio, lebar sesuai dengan kelas 'ukuran', tinggi otomatis, dan margin ditambahkan -->
    </div>

    <!-- Form section -->
    <div class="flex flex-col justify-center p-8 w-full md:w-2/4"> <!-- Kontainer untuk form login, disusun secara vertikal (flex-col) dan dipusatkan, mengambil 2/3 lebar halaman -->
        <h2 class="text-xl md:text-2xl font-bold mb-4 text-green-800">Welcome Back !!!</h2> <!-- Judul halaman dengan ukuran dan warna teks yang telah ditentukan -->

        <!-- Jika ada error, tampilkan pesan -->
        @if ($errors->any()) <!-- Mengecek apakah ada kesalahan -->
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4"> <!-- Kontainer untuk pesan kesalahan dengan latar belakang merah muda -->
                <ul>
                    @foreach ($errors->all() as $error) <!-- Mengulangi semua kesalahan dan menampilkannya sebagai item dalam daftar -->
                        <li>{{ $error }}</li> <!-- Menampilkan kesalahan -->
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4"> <!-- Form untuk login dengan metode POST -->
            @csrf <!-- Token CSRF untuk keamanan -->
            
            <div>
                <input type="email" name="email" placeholder="Email" class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 placeholder-gray-400" value="{{ old('email') }}" required> <!-- Menyimpan nilai lama jika ada kesalahan -->
            </div>

            <div>
                <input type="password" name="password" placeholder="Password" class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 placeholder-gray-400" required> <!-- Kelas untuk styling input -->
            </div>
            <p class="mt-4 text-right"> <!-- Paragraf untuk tautan 'Forgot Password?' -->
                 <a href="{{ route('login') }}" class="font-bold text-black text-sm hover:underline">Forgot Password?</a> <!-- Tautan untuk reset password -->
            </p>    
            <button type="submit" class="w-full bg-[#143109] text-white px-4 py-2 rounded-full hover:bg-green-600"> <!-- Tombol untuk submit form -->
                Log In
            </button>
            
            <p class="mt-4 text-center">Don’t have an account? <a href="{{ route('register') }}" class="font-bold text-black text-sm hover:underline">Sign Up</a>.</p> <!-- Tautan untuk registrasi bagi pengguna baru -->
        </form>
    </div>
</div>

</body>
</html>