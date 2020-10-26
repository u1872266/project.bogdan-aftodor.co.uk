<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;
use Storage;
use Auth;
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

    public function show($id){
        $CityModel = new Cities;
        $City = $CityModel->findWithUserUpdates($id);
        return view('showCity', compact('City'));
    }

    public function edit($id){
        $CityModel = new Cities;
        $City = $CityModel->findWithUserUpdates($id);
        return view('showCity', compact('City'));
    }

    public function update(Request $request,$id){
        $City = Cities::find($id);
        $City->text = $request->text;
        $City->updated_by = \Auth::user()->id;
        $City->save();
        return redirect(route('cities.show',['id'=>$id]));
    }

    public function destroy($id){
        $City = Cities::find($id);
        $City->delete();
        return redirect(route('home'));
    }

    public function create(){
        return view('addingCity');
    }

    public function store(Request $request){
        $newCity = new Cities;
        $newCity->city_name = $request->city_name;
        $newCity->text = $request->text;

        $img = $request->file('city_image')->store(null,'images');

        $newCity->images = $img;
        $newCity->updated_by = Auth::user()->id;
        $newCity->save();

        return redirect(route('cities.index'));
    }
}
