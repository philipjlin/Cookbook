<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1);

class BlogController extends Controller {

    public function __construct() {
    }

    /**
    * Responds to requests to GET /blog
    *
    * @return blog index view
    */
    public function getIndex() {

      //Query all recipes from recipes table in cookbook database
      $recipe = new \App\Recipe();
      $recipes = $recipe->all();

      return view('Blog.index')->with('recipes', $recipes);
    }

}
