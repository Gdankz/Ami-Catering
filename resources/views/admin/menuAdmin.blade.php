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

        .btn-image {
            transition: transform 0.1s ease;
        }

        .btn-image:active {
            transform: scale(0.9);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: rgba(255, 255, 255, 0.9);
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 400px;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-[#FFFFFF] min-h-screen flex flex-col">
    <!-- Memanggil navbar -->
    @include('partials.navBarAdmin')

    <div class="flex justify-start p-4">
        <button id="tambahMakananBtn" class="flex items-center ml-10 mt-10">
            <img src="..\images\tombolAdd.png" alt="Tambah Makanan" class="btn-image w-[60%] mr-1">
        </button>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content"> 
            <form id="foodForm" class="space-y-4">
                <!-- Image and Choose Photo Button -->
                <div class="flex items-center space-x-4 mb-4">
                    <div id="imagePreview" class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                        <span class="text-gray-500 text-sm">Ellipse</span>
                    </div>
                    <input type="file" id="imageInput" accept="image/*" class="hidden" onchange="loadFile(event)">
                    <button type="button" onclick="document.getElementById('imageInput').click()"
                        class="px-4 py-2 bg-[#FFFFFF] text-[#143109] rounded-lg border-2 border-[#143109]">Choose Photo</button>
                </div>

                <!-- Input Category -->
                <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                    <label for="category" class="w-1/3">Category</label>
                    <input type="text" id="category" name="category" required
                        class="w-2/3 p-2 bg-transparent border-none outline-none">
                </div>

                <!-- Input Name -->
                <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                    <label for="name" class="w-1/3">Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-2/3 p-2 bg-transparent border-none outline-none">
                </div>

                <!-- Input Price -->
                <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                    <label for="price" class="w-1/3">Price</label>
                    <input type="number" id="price" name="price" required
                        class="w-2/3 p-2 bg-transparent border-none outline-none">
                </div>

                <!-- Availability Checkbox -->
                <div class="mt-4">
                    <label class="block font-semibold mb-2">Availability</label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="availability" value="available" class="form-radio" required>
                            <span>Available</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="availability" value="unavailable" class="form-radio">
                            <span>Unavailable</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" id="cancelBtn"
                        class="px-4 py-2 bg-[#FFFFFF] text-[#143109] rounded-lg border-2 border-[#143109]">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-[#FFFFFF] text-[#143109] rounded-lg border-2 border-[#143109]">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("tambahMakananBtn");
        var cancelBtn = document.getElementById("cancelBtn");
        var imagePreview = document.getElementById("imagePreview");

        // Open Modal
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // Close Modal on Outside Click
        window.onclick = function (event) {
            if (event.target == modal) {
                closeModal();
            }
        }

        // Load and Preview Chosen Image
        var loadFile = function (event) {
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + URL.createObjectURL(event.target.files[0]) + '" class="w-full h-full object-cover rounded-full">';
        };

        // Close Modal and Reset Form on Cancel
        cancelBtn.onclick = function () {
            closeModal();
        };

        // Close Modal Function
        function closeModal() {
            modal.style.display = "none";
            document.getElementById("foodForm").reset();
            imagePreview.innerHTML = '<span class="text-gray-500 text-sm">Ellipse</span>';
        }

        // Form Submit Handler
        document.getElementById("foodForm").onsubmit = function (e) {
            e.preventDefault();
            var category = document.getElementById("category").value;
            var name = document.getElementById("name").value;
            var price = document.getElementById("price").value;

            console.log("Category:", category, "Name:", name, "Price:", price);

            closeModal();
        }
    </script>
</body>

</html>
