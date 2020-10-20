<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Cities = Cities::get();
        return view('home', compact('Cities'));
    }

    public function showCity($id){
        $City = Cities::find($id);
        return view('showCity', compact('City'));
    }
}
