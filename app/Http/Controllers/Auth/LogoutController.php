<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{
	public function logout()
	{
        // Populate $users array with current WebApp user info to personalize View
	    $user = Auth::user();

	    // Logout the current WebApp user
		Auth::logout();

        // Return a View that has access to populated arrays
		return view('auth.logout', compact('user'));
	}
}
