<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Ami Catering</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-gray-100 sticky top-0 z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4">
        <a class="navbar-brand ml-4" href="#">
            <img src="images/Logo_image.png" alt="Logo" class="h-auto w-auto">
        </a>

        <div class="flex flex-grow justify-center" style="margin-left: -100px;">
            <a href="{{ route('homeMenu') }}" class="mx-4 text-gray-700 hover:text-gray-900">Menu</a>
        </div>

        <div class="flex space-x-4 mr-4 relative">
            <form action="{{ route('checkout') }}" method="GET">
                <button type="submit"
                        class="bg-[#143109] hover:bg-[#2a6912] text-[#fcfcfc] font-semibold py-2 px-4 rounded">
                    Checkout
                </button>
            </form>

            <div class="relative">
                <button onclick="toggleDropdown()" class="border border-[#143109] text-[#143109] hover:bg-[#2a6912] hover:text-white font-semibold py-2 px-4 rounded bg-transparent">
                    Profile
                </button>
                <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-center mb-6">Checkout</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Daftar Pesanan -->
    <div class="bg-white p-6 rounded shadow">
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Kode Makanan</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Jumlah</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Total Biaya</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pesan as $item)
                <tr class="border-t">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->kodeMakanan }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->quantity }}</td>
                    <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($item->totalBiaya, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Total Biaya -->
    <div class="mt-6 text-right">
        <h3 class="text-lg font-semibold">Total Biaya: Rp
            @php
                $total = $pesan->sum('totalBiaya');
            @endphp
            {{ number_format($total, 0, ',', '.') }}
        </h3>
    </div>

    <!-- Checkout Button -->
    <div class="mt-6 text-center">
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600">
                Proses Checkout
            </button>
        </form>
    </div>
</div>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Close dropdown when clicked outside
    window.addEventListener('click', function(event) {
        const dropdown = document.getElementById('profileDropdown');
        const button = event.target.closest('button');
        if (!dropdown.contains(event.target) && !button) {
            dropdown.classList.add('hidden');
        }
    });
</script>

</body>

</html>

