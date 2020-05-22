<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\Auth\User;
use App\Traits\InputValidateTrait;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use RegistersUsers, InputValidateTrait;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code, however
    | we wish to use our own form input validation (IAW DRY coding paradigm)
    | and also log in the registered user *before* firing the 'Registered'
    | event (we have a listener that checks/sets the user role)
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Registers a new user via 'Registration' view.  By adding this
     * method, it overrides the same method from 'RegistersUsers' trait.
     *
     * @param  UserRegisterRequest  $request
     * @return RedirectResponse
     */
    public function register(UserRegisterRequest $request)
    {
        // Creates a new user
        $user = $this->create($request->all());
        // Logs the user in (therefore discoverable via 'Auth()->user()')
        $this->guard()->login($user);
        // Fires a listenable event
        event(new Registered($user));
        // Sends an e-mail verification to the user
        $user->sendEmailVerificationNotification();
        // Redirects the user to path identified in this class's property
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'displayname' => $data['displayname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
