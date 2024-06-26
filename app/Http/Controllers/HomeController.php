<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private static $title = 'Dashboard';

    public function index()
    {
        $title = self::$title;
        return view('dashboard', compact('title'));
    }
}
