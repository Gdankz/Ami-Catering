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
        <li class="mb-4"><a href="#" class="hover:underline">Profil Saya</a></li>
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
                    <li><strong>Nama:</strong> {{ auth()->user()->nama }}</li>
                    <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
                    <li><strong>Alamat:</strong> {{ auth()->user()->alamat }}</li>
                    <li><strong>No HP:</strong> {{ auth()->user()->noHP }}</li>
                </ul>
            </div>
            <div class="mt-6 space-y-2 sm:space-y-0 sm:flex sm:space-x-2">
                <a href="{{ route('edit-alamat') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit Alamat</a>
                <a href="{{ route('edit-nohp') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit No HP</a>
                <a href="{{ route('homeMenu') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Kembali</a>
            </div>

            @if(auth()->user()->is_admin === 1)
                <div class="mt-8">
                    <h3 class="text-lg font-bold text-blue-500 mb-4">Admin Panel</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="{{ route('homeAdmin') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Home Admin</a>
                        <a href="{{ route('menuAdmin') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Kelola Menu</a>
                        <a href="{{ route('staff') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Kelola Staff</a>
                        <a href="{{ route('cutomerAdmin') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Kelola Pelanggan</a>
                        <a href="{{ route('pesananAdmin') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Kelola Pesanan</a>
                        <a href="{{ route('laporan') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Laporan</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>
