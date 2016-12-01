<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobileUserController extends Controller
{
    public function index()
    {
    	$mobile_users = \App\MobileUser::all();
    	return view('users', compact('mobile_users'));
    }

    public function updateUserStat($id)
    {
    	$user = \App\MobileUser::findOrFail($id);

		if($user->activated == 1){
		    $user->activated = 0;
		} else {
		    $user->activated = 1;
		}

		return response()->json([
		  'data' => [
		    'success' => $user->save(),
		  ]
		]);
    }
}
