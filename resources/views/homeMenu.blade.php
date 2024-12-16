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
@include('partials.navBarHome')


<div class="flex justify-end ml-4">
    <p class="font-bold text-6xl">TOP PICKS</p>
</div>

<div class="flex justify-center items-center w-full h-screen bg-gray-100 -mt-40">
    <div class="flex space-x-8">
        <!-- Looping untuk menampilkan gambar dan harga makanan -->
        @foreach ($makanans as $makanan)
            <div class="flex flex-col items-center w-80 cursor-pointer"
                 onclick="openModal('{{ $makanan->namaMakanan }}', '{{ $makanan->deskripsi }}', '{{ $makanan->harga }}', '{{ $makanan->kodeMakanan }}')">
                <!-- Gambar Makanan -->
                <img class="rounded-full w-64 h-64 object-cover" src="{{ asset('storage/' . $makanan->gambarMakanan) }}"
                     alt="{{ $makanan->namaMakanan }}">
                <!-- Nama dan Harga -->
                <p class="text-xl font-bold mt-4">{{ $makanan->namaMakanan }}</p>
                <p class="text-lg text-gray-700">Rp {{ number_format($makanan->harga, 0, ',', '.') }}</p>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal (Pop-up) -->
<div id="menuModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden justify-center items-start pt-32">
    <div class="bg-white p-6 rounded-lg w-1/3 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <h2 id="modalTitle" class="text-2xl font-bold"></h2>
        <p id="modalDescription" class="mt-2 text-gray-700"></p>
        <p id="modalPrice" class="mt-2 text-lg text-gray-700"></p>
        <div class="flex items-center mt-4">
            <input id="quantity" type="number" min="1" value="1"
                   class="border border-gray-300 p-2 rounded-lg w-24 mr-4">
            <button onclick="checkout()" class="bg-blue-500 text-white p-2 rounded-lg">Checkout</button>
        </div>
        <button onclick="closeModal()" class="mt-4 text-red-500">Close</button>
    </div>
</div>

<script>
    // Fungsi untuk membuka modal
    function openModal(name, description, price, kode) {
        document.getElementById('modalTitle').innerText = name;
        document.getElementById('modalDescription').innerText = description;
        document.getElementById('modalPrice').innerText = 'Rp ' + price;
        document.getElementById('menuModal').classList.remove('hidden');
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        document.getElementById('menuModal').classList.add('hidden');
    }

    // Fungsi untuk menangani checkout
    function checkout() {
        const quantity = document.getElementById('quantity').value;
        alert('You have added ' + quantity + ' item(s) to your cart.');
        closeModal();
    }
</script>
</body>

</html>
