<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Recruitment;
use App\Keyword;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
        //$this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $recruitments = Recruitment::orderBy('created_at', 'DESC')->get();
        $keywords = Keyword::all();
        
        return view('home.index', compact('user', 'recruitments', 'keywords'));
    }
    
}
