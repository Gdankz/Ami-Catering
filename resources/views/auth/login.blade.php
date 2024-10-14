<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .relative {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden; /* Menyembunyikan bagian gambar yang keluar */
        }

        .slides {
            display: flex; /* Menggunakan flexbox untuk mengatur gambar secara horizontal */
            transition: transform 1s ease-in-out; /* Transisi saat berganti gambar */
        }

        .slide {
            min-width: 100%; /* Mengatur lebar setiap gambar sama dengan lebar kontainer */
            height: 100%; /* Menjaga tinggi gambar */
            object-fit: cover; /* Menjaga rasio gambar */
        }
    </style>
</head>
<body class="bg-green-50 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-md rounded-lg flex flex-col md:flex-row max-w-4xl w-full">
    <!-- Image section -->
    <div class="bg-white-100 p-4 md:p-8 flex items-center justify-center md:w-1/2 w-full rounded-t-lg md:rounded-l-lg md:rounded-tr-none">
        <div class="relative w-full md:w-64 mx-auto">
            <div class="slides">
                <img src="/images/Sign_Up_image.png" alt="Gambar 1" class="slide">
                <img src="/images/Sign_Up_image2.png" alt="Gambar 2" class="slide"> 
                <img src="/images/Sign_Up_image.png" alt="Gambar 1 Salinan" class="slide"> <!-- Salinan gambar pertama -->
            </div>
        </div>
    </div>

    <!-- Form section -->
    <div class="p-4 md:p-8 flex-1">
        <div><br></div>
        <h2 class="text-xl md:text-2xl font-bold mb-4 md:mb-6 text-green-800">Welcome Back Dude</h2>

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

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <input type="email" name="email" placeholder="Email"
                       class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 placeholder-gray-400"
                       value="{{ old('email') }}" required>
            </div>

            <div>
                <input type="password" name="password" placeholder="Password"
                       class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 placeholder-gray-400" required>
            </div>
            <p class="mt-4 text-right">
                 <a href="{{ route('login') }}" class="font-bold text-black text-sm hover:underline">Forgot Password?</a>
            </p>    
            <div><br></div>
            <button type="submit" class="w-full bg-green-700 text-white px-4 py-2 rounded-full hover:bg-green-600">
                Log In
            </button>
            <p class="mt-4 text-center">Don’t have an account? <a href="{{ route('register') }}" class="font-bold text-black text-sm hover:underline">Sign Up</a>.</p>
        </form>
    </div>
</div>

<script>
    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slide').length;
    let currentIndex = 0;

    function changeImage() {
        // Moved this inside the function to manage the condition
        if (currentIndex >= totalSlides - 1) {
            // Jika mencapai gambar salinan, reset ke gambar pertama tanpa transisi
            currentIndex = 0;
            slides.style.transition = 'none'; // Matikan transisi
            slides.style.transform = `translateX(0%)`; // Pindahkan ke gambar pertama
            // Setelah 0.1 detik, hidupkan kembali transisi
            setTimeout(() => {
                slides.style.transition = 'transform 1s ease-in-out'; // Hidupkan kembali transisi
            }, 100);
        } else {
            currentIndex++; // Ganti gambar
        }
        const offset = -currentIndex * 100; // Hitung offset untuk slide
        slides.style.transform = `translateX(${offset}%)`; // Terapkan transformasi
    }

    setInterval(changeImage, 3500); // Ganti gambar setiap 3,5 detik
</script>
</body>
</html>
