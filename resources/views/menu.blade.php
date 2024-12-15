<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ami Catering</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade {
            transition: opacity 0.5s ease-in-out;
            opacity: 1;
        }

        .fade-out {
            opacity: 0;
        }
    </style>
</head>

<body>
<!-- Memanggil navbar -->
@include('partials.navBar')

<div class="flex justify-end ml-4">
    <p class="font-bold text-6xl">TOP PICKS</p>
</div>

<div class="flex justify-center items-center w-full h-screen bg-gray-100 -mt-40">
    <div class="flex space-x-8">
        <!-- Looping untuk menampilkan gambar dan harga makanan -->
        @foreach ($makanans as $makanan)
            <div class="flex flex-col items-center w-80">
                <!-- Gambar Makanan -->
                <img class="rounded-full w-64 h-64 object-cover" src="{{ asset('storage/' . $makanan->gambarMakanan) }}" alt="{{ $makanan->namaMakanan }}">
                <!-- Nama dan Harga -->
                <p class="text-xl font-bold mt-4">{{ $makanan->namaMakanan }}</p>
                <p class="text-lg text-gray-700">Rp {{ number_format($makanan->harga, 0, ',', '.') }}</p>
            </div>
        @endforeach
    </div>
</div>

</body>

</html>
