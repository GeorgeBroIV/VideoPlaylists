<?php

namespace App\Http\Controllers\Auth;

// TODO Compact these class dependency injections once this Controller is refactored to be RESTFUL

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Request;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\User;
use App\Providers;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginProviderController extends Controller
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
        return view('loginprovider.index', compact('providers', 'users'));
	}

// TODO Parse out the following logic to applicable areas to refactor this Controller to be RESTFUL

	public function show(Request $request) {

        $keys = array_keys($_POST);
//        ddd(array_keys($_POST));
        $driver = $keys[1];

	    if (!$this->isProviderAllowed($driver)) {
			return $this->sendFailedResponse("{$driver} is not currently supported");
		}

		try {
			return Socialite::driver($driver)->redirect();
		} catch (Exception $e) {
			// You should show something simple fail message
			return $this->sendFailedResponse($e->getMessage());
		}
	}

	public function handleProviderCallback($driver) {
		try {
			$user = Socialite::driver($driver)->user();
		} catch (Exception $e) {
			return $this->sendFailedResponse($e->getMessage());
		}
		// check for email in returned user
		return empty($user->email)
			? $this->sendFailedResponse("No email id returned from {$driver} provider.")
			: $this->loginOrCreateAccount($user, $driver);
	}

	protected function sendSuccessResponse()
	{
		return redirect()->intended('home');
	}

	protected function sendFailedResponse($msg = null) {
		return redirect()->route('social.login')
		    ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
	}

	private function isProviderAllowed($driver) {
        $allproviders = DB::table('providers')
            ->select('provider')
            ->where('active', '=', '1')
            ->get();
        $providers = [];
        foreach($allproviders as $allprovider)
        {
            array_push($providers, $allprovider->provider);
        }
		return in_array($driver, $providers) && config()->has("services.{$driver}");
	}

	protected function loginOrCreateAccount($providerUser, $driver) {
		// check for already has account
		$user = User::where('email', $providerUser->getEmail())->first();

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
			if ($providerUser->getEmail()) { //Check email exists or not. If exists create a new user
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
}
