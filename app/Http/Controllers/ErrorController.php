<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function index(Request $request)
    {        
    	return view('error.index')
    		->with('hobbies', ['Sports', 'Travel']);
    }
}
