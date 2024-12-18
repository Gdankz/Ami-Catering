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
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h1 class="text-2xl font-bold mb-2">Contact Information</h1>
            <h2 class="text-xl">Kons</h2>
            <h2 class="text-xl">081800991234</h2>
            <h2 class="text-xl">Kons@gmail.com</h2>
            <br>
            <h1 class="text-2xl font-bold mb-2">Shipping Address</h1>
            <h2 class="text-xl">Jl Paingan</h2>
            <h2 class="text-xl">Yogyakarta</h2>
            <h2 class="text-xl">12345</h2>
            <h1 class="text-2xl font-bold mb-2">Payment Method</h1>
            <div class="grid grid-cols-2 gap-2">
                <div class="flex items-center">
                    <input type="radio" id="payment1" name="payment" onchange="updatePaymentDetail()">
                    <label for="payment1" class="ml-2">Bank Mandiri</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="payment2" name="payment" onchange="updatePaymentDetail()">
                    <label for="payment2" class="ml-2">Bank BRI</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="payment3" name="payment" onchange="updatePaymentDetail()">
                    <label for="payment3" class="ml-2">Bank BNI</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="payment4" name="payment" onchange="updatePaymentDetail()">
                    <label for="payment4" class="ml-2">Bank BCA</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="payment5" name="payment" onchange="updatePaymentDetail()">
                    <label for="payment5" class="ml-2">Gopay</label>
                </div>
            </div>
            <div class="mt-4">
                <h2 class="text-lg font-semibold">Payment Detail:</h2>
                <p id="paymentDetail" class="mt-2 text-gray-700">Pilih metode pembayaran untuk melihat detail.</p>
            </div>
        </div>

        <div>
            <form id="checkoutForm" action="{{ route('processCheckout') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="bg-white p-6 rounded shadow mb-6">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama Makanan</th>
                            <th class="border px-4 py-2">Jumlah</th>
                            <th class="border px-4 py-2">Total Biaya</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pesan as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $item['namaMakanan'] }}</td>
                                <td class="border px-4 py-2">{{ $item['quantity'] }}</td>
                                <td class="border px-4 py-2">Rp
                                    {{ number_format($item['totalBiaya'], 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <label for="description" class="block text-lg font-semibold mb-2">Deskripsi</label>
                    <textarea id="description" name="description" rows="4" class="w-full p-3 border rounded-md"
                              placeholder="Tulis deskripsi Anda disini..."></textarea>
                </div>

                <!-- Upload Foto -->
                <div class="mb-6">
                    <label for="photo" class="block text-lg font-semibold mb-2">Upload Foto (Bukti Transfer)</label>
                    <input type="file" id="photo" name="photo" class="w-full p-3 border rounded-md" required>
                </div>

                <!-- Total Biaya -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold">Total Biaya: Rp
                        {{ number_format($pesan->sum('totalBiaya'), 0, ',', '.') }}
                    </h3>
                </div>

                <!-- Checkout Button -->
                <div class="text-center">
                    <button type="submit" class="bg-green-800 text-white py-2 px-6 rounded-md hover:bg-blue-800">
                        Proses Checkout
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Update Payment Detail based on selected payment method
    function updatePaymentDetail() {
        const paymentDetails = {
            payment1: 'Bank Mandiri - Transfer ke rekening 1234567890.',
            payment2: 'Bank BRI - Transfer ke rekening 2345678901.',
            payment3: 'Bank BNI - Transfer ke rekening 3456789012.',
            payment4: 'Bank BCA - Transfer ke rekening 4567890123.',
            payment5: 'Gopay - Transfer melalui aplikasi Gopay.'
        };
        const selected = document.querySelector('input[name="payment"]:checked');
        if (selected) {
            document.getElementById('paymentDetail').textContent = paymentDetails[selected.id];
        }
    }

    // Validasi untuk memastikan bukti transfer diunggah sebelum submit form
    document.getElementById('checkoutForm').addEventListener('submit', function (e) {
        const photoInput = document.getElementById('photo');
        if (!photoInput.files.length) {
            e.preventDefault();
            alert("Harap unggah bukti transfer sebelum melanjutkan.");
        }
    });
</script>
</body>

</html>
