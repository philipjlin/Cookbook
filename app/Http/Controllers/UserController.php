<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1);

class UserController extends Controller {

    public function __construct(){
    }

    /**
    * Responds to requests to GET /{user}
    *
    * Retrieves a user from the database
    * @return show user view
    */
    public function getUser($user_name) {

      $user = new \App\User();
      $user = \App\User::where('user_name', '=', $user_name)->get()->first();

      return view('Users.show')->with('user', $user);
    }

    /**
    * Responds to requests to GET /{user}/edit
    *
    * @return edit user view
    */
    public function getEdit($user_name) {

      $user = new \App\User();
      $user = \App\User::where('user_name', '=', $user_name)->get()->first();

      return view('Users.edit')->with('user', $user);
    }

    /**
    * Responds to requests to POST /{user}/edit
    *
    * Edits an exiting user, updating the row of the users table with input
    * @return show user view
    */
    public function postEdit(Request $request, $user_name) {

      //Get the user to update or delete
      $user = \App\User::where('user_name', '=', $user_name)->get()->first();

      //Depending on which button was pressed, edit or delete recipe in table
      if( isset($_POST['edit']) ){

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->user_name = $request->input('user_name');
        $user->password = $request->input('password');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->save();

        //Return show recipes view with the name to be put in the url
        return view('Users.show')->with('user', $user);
      }
      else if( isset($_POST['delete']) ){

        $recipe->delete();
        return view('Home.index');
      }
    }

}
