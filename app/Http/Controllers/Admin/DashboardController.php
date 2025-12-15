<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard utama Admin.
     */
    public function index()
    {
        // Pastikan memanggil folder view yang benar: resources/views/admin/dashboard.blade.php
        return view('admin.dashboard'); 
    }
}