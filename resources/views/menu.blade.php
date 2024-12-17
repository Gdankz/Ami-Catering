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
    <div class="flex justify-end mt-4 bg-gray-50">
        <p class="font-bold text-6xl">TOP PICKS</p>
    </div>


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
    <hr class="my-8 border-t-4 border-gray-300">
    <section class="grid grid-cols-3 gap-8 px-8">

        <div class="text-center">
            <img src="images/salad.png" alt="Salad" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Tempe bacem
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/mie.png" alt="Mie" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Mie
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/fancy.png" alt="Chicken Fillet"
                class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Telur balado
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>

            </div>
        </div>
        <div class="text-center">
            <img src="images/salad.png" alt="Salad" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Nasi goreng
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/mie.png" alt="Mie" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Ayam goreng
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/fancy.png" alt="Chicken Fillet"
                class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Ayam rica-rica
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>

            </div>
        </div>
        <div class="text-center">
            <img src="images/salad.png" alt="Salad" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Capcay
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/mie.png" alt="Mie" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Tumis sayur
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/fancy.png" alt="Chicken Fillet"
                class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Ikan asam manis
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>

            </div>
        </div>
        <div class="text-center">
            <img src="images/salad.png" alt="Salad" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Bistik
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/mie.png" alt="Mie" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Nasi Kuning
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/fancy.png" alt="Chicken Fillet"
                class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Soto ayam
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>

            </div>
        </div>
        <div class="text-center">
            <img src="images/salad.png" alt="Salad" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Sayur lodeh
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/mie.png" alt="Mie" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Tumis Kangkung
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/fancy.png" alt="Chicken Fillet"
                class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Pepes ikan
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>

            </div>
        </div>
        <div class="text-center">
            <img src="images/salad.png" alt="Salad" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Sayur asem
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/mie.png" alt="Mie" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Tempe goreng
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/fancy.png" alt="Chicken Fillet"
                class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Oseng-oseng tempe
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>

            </div>
        </div>

        <div class="text-center">
            <img src="images/salad.png" alt="Salad" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Tahu isi
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>

        <div class="text-center">
            <img src="images/mie.png" alt="Mie" class="w-[250px] h-[250px] mx-auto rounded-full object-cover">
            <p class="mt-4 text-lg font-semibold">Sambe goreng kentang
                <select class="mt-2 border border-gray-300 rounded px-2 py-1 text-center">
                    <option value="morning">-</option>
                    <option value="morning">Breakfast</option>
                    <option value="evening">Lunch</option>
                    <option value="evening">Dinner</option>
                    <option value="evening">Breakfast & Lunch</option>
                    <option value="evening">Breakfast & Dinner</option>
                    <option value="evening">Lunch & Dinner</option>
                </select>
            </p>
            <div class="flex justify-center items-center space-x-4 mt-2">
                <p class="text-gray-500">Rp30.000</p>
                <div class="flex items-center border border-gray-200 rounded-md overflow-hidden shadow-sm">
                    <button
                        class="decrease w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">-</button>
                    <input
                        class="numberInput w-16 text-center text-lg focus:outline-none focus:ring-2 focus:ring-green-300 bg-transparent border-none"
                        type="number" value="0" min="0">
                    <button
                        class="increase w-10 h-10 flex items-center justify-center bg-gray-100 text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300">+</button>
                </div>
            </div>
        </div>
    </section>
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