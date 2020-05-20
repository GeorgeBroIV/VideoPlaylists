<?php

namespace App\Listeners;

use App\Traits\SetRoleTrait;
use Illuminate\Auth\Events\Registered;

class LogRegisteredUser
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // Event listener for when Laravel registers the user.
        // This calls the 'Set Role if Unset' method
        $user = Auth()->user();
        $this->SetRoleIfUnset($user);
    }
}
