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
    </style>
</head>

<body>
    <!-- Memanggil navbar -->
    @include('partials.navBar')

    <section class="text-center my-8">
        <div>
            <h1 class="text-8xl font-bold text-[#143109]">Traditional Food with</h1>
            <h1 class="text-8xl font-bold text-[#143109]">Modern Touch</h1>

            <div class="relative flex justify-center items-center mt-12">
                <div class="w-[1000px] h-[1000px] bg-[#143109] rounded-full absolute left-0 top-8 ml-[-400px] overflow-hidden"></div>
                <img id="bowlImage" src="\images\salad.png" alt="Bowl Image"
                     class="w-[495px] h-[495px] absolute z-10 object-cover ml-[-900px] top-[-120px]">
            </div>

            <!-- Konten yang akan ditampilkan -->
            <div id="content" class="ml-[700px] fade">
                <h1 class="text-2xl font-bold text-left text-[#143109]">MODERN TRADITIONAL FLAVOR</h1>
                <h2 class="text-lg text-left text-[#143109]">We combine classic recipes with modern servings and use local ingredients with its culinary techniques.</h2>
            </div>

            <div class="ml-[340px] mt-[25px]">
                <button class="w-[150px] h-[25px] bg-white text-[#143109] border border-[#143109] transition duration-300 button1"></button>
                <button class="w-[150px] h-[25px] bg-[#143109] text-white border border-[#143109] transition duration-300 button2"></button>
                <button class="w-[150px] h-[25px] bg-[#143109] text-white border border-[#143109] transition duration-300 button3"></button>
            </div>

        </div>
    </section>

    <script>
        const bowlImage = document.getElementById('bowlImage');
        const contentDiv = document.getElementById('content');

        function rotateImage(degrees) {
            bowlImage.style.transition = 'transform 0.9s';
            bowlImage.style.transform = `rotate(${degrees}deg)`;
        }

        function resetButtonStyles() {
            const buttons = [document.querySelector('.button1'), document.querySelector('.button2'), document.querySelector('.button3')];
            buttons.forEach(button => {
                button.classList.remove('bg-white', 'text-[#143109]');
                button.classList.add('bg-[#143109]', 'text-white');
            });
        }

        // Fungsi untuk memperbarui konten dengan transisi
        function updateContent(newContent) {
            contentDiv.classList.add('fade-out'); // Menambahkan kelas untuk efek menghilang
            setTimeout(() => {
                contentDiv.innerHTML = newContent; // Mengubah konten
                contentDiv.classList.remove('fade-out'); // Menghapus kelas setelah konten diubah
            }, 480); // Waktu delay sesuai durasi transisi
        }

        // Menangani tombol 1
        document.querySelector('.button1').addEventListener('click', function() {
            rotateImage(60);
            resetButtonStyles();
            this.classList.add('bg-white', 'text-[#143109]');
            updateContent(`
                <h1 class="text-2xl font-bold text-left text-[#143109]">MODERN TRADITIONAL FLAVOR</h1>
                <h2 class="text-lg text-left text-[#143109]">We combine classic recipes with modern servings and use local ingredients with its culinary techniques.</h2>
            `);
        });

        // Menangani tombol 2
        document.querySelector('.button2').addEventListener('click', function() {
            rotateImage(45);
            resetButtonStyles();
            this.classList.add('bg-white', 'text-[#143109]');
            updateContent(`
                <h1 class="text-2xl font-bold text-left text-[#143109]">HEALTHY AND ECO-FRIENDLY FOOD</h1>
                <h2 class="text-lg text-left text-[#143109]">We offer "Healthy Meal Plans" that are low in fat, sugar, and high in fiber. Our "Eco-Friendly Catering" uses organic, local, and sustainable ingredients</h2>
            `);
        });

        // Menangani tombol 3
        document.querySelector('.button3').addEventListener('click', function() {
            rotateImage(0);
            resetButtonStyles();
            this.classList.add('bg-white', 'text-[#143109]');
            updateContent(`
                <h1 class="text-2xl font-bold text-left text-[#143109]">VEGAN AND VEGETARIAN</h1>
                <h2 class="text-lg text-left text-[#143109]">We also provide "Vegan or Vegetarian Meal Packages" including vegan dishes and variations of classic dishes without meat.</h2>
            `);
        });
    </script>
</body>

</html>
