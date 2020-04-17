<?php

namespace App\Http\Controllers\Social;

use App\GoogleUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $socialUsers = [];
        foreach ($sessions as $session)
        {
            array_push($socialUsers, $session);
        }
        ddd($sessions);
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
        // Insert user data into SocialProvider table
        //		ddd(Auth::user()->email);
        /*            $google_user = new GoogleUser;
                    $google_user->vpEmail = Auth::user()->email;
                    $google_user->token = Arr::get($socialUsers,'token');
                    $google_user->refreshToken = Arr::get($socialUsers,'refreshToken');
                    $google_user->expiresIn = Arr::get($socialUsers,'expiresIn');
                    $google_user->googleId = Arr::get($socialUsers,'id');
                    $google_user->nickname = Arr::get($socialUsers,'nickname');
                    $google_user->name = Arr::get($socialUsers,'name');
                    $google_user->email = Arr::get($socialUsers,'email');
                    $google_user->avatar = Arr::get($socialUsers,'avatar');
                    $google_user->userSub = Arr::get($socialUsers,'user.sub');
                    $google_user->userName = Arr::get($socialUsers,'user.name');
                    $google_user->userGiven_name = Arr::get($socialUsers,'user.given_name');
                    $google_user->userFamily_name = Arr::get($socialUsers,'user.family_name');
                    $google_user->userPicture = Arr::get($socialUsers,'user.picture');
                    $google_user->userEmail = Arr::get($socialUsers,'user.email');
                    $google_user->userEmail_verified = Arr::get($socialUsers,'user.email_verified');
                    $google_user->userLocale = Arr::get($socialUsers,'user.locale');
                    $google_user->userId = Arr::get($socialUsers,'user.id');
                    $google_user->userVerified_email = Arr::get($socialUsers,'user.verified_email');
                    $google_user->userLink = Arr::get($socialUsers,'user.link');
                    $google_user->avatar_original = Arr::get($socialUsers,'avatar_original');
                    $google_user->save();
        */

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
