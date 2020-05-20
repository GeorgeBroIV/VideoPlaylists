<?php

namespace App\Listeners;

use App\Traits\SetRoleTrait;
use Illuminate\Auth\Events\Verified;

class LogVerifiedUser
{
    use SetRoleTrait;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Verified  $event
     * @return void
     */
    public function handle(Verified $event)
    {
        // Event listener for when Laravel verifies the user (after user
        // responds to verification e-mail).
        // This calls the 'Set Role if Unset' method
        $user = Auth()->user();
        $this->SetRoleIfUnset($user);
    }
}
