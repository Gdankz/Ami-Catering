<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
<nav class="bg-blue-500 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-white text-xl font-bold">Ami Catering Dashboard</h1>
        <div>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-white hover:text-gray-300">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mx-auto mt-10">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold mb-4">Selamat Datang, {{ auth()->user()->nama }}!</h2>
        <p class="text-gray-700 mb-6">Anda telah berhasil login. Di bawah ini adalah beberapa informasi mengenai akun Anda.</p>
        <div class="mb-4">
            <h3 class="text-xl font-bold text-blue-500">Informasi Akun</h3>
            <ul class="list-disc list-inside">
                <li><strong>Nama:</strong> {{ auth()->user()->nama }}</li>
                <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
                <li><strong>Alamat:</strong> {{ auth()->user()->alamat }}</li>
                <li><strong>No HP:</strong> {{ auth()->user()->noHP }}</li>
            </ul>
        </div>
            <div class="mt-6 space-y-2">
                <a href="{{ route('edit-alamat') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit Alamat</a>
                <a href="{{ route('edit-nohp') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit No HP</a>
                <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Lihat Layanan Kami</a>

                <!-- Button hanya ditampilkan jika role pengguna adalah admin -->
                @if(auth()->user()->role === 'admin')
                    <h3 class="text-lg font-bold text-blue-500 mt-6">Admin Panel</h3>
                    <div class="space-y-2">
                        <a href="{{ route('homeAdmin') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Home Admin</a>
                        <a href="{{ route('menuAdmin') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Kelola Menu</a>
                        <a href="{{ route('staff') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Kelola Staff</a>
                        <a href="{{ route('cutomerAdmin') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Kelola Pelanggan</a>
                        <a href="{{ route('pesananAdmin') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Kelola Pesanan</a>
                        <a href="{{ route('laporan') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Laporan</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>
