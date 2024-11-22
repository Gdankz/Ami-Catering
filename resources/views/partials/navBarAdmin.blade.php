<nav class="bg-white">
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
                Pesanan
            </a>
            <a href="{{ route('laporan') }}"
               class="relative text-[#143109] text-lg font-medium transition-all duration-300 ease-in-out {{ request()->routeIs('laporan') ? 'active' : 'hover:text-gray-700' }}">
                Report
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
    /* Warna dasar untuk menu */
    nav {
        background-color: #ffffff; /* Warna oranye untuk latar belakang */
    }

    /* Garis hijau untuk menu aktif */
    .active::before {
        content: '';
        position: absolute;
        top: -10px; /* Letak garis di atas teks */
        left: 0;
        right: 0;
        height: 4px; /* Ketebalan garis */
        background-color: #143109; /* Warna hijau untuk garis */
        border-radius: 2px; /* Opsional, untuk sudut melengkung */
    }

    /* Animasi hover */
   
    /* Animasi hover */
    .hover\:text-gray-200:hover {
        color: #e5e5e5;
    }

    /* Posisi teks relatif untuk menampilkan garis hijau */
    .relative {
        position: relative;
    }
</style>