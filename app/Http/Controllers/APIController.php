<?php

namespace App\Http\Controllers;

use App\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Populate $users array with current WebApp user info to personalize View
        $users = Auth::user();

        // Populate $providers array for use in View
        $apis = DB::table('apis')
            ->get();

        // Set $providers array to null if no records, helpful for View conditional content display
        if($apis->count() == 0)
        {
            $apis = null;
        }

        // Return a View that has access to populated arrays
        return view('api.index', compact('apis', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\API  $aPI
     * @return \Illuminate\Http\Response
     */
    public function show(API $aPI)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\API  $aPI
     * @return \Illuminate\Http\Response
     */
    public function edit(API $aPI)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\API  $aPI
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, API $aPI)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\API  $aPI
     * @return \Illuminate\Http\Response
     */
    public function destroy(API $aPI)
    {
        //
    }
}
