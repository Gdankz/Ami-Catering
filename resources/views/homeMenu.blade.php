<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ami Catering</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade {
            transition: opacity 0.5s ease-in-out;
            opacity: 1;
        }

        .fade-out {
            opacity: 0;
        }
    </style>
</head>

<body>
@include('partials.navBarHome')

<!-- Judul Section -->
<div class="flex justify-end ml-4">
    <p class="font-bold text-6xl">TOP PICKS</p>
</div>

<!-- Gambar dan Daftar Makanan -->
<div class="flex justify-center items-center w-full h-screen bg-gray-100 -mt-40">
    <div class="flex space-x-8">
        <!-- Looping untuk menampilkan gambar dan harga makanan -->
        @foreach ($makanans as $makanan)
            <div class="flex flex-col items-center w-80 cursor-pointer"
                 onclick="openModal('{{ $makanan->namaMakanan }}', '{{ $makanan->deskripsi }}', '{{ $makanan->harga }}', '{{ $makanan->kodeMakanan }}')">
                <!-- Gambar Makanan -->
                <img class="rounded-full w-64 h-64 object-cover" src="{{ asset('storage/' . $makanan->gambarMakanan) }}"
                     alt="{{ $makanan->namaMakanan }}">
                <!-- Nama dan Harga -->
                <p class="text-xl font-bold mt-4">{{ $makanan->namaMakanan }}</p>
                <p class="text-lg text-gray-700">Rp {{ number_format($makanan->harga, 0, ',', '.') }}</p>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal (Pop-up) -->
<div id="menuModal"
     class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden justify-center items-start pt-32">
    <div class="bg-white p-6 rounded-lg w-1/3 relative">
        <h2 id="modalTitle" class="text-2xl font-bold"></h2>
        <p id="modalDescription" class="mt-2 text-gray-700"></p>
        <p id="modalPrice" class="mt-2 text-lg text-gray-700"></p>

        <!-- Error Message -->
        <p id="errorMessage" class="hidden text-red-500 mt-2"></p>

        <!-- Input Jumlah -->
        <div class="flex items-center mt-4">
            <input id="quantity"
                   type="number"
                   min="1"
                   value="1"
                   class="border border-gray-300 p-2 rounded-lg w-24 mr-4">
            <button onclick="checkout()"
                    class="bg-blue-500 text-white p-2 rounded-lg">
                Checkout
            </button>
        </div>

        <!-- Tombol Close -->
        <button onclick="closeModal()"
                class="absolute top-2 right-2 text-red-500 font-bold">
            ×
        </button>
    </div>
</div>

<script>
    // Fungsi untuk membuka modal
    function openModal(name, description, price, kodeMakanan) {
        const modal = document.getElementById('menuModal');
        document.getElementById('modalTitle').innerText = name;
        document.getElementById('modalDescription').innerText = description;
        document.getElementById('modalPrice').innerText = `Rp ${price}`;
        modal.setAttribute('data-kodeMakanan', kodeMakanan);

        // Reset input dan pesan error
        document.getElementById('quantity').value = 1;
        document.getElementById('errorMessage').classList.add('hidden');

        // Tampilkan modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        const modal = document.getElementById('menuModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Fungsi untuk memproses checkout
    function checkout() {
        const quantity = parseInt(document.getElementById('quantity').value);
        const price = parseInt(document.getElementById('modalPrice').innerText.replace('Rp ', '').replace('.', ''));
        const kodeMakanan = document.getElementById('menuModal').getAttribute('data-kodeMakanan');
        const idPelanggan = 1; // Sesuaikan dengan data login pelanggan (contoh: dari session)

        // Validasi input jumlah
        if (isNaN(quantity) || quantity <= 0) {
            const errorMessage = document.getElementById('errorMessage');
            errorMessage.innerText = 'Jumlah pesanan harus lebih dari 0.';
            errorMessage.classList.remove('hidden');
            return;
        }

        // Kirim data menggunakan fetch
        fetch('/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                idPelanggan: idPelanggan,
                kodeMakanan: kodeMakanan,
                quantity: quantity,
                hargaMakanan: price
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Pesanan berhasil ditambahkan!');
                    closeModal();
                    window.location.href = '/checkout'; // Redirect ke halaman checkout
                } else {
                    alert(data.message || 'Terjadi kesalahan, coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal memproses pesanan. Silakan coba lagi.');
            });
    }
</script>

</body>

</html>
