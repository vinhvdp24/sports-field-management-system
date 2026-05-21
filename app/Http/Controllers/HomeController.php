<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recentReviews = [];

        return view('home.index', compact('recentReviews'));
    }
}