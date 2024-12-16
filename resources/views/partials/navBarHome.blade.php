<nav class="bg-gray-100 sticky top-0 z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4">
        <!-- Logo di kiri dengan margin-left untuk geser ke kanan -->
        <a class="navbar-brand ml-4" href="#">
            <img src="images/Logo_image.png" alt="Logo" class="h-auto w-auto">
        </a>

        <!-- Div untuk Home, Menu, About di tengah -->
        <div class="flex flex-grow justify-center" style="margin-left: -100px;">
            <a href="{{ route('homeMenu') }}" class="mx-4 text-gray-700 hover:text-gray-900">Menu</a>
        </div>

        <!-- Div untuk Register dan Login di kanan dengan margin-right untuk geser ke kiri -->
        <div class="flex space-x-4 mr-4 relative">
            <!-- Form untuk Register -->
            <form action="{{ route('register') }}" method="GET">
                <button type="submit"
                        class="bg-[#143109] hover:bg-[#2a6912] text-[#fcfcfc] font-semibold py-2 px-4 rounded">
                    Checkout
                </button>
            </form>

            <!-- Dropdown untuk Profile -->
            <div class="relative">
                <button onclick="toggleDropdown()" class="border border-[#143109] text-[#143109] hover:bg-[#2a6912] hover:text-white font-semibold py-2 px-4 rounded bg-transparent">
                    Profile
                </button>

                <!-- Dropdown menu -->
                <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Close the dropdown if clicked outside
    window.addEventListener('click', function(event) {
        const dropdown = document.getElementById('profileDropdown');
        const button = event.target.closest('button');
        if (!dropdown.contains(event.target) && !button) {
            dropdown.classList.add('hidden');
        }
    });
</script>
