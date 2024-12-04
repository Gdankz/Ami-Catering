<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Admin - Ami Catering</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
<!-- Navbar -->
@include('partials.navBarAdmin')

<!-- Header -->
<div class="flex justify-center my-6">
    <h1 class="text-3xl font-bold text-gray-700">Daftar Pesanan</h1>
</div>

<!-- Tabel Pesanan -->
<div class="flex justify-center">
    <table class="border-collapse border border-gray-300 w-4/5 bg-white shadow-lg">
        <thead>
        <tr class="bg-gray-100">
            <th class="border border-gray-300 px-4 py-2">No Pesanan</th>
            <th class="border border-gray-300 px-4 py-2">ID Pelanggan</th>
            <th class="border border-gray-300 px-4 py-2">ID Admin</th>
            <th class="border border-gray-300 px-4 py-2">Kode Makanan</th>
            <th class="border border-gray-300 px-4 py-2">ID Staff</th>
            <th class="border border-gray-300 px-4 py-2">Status Antar</th>
            <th class="border border-gray-300 px-4 py-2">Tanggal Pesan</th>
            <th class="border border-gray-300 px-4 py-2">Tanggal Selesai</th>
            <th class="border border-gray-300 px-4 py-2">Total Biaya</th>
            <th class="border border-gray-300 px-4 py-2">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($pesanan as $pesan)
            <tr>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->noPesanan }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->idPelanggan }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->idAdmin }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->kodeMakanan }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->idStaff }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->statusAntar }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->tanggalPesan }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->tanggalSelesai }}</td>
                <td class="border border-gray-300 px-4 py-2 text-right">{{ number_format($pesan->totalBiaya, 2) }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <a href="{{ route('admin.pesanan.detail', ['id' => $pesan->noPesanan]) }}" class="text-blue-500 hover:underline">Detail</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="border border-gray-300 px-4 py-2 text-center text-gray-500">Tidak ada data pesanan.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>

</html>
