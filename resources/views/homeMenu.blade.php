<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ami Catering</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
<!-- Navbar -->
@include('partials.navBarHome')

<!-- Header -->
<div class="flex justify-end mt-4 bg-gray-50">
    <p class="font-bold text-6xl">TOP PICKS</p>
</div>

<!-- Gallery Section -->
<div class="flex justify-around items-center w-full h-screen bg-gray-100 -mt-20">
    <div class="w-[400px] h-[400px]">
        <img class="rounded-full w-full h-full object-cover" src="{{ asset('images/fancy.png') }}" alt="Sehat">
    </div>

    <div class="w-[700px] h-[700px] -mt-20">
        <img class="rounded-full w-full h-full object-cover" src="{{ asset('images/sehat.png') }}" alt="Sehat">
    </div>

    <div class="w-[400px] h-[400px]">
        <img class="rounded-full w-full h-full object-cover" src="{{ asset('images/kuah.png') }}" alt="Sehat">
    </div>
</div>

<!-- Food List Section -->
<div class="container mx-auto p-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($makanans as $item)
            <div class="text-center p-4 bg-white rounded-lg shadow-md">
                <!-- Food Image -->
                <img src="{{ asset('storage/' . $item->gambarMakanan) }}" alt="{{ $item->namaMakanan }}" class="w-[150px] h-[150px] mx-auto rounded-full object-cover">

                <!-- Food Name -->
                <p class="text-xl font-bold mt-4">{{ $item->namaMakanan }}</p>

                <!-- Meal Option Dropdown -->
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                    <option value="evening">Full day</option>
                </select>

                <!-- Price and Quantity -->
                <div class="flex justify-between items-center mt-4">
                    <p class="text-gray-500">Rp{{ number_format($item->harga, 0, ',', '.') }}</p>

                    <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                        <button class="decrease w-8 h-8 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                        <input class="numberInput w-12 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none" type="number" value="1" min="1">
                        <button class="increase w-8 h-8 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                    </div>
                </div>

                <!-- Cart Button -->
                <form action="{{ route('addToCart') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="kodeMakanan" value="{{ $item->kodeMakanan }}">  <!-- Kirim kodeMakanan, bukan id -->
                    <input type="hidden" name="quantity" class="hiddenQuantity" value="1"> <!-- Hidden quantity yang akan diperbarui -->
                    <button type="submit" class="flex items-center justify-center w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400">
                        Add to Cart
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const decreaseButtons = document.querySelectorAll('.decrease');
        const increaseButtons = document.querySelectorAll('.increase');
        const numberInputs = document.querySelectorAll('.numberInput');
        const hiddenQuantities = document.querySelectorAll('.hiddenQuantity');

        // Logika tombol decrease
        decreaseButtons.forEach((decreaseButton, index) => {
            decreaseButton.addEventListener('click', function () {
                let currentValue = parseInt(numberInputs[index].value);
                if (currentValue > 0) {
                    numberInputs[index].value = currentValue - 1;
                    hiddenQuantities[index].value = currentValue - 1; // Update hidden input
                }
            });
        });

        // Logika tombol increase
        increaseButtons.forEach((increaseButton, index) => {
            increaseButton.addEventListener('click', function () {
                let currentValue = parseInt(numberInputs[index].value);
                numberInputs[index].value = currentValue + 1;
                hiddenQuantities[index].value = currentValue + 1; // Update hidden input
            });
        });

        // Update hidden input ketika nilai manual diubah
        numberInputs.forEach((numberInput, index) => {
            numberInput.addEventListener('input', function () {
                hiddenQuantities[index].value = numberInput.value;
            });
        });
    });
document.querySelector('a[href="#about"]').addEventListener('click', (event) => {
    if (window.location.pathname === '/') {
        event.preventDefault();
        document.querySelector('#about').scrollIntoView({ behavior: 'smooth' });
    }
});

</script>
</body>
</html>
