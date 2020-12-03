<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Aboutme;
use App\Models\Skill;
use App\Models\Service;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        $aboutmes = Aboutme::all();
        $skills = Skill::all();
        $services = Service::all();
        return view('welcome',compact('sliders','aboutmes','skills','services'));
        
    }
}
