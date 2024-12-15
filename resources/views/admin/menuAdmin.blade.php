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

        .food-image {
            max-width: 100%;
            /* Agar gambar tidak melebihi lebar kontainer */
            max-height: 450px;
            /* Tinggi maksimal 500px */
            height: auto;
            /* Menyesuaikan tinggi agar proporsi tetap */
            object-fit: contain;
            /* Alternatif: Bisa gunakan cover untuk mengisi seluruh kotak */
            border-radius: 10px;
            /* Opsional */
        }

        .notification-overlay {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .notification {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            display: none;
            padding: 16px;
            border-radius: 8px;
            color: #000000;
            background-color: #ffffff;
            border: 1px solid #888;
        }

        .notification.success {
            background-color: #ffffff;
        }

        .notification.error {
            background-color: #ffffff;
        }

        /* Blur effect */
        .blurred {
            filter: blur(5px);
            transition: filter 0.5s ease-in-out;
        }

        .page-transition {
            transition: filter 0.5s ease-in-out;
        }
    </style>
</head>

<body id="body" class="bg-[#FFFFFF] min-h-screen flex flex-col page-transition">

    <!-- Memanggil navbar -->
    @include('partials.navBarAdmin')

    <!-- Notification Overlay -->
    <div class="notification-overlay" id="notificationOverlay"></div>
    <!-- Notifikasi Pop-Up -->
    @if (session('success'))
        <div class="notification success fade">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="notification error fade">
            {{ session('error') }}
        </div>
    @endif
    <div class="flex flex-wrap gap-5 justify-center items-stretch mt-10">
        <!-- Tombol Tambah Makanan -->
        <button id="tambahMakananBtn" class="w-[30%] flex flex-col justify-center items-center   rounded-lg p-4  ">
            <img src="..\images\tombolAdd.png" alt="Tambah Makanan" class="btn-image w-[60%] mb-2">
        </button>



        <div id="myModal" class="modal">
            <div class="modal-content">
                <form id="foodForm"
                    action="{{ isset($makanan) ? route('makanan.update', $makanan->kodeMakanan) : route('makanan.store') }}"
                    method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($makanan))
                        @method('PUT') <!-- Menambahkan method PUT untuk update -->
                    @endif
                    <div class="flex items-center space-x-4 mb-4">
                        <div id="imagePreview"
                            class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                            @if (isset($makanan) && $makanan->gambarMakanan)
                                <img src="{{ asset('storage/' . $makanan->gambarMakanan) }}"
                                    class="w-full h-full object-cover rounded-full" />
                            @else
                                <span class="text-gray-500 text-sm">Ellipse</span>
                            @endif
                        </div>
                        <input type="file" id="imageInput" name="image" accept="image/*" class="hidden"
                            onchange="loadFile(event)">
                        <button type="button" onclick="document.getElementById('imageInput').click()"
                            class="px-4 py-2 bg-[#FFFFFF] text-[#143109] rounded-lg border-2 border-[#143109]">Choose
                            Photo</button>
                    </div>

                    <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                        <label for="category" class="w-1/3">Category</label>
                        <input type="text" id="category" name="category"
                            value="{{ old('category', $makanan->category ?? '') }}" required
                            class="w-2/3 p-2 bg-transparent border-none outline-none">
                    </div>

                    <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                        <label for="name" class="w-1/3">Name</label>
                        <input type="text" id="name" name="name"
                            value="{{ old('name', $makanan->namaMakanan ?? '') }}" required
                            class="w-2/3 p-2 bg-transparent border-none outline-none">
                    </div>

                    <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                        <label for="price" class="w-1/3">Price</label>
                        <input type="number" id="price" name="price"
                            value="{{ old('price', $makanan->harga ?? '') }}" required
                            class="w-2/3 p-2 bg-transparent border-none outline-none">
                    </div>

                    <div class="mt-4">
                        <label class="block font-semibold mb-2">Availability</label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="availability" value=1 class="form-radio"
                                    {{ isset($makanan) && $makanan->availability == true ? 'checked' : '' }} required>
                                <span>Available</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="availability" value=0 class="form-radio"
                                    {{ isset($makanan) && $makanan->availability == false ? 'checked' : '' }}>
                                <span>Unavailable</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2 mt-4">
                        <button type="button" id="cancelBtn"
                            class="px-4 py-2 bg-[#FFFFFF] text-[#143109] rounded-lg border-2 border-[#143109]">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-[#143109] text-[#FFFFFF] rounded-lg border-2 border-[#143109]">Save</button>
                    </div>
                </form>
            </div>
        </div>



        {{-- --------------------------- --}}
        <div id="myModalEdit" class="modal">
            <div class="modal-content">

                <form id="foodFormEdit" action="/makanan/{kodeMakanan}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="flex items-center space-x-4 mb-4">
                        <div id="imagePreviewEdit"
                            class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                            <span class="text-gray-500 text-sm">Ellipse</span>
                        </div>
                        <input type="file" id="imageInputEdit" name="image" accept="image/*" class="hidden"
                            onchange="loadFile(event)">
                        <button type="button" onclick="document.getElementById('imageInputEdit').click()"
                            class="px-4 py-2 bg-[#FFFFFF] text-[#143109] rounded-lg border-2 border-[#143109]">Choose
                            Photo</button>
                    </div>

                    <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                        <label for="categoryEdit" class="w-1/3">Category</label>
                        <input type="text" id="categoryEdit" name="category" required
                            class="w-2/3 p-2 bg-transparent border-none outline-none">
                    </div>

                    <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                        <label for="nameEdit" class="w-1/3">Name</label>
                        <input type="text" id="nameEdit" name="name" required
                            class="w-2/3 p-2 bg-transparent border-none outline-none">
                    </div>

                    <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                        <label for="priceEdit" class="w-1/3">Price</label>
                        <input type="number" id="priceEdit" name="price" required
                            class="w-2/3 p-2 bg-transparent border-none outline-none">
                    </div>

                    <div class="mt-4">
                        <label class="block font-semibold mb-2">Availability</label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="availability" value="1" 
                                    {{ isset($makanan) && $makanan->availability == 1 ? 'checked' : '' }}>
                                <span>Available</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="availability" value="0" 
                                    {{ isset($makanan) && $makanan->availability == 0 ? 'checked' : '' }}>
                                <span>Unavailable</span>
                            </label>
                            
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2 mt-4">
                        <button type="button" id="cancelBtn"
                            class="px-4 py-2 bg-[#FFFFFF] text-[#143109] rounded-lg border-2 border-[#143109]">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-[#143109] text-[#FFFFFF] rounded-lg border-2 border-[#143109]">Save</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- Daftar Makanan -->
        @foreach ($makanans as $makanan)
            <div class="w-[30%] h-[80vh] max-w-[70%]   rounded-lg   flex flex-col">
                <!-- Area Gambar (80%) -->
                <div class="flex-grow flex items-center justify-center  rounded-t-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $makanan->gambarMakanan) }}" alt="{{ $makanan->namaMakanan }}"
                        class="max-h-full max-w-full object-contain">
                </div>
                <!-- Area Keterangan (20%) -->
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $makanan->namaMakanan }}</h3>
                    <p class="text-gray-500">{{ $makanan->jenisMakanan }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-gray-700">Rp {{ number_format($makanan->harga, 0, ',', '.') }}</p>
                        <div class="flex items-center gap-2">


                            <!-- Tombol Edit -->
                            <button type="button" class="text-blue-500"
                                onclick="openEditModal(
        '{{ $makanan->kodeMakanan }}',
        '{{ $makanan->namaMakanan }}',
        '{{ $makanan->jenisMakanan }}',
        '{{ $makanan->harga }}',
        '{{ $makanan->availability }}',  
        '{{ $makanan->gambarMakanan ? asset('storage/' . $makanan->gambarMakanan) : '' }}'
    )">
                                <img src="{{ asset('..\images\edit.png') }}" alt="Edit" class="w-6 h-6">
                            </button>


                            <!-- Tombol Hapus -->
                            <form action="{{ route('makanan.destroy', $makanan->kodeMakanan) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">
                                    <img src="{{ asset('..\images\delete.png') }}" alt="Hapus" class="w-6 h-6">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    <script>
        // Adding blur effect when page loads
        window.addEventListener('load', () => {
            const body = document.getElementById('body');
            body.classList.add('blurred');
            setTimeout(() => {
                body.classList.remove('blurred'); // Remove the blur after transition
            }, 500); // Transition time for the blur (0.5 seconds)
        });
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("tambahMakananBtn");
        var cancelBtn = document.getElementById("cancelBtn");
        var imagePreview = document.getElementById("imagePreview");
        var notificationOverlay = document.getElementById("notificationOverlay");




        // Open Modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // Close Modal on Outside Click
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }

        // Load and Preview Chosen Image
        var loadFile = function(event) {
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + URL.createObjectURL(event.target.files[0]) +
                '" class="w-full h-full object-cover rounded-full">';
        };

        // Close Modal and Reset Form on Cancel
        cancelBtn.onclick = function() {
            closeModal();
        };

        // Close Modal Function
        function closeModal() {
            modal.style.display = "none";
            document.getElementById("foodForm").reset();
            imagePreview.innerHTML = '<span class="text-gray-500 text-sm">Ellipse</span>';
        }

        // Show Notification Function with Overlay
        function showNotification(type, message) {
            var notification = document.querySelector('.notification.' + type);
            notification.innerText = message;
            notificationOverlay.style.display = 'block';
            notification.style.display = 'block';

            setTimeout(() => {
                notification.classList.add('fade-out');
                notificationOverlay.style.display = 'none'; // Hide overlay when notification fades out
                setTimeout(() => {
                    notification.style.display = 'none';
                    notification.classList.remove('fade-out');
                }, 500); // Wait for the fade-out to complete
            }, 500); // Display for 3 seconds
        }

        // Check if there is a notification to show
        @if (session('success'))
            showNotification('success', '{{ session('success') }}');
        @elseif (session('error'))
            showNotification('error', '{{ session('error') }}');
        @endif

        // Fungsi untuk membuka modal dan menampilkan data
       // Fungsi untuk membuka modal dan menampilkan data
