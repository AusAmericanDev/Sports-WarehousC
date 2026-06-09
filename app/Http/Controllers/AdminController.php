<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the staff admin control panel dashboard.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
