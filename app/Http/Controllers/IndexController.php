<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){


        // dd(Auth::user());
        return inertia('Index/Index');
    }

    public function show(){

        // dd(Auth::check());
        return inertia('Index/Show');
    }

    public function about(){

        return inertia('Index/About');
    }

    public function blog(){

        return inertia('Index/Blog');
    }

    public function resources(){

        return inertia('Index/Resources');
    }

}
