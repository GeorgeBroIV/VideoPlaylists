<?php

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LegalController extends Controller
{
    /**
     * Privacy Policy
     */
    public function privacy()
    {
        return view('help.legal.privacy');
    }

    /**
     * Terms of Service
     */
    public function tos()
    {
        return view('help.legal.tos');
    }
}
