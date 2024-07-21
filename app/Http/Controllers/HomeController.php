<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        return view('user/index');
    }
    public function redirect() {
        $userType = Auth::user()->usertype;
        
        if($userType == "1"){
            $name = Auth::user()->name;
            return view('admin/home', ['name'=> $name]);

        }else {

            return view('dashboard');

        }
    }
}
