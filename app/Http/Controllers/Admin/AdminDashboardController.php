<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // View ini yang seharusnya muncul SETELAH login berhasil
        return view('admin.dashboard');
    }
}