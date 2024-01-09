<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class HomeController extends Controller
{
    public function index()
    {
        $comics = Comic::inRandomOrder()->limit(5)->get();
        //dd($comics);
        return view('home', compact('comics'));
    }
}
