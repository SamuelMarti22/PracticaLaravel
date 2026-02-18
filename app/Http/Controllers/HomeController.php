<?php

namespace App\Http\Controllers;

use Illuminate\View\View; // De dónde sale??

class HomeController extends Controller
{
    public function index(): View
    {

        return view('home.index');
    }
}
