<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ami Catering</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* CSS untuk blur efek */
        .blurred {
            filter: blur(5px);
            transition: filter 100.5s ease-in-out;
        }

        .fade {
            transition: opacity 0.5s ease-in-out;
            opacity: 1;
        }

        .fade-out {
            opacity: 0;
        }

        .hidden {
            display: none;
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

        /* Hilangkan panah pada input number */
        input[type="number"].no-arrows {
            -moz-appearance: textfield;
            /* Untuk Firefox */
            -webkit-appearance: none;
            /* Untuk Chrome dan Safari */
            appearance: none;
        }

        /* Untuk menghindari margin default panah di beberapa browser */
        input[type="number"].no-arrows::-webkit-inner-spin-button,
        input[type="number"].no-arrows::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Menambahkan efek transisi ke halaman */
        .page-transition {
            transition: filter 0.5s ease-in-out;
        }

        <style>.dynamic-box {
            min-height: auto;
            /* Membiarkan div tumbuh sesuai isi */
            max-height: 80vh;
            /* Membatasi tinggi maksimum agar tidak melampaui layar */
            overflow-y: auto;
            /* Menambahkan scroll jika konten terlalu besar */
        }
    </style>

    </style>
</head>

<body class="bg-[#FFFFFF] min-h-screen flex flex-col page-transition" id="body">

    <!-- Memanggil navbar -->
    @include('partials.navBarAdmin')
    {{-- bagian untuk menampilkan form penambahan staff --}}
    <div id="myModal" class="modal">
        <div class="modal-content">
            <form id="staffForm" action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <div class="flex items-center space-x-4 mb-4">
                    <div id="imagePreview"
                        class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                        <span class="text-gray-500 text-sm">Ellipse</span>
                        <!-- Menampilkan teks default jika tidak ada gambar -->
                    </div>
                    <input type="file" id="imageInput" name="image" accept="image/*" class="hidden"
                        onchange="loadFile(event)">
                    <button type="button" onclick="document.getElementById('imageInput').click()"
                        class="px-4 py-2 bg-[#FFFFFF] text-[#143109] rounded-lg border-2 border-[#143109]">Choose
                        Photo</button>
                </div>

                <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                    <label for="nama" class="w-1/3">Name</label>
                    <input type="text" id="nama" name="nama" required
                        class="w-2/3 p-2 bg-transparent border-none outline-none">
                </div>

                <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                    <label for="alamat" class="w-1/3">Address</label>
                    <input type="text" id="alamat" name="alamat" required
                        class="w-2/3 p-2 bg-transparent border-none outline-none">
                </div>

                <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                    <label for="noHPStaff" class="w-1/3">Phone Number</label>
                    <input type="number" id="noHPStaff" name="noHPStaff" required
                        class="w-2/3 p-2 bg-transparent border-none outline-none no-arrows">
                </div>

                <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                    <label for="nik" class="w-1/3">NIK</label>
                    <input type="number" id="nik" name="nik" required
                        class="w-2/3 p-2 bg-transparent border-none outline-none no-arrows">
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
    {{-- untuk edit data --}}
    <div id="myModalEdit" class="modal">
        <div class="modal-content">
            <form id="staffFormEdit" action="/staff/{idStaff}" method="POST" enctype="multipart/form-data" class="space-y-4">
                <input type="hidden" name="_method" value="PUT">

                @csrf
                <div class="flex items-center space-x-4 mb-4">
                    <div id="imagePreviewEdit"
                        class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                        <span class="text-gray-500 text-sm">Ellipse</span>
                        <!-- Menampilkan teks default jika tidak ada gambar -->
                    </div>
                    <input type="file" id="imageInput" name="image" accept="image/*" class="hidden"
                        onchange="loadFile(event)">
                    <button type="button" onclick="document.getElementById('imageInput').click()"
                        class="px-4 py-2 bg-[#FFFFFF] text-[#143109] rounded-lg border-2 border-[#143109]">Choose
                        Photo</button>
                </div>

                <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                    <label for="namaEdit" class="w-1/3">Name</label>
                    <input type="text" id="namaEdit" name="namaEdit" required
                        class="w-2/3 p-2 bg-transparent border-none outline-none">
                </div>

                <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                    <label for="alamatEdit" class="w-1/3">Address</label>
                    <input type="text" id="alamatEdit" name="alamatEdit" required
                        class="w-2/3 p-2 bg-transparent border-none outline-none">
                </div>

                <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                    <label for="noHPStaffEdit" class="w-1/3">Phone Number</label>
                    <input type="number" id="noHPStaffEdit" name="noHPStaffEdit" required
                        class="w-2/3 p-2 bg-transparent border-none outline-none no-arrows">
                </div>

                <div class="flex items-center border-b-[2px] border-[#143109] pb-2">
                    <label for="nikEdit" class="w-1/3">NIK</label>
                    <input type="number" id="nikEdit" name="nikEdit" required
                        class="w-2/3 p-2 bg-transparent border-none outline-none no-arrows">
                </div>

                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" id="cancelBtnEdit"
                        class="px-4 py-2 bg-[#FFFFFF] text-[#143109] rounded-lg border-2 border-[#143109]">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-[#143109] text-[#FFFFFF] rounded-lg border-2 border-[#143109]">Save</button>
                </div>
            </form>
        </div>
    </div>


    <div class="border-4 border-[#143109] p-4 rounded-3xl mx-[50px] dynamic-box">

        <!-- Header Section: Search Bar dan Tombol Tambah Staff -->
        <div class="flex justify-between items-center mb-6">
            <!-- Placeholder untuk menjaga jarak dari kiri -->
            <div class="w-[10%]"></div>

            <!-- Search Bar -->
            <div class="flex justify-center w-full">
                <input type="text" id="searchInput" placeholder="Search"
                    class="w-1/2 border border-[#143109] rounded-full px-4 py-2 text-[#143109] focus:outline-none focus:ring-2 focus:ring-green-500 text-center">
            </div>

            <!-- Tombol Tambah Staff -->
            <button id="tambahstaffBTN" class="w-[10%] flex flex-col justify-center items-center rounded-lg p-4">
                <img src="..\images\tombolAdd.png" alt="Tambah Staff" class="btn-image w-[60%] mb-2">
            </button>
        </div>

        <!-- Pesan tidak ditemukan -->
        <div id="notFoundMessage" class="text-center text-red-500 hidden">
            Nama tidak ditemukan
        </div>

        <!-- Main Content -->
        <div>
            <main class="flex flex-col items-start mt-10">
                <div class="w-2/3 bg-white ml-8 mb-10 relative">
                    <!-- Looping untuk Menampilkan Semua Staff -->
                    @foreach ($staffs as $index => $staff)
                        <div class="staff-item flex space-x-8 mt-8" data-name="{{ strtolower($staff->nama) }}">
                            <!-- Left Column (Profile Picture and Fields) -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-32 h-32 rounded-full border border-[#143109] flex items-center justify-center overflow-hidden">
                                    {{-- kalau ukuran terlalu besar bisa di ubah ke ukuran 24 x 24 --}}
                                    <img src="{{ asset('storage/' . $staff->gambarStaff) }}" alt="{{ $staff->nama }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <!-- Tombol Edit dan Hapus -->
                                <div class="flex space-x-4 mt-2">
                                    <button type="button" class="text-blue-500 edit-btn"
                                        data-id="{{ $staff->idStaff }}" data-nama="{{ $staff->nama }}"
                                        data-alamat="{{ $staff->alamat }}" data-nohps="{{ $staff->noHPStaff }}"
                                        data-nik="{{ $staff->nik }}" data-gambar="{{ $staff->gambarStaff }}">
                                        <img src="{{ asset('..\images\edit.png') }}" alt="Edit" class="w-6 h-6">
                                    </button>


                                    <form action="{{ route('staff.destroy', $staff->idStaff) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">
                                            <img src="{{ asset('..\images\delete.png') }}" alt="Hapus"
                                                class="w-6 h-6">
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Right Column (Fields) -->
                            <div class="space-y-4 w-full">
                                <!-- Menampilkan Nama -->
                                <div class="flex items-center w-3/4">
                                    <label class="font-semibold text-lg w-1/3">NAME</label>
                                    <div class="w-2/3 border-b-2 border-[#143109] font-bold">
                                        {{ $staff->nama }}
                                    </div>
                                </div>

                                <!-- Menampilkan Alamat -->
                                <div class="flex items-center w-3/4">
                                    <label class="font-semibold text-lg w-1/3">ADDRESS</label>
                                    <div class="w-2/3 border-b-2 border-[#143109] font-bold">
                                        {{ $staff->alamat }}
                                    </div>
                                </div>

                                <!-- Menampilkan Nomor Telepon -->
                                <div class="flex items-center w-3/4">
                                    <label class="font-semibold text-lg w-1/3">PHONE NUMBER</label>
                                    <div class="w-2/3 border-b-2 border-[#143109] font-bold">
                                        {{ $staff->noHPStaff }}
                                    </div>
                                </div>

                                <!-- Menampilkan NIK -->
                                <div class="flex items-center w-3/4">
                                    <label class="font-semibold text-lg w-1/3">NIK</label>
                                    <div class="w-2/3 border-b-2 border-[#143109] font-bold">
                                        {{ $staff->nik }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Menampilkan garis pemisah setelah setiap staff kecuali yang terakhir -->
                        @if ($index < count($staffs) - 1)
                            <hr class="divider" style="border: 1.5px solid #143109; width: 145%; margin: 24px 0;">
                        @endif
                    @endforeach
                </div>
            </main>
        </div>

    </div>

    <script>
        // Menambahkan blur pada seluruh halaman saat dimuat
        window.addEventListener('load', () => {
            const body = document.getElementById('body');
            body.classList.add('blurred');
            setTimeout(() => {
                body.classList.remove('blurred'); // Menghapus blur setelah transisi selesai
            }, 500); // Waktu transisi blur (0.5 detik)
        });

        // Event listener untuk menangani perubahan input pencarian
        document.getElementById('searchInput').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const items = document.querySelectorAll('.staff-item');
            const dividers = document.querySelectorAll('.divider'); // Seleksi semua garis pemisah
            const notFound = document.getElementById('notFoundMessage');
            let found = false;

            // Menyembunyikan semua staff-item & garis pemisah secara default
            items.forEach((item) => item.style.display = 'none');
            dividers.forEach((divider) => divider.classList.add('hidden'));

            // Memeriksa item yang sesuai dengan pencarian
            items.forEach((item, index) => {
                const name = item.dataset.name;
                if (name.includes(query)) {
                    item.style.display = 'flex'; // Tampilkan item
                    found = true;

                    // Jika ada divider berikutnya, tampilkan divider tersebut
                    if (index < items.length - 1) {
                        dividers[index].classList.remove('hidden');
                    }
                }
            });

            // Tampilkan atau sembunyikan pesan "Nama tidak ditemukan"
            notFound.style.display = found ? 'none' : 'block';
        });


        var modal = document.getElementById("myModal");
        var btn = document.getElementById("tambahstaffBTN");
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
            document.getElementById("staffForm").reset();
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


        document.getElementById('cancelBtnEdit').addEventListener('click', function() {
            // Ambil modal edit
            const modalEdit = document.getElementById('myModalEdit');

            // Sembunyikan modal edit
            modalEdit.style.display = "none";

            // Reset form modal edit
            const staffFormEdit = document.getElementById('staffFormEdit');
            staffFormEdit.reset();

            // Reset preview gambar ke teks default
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = `<span class="text-gray-500 text-sm">Ellipse</span>`;
        });

        // JavaScript untuk menangani klik tombol Edit dan memuat data ke form modal
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Ambil data yang ada pada tombol
                const id = this.getAttribute('data-id');
                const nama = this.getAttribute('data-nama');
                const alamat = this.getAttribute('data-alamat');
                const noHPStaff = this.getAttribute('data-nohps');
                const nik = this.getAttribute('data-nik');
                const gambar = this.getAttribute('data-gambar');

                // Memuat data ke form modal
                document.getElementById('staffForm').action =
                    `/staff/${id}`; // Mengubah action form menjadi update
                document.getElementById('nama').value = nama;
                document.getElementById('alamat').value = alamat;
                document.getElementById('noHPStaff').value = noHPStaff;
                document.getElementById('nikt').value = nik;

                // Jika ada gambar, tampilkan di preview
                const imagePreview = document.getElementById('imagePreview');
                if (gambar) {
                    imagePreview.innerHTML =
                        `<img src="{{ asset('storage/') }}/${gambar}" class="w-full h-full object-cover rounded-full">`;
                }

                // Tampilkan modal
                modal.style.display = "block";
            });
        });
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Ambil data yang ada pada tombol
                const id = this.getAttribute('data-id');
                const nama = this.getAttribute('data-nama');
                const alamat = this.getAttribute('data-alamat');
                const noHPStaff = this.getAttribute('data-nohps');
                const nik = this.getAttribute('data-nik');
                const gambar = this.getAttribute('data-gambar');

                // Memuat data ke form modal edit
                // const staffFormEdit = document.getElementById('staffFormEdit');
                // staffFormEdit.action = `/staff/${id}`; // Mengubah action form menjadi update

                document.getElementById('staffFormEdit').action = `/staff/${id}`;
                
                document.getElementById('namaEdit').value = nama;
                document.getElementById('alamatEdit').value = alamat;
                document.getElementById('noHPStaffEdit').value = noHPStaff;
                document.getElementById('nikEdit').value = nik;

                // Jika ada gambar, tampilkan di preview
                const imagePreview = document.getElementById('imagePreviewEdit');
                if (gambar) {
                    imagePreview.innerHTML =
                        `<img src="{{ asset('storage/') }}/${gambar}" class="w-full h-full object-cover rounded-full">`;
                } else {
                    imagePreview.innerHTML =
                        `<span class="text-gray-500 text-sm">Ellipse</span>`;
                }

                // Tampilkan modal edit
                const modalEdit = document.getElementById('myModalEdit');
                modalEdit.style.display = "block";
            });
        });
    </script>

</body>

</html>
