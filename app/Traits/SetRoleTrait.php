<?php

namespace App\Traits;

trait SetRoleTrait
{
    /**
     * Code Authord
     * George T. Brotherston IV
     * StackOverflow: https://stackoverflow.com/users/13029167/george-brotherston
     * Github: https://github.com/GeorgeBroIV
     *
     * This trait is intended to be the single location (DRY code paradigm) where all input element values
     * can undergo data validation (with custom messages for each rule) and sanitized.  Ideally this would
     * be called from a 'Form Request' class which defines which input elements are to be validated for any
     * given controller method.
     */
    public function SetRoleIfUnset($user)
    {
        /* Initial setting for User Role (triggered only when user first registers, or when verified via e-mail
         * Called from app\Listeners\LogRegisteredUser.php -> handle($event)
         * Called from app\Listeners\LogVerifiedUser.php -> handle($event)
         */
        // This sets the user's initial roles when registering / verifying e-mail
        if(!isset($user->role) || $user->role == "") {
            // If the user's role is not set (or blank)
            if(!isset($user->email_verified_at) || $user->email_verified_at == "") {
                // and the user has not verified via e-mail, set the role to 'Registered'
                $user->role = "Registered";
            } else {
                // and the user has verified via e-mail, set the role to 'Verified'
                $user->role = "Verified";
            }
        } elseif($user->role == "Registered") {
            // if the user's role is 'Registered'
            if(isset($user->email_verified_at) && $user->email_verified_at != "") {
                // and the user has verified via e-mail, set the role to 'Verified'
                $user->role = "Verified";
            }
        } else {
            // There's an error, we can capture later TODO Error Handling
            // return without updating the user role
            return;
        }
        // Save the update to the database table then return
        $user->save();
        return;
    }
}
