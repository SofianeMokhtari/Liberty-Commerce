<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use data;
use Auth;

class UserController extends Controller
{
    public function afficheruser(){
    	return view('auth.user');
    }

    public function changeuser(Request $request)
    {

if(Auth::user() == TRUE){
  
    	return view('auth.changeuser');
    }
    		else{
}
	return view('auth.login');

    }


}
