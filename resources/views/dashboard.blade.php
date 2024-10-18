<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Sidebar static */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100%;
            background-color: #1e3a8a;
            color: white;
            padding: 20px;
        }

        .content {
            margin-left: 220px; /* Offset content to the right of sidebar */
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
<!-- Sidebar -->
<div class="sidebar">
    <h1 class="text-white text-xl font-bold mb-4">Dashboard Menu</h1>
    <ul>
        <li class="mb-2">
            <form action="{{ route('profil') }}" method="GET" class="inline">
                @csrf
                <button type="submit" class="text-white hover:text-gray-300">Profil Saya</button>
            </form>
        </li>
        <li class="mb-2"><a href="#" class="text-white hover:underline">Pesanan Saya</a></li>
        <li class="mb-2"><a href="#" class="text-white hover:underline">Riwayat Transaksi</a></li>
        <li class="mb-2">
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-white hover:text-gray-300">Keluar</button>
            </form>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div class="content">
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-xl font-bold">Ami Catering</h1>
        </div>
    </nav>

    <div class="container mx-auto mt-10">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-3xl font-bold mb-4">Produk Makanan</h2>

            <!-- Filter Section -->
            <div class="mb-4">
                <h3 class="text-xl font-bold text-blue-500">Filter Makanan</h3>
                <button id="veganFilter" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Vegan</button>
                <button id="nonVeganFilter" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Non-Vegan</button>
            </div>

            <!-- Product List -->
            <div id="productList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Contoh produk -->
                <div class="bg-gray-100 p-4 rounded-lg shadow-md food-item" data-type="vegan">
                    <img src="/images/vegan-salad.jpg" alt="Vegan Salad" class="w-full h-40 object-cover rounded-md mb-2">
                    <h3 class="text-xl font-bold">Vegan Salad</h3>
                    <p class="text-gray-600">Rp 25.000</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow-md food-item" data-type="non-vegan">
                    <img src="/images/grilled-chicken.jpg" alt="Grilled Chicken" class="w-full h-40 object-cover rounded-md mb-2">
                    <h3 class="text-xl font-bold">Grilled Chicken</h3>
                    <p class="text-gray-600">Rp 40.000</p>
                </div>
                <!-- Tambahkan produk lainnya sesuai dengan kebutuhan -->
            </div>
        </div>
    </div>
</div>

<script>
    const veganFilter = document.getElementById('veganFilter');
    const nonVeganFilter = document.getElementById('nonVeganFilter');
    const foodItems = document.querySelectorAll('.food-item');

    // Reset filter: Tampilkan semua makanan pada awalnya
    const resetFilter = () => {
        foodItems.forEach(item => {
            item.style.display = 'block';
        });
    };

    // Filter vegan
    veganFilter.addEventListener('click', () => {
        foodItems.forEach(item => {
            if (item.getAttribute('data-type') === 'vegan') {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Filter non-vegan
    nonVeganFilter.addEventListener('click', () => {
        foodItems.forEach(item => {
            if (item.getAttribute('data-type') === 'non-vegan') {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Jalankan reset filter pada saat halaman pertama kali dimuat
    resetFilter();
</script>
</body>
</html>
