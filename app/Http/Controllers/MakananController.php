<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MakananController extends Controller
{
    // Menampilkan daftar makanan
    public function index(): View
    {
        $makanans = Makanan::latest()->paginate(10); // Ambil data makanan terbaru dengan pagination
        return view('admin.menuAdmin', compact('makanans')); // Menampilkan view menuAdmin dengan data makanan
    }

    // Menyimpan data makanan baru
    public function store(Request $request)
{
    // Debugging: Lihat data yang diterima
    
    // Validasi data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'category' => 'required|string',
        'price' => 'required|numeric',
        'availability' => 'required|numeric',  
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);
    // dd($request->all());
    // dd($validatedData['availability']);
    try {
        // Generate kodeMakanan
        $kodeMakanan = strtoupper(substr($validatedData['name'], 0, 1)) . now()->format('YmdHis');

        // Simpan gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Mengubah nama gambar sesuai nama makanan dan ekstensi file
            $imageName = Str::slug($validatedData['name'], '_') . '.' . $request->image->getClientOriginalExtension();

            // Simpan gambar di folder storage/app/public/images
            $imagePath = $request->file('image')->storeAs('images', $imageName, 'public');
        }

        // Simpan data ke database
        Makanan::create([
            'kodeMakanan' => $kodeMakanan,
            'namaMakanan' => $validatedData['name'],
            'deskripsi' => $request->input('description', ''),
            'jenisMakanan' => $validatedData['category'],
            'harga' => $validatedData['price'],
            'gambarMakanan' => $imagePath, // Simpan path gambar
            'availability' => $validatedData['availability'], // Simpan availability sebagai boolean
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data successfully saved!');
    } catch (\Exception $e) {
        // Redirect dengan pesan error
        return redirect()->back()->with('error', 'Error saving data: ' . $e->getMessage());
    }
}


    // Menampilkan form edit untuk mengubah data makanan
    public function edit($kodeMakanan)
    {
        $makanan = Makanan::where('kodeMakanan', $kodeMakanan)->firstOrFail();
        return view('admin.editMakanan', compact('makanan')); // Menampilkan form edit dengan data makanan
    }

   // Menyimpan perubahan data makanan
// Menyimpan perubahan data makanan
public function update(Request $request, $kodeMakanan)
{
    // Debugging: Lihat data yang diterima
    dd($request->all());
    // Validasi data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'category' => 'required|string',
        'price' => 'required|numeric', 
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    'availability' => $validatedData['availability'] == '1', // Convert string '1' to boolean true
]);


    try {
        $makanan = Makanan::where('kodeMakanan', $kodeMakanan)->firstOrFail();

        // Update data makanan
        $makanan->update([
            'namaMakanan' => $validatedData['name'],
            'deskripsi' => $request->input('description', ''),
            'jenisMakanan' => $validatedData['category'],
            'harga' => $validatedData['price'],
            'availability' => $validatedData['availability'] , // Update availability sebagai boolean
        ]);

        // Update gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($makanan->gambarMakanan) {
                Storage::disk('public')->delete($makanan->gambarMakanan);
            }

            // Simpan gambar baru
            $imageName = Str::slug($validatedData['name'], '_') . '.' . $request->image->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('images', $imageName, 'public');
            $makanan->update(['gambarMakanan' => $imagePath]);
        }

        return redirect()->back()->with('success', 'Data makanan berhasil diperbarui!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating data: ' . $e->getMessage());
    }
}

    // Menghapus data makanan
    public function destroy($kodeMakanan)
    {
        try {
            $makanan = Makanan::where('kodeMakanan', $kodeMakanan)->firstOrFail();

            // Hapus gambar jika ada
            if ($makanan->gambarMakanan) {
                Storage::disk('public')->delete($makanan->gambarMakanan);
            }

            // Hapus data makanan
            $makanan->delete();

            return redirect()->back()->with('success', 'Makanan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting data: ' . $e->getMessage());
        }
    }
}
