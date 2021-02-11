<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1);

class HomeController extends Controller {

    public function __construct() {
    }

    /**
    * Responds to requests to GET /
    *
    * @return home page index view with user logged in
    */
    public function getIndex() {

      $user = \Auth::user();

      return view('Home.index')->with('user', $user);
    }

}
