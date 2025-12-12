<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $venues = Venue::all(); 
        return view('home.index', compact('venues'));
    }
}
