<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1);

class AboutController extends Controller {

    public function __construct() {
    }

    /**
    * Responds to requests to GET /about
    *
    * @return about index view
    */
    public function getIndex() {

      return view('About.index');
    }

}
