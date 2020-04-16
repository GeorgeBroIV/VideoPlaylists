<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleUser extends Model
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
    /**
     * @var array|\ArrayAccess|mixed
     */
        private $vpEmail;
        private $token;
        private $refreshToken;
        private $expiresIn;
        private $googleId;
        private $nickname;
        private $name;
        private $email;
        private $avatar;
        private $userSub;
        private $userName;
        private $userGiven_name;
        private $userFamily_name;
        private $userPicture;
        private $userEmail;
        private $userEmail_verified;
        private $userLocale;
        private $userId;
        private $userVerified_email;
        private $userLink;
        private $avatar_original;
}
