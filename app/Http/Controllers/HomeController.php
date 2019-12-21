<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); 
        //flow of authentication: login page -> auth middleware -> protected pages like change password, edit payment details pages.
        //a user must pass through the middleware to get to the protected pages.
        //In Laravel, you can protect a route using a middleware. 
        //Middleware do the appropriate rerouting based on the presence of an active login (to edit_payment_details page) or not(to you_must_login page).
        //Laravel has this builtin 'auth' middleware.
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Session::flash('message', 'Welcome '. Auth::user()->name.'!');
        Session::flash('alert-class', 'alert-warning');

        return view('welcome'); //was 'home'
    }
}
