<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
    	$mobile_users = \App\User::all();
    	return view('users', compact('mobile_users'));
    }
}
