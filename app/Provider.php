<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Provider extends Model
{
	use Notifiable;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'provider',
		'providerfriendly',
		'scopes',
		'active',
	];
	protected $guarded = ['*'];
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];
	
	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	
	protected $casts = [
		'email_verified_at' => 'datetime',
	];
	
	/**
	 * Check to see if the user is logged into any Providers (Google, Twitter, etc).
	 *
	 * @var array
	 */
	public function providers()
	{
		return $this->belongsToMany('');
	}
	public function hasanyprovider($providers)
	{
		if (is_array($providers))
		{
			//
		}
	}
}
