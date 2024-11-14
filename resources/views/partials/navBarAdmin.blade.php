<nav class="bg-[#FFFFFF]">
    <div class="container mx-auto flex justify-between items-center py-4">
        <!-- Logo di kiri -->
        <a class="navbar-brand ml-4" href="#">
            <img src="../images/Logo_image.png" alt="Logo" class="h-auto w-auto">
        </a>

        <!-- Menu Navbar -->
        <div class="flex flex-grow justify-center items-center" style="margin-left: -100px;">
            <a href="{{ route('homeAdmin') }}" class="mx-4 text-gray-700 transition-all duration-300 ease-in-out {{ request()->routeIs('homeAdmin') ? 'bg-[#143109] text-white py-1 px-5 rounded-lg transform scale-105' : 'hover:bg-[#143109] hover:text-white py-0.5 px-2  rounded-lg transform hover:scale-105' }}">Home</a>
            <a href="{{ route('menuAdmin') }}" class="mx-4 text-gray-700 transition-all duration-300 ease-in-out {{ request()->routeIs('menuAdmin') ? 'bg-[#143109] text-white py-1 px-5 rounded-lg transform scale-105' : 'hover:bg-[#143109] hover:text-white py-0.5 px-2  rounded-lg transform hover:scale-105' }}">Menu</a>
            <a href="{{ route('staff') }}" class="mx-4 text-gray-700 transition-all duration-300 ease-in-out {{ request()->routeIs('staff') ? 'bg-[#143109] text-white py-1 px-5 rounded-lg transform scale-105' : 'hover:bg-[#143109] hover:text-white rounded-lg py-0.5 px-2  transform hover:scale-105' }}">Staff</a>
            <a href="{{ route('cutomerAdmin') }}" class="mx-4 text-gray-700 transition-all duration-300 ease-in-out {{ request()->routeIs('cutomerAdmin') ? 'bg-[#143109] text-white py-1 px-5 rounded-lg transform scale-105' : 'hover:bg-[#143109] hover:text-white py-0.5 px-2  rounded-lg transform hover:scale-105' }}">Customer</a>
            <a href="{{ route('pesananAdmin') }}" class="mx-4 text-gray-700 transition-all duration-300 ease-in-out {{ request()->routeIs('pesananAdmin') ? 'bg-[#143109] text-white py-1 px-5 rounded-lg transform scale-105' : 'hover:bg-[#143109] hover:text-white py-0.5 px-2  rounded-lg transform hover:scale-105' }}">Pesanan</a>
            <a href="{{ route('laporan') }}" class="mx-4 text-gray-700 transition-all duration-300 ease-in-out {{ request()->routeIs('laporan') ? 'bg-[#143109] text-white py-1 px-5 rounded-lg transform scale-105' : 'hover:bg-[#143109] hover:text-white rounded-lg py-0.5 px-2  transform hover:scale-105' }}">Laporan</a> 
        </div>

        <!-- Profil -->
        <div class="flex space-x-4 mr-4">
            <div class="flex justify-center items-center">
                <img src="../images/ExampleProfil.png" alt="Profile Picture" class="w-32 h-32 rounded-full border-4 border-blue-500">
            </div>
        </div>
    </div>
</nav>
