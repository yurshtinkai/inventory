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
    public function laboneF()
    {
        return view('content.comOneF');
    }
    public function laboneNF()
    {
        return view('content.comOneNF');
    }
    public function labtwoF()
    {
        return view('content.comlabtwoF');
    }
    public function labtwoNF()
    {
        return view('content.comlabtwoNF');
    }

    
}
