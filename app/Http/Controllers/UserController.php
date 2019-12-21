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
        $user->save(); //then save

        //Auth::user(); //for refetching updated user from the db.
        $user->refresh();

        Session::flash('message', 'Yours details updated!');
        Session::flash('alert-class', 'alert-success');

        return view('auth.account');

    }

}
