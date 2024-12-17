<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<nav class="bg-gray-100 sticky top-0 z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4">
        <!-- Logo di kiri dengan margin-left untuk geser ke kanan -->
        <a class="navbar-brand ml-4" href="#">
            <img src="images/Logo_image.png" alt="Logo" class="h-auto w-auto">
        </a>

        <!-- Div untuk Home, Menu, About di tengah -->
        <div class="flex flex-grow justify-center" style="margin-left: -100px;">
            <a href="{{ route('homeWelcome') }}" class="mx-4 text-gray-700 hover:text-gray-900">Home</a>
            <a href="{{ route('homeMenu') }}" class="mx-4 text-gray-700 hover:text-gray-900">Menu</a>
            <a href="#about" class="mx-4 text-gray-700 hover:text-gray-900">About</a>
        </div>

        <!-- Div untuk Register dan Login di kanan dengan margin-right untuk geser ke kiri -->
        <div class="flex space-x-4 mr-4 relative">
            <!-- Form untuk checkout -->
            <form action="{{ route('checkout') }}" method="GET">
                <button type="submit" <a href="#" class="logo">
                    <i class="bx bx-cart-add text-4xl"></i>
                    </a>
                </button>
            </form>

            <!-- Dropdown untuk Profile -->
            <div class="relative">
                <!-- Button untuk menampilkan dropdown -->
                <button type="button" id="dropdownButton" class="focus:outline-none">
                    <a href="#" class="logo">
                        <i class="bx bx-user text-4xl"></i>
                    </a>
                </button>

                <!-- Dropdown menu -->
                <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
                    <a href="{{ route('dashboard') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</button>
                    </form>
                </div>
            </div>

            <!-- JavaScript untuk toggle dropdown -->
            <script>
                // Mendapatkan elemen button dan dropdown
                const dropdownButton = document.getElementById('dropdownButton');
                const profileDropdown = document.getElementById('profileDropdown');

                // Menambahkan event listener untuk klik button
                dropdownButton.addEventListener('click', function () {
                    // Toggle visibility dropdown
                    profileDropdown.classList.toggle('hidden');
                });

                // Menutup dropdown jika klik di luar dropdown
                window.addEventListener('click', function (event) {
                    if (!event.target.closest('#dropdownButton') && !event.target.closest('#profileDropdown')) {
                        profileDropdown.classList.add('hidden');
                    }
                });
            </script>

        </div>
    </div>
</nav>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Close the dropdown if clicked outside
    window.addEventListener('click', function (event) {
        const dropdown = document.getElementById('profileDropdown');
        const button = event.target.closest('button');
        if (!dropdown.contains(event.target) && !button) {
            dropdown.classList.add('hidden');
        }
    });
</script>