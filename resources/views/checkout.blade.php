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
@include('partials.navBarHome')

<!-- Main Content -->
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-center mb-6">Checkout</h1>

    <!-- Menampilkan pesan success atau error -->
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Daftar Pesanan -->
    <div class="bg-white p-6 rounded shadow">
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Nama Makanan</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Jumlah</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Total Biaya</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pesan as $item)
                <tr class="border-t">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item['namaMakanan'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item['quantity'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($item['totalBiaya'], 0, ',', '.') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Total Biaya -->
    <div class="mt-6 text-right">
        <h3 class="text-lg font-semibold">Total Biaya: Rp
            @php
                $total = collect($pesan)->sum('totalBiaya');
            @endphp
            {{ number_format($total, 0, ',', '.') }}
        </h3>
    </div>

    <!-- Checkout Button -->
    <div class="mt-6 text-center">
        <form action="{{ route('processCheckout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600">
                Proses Checkout
            </button>
        </form>
    </div>
</div>

</body>

</html>
