<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;

class AuthUserController extends Controller
{
    public function postSignUp(Request $request)
    {
        // Validate information provided
        $this->validate($request, [
            'email'                 => 'required|unique:users|email|max:50',
            'username'              => 'required|unique:users|max:50',
            'password'              => 'required|min:6',
            'password-confirmation' => 'required|same:password'
        ]);

        User::create([
            'email'    => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password'))
        ]);

        // Provide a sweet alert pop up
        alert()->success('Your account has been created and you can now log in', 'Success');
        return redirect('/');
    }

    public function postSignIn(Request $request)
    {
        // Validate the information given
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required'
        ]);

        if (! Auth::attempt($request->only(['email', 'password']))) {
            /**
             * Provide an alert informing user that his/her credentials don't match
             * the database records
             */
            alert()->error('Could not log you in with those credentials', 'Sorry');
            // If auth has failled redirect back to login
            return redirect('/');
        }
        // If auth is successfull redirect back to the homepage
        return redirect('/');
    }

    public function getLogout()
    {
        // Log out the user
        Auth::logout();
        // Provide a sweet alert telling the user he/she is now logged out
        alert()->success('Your are now logged out', 'Bye');
        // Redirect to login page
        return redirect('/');
    }
}
