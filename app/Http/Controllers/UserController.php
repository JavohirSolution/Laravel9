<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session as FacadesSession;

class UserController extends Controller
{
    public function welcome()
    {
        return view('/welcome');
    }
    public function about()
    {
        return view('/about');
    }
    public function service()
    {
        return view('/service');
    }
    public function project()
    {
        return view('/project');
    }
    public function contact()
    {
        return view('/contact');
    }
}
