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
        .modal-content {
            color: brown;
        }
    </style>
</head>
<body class="bg-[#FFFFFF] min-h-screen flex flex-col">

    <!-- Memanggil navbar -->
    @include('partials.navBarAdmin')

    <!-- Search Bar -->
    <div class="flex justify-center mb-6">
        <input type="text" placeholder="Search" class="w-1/2 border rounded-full px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 text-center">
    </div>

    <!-- Main Content -->
    <main class="flex flex-col items-center mt-10">
        <div class="w-2/3 bg-white rounded-lg shadow p-8 border border-gray-200 relative">
          
            
            <!-- Form Fields -->
            <div class="flex space-x-8 mt-8">
                <!-- Left Column (Profile Picture and Fields) -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 rounded-full border border-gray-300 flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                  
                </div>

                <!-- Right Column (Fields) -->
                <div class="space-y-4 w-full">
                    <div class="flex space-x-4">
                        <input type="text" placeholder="First Name" class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 font-bold">
                        <input type="text" placeholder="Last Name" class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 font-bold">
                    </div>
                    <input type="text" placeholder="Address" class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 font-bold">
                    <input type="text" placeholder="Phone Number" class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 font-bold">
                    <input type="text" placeholder="Note" class="w-full border-b border-gray-300 focus:outline-none focus:border-green-500 font-bold">
                </div>
            </div>
        </div>
    </main>

</body>
</html>
