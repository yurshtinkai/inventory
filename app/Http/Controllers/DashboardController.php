<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('content.dashboard');
    }
    public function details()
    {
        return view('content.viewdetails');
    }
    public function parts()
    {
        return view('content.pcparts');
    }

    
}
