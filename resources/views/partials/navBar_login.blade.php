<nav class="bg-gray-100">
    <div class="container mx-auto flex justify-between items-center py-4">
        <a class="navbar-brand ml-4" href="#">
            <img src="images/Logo_image.png" alt="Logo" class="h-auto w-auto">
        </a>

        <div class="flex flex-grow justify-center" style="margin-left: -100px;">
            <a href="{{ route('dashboard') }}" class="mx-4 text-gray-700 hover:text-gray-900">Home</a>
            <a href="{{ route('menu') }}" class="mx-4 text-gray-700 hover:text-gray-900">Menu</a>
            <a href="#about" class="mx-4 text-gray-700 hover:text-gray-900">About</a>
        </div>

        <div class="flex space-x-4 mr-4">
            <!-- Ganti dengan Ikon Heroicons -->
            <a href="{{ route('cart') }}" class="text-[#143109] hover:text-[#2a6912]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.394 2.368m0 0L6.25 9h11.5l1.64-3.632A1.5 1.5 0 0018.01 3H5.769l-.375-1.632A1.5 1.5 0 004 0H1.5M6.25 9L7.168 14.632m.962 1.136H18m-2.631 5.368c-.621 0-1.125-.504-1.125-1.125s.504-1.125 1.125-1.125 1.125.504 1.125 1.125-.504 1.125-1.125 1.125zm-9 0c-.621 0-1.125-.504-1.125-1.125s.504-1.125 1.125-1.125 1.125.504 1.125 1.125-.504 1.125-1.125 1.125z" />
                </svg>
            </a>

            <form action="{{ route('profile') }}" method="GET">
                <button type="submit"
                    class="border border-[#143109] text-[#143109] hover:bg-[#2a6912] hover:text-white font-semibold py-2 px-4 rounded bg-transparent">
                    Profil
                </button>
            </form>
        </div>
    </div>
</nav>
