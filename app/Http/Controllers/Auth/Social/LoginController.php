<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of available social providers.
     *   - called when user clicks on 'Social Login' button
     */
// TODO Left Pane (small width): Social Provider Information
//   Top: Log In (small icons)
//   Middle: Full width Rectangle with Logged-in Providers
//     - hover changes color
//     - select (by click) selects the Provider and Populates Middle Pane
//     Look and feel: each rectangle
//       - top to have logo and name
//       - middle to list Authorized API's
//       - Italicized bottom to have instruction "Click this panel to activate API selections
//   Bottom: Log Out

// TODO Center Pane: Left side: API Checkboxes
// TODO Center Pane: Right side: Scope Checkboxes for selected API

// TODO Right Pane:  API Description (on top) with Scope Description Bullet List (underneath)
	public function index()
	{
	    // Populate $users array with current WebApp user info to personalize View
	    $users = Auth::user();

	    // Populate $providers collection with DB 'Active Providers'
        $providers = DB::table('providers')
            ->where('active', '=', '1')
            ->get();

        // If $providers returned records, filter out providers not configured in config/services.php
        if($providers->count() > 0) {
            // Test to see if driver is setup in config/services.php
            //   - API client_id, client_secret, redirect URI
            foreach($providers as $provider) {
                // If driver is not setup, remove this provider from $providers collection
                if(!config()->has("services.{$provider->provider}")) {
                    $key = $providers->search($provider);
                    $providers->forget($key);
                }
            }
        } else {
            // If no records, set $providers collection to null (helpful for View conditional content display)
            $providers = null;
        }

// TODO Add code for: 'If user is already logged into any Social Providers, filter that Social Provider out'
// Dim the button with overlay of "Logged In" -- OR -- Move button to different "Log Out Providers" view card
// with Card Header of "Logged In Providers" and Card Body Header of "Log Out of Social Provider"

        // Return a View that has access to populated arrays
        return view('auth.provider.index', compact('providers', 'users'));
	}

    /**
     * Display a listing of the resource.
     *
     * Called when user clicks on 'Social Login' button
     */
	public function login() {
    // This method uses Laravel Socialite to log into the Social Provider
    // Invoked by both 'User Click' to login to Social Provider (1 route) and also by the 'SendFailedResponse' function within this method
    // Why?  Figure out this logic.
    // ALSO, a parameter could be passed into this method which would cleanup the SLOPPY code below.

	    // SLOPPY - see if I can pull the provider from the $request parameter from login(Request $request)
        $driver = array_key_last($_REQUEST);
$driver = 'google';

        // BEFORE EXECUTING THIS CODE, LIST THE ACTIVE API'S AND SCOPES THAT THE USER MAY WANT TO USE




		try {
            // This is what logs the user into the Social Provider
            //
            // AFTER USER SELECTS API'S AND SCOPES, THEN THIS METHOD SHOULD BE CALLED TO LOG THE USER IN WITH THE
            // SCOPES ONLY, SINCE THEY ARE 1:1 CORRELATED TO THE ASSOCIATED API
            $scopes = [
                'openid',
                'profile',
                'email',
                'https://www.googleapis.com/auth/youtube.readonly'
            ];
		    return Socialite::driver($driver)
                // SCOPES TO BE COLLECTED INTO AN ARRAY AND PASSED HERE
                ->scopes($scopes)
                ->redirect();
		} catch (Exception $e) {
			return $this->sendFailedResponse($e->getMessage());
		}
	}

	public function callback($driver) {
        // This method is called from the Social Provider Callback route
		try {
			$socialUsers = (array) Socialite::driver($driver)->user();
// Are we able to view user data from token?  If so which providers / API's?
//			$socialToken = Socialite::driver($driver)->userFromToken($token);

		} catch (Exception $e) {
			return $this->sendFailedResponse($e->getMessage());
		}

        // Insert user data into SocialProvider table
        return redirect()->to($driver)->with($socialUsers);

	}

	protected function sendFailedResponse($msg = null) {
	// why does this call a route that redirects back to the this controller's "login" method
    // and not this controller's "index" method?
		return redirect()->route('social.login')
		    ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
	}

	protected function loginOrCreateAccount($providerUser, $driver) {
		// We don't need this functionality YET since we are not intending
        // to use Social Provider authentication to log into the WebApp
		$user = User::where('email', $providerUser->getEmail())->first();
// TODO Scrape Social Callback User Info to Update DB from this code
        // if user already found
		if ($user) {
			// update the avatar and provider that might have changed
			$user->update(
				[
					'avatar' => $providerUser->avatar,
					'provider' => $driver,
					'provider_id' => $providerUser->id,
					'access_token' => $providerUser->token
				]
			);
		} else {
			if ($providerUser->getEmail()) {
			    //Check email exists or not. If exists create a new user
				$user = User::create(
					[
						'name' => $providerUser->getName(),
						'email' => $providerUser->getEmail(),
						'avatar' => $providerUser->getAvatar(),
						'provider' => $driver,
						'provider_id' => $providerUser->getId(),
						'access_token' => $providerUser->token,
						'password' => '' // user can use reset password to create a password
					]
				);
			} else {
				//Show message here what you want to show
			}
		}
		// login the user
//		Auth::login($user, true);
		return $this->sendSuccessResponse();
	}

    protected function sendSuccessResponse()
    {
        // Called from "LoginorCreate"
        return redirect()->intended('home');
    }
}
