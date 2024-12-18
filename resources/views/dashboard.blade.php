<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* CSS untuk modal / pop-up */
        #successModal {
            position: fixed;
            inset: 0; 
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 50;
            transition: opacity 1s ease-out;
        }

        /* Box pesan pop-up */
        #successModal .message-box {
            background-color: #143109; /* Warna box tetap #143109 */
            color: white; /* Warna teks tetap putih */
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        /* Menyembunyikan modal setelah 2 detik */
        #successModal.hidden {
            opacity: 0;
            pointer-events: none;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">

    @include('partials.navBarHome')

    <!-- Display success popup if message is flashed -->
<!-- Pop-up message -->
@if(session()->has('message'))
        <div id="successModal" class="fixed inset-0 bg-[#143109] bg-gray-opacity-90 flex justify-center items-center z-50">
            <div class="message-box">
                <p>{{ session('message') }}</p>
            </div>
        </div>
    @endif

    <div class="relative min-h-screen bg-gray-100 flex justify-center">
        <form action="{{ route('update-profile') }}" method="POST"
            class="absolute top-0 bg-white p-8 rounded-lg shadow-md w-full max-w-3xl mt-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ auth()->user()->nama }}"
                        class="mt-1 block w-full px-0 border-b-2 border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 transition duration-200"
                        required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                        class="mt-1 block w-full px-0 border-b-2 border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 transition duration-200"
                        required>
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3"
                        class="mt-1 block w-full px-0 border-b-2 border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 transition duration-200"
                        required>{{ auth()->user()->alamat }}</textarea>
                </div>

                <!-- No HP -->
                <div class="mb-4">
                    <label for="noHP" class="block text-sm font-medium text-gray-700">No HP</label>
                    <input type="text" id="noHP" name="noHP" value="{{ auth()->user()->noHP }}"
                        class="mt-1 block w-full px-0 border-b-2 border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 transition duration-200"
                        required>
                </div>
            </div>

            <!-- Tombol -->
            <div class="mt-6 flex justify-end space-x-2">
                <!-- Tombol Save -->
                <button type="submit"
                    class="border border-green-500 text-green-500 px-4 py-2 rounded-md hover:bg-green-50 focus:outline-none transition duration-200">
                    Save
                </button>

                <!-- Tombol Cancel -->
                <a href="{{ route('profile') }} "
                    class="border border-gray-500 text-gray-500 px-4 py-2 rounded-md hover:bg-gray-50 focus:outline-none transition duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    @if (auth()->user()->is_admin === 1)
        <div class="mt-8">
            <h3 class="text-lg font-bold text-blue-500 mb-4">Admin Panel</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <a href="{{ route('homeAdmin') }}"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Home
                    Admin</a>
                <a href="{{ route('menuAdmin') }}"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Kelola
                    Menu</a>
                <a href="{{ route('staff') }}"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Kelola
                    Staff</a>
                <a href="{{ route('customerAdmin') }}"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Kelola
                    Pelanggan</a>
                <a href="{{ route('pesananAdmin') }}"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Kelola
                    Pesanan</a>
                <a href="{{ route('laporan') }}"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 text-center">Laporan</a>
            </div>
        </div>
    @endif
    <script>
        // Setelah 2 detik, sembunyikan modal
        setTimeout(function () {
            document.getElementById('successModal').classList.add('hidden');
        }, 2000);
    </script>

</body>
</body>

</html>
