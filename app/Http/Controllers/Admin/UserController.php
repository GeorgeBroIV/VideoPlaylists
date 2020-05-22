<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Framework Author
 * Laravel
 * https://laravel.com/
 *
 * Customized Code Author
 * George T. Brotherston IV
 * StackOverflow: https://stackoverflow.com/users/13029167/george-brotherston
 * Github: https://github.com/GeorgeBroIV
 *
 * This controller handles routed HTTP requests for the 'users' models, and returns
 * associated views based on the application logic contained herein (MVC paradigm).
 **/

class UserController extends Controller
{
    /**
     * Controller Constructor
     *   - applies middleware
     */
    public function __construct() {
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of User information.
     *
     * Note: the RESTFUL controller methods 'Show', 'Create' and 'Store' are not needed
     *   since these are handled by Laravel's 'authentication' which has been scaffolded
     *
     * Programmatic type-hinting information
     * @return View
     */
    public function index()
    {
        /* Data to populate User Role view 'rendered table' column header values */
        // Query the database to obtain Role names
//        $roles = DB::table('roles')
//            ->select('name', 'active')
//            ->orderBy('order')
//            ->get();

        /* Data to populate User information */
        // Query the database to obtain User and Role information into $users collection
//        $users=User::with('roles')->get();
$users=User::all();

        /* Data to populate User Role information */
        // Create $userRoles array from $users collection
//        $userRoles = $users->toArray();
        // Iterate through $userRoles 1st dimension (top level) array elements
        //  - top level array = 1st level (main) array (all users) - each element is a user
//       for($i = 0; $i < count($userRoles); $i++)
//        {
            // Iterate through $userRoles 2nd dimension (2nd level) subarray elements
            //  - top level subarrays = 2nd level arrays (each user) - each element are the fields associated with each user
//            for($j = 0; $j < count($userRoles[$i]['roles']); $j++)
//            {
//                // Create 2nd level array key for each user role identified in 3rd level array 'roles'
//                $key = $j . '.role';
                // Pull 3rd level 'user roles' and add to 2nd level array elements with new key for each 3rd level role name
//                $userRoles[$i][$key] = Arr::pull($userRoles[$i]['roles'][$j], 'name');
//            }
            // Remove 'roles' (3rd level) arrays from each 'user' (2nd level) arrays
//            unset($userRoles[$i]['roles']);
            // Now we have flattened 2nd level array (representing each user) for easy parsing in view
//        }

        // Return view with array information
//	    return view ('Admin.user.index', compact( 'roles', 'users', 'userRoles'));
//        return view ('Admin.user.index', compact('users'));
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit()
    {
        /* Data to populate User Role view 'rendered table' column header values */
        // Query the database to obtain Role names
        $roles = DB::table('roles')
            ->select('name', 'active')
            ->orderBy('order')
            ->get();

        /* Data to populate User information */
        // Query the database to obtain User and Role information into $users collection
        $users=User::with('roles')
            ->where('users.id',"=", Auth::id())
            ->get();

        /* Data to populate User Role information */
        // Create $userRoles array from $users collection
        $userRoles = $users->toArray();
        // Iterate through $userRoles 1st dimension (top level) array elements
        //  - top level array = 1st level (main) array (all users) - each element is a user
        for($i = 0; $i < count($userRoles); $i++)
        {
            // Iterate through $userRoles 2nd dimension (2nd level) subarray elements
            //  - top level subarrays = 2nd level arrays (each user) - each element are the fields associated with each user
            for($j = 0; $j < count($userRoles[$i]['roles']); $j++)
            {
                // Create 2nd level array key for each user role identified in 3rd level array 'roles'
                $key = $j . '.role';
                // Pull 3rd level 'user roles' and add to 2nd level array elements with new key for each 3rd level role name
                $userRoles[$i][$key] = Arr::pull($userRoles[$i]['roles'][$j], 'name');
            }
            // Remove 'roles' (3rd level) arrays from each 'user' (2nd level) arrays
            unset($userRoles[$i]['roles']);
            // Now we have flattened 2nd level array (representing each user) for easy parsing in view
        }

        // Return view with array information
        return view ('user.edit', compact( 'roles', 'users', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
