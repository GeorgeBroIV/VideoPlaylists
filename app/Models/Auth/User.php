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
    /**
     * Custom User Methods
     *
     * https://stackoverflow.com/questions/32437384/laravel-custom-user-specific-functions
     * Use: $var = Auth()->user()->role();
     * Use: Custom blade directives
     */
    public function isVisible()
    {
        return $this->attributes['visible'];
    }

    /**
     * Custom User Methods
     *
     * https://stackoverflow.com/questions/32437384/laravel-custom-user-specific-functions
     * Use: $var = Auth()->user()->visible();
     * Use: Custom blade directives
     */
    public function hasRole($role)
    {
        return $this->role == $role;
    }
}
