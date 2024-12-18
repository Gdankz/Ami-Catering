<nav class="bg-white fixed top-0 left-0 w-full z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4">
        <!-- Logo di kiri -->
        <a href="{{ route('homeAdmin') }}" class="navbar-brand ml-4">
            <img src="../images/Logo_image.png" alt="Logo" class="h-16 w-auto">
        </a>
        <!-- Menu Navbar -->
        <div class="flex space-x-8">
            <a href="{{ route('menuAdmin') }}"
               class="relative text-[#143109] text-lg font-medium transition-all duration-300 ease-in-out {{ request()->routeIs('menuAdmin') ? 'active' : 'hover:text-gray-700' }}">
                Menu
            </a>
            <a href="{{ route('staff') }}"
               class="relative text-[#143109] text-lg font-medium transition-all duration-300 ease-in-out {{ request()->routeIs('staff') ? 'active' : 'hover:text-gray-700' }}">
                Staff
            </a>
            <a href="{{ route('cutomerAdmin') }}"
               class="relative text-[#143109] text-lg font-medium transition-all duration-300 ease-in-out {{ request()->routeIs('cutomerAdmin') ? 'active' : 'hover:text-gray-700' }}">
                Customers
            </a>
            <a href="{{ route('pesananAdmin') }}"
               class="relative text-[#143109] text-lg font-medium transition-all duration-300 ease-in-out {{ request()->routeIs('pesananAdmin') ? 'active' : 'hover:text-gray-700' }}">
                Order
            </a>
        </div>
        <!-- Profil -->
        <div class="flex space-x-4 mr-4">
            <div class="flex justify-center items-center">
                <img src="../images/ExampleProfil.png" alt="Profile Picture" class="w-16 h-auto rounded-full border-2 border-[#143109]">
            </div>
        </div>
    </div>
</nav>

<style>
    /* Tambahan untuk navbar tetap */
    nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 50; /* Pastikan berada di atas elemen lainnya */
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Opsional: tambahkan bayangan */
    }

    /* Warna dasar untuk menu */
    .active::before {
        content: '';
        position: absolute;
        top: -10px;
        left: 0;
        right: 0;
        height: 4px;
        background-color: #143109;
        border-radius: 2px;
    }

    /* Hover */
    .hover\:text-gray-200:hover {
        color: #e5e5e5;
    }

    .relative {
        position: relative;
    }
</style>
