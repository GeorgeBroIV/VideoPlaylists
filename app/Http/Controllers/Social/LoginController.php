<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Request;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Http;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
	public function index()
	{
	    // Populate $users array with current WebApp user info to personalize View
	    $users = Auth::user();

	    // Populate $providers array for use in View
        $providers = DB::table('providers')
            ->where('active', '=', '1')
            ->get();

        // Set $providers array to null if no records, helpful for View conditional content display
        if($providers->count() == 0)
        {
            $providers = null;
        }

        // Return a View that has access to populated arrays
        return view('auth.provider.index', compact('providers', 'users'));
	}

// TODO Parse out the following logic to applicable areas to refactor this Controller to be RESTFUL

	public function show(Request $request) {
    // This method uses Laravel Socialite to log into the Social Provider
    // Invoked by both 'User Click' to login to Social Provider (1 route) and also by the 'SendFailedResponse' function within this method
    // Why?  Figure out this logic.
    // ALSO, a parameter could be passed into this method which would cleanup the SLOPPY code below.

	    // SLOPPY - look up better way to obtain and parse out the social provider from the recordset
        $keys = array_keys($_POST);
        $driver = $keys[1];

	    if (!$this->isProviderAllowed($driver)) {
			return $this->sendFailedResponse("{$driver} is not currently supported");
		}

		try {
            // This is what logs the user into the Social Provider
		    return Socialite::driver($driver)
                ->scopes(['openid', 'profile', 'email', 'https://www.googleapis.com/auth/youtube.readonly'])
                ->redirect();
		} catch (Exception $e) {
			return $this->sendFailedResponse($e->getMessage());
		}
	}

	public function handleProviderCallback($driver) {
        // This method is called from the Social Provider Callback route
		try {
			$socialUsers = Socialite::driver($driver)->user();
//            $socialUsers = Socialite::driver($driver);
//			$socialToken = Socialite::driver($driver)->userFromToken($token);

		} catch (Exception $e) {
			return $this->sendFailedResponse($e->getMessage());
		}
		// TODO Social Callback return -> redirect to a view (Social Login?)
        // This returns user data, and now we can open up API functionality
        // Perhaps this could return back to the WebApp 'Social Login' view to log into
        // other providers and select desired (logged-in) Provider API's / scopes for functionality.
$social = (array)$socialUsers;
//        ddd(gettype($social));
//        return redirect()->route('social.login');
//        return view ('loginprovider.index', compact('socialUsers'));

//  This is helpful if we were to use Social Authentication for our WebApp login.
//		return empty($user->email)
//			? $this->sendFailedResponse("No email id returned from {$driver} provider.")
//			: $this->loginOrCreateAccount($user, $driver);

//        return view ('auth.provider.index', compact('socialUsers'));
//        Session()->flashInput($socialUsers);



        return redirect()->to('/loginprovider')->withInput($social);
	}

	protected function sendFailedResponse($msg = null) {
	// why does this call a route that redirects back to the this controller's "Show" method
    // and not the WebApp Social Login page?
		return redirect()->route('social.login')
		    ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
	}

	private function isProviderAllowed($driver) {
        // SLOPPY - CLEAN UP
	    // This pulls all active Social Providers from the database
        $allproviders = DB::table('providers')
            ->select('provider')
            ->where('active', '=', '1')
            ->get();
        // This adds Active providers to the $providers array
        $providers = [];
        foreach($allproviders as $allprovider)
        {
            array_push($providers, $allprovider->provider);
        }

        // Test to see if the requested Provider ($driver) is
        // in the $provider array AND
        // is setup in config/services.php (API client_id, client_secret, redirect URI)
        $isAllowed = in_array($driver, $providers) && config()->has("services.{$driver}");

		return $isAllowed;
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
