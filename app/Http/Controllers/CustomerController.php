<?php
namespace App\Http\Controllers;

use App\Models\Customer; // Pastikan model Customer sudah ada
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Ambil data customers dari database
        $customers = Customer::all(); // Atau sesuaikan dengan kebutuhan query

        // Kirim data ke view 'admin.cutomerAdmin'
        return view('admin.cutomerAdmin', compact('customers'));
    }
}
