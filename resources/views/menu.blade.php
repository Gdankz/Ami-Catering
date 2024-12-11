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

<body>
    <!-- Memanggil navbar -->
    @include('partials.navBar')

    <div class="flex justify-end ml-4">
        <p class="font-bold text-6xl ">TOP PICKS</p>
    </div>
    <div class="flex justify-center items-center w-full h-screen bg-gray-100 -mt-40">
        <div class="w-96 h-96">
            <!-- Gambar berbentuk lingkaran -->
            <img class="rounded-full w-full h-full object-cover" src="https://via.placeholder.com/300">
        </div>
    </div>


</body>

</html>