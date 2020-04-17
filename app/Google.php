<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Google extends Model
{
    protected $fillable = [
        'vpEmail',
        'token',
        'refreshToken',
        'expiresIn',
        'googleId',
        'nickname',
        'name',
        'email',
        'avatar',
        'userSub',
        'userName',
        'userGiven_name',
        'userFamily_name',
        'userPicture',
        'userEmail',
        'userEmail_verified',
        'userLocale',
        'userId',
        'userVerified_email',
        'userLink',
        'avatar_original'
    ];
}
