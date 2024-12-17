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
            <div class="  ">
                <h1 class="text-2xl font-bold text-left mb-2">Contact Information</h1>
                <h2 class="text-xl text-left mb-1">Kons</h2>
                <h2 class="text-xl text-left mb-1">081800991234</h2>
                <h2 class="text-xl text-left mb-1">Kons@gmail.com</h2>
                <br>
                <h1 class="text-2xl font-bold text-left mb-2">Shipping Address</h1>
                <h2 class="text-xl text-left mb-1">Jl Paingan</h2>
                <h2 class="text-xl text-left mb-1">Yogyakarta</h2>
                <h2 class="text-xl text-left mb-1">12345</h2>
                <h1 class="text-2xl font-bold text-left mb-2">Payment Method</h1>
                <div class="grid grid-cols-2 gap-1">
                    <div class="flex items-center">
                        <input type="radio" id="payment1" name="payment" class="m-0 p-0"
                            onchange="updatePaymentDetail()">
                        <label for="payment1" class="text-sm m-0 p-0">Bank Mandiri</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" id="payment2" name="payment" class="m-0 p-0"
                            onchange="updatePaymentDetail()">
                        <label for="payment2" class="text-sm m-0 p-0">Bank BRI</label>
                    </div>

                    <div class="flex items-center">
                        <input type="radio" id="payment3" name="payment" class="m-0 p-0"
                            onchange="updatePaymentDetail()">
                        <label for="payment3" class="text-sm m-0 p-0">Bank BNI</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" id="payment4" name="payment" class="m-0 p-0"
                            onchange="updatePaymentDetail()">
                        <label for="payment4" class="text-sm m-0 p-0">Bank BCA</label>
                    </div>

                    <div class="flex items-center">
                        <input type="radio" id="payment5" name="payment" class="m-0 p-0"
                            onchange="updatePaymentDetail()">
                        <label for="payment5" class="text-sm m-0 p-0">Gopay</label>
                    </div>
                </div>
                <div class="mt-6">
                    <h2 class="text-xl font-semibold">Payment Detail:</h2>
                    <p id="paymentDetail" class="mt-2 text-lg text-gray-700">Pilih metode pembayaran untuk melihat
                        detail.</p>
                </div>

            </div>

            <div class="  ">
                <div class="bg-white p-6 rounded shadow mb-6">
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
                                    <td class="border border-gray-300 px-4 py-2">Rp
                                        {{ number_format($item['totalBiaya'], 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Total Biaya -->
                <div class="mb-6">
                    <label for="description" class="block text-lg font-semibold mb-2">Deskripsi</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Tulis deskripsi Anda disini..."></textarea>
                </div>

                <!-- Upload Foto -->
                <div class="mb-6">
                    <label for="photo" class="block text-lg font-semibold mb-2">Upload Foto</label>
                    <input type="file" id="photo" name="photo"
                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
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
                        <button type="submit" class="bg-green-800 text-white py-2 px-6 rounded-md hover:bg-blue-800">
                            Proses Checkout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updatePaymentDetail() {
            const paymentDetailText = {
                payment1: 'Bank Mandiri - Transfer ke rekening 1234567890.',
                payment2: 'Bank BRI - Transfer ke rekening 2345678901.',
                payment3: 'Bank BNI - Transfer ke rekening 3456789012.',
                payment4: 'Bank BCA - Transfer ke rekening 4567890123.',
                payment5: 'Gopay - Transfer melalui aplikasi Gopay.'
            };

            const selectedPayment = document.querySelector('input[name="payment"]:checked');

            if (selectedPayment) {
                const paymentId = selectedPayment.id;
                document.getElementById('paymentDetail').textContent = paymentDetailText[paymentId];
            }
        }
    </script>
</body>

</html>