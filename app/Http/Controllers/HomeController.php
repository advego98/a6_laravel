<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Prophecy\Exception\Exception;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        $properties = Property::all();

//        $request->user()->authorizeRoles(['user', 'admin']);
        return view('home');
    }

    public function welcome()
    {

        $properties= Property::all()->where("published","1");
        return view('welcome',compact('properties'));
    }





    /*
        public function someAdminStuff(Request $request)
        {
            $request->user()->authorizeRoles(‘admin’);
            return view(‘some.view’);
        }
        */
}

