<?php

namespace App\Http\Controllers;

use App\Models\Service;
// use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $services = Service::parents()->showOnHome()->active()->orderBy('home_order')->take(7)->get();
        return view('home', compact('services'));
    }

    function login()
    {
        return view('auth.login');
    }

    function digitalmarketing()
    {
        return view('digitalmarketing');
    }
}
