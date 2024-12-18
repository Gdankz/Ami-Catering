<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Memanggil navbar -->
    @include('partials.navBarAdmin')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <style>
        /* Styling untuk sidebar yang masuk dari kanan */
        .sidebar {
            position: fixed;
            top: 0;
            right: -500px;
            /* Mengubah posisi agar lebih lebar */
            width: 500px;
            /* Lebar sidebar lebih besar */
            height: 100%;
            background-color: #fff;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.5s ease-in-out;
            /* Memperpanjang durasi transisi */
            z-index: 50;
        }

        .sidebar.show {
            transform: translateX(-500px);
            /* Sidebar terbuka */
        }

        /* Styling untuk overlay ketika sidebar muncul */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
            display: none;
        }

        .overlay.show {
            display: block;
        }

        /* Styling untuk <hr> */
        hr {
            border: 0;
            height: 2px;
            /* Mengubah ketebalan */
            background-color: #143109;
            /* Mengatur warna */
        }

        /* Styling untuk header di sidebar */
        .sidebar-header {
            display: flex;
            justify-content: space-between;
            /* Memungkinkan elemen di dalamnya untuk ditempatkan di kiri dan kanan */
            align-items: center;
            /* Menjaga elemen agar terpusat secara vertikal */
            padding: 1rem;
            /* Memberikan padding di sekitar elemen */
            font-size: 1.125rem;
            font-weight: 600;
        }

        .close-button {
            cursor: pointer;
            font-size: 1.5rem;
            /* Ukuran tombol X */
            color: #000000;
            /* Warna tombol X */
        }
    </style>

</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="container mx-auto px-4">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">No Pesanan</th>
                    <th class="border border-gray-300 px-4 py-2">ID Pelanggan</th>
                    <th class="border border-gray-300 px-4 py-2">Detail</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($filteredPesanan as $pesan)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->noPesanan }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $pesan->idPelanggan }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <!-- Tambahkan parameter idPelanggan saat membuka sidebar -->
                            <a href="#" class="text-blue-500"
                                onclick="openSidebar('{{ $pesan->idPelanggan }}')">view Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border border-gray-300 px-4 py-2 text-center">Tidak ada data pesanan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <!-- Menampilkan Detail Pesanan di kiri -->
            <h2 id="sidebarTitle" class="text-lg font-semibold">Detail Pesanan</h2>

            <!-- Tombol X di kanan -->
            <span onclick="closeSidebar()" class="close-button">&times;</span>
        </div>
        <div class="p-4">
            <hr class="my-4">
        </div>
    </div>


    <!-- Overlay untuk menutup sidebar -->
    <div id="overlay" class="overlay" onclick="closeSidebar()"></div>

    <script>
        // Fungsi untuk membuka sidebar dan mengganti title dengan idPelanggan yang dipilih
        function openSidebar(idPelanggan) {
            // Ganti teks di sidebar dengan idPelanggan
            document.getElementById('sidebarTitle').innerText = 'Order ID :  ' + idPelanggan;

            // Tampilkan sidebar dan overlay
            document.getElementById('sidebar').classList.add('show');
            document.getElementById('overlay').classList.add('show');
        }

        function closeSidebar() {
            // Menutup sidebar dan overlay
            document.getElementById('sidebar').classList.remove('show');
            document.getElementById('overlay').classList.remove('show');
        }

        function openSidebar(idPelanggan) {
    // Ganti teks di sidebar dengan idPelanggan
    document.getElementById('sidebarTitle').innerText = 'Order ID :  ' + idPelanggan;

    // Tampilkan sidebar dan overlay
    document.getElementById('sidebar').classList.add('show');
    document.getElementById('overlay').classList.add('show');

    // Kirim permintaan AJAX untuk mengambil data kodeMakanan
    fetch(`/admin/pesanan/detail/${idPelanggan}`)
        .then(response => response.json())
        .then(data => {
            const sidebarContent = document.querySelector('#sidebar .p-4');
            sidebarContent.innerHTML = `<hr class="my-4">`;
            if (data.length > 0) {
                data.forEach(pesanan => {
                    const row =
                        `<p class="border border-gray-300 px-4 py-2 text-center">${pesanan.namaMakanan}</p>`;
                    sidebarContent.innerHTML += row;
                });
            } else {
                sidebarContent.innerHTML += `<p class="text-center">Tidak ada data pesanan.</p>`;
            }
        })
        .catch(error => console.error('Error:', error));
}

    </script>
</body>

</html>
