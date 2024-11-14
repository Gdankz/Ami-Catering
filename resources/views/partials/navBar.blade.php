<nav class="bg-gray-100">
    <div class="container mx-auto flex justify-between items-center py-4">
        <!-- Logo di kiri dengan margin-left untuk geser ke kanan -->
        <a class="navbar-brand ml-4" href="#">
            <img src="images/Logo_image.png" alt="Logo" class="h-auto w-auto">
        </a>

        <!-- Div untuk Home, Menu, About di tengah -->
        <div class="flex flex-grow justify-center" style="margin-left: -100px;"> <!-- Geser ke kiri -->
            <a href="{{ route('register') }}" class="mx-4 text-gray-700 hover:text-gray-900">Home</a>
            <a href="{{ route('login') }}" class="mx-4 text-gray-700 hover:text-gray-900">Menu</a>
            <a href="{{ route('login') }}" class="mx-4 text-gray-700 hover:text-gray-900">About</a>
        </div>

        <!-- Div untuk Register dan Login di kanan dengan margin-right untuk geser ke kiri -->
        <div class="flex space-x-4 mr-4">
            <!-- Form untuk Register -->
            <form action="{{ route('register') }}" method="GET">
                <button type="submit"
                    class="bg-[#143109] hover:bg-[#2a6912] text-[#fcfcfc] font-semibold py-2 px-4 rounded">
                    Register
                </button>
            </form>

            <!-- Form untuk Login -->
            <form action="{{ route('login') }}" method="GET">
                <button type="submit"
                    class="border border-[#143109] text-[#143109] hover:bg-[#2a6912] hover:text-white font-semibold py-2 px-4 rounded bg-transparent">
                    Login
                </button>
            </form>

        </div>
    </div>
</nav>
