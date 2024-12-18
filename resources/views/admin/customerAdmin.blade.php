<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
<!-- Navbar -->
@include('partials.navBarAdmin')

<main class="p-4">
    <h1 class="text-2xl font-bold text-center mb-6">Daftar Pelanggan</h1>

    <table class="table-auto w-full border-collapse border border-gray-400">
        <thead>
        <tr>
            <th class="border border-gray-400 px-4 py-2">ID</th>
            <th class="border border-gray-400 px-4 py-2">Nama</th>
            <th class="border border-gray-400 px-4 py-2">Alamat</th>
            <th class="border border-gray-400 px-4 py-2">Nomor HP</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($pelanggan as $p)
            <tr>
                <td class="border border-gray-400 px-4 py-2">{{ $p->idPelanggan }}</td>
                <td class="border border-gray-400 px-4 py-2">{{ $p->nama }}</td>
                <td class="border border-gray-400 px-4 py-2">{{ $p->alamat }}</td>
                <td class="border border-gray-400 px-4 py-2">{{ $p->noHP }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center border border-gray-400 py-4">Data pelanggan tidak ditemukan</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</main>
</body>

</html>
