<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
<!-- Sidebar -->
<div class="sidebar fixed top-0 left-0 w-64 h-full bg-blue-600 text-white p-6">
    <h1 class="text-xl font-bold mb-6">Dashboard Menu</h1>
    <ul>
        <li class="mb-4"><a href="{{ route('profil') }}" class="hover:underline">Profil Saya</a></li>
        <li class="mb-4"><a href="#" class="hover:underline">Pesanan Saya</a></li>
        <li class="mb-4"><a href="#" class="hover:underline">Riwayat Transaksi</a></li>
        <li class="mb-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="hover:underline">Keluar</button>
            </form>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div class="ml-64 p-6">
    <div class="container mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-3xl font-bold mb-6">Profil Saya</h2>

            <div class="mb-4">
                <h3 class="text-xl font-bold text-blue-500">Informasi Pengguna</h3>
                <ul class="list-disc list-inside">
                    <li><strong>Nama:</strong> {{ $pelanggan->nama }}</li>
                    <li><strong>Email:</strong> {{ $pelanggan->email }}</li>
                    <li><strong>Alamat:</strong> {{ $pelanggan->alamat }}</li>
                    <li><strong>No HP:</strong> {{ $pelanggan->noHP }}</li>
                </ul>
            </div>
            <div class="mt-6 space-y-2 sm:space-y-0 sm:flex sm:space-x-2">
                <a href="{{ route('edit-alamat') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit Alamat</a>
                <a href="{{ route('edit-nohp') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit No HP</a>
                <a href="{{ route('dashboard') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Kembali</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
