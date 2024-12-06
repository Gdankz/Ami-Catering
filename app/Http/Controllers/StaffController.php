<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    public function index(): View
    {
        $staffs = Staff::latest()->paginate(10);
        return view('admin.staff', compact('staffs'));
    }
    public function store(Request $request)
    {
        // Validasi data
        // dd($request->all());
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'noHPStaff' => 'required|numeric',
            'nik' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // dd($validatedData);
        try {
            // Gunakan NIK sebagai idStaff
            $idStaff = $validatedData['nik'];

            // Simpan gambar jika ada
            $imagePath = null;
            if ($request->hasFile('image')) {
                // Ubah nama gambar berdasarkan nama staf
                $imageName = Str::slug($validatedData['nama'], '_') . '.' . $request->image->getClientOriginalExtension();

                // Simpan gambar di folder storage/app/public/images/Staff
                $imagePath = $request->file('image')->storeAs('images/Staff', $imageName, 'public');
            }

            // Simpan data ke database
            Staff::create([
                'idStaff' => $idStaff,
                'nama' => $validatedData['nama'],
                'alamat' => $validatedData['alamat'],
                'nik' => $validatedData['nik'],
                'gambarStaff' => $imagePath, // Simpan path gambar
                'noHPStaff' => $validatedData['noHPStaff'],
            ]);

            // Redirect dengan pesan sukses 
            return redirect()->back()->with('success', 'Data successfully saved!');
        } catch (\Exception $e) {
            // Redirect ke halaman menu admin jika terjadi kesalahan
            return redirect()->back()->with('error', 'Error saving data: ' . $e->getMessage());
        }
    }
    public function update(Request $request, $idStaff)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'noHPStaff' => 'required|numeric',
            'nik' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        try {
            // Cari data staff berdasarkan idStaff
            $staff = Staff::where('idStaff', $idStaff)->firstOrFail();
    
            // Simpan gambar jika ada perubahan
            $imagePath = $staff->gambarStaff; // Gunakan gambar lama jika tidak ada gambar baru
            if ($request->hasFile('image')) {
                // Ubah nama gambar berdasarkan nama staf
                $imageName = Str::slug($validatedData['nama'], '_') . '.' . $request->image->getClientOriginalExtension();
    
                // Simpan gambar di folder storage/app/public/images/Staff
                $imagePath = $request->file('image')->storeAs('images/Staff', $imageName, 'public');
            }
    
            // Update data staff di database
            $staff->update([
                'nama' => $validatedData['nama'],
                'alamat' => $validatedData['alamat'],
                'nik' => $validatedData['nik'],
                'gambarStaff' => $imagePath,
                'noHPStaff' => $validatedData['noHPStaff'],
            ]);
    
            // Redirect dengan pesan sukses
            return redirect()->route('staff')->with('success', 'Data successfully updated!');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->back()->with('error', 'Error updating data: ' . $e->getMessage());
        }
    }
    
    public function destroy($idStaff)
    {
        $staff = Staff::find($idStaff);
        if ($staff) {
            $staff->delete();
            return redirect()->route('staff')->with('success', 'Staff deleted successfully');
        }
        return redirect()->route('staff')->with('error', 'Staff not found');
    }
}
