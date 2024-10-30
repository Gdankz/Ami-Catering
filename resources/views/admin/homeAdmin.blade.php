<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ami Catering</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade {
            transition: opacity 0.5s ease-in-out; /* Menambahkan transisi untuk opacity */
            opacity: 1;
        }
        .fade-out {
            opacity: 0; /* Opacity 0 untuk efek menghilang */
        }
        /* Menambahkan kelas untuk posisi absolut */
        .absolute-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Memusatkan elemen secara horizontal dan vertikal */
        }
    </style>
</head>

<body class="bg-[#FFFFFF] min-h-screen relative">
    <!-- Memanggil navbar -->
    @include('partials.navBarAdmin')

    <!-- Teks Selamat Datang -->
    <div class="absolute-center">
        <h1 class="text-3xl font-bold text-gray-800">Welcome, admin</h1>
    </div>
</body>

</html>
