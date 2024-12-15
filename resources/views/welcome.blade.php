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


<!-- Konten utama -->
<section class="text-center my-8">
    <div>
        <h1 class="text-8xl font-bold text-[#143109]">Traditional Food with</h1>
        <h1 class="text-8xl font-bold text-[#143109]">Modern Touch</h1>

        <div class="relative flex justify-center items-center mt-12">
            <div
                class="w-[1000px] h-[1000px] bg-[#143109] rounded-full absolute left-0 top-8 ml-[-400px] overflow-hidden">
            </div>
            <img id="bowlImage" src="\images\salad.png" alt="Bowl Image"
                 class="w-[495px] h-[495px] absolute z-10 object-cover ml-[-900px] top-[-120px]">
        </div>

        <div id="content" class="ml-[700px] fade">
            <h1 class="text-2xl font-bold text-left text-[#143109]">MODERN TRADITIONAL FLAVOR</h1>
            <h2 class="text-lg text-left text-[#143109]">We combine classic recipes with modern servings and use
                local ingredients with its culinary techniques.</h2>
        </div>

        <div class="ml-[340px] mt-[25px]">

            <button
                class="w-[150px] h-[25px] bg-white text-[#143109] border border-[#143109] transition duration-300 button1"></button>
            <button
                class="w-[150px] h-[25px] bg-[#143109] text-white border border-[#143109] transition duration-300 button2"></button>
            <button
                class="w-[150px] h-[25px] bg-[#143109] text-white border border-[#143109] transition duration-300 button3"></button>

        </div>
    </div>
</section>

<<!-- Div About -->
<section id="about" class="my-12 flex items-center justify-between p-8 bg-white mt-56 relative z-10 h-[690px]">
    <div class="flex-shrink-0 w-1/3">
        <img src="images/logo_about.png" alt="Ami Catering" class="w-full h-auto max-w-[400px]">
    </div>
    <div class="w-2/3 text-right">
        <h1 class="text-6xl font-bold text-[#143109] text-right">About Us</h1>
        <p class="text-xl text-black-700 mt-4 text-justify">
            Starting from Dea's grandmother's passion for cooking, Ami Catering was created with love. Dea's
            grandmother, who loved to cook, started selling her food creations, and Dea’s mother, Ami, who
            witnessed her grandmother's cooking skills, took note of the recipes and started trying them out. As
            it turned out, the food received rave reviews from many people.
            <br><br>
            With the experience of working in several catering service providers, Ami finally decided to open
            her own catering business in 2010. Since then, “Ami Catering” has been specializing in “Traditional
            Cuisine with a Modern Touch.” We combine classic recipes with a more modern presentation, using
            local ingredients and the latest culinary techniques.
            <br><br>
            We also offer “Healthy Meal Package” consisting of low-fat, low-sugar, and high-fiber dishes, to
            appeal to customers who are concerned about their health. In addition, “Green Catering” is our focus
            by using organic, local, and sustainable ingredients, to meet the needs of customers looking for
            greener options.
            <br><br>
            For customers who live a vegan or vegetarian lifestyle, we provide “Vegan or Vegetarian Meal
            Package” with creative and delicious menus. These dishes are creative variations of classic meatless
            dishes, designed to satisfy the palate while meeting customers' nutritional needs.
            <br><br>
            With our commitment to quality and innovation, “Ami Catering” is ready to be the first choice for
            your various culinary needs.
        </p>
    </div>
</section>




<script>
    // Menggunakan tombol About untuk scroll ke bagian about
    document.getElementById('aboutButton').addEventListener('click', function () {
        document.getElementById('about').scrollIntoView({
            behavior: 'smooth'
        });
    });

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

    function updateContent(newContent) {
        contentDiv.classList.add('fade-out');
        setTimeout(() => {
            contentDiv.innerHTML = newContent;
            contentDiv.classList.remove('fade-out');
        }, 480);
    }

    document.querySelector('.button1').addEventListener('click', function () {
        rotateImage(60);
        resetButtonStyles();
        this.classList.add('bg-white', 'text-[#143109]');
        updateContent(`
                <h1 class="text-2xl font-bold text-left text-[#143109]">MODERN TRADITIONAL FLAVOR</h1>
                <h2 class="text-lg text-left text-[#143109]">We combine classic recipes with modern servings and use local ingredients with its culinary techniques.</h2>
            `);
    });

    document.querySelector('.button2').addEventListener('click', function () {
        rotateImage(45);
        resetButtonStyles();
        this.classList.add('bg-white', 'text-[#143109]');
        updateContent(`
                <h1 class="text-2xl font-bold text-left text-[#143109]">HEALTHY AND ECO-FRIENDLY FOOD</h1>
                <h2 class="text-lg text-left text-[#143109]">We offer "Healthy Meal Plans" that are low in fat, sugar, and high in fiber. Our "Eco-Friendly Catering" uses organic, local, and sustainable ingredients</h2>
            `);
    });

    document.querySelector('.button3').addEventListener('click', function () {
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
