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
     * Accessor Method for "studly" cased name.
     *
     * https://laravel.com/docs/7.x/eloquent-mutators#defining-an-accessor
     * Use: getFooAttribute will allow you to access Foo via auth()->user()->foo
     */
    public function getAvatarAttribute()
    {
        return $this->attributes['avatar'];
    }
}
