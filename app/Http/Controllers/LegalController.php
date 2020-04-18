<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    /**
     * Privacy Policy
     */
    public function privacy()
    {
        return view('legal.privacy');
    }

    /**
     * Terms of Service
     */
    public function tos()
    {
        return view('legal.tos');
    }
}
