<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::user()->usertype == 'admin'){
            return view('dashboard');
        }
        else{
            return view('livewire.clients.home');
        }
    }
}
