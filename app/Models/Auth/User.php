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

    /* Custom User Properties
     *
     */
    protected $rolesAdmin = ['Admin', 'Reviewer', 'Verified', 'Registered'];
    protected $rolesReviewer = ['Reviewer', 'Verified', 'Registered'];
    protected $rolesVerified = ['Verified', 'Registered'];


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
        if(in_array($this->attributes['role'], $this->rolesVerified)) {
            $verified = true;
        }
        return $verified;
    }

    /**
     * Usage: Auth()->user()->isReviewer() (boolean)
     *
     * @return boolean
     */
    public function isReviewer()
    {
        $reviewer = false;
        if(in_array($this->attributes['role'],$this->rolesReviewer)) {
            $reviewer = true;
        }
        return $reviewer;
    }

    /**
     * Usage: Auth()->user()->isAdmin() (boolean)
     *
     * @return boolean
     */
    public function isAdmin()
    {
        $admin = false;
        if(in_array($this->attributes['role'], $this->rolesAdmin)) {
            $admin = true;
        }
        return $admin;
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
