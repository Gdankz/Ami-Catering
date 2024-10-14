<!-- welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ami Catering</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .slideshow-container {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
        }

        .slideshow-slide {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: transform 1s ease-in-out;
        }
    </style>
</head>
<body>
<h1 class="text-3xl font-bold text-center my-4">Ami Catering</h1>
<div style="float: right;" class="mr-4 mt-4">
    <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 mr-4">Register</a>
    <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Login</a>
</div>

<!-- Slideshow Container -->
<div class="slideshow-container mt-8 mx-auto max-w-4xl">
    <div class="slideshow-slide" id="slide1">
        <img src="images/Sign_Up_image.png" alt="Image 1" class="w-full h-full object-cover">
    </div>
    <div class="slideshow-slide" id="slide2" style="display: none;">
        <img src="/path/to/image2.jpg" alt="Image 2" class="w-full h-full object-cover">
    </div>
    <div class="slideshow-slide" id="slide3" style="display: none;">
        <img src="/path/to/image3.jpg" alt="Image 3" class="w-full h-full object-cover">
    </div>
</div>

<script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slideshow-slide');
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = i === index ? 'block' : 'none';
        });
    }

    function nextSlide() {
        slideIndex = (slideIndex + 1) % totalSlides;
        showSlide(slideIndex);
    }

    setInterval(nextSlide, 10000); // 10 detik interval
</script>
</body>
</html>
