<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
            return view('admin.dashboard');
}
    
}
