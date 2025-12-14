<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Pastikan memanggil folder dan file yang benar: resources/views/admin/dashboard.blade.php
        return view('admin.dashboard'); 
    }
}