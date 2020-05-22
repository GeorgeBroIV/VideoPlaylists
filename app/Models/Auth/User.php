<?php

namespace App\Models\Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
    // Authenticatable extends model, so no need to extend model and authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	    'username',
        'firstname',
        'lastname',
        'displayname',
	    'email',
        'avatar',
	    'password',
        'visible',
	    'active',
        'notes',
    ];
	protected $guarded = ['*'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /* Custom User Methods
     *  https://stackoverflow.com/questions/32437384/laravel-custom-user-specific-functions
     */

    /**
     * Usage: Auth()->user()->isVisible() (boolean)
     *
     * @return boolean
     */
    public function isVisible()
    {
        $visible = false;
        if($this->attributes['visible'] == 1) {
            $visible = true;
        }
        return $visible;
    }

    /**
     * Usage: Auth()->user()->isVerified() (boolean)
     *
     * @return boolean
     */
    public function isVerified()
    {
        $verified = false;
        if(isset($this->attributes['email_verified_at'])) {
            $verified = true;
        }
        return $verified;
    }

    /**
     * Custom User Methods
     *
     * Use: $var = Auth()->user()->hasRole($role);
     */
    public function hasRole($role)
    {
        return $this->role == $role;
    }
}