// Fungsi untuk membuka modal dan menampilkan data
function openEditModal(kodeMakanan, namaMakanan, category, harga, availability, gambar) {
    var modal = document.getElementById("myModalEdit");
    modal.style.display = "block";

    // Update action form untuk update data makanan
    var foodForm = document.getElementById("foodFormEdit");
    foodForm.action = `/makanan/${kodeMakanan}`;
    foodForm.querySelector('input[name="_method"]').value = "PUT";

    // Isi form dengan data dari parameter
    document.getElementById("categoryEdit").value = category || ''; 
    document.getElementById("nameEdit").value = namaMakanan || ''; 
    document.getElementById("priceEdit").value = harga || ''; 

    // Set nilai pada radio button availability
    if (availability !== undefined && (availability == 1 || availability == 0)) {
        document.querySelector(`input[name="availability"][value="${availability}"]`).checked = true;
    } else {
        console.warn("Nilai availability tidak valid atau tidak ditemukan:", availability);
    }

    // Update preview gambar
    var imagePreview = document.getElementById("imagePreviewEdit");
    imagePreview.innerHTML = gambar
        ? `<img src="${gambar}" class="w-full h-full object-cover rounded-full" />`
        : '<span class="text-gray-500 text-sm">Ellipse</span>';
}



    </script>
</body>

</html>
