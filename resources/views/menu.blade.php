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

<body class="bg-gray-50">
@include('partials.navBar')

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
                <img src="{{ asset('storage/' . $item->gambarMakanan) }}"
                     alt="{{ $item->namaMakanan }}"
                     class="w-[150px] h-[150px] mx-auto rounded-full object-cover">

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
                </select>

                <!-- Price and Quantity -->
                <div class="flex justify-between items-center mt-4">
                    <p class="text-gray-500">Rp{{ number_format($item->harga, 0, ',', '.') }}</p>

                    <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                        <button
                            class="decrease w-8 h-8 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                        <input
                            class="numberInput w-12 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                            type="number" value="0" min="0">
                        <button
                            class="increase w-8 h-8 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const decreaseButtons = document.querySelectorAll('.decrease');
        const increaseButtons = document.querySelectorAll('.increase');
        const numberInputs = document.querySelectorAll('.numberInput');

        decreaseButtons.forEach((decreaseButton, index) => {
            decreaseButton.addEventListener('click', function () {
                let currentValue = parseInt(numberInputs[index].value);
                if (currentValue > 0) {
                    numberInputs[index].value = currentValue - 1;
                }
            });
        });

        increaseButtons.forEach((increaseButton, index) => {
            increaseButton.addEventListener('click', function () {
                let currentValue = parseInt(numberInputs[index].value);
                numberInputs[index].value = currentValue + 1;
            });
        });
    });
</script>
</body>
</html>
