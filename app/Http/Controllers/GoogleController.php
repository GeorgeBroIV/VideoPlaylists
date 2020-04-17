<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Google;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class GoogleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    protected $socialLoggedIn;

    public function index()
    {
        if(!$this->socialLoggedIn="Google")
        {
            $sessions = session()->all();
            $email = Arr::get($sessions, 'email');
            $user = DB::table('googles')
                ->where('vpEmail', $email)
                ->get();
            if ($user->count() > 0) {
                // update record
                echo("> 0");
                echo($email);
                echo($user);
                die;
            } else {
                // create new record
                $this->store($sessions);
            }
        }
        // Test to see if user data exists in table
        //  - should be done by LoginController index method when user clicks on 'Social Login' button
        //  - this should determine:
        //      - button state (grayed out and inactive, indicating already logged in)
        //      - available API list
        //          - if user-authorized
        //              - shows scope authorized
        //              - show scopes available to authorize
        //          - if not user-authorized, show API's and associated scopes available to authorize
        //

        // TODO Social Callback return -> redirect to a view (Social Login?)
        // This returns user data, and now we can open up API functionality
        // Perhaps this could return back to the WebApp 'Social Login' view to log into
        // other providers and select desired (logged-in) Provider API's / scopes for functionality.
        return view ('provider.index', compact('socialLoggedIn'));
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
     */
    public function store($sessions)
    {
        DB::table('googles')
            ->insert([
            'vpEmail' => Auth::user()->email,
            'token' => Arr::get($sessions,'token'),
            'refreshToken' => Arr::get($sessions,'refreshToken'),
            'expiresIn' => Arr::get($sessions,'expiresIn'),
            'googleId' => Arr::get($sessions,'id'),
            'nickname' => Arr::get($sessions,'nickname'),
            'name' => Arr::get($sessions,'name'),
            'email' => Arr::get($sessions,'email'),
            'avatar' => Arr::get($sessions,'avatar'),
            'userSub' => Arr::get($sessions,'user.sub'),
            'userName' => Arr::get($sessions,'user.name'),
            'userGiven_name' => Arr::get($sessions,'user.given_name'),
            'userFamily_name' => Arr::get($sessions,'user.family_name'),
            'userPicture' => Arr::get($sessions,'user.picture'),
            'userEmail' => Arr::get($sessions,'user.email'),
            'userEmail_verified' => Arr::get($sessions,'user.email_verified'),
            'userLocale' => Arr::get($sessions,'user.locale'),
            'userId' => Arr::get($sessions,'user.id'),
            'userVerified_email' => Arr::get($sessions,'user.verified_email'),
            'userLink' => Arr::get($sessions,'user.link'),
            'avatar_original' => Arr::get($sessions,'avatar_original'),
        ]);
        $this->socialLoggedIn = "Google";
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Google  $google
     * @return \Illuminate\Http\Response
     */
    public function show(Google $google)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Google  $google
     * @return \Illuminate\Http\Response
     */
    public function edit(Google $google)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Google  $google
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Google $google)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Google  $google
     * @return \Illuminate\Http\Response
     */
    public function destroy(Google $google)
    {
        //
    }
}
