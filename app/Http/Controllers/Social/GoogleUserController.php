<?php

namespace App\Http\Controllers\Social;

use App\GoogleUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GoogleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = session()->all();
        $user = DB::table('google_users')->get()
            ->where('vpEmail', Arr::get($sessions,'email'));
        ddd($user);
        if($user->count() > 0) {
            echo ("> 0");
            die;
        } else {
            echo ("no record");
            die;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sessions = session()->all();
        // Insert user data into SocialProvider table
/*        $google_user = new GoogleUser;
        $google_user->vpEmail = Auth::user()->email;
        $google_user->token = Arr::get($sessions,'token');
        $google_user->refreshToken = Arr::get($sessions,'refreshToken');
        $google_user->expiresIn = Arr::get($sessions,'expiresIn');
        $google_user->googleId = Arr::get($sessions,'id');
        $google_user->nickname = Arr::get($sessions,'nickname');
        $google_user->name = Arr::get($sessions,'name');
        $google_user->email = Arr::get($sessions,'email');
        $google_user->avatar = Arr::get($sessions,'avatar');
        $google_user->userSub = Arr::get($sessions,'user.sub');
        $google_user->userName = Arr::get($sessions,'user.name');
        $google_user->userGiven_name = Arr::get($sessions,'user.given_name');
        $google_user->userFamily_name = Arr::get($sessions,'user.family_name');
        $google_user->userPicture = Arr::get($sessions,'user.picture');
        $google_user->userEmail = Arr::get($sessions,'user.email');
        $google_user->userEmail_verified = Arr::get($sessions,'user.email_verified');
        $google_user->userLocale = Arr::get($sessions,'user.locale');
        $google_user->userId = Arr::get($sessions,'user.id');
        $google_user->userVerified_email = Arr::get($sessions,'user.verified_email');
        $google_user->userLink = Arr::get($sessions,'user.link');
        $google_user->avatar_original = Arr::get($sessions,'avatar_original');
        $google_user->save();*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GoogleUser  $googleUser
     * @return \Illuminate\Http\Response
     */
    public function show(GoogleUser $googleUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GoogleUser  $googleUser
     * @return \Illuminate\Http\Response
     */
    public function edit(GoogleUser $googleUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GoogleUser  $googleUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoogleUser $googleUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GoogleUser  $googleUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoogleUser $googleUser)
    {
        //
    }
}
