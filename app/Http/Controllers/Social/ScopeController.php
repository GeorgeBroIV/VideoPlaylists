<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Scope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScopeController extends Controller
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
        $scopes = DB::table('scopes')
            ->get();

        // Set $providers array to null if no records, helpful for View conditional content display
        if($scopes->count() == 0)
        {
            $scopes = null;
        }

        // Return a View that has access to populated arrays
        return view('scopes.index', compact('scopes', 'users'));
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
     * @param  \App\Scope  $scope
     * @return \Illuminate\Http\Response
     */
    public function show(Scope $scope)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scope  $scope
     * @return \Illuminate\Http\Response
     */
    public function edit(Scope $scope)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scope  $scope
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scope $scope)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scope  $scope
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scope $scope)
    {
        //
    }
}
