<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
<h1 class="text-2xl font-bold text-center my-6">Daftar Pesanan</h1>
<div class="container mx-auto px-4">
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
        <tr>
            <th class="border border-gray-300 px-4 py-2">No Pesanan</th>
            <th class="border border-gray-300 px-4 py-2">ID Pelanggan</th>
            <th class="border border-gray-300 px-4 py-2">Kode Makanan</th>
            <th class="border border-gray-300 px-4 py-2">Total Biaya</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($pesanan as $pesan)
            <tr>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->noPesanan }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->idPelanggan }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->kodeMakanan }}</td>
                <td class="border border-gray-300 px-4 py-2 text-right">{{ number_format($pesan->totalBiaya, 2) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="border border-gray-300 px-4 py-2 text-center">Tidak ada data pesanan.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
