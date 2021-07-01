<?php

namespace App\Http\Controllers\Farm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:farm');
    }

    public function home()
    {
        return view('farms.layouts.home');
    }
}
