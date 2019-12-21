<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{
    //I added this
    public function update(Request $request)
    {
        //$request->user();

        //print_r($request->input()); //this worked

        // User::where('id', 13)
        //         ->update(['suburb'=> $request->suburb]);
        //hard coded way. this worked.

        $user = new User;
        $user = User::find(Auth::user()->id); //finding user object using user id.

        $user->name = $request->name;//overwrite user object's original values with form values
        $user->street_address = $request->street_address;
        $user->suburb = $request->suburb;
        $user->postcode = $request->postcode;
        $user->state = $request->state;
        $user->phone = $request->phone;
        $status = $user->save(); //then save
        
        //dd($status);
        
        if ($status) {
            Auth::setUser($user); //if update success, overwrite existing user with updated one instead of refetching from the db.

            Session::flash('message', 'Yours details have been updated!');
            Session::flash('alert-class', 'alert-success');
        }
        else {
            Session::flash('message', 'Details not updated!');
            Session::flash('alert-class', 'alert-danger');
        }

        //return view('auth.account');
        return view('welcome');

    }

}
