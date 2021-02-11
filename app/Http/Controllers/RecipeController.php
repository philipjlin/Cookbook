<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1);

class RecipeController extends Controller {

    public function __construct() {
    }

    /**
    * Responds to requests to GET /recipes
    *
    * @return recipes index view
    */
    public function getIndex() {

      $entrees = array();
      $mains = array();
      $desserts = array();

      //Query all recipes from recipes table in cookbook database
      $recipe = new \App\Recipe();
      $recipes = $recipe->all();

      //From searching tags, sort entrees/mains/desserts and add them to arrays
      foreach ($recipes as $entry){

        $tags_to_search = $entry->tags;

        if( strpos($tags_to_search,'#entree') !== false )
            array_push($entrees, $entry);
        if( strpos($tags_to_search,'#main') !== false )
            array_push($mains, $entry);
        if( strpos($tags_to_search,'#dessert') !== false )
            array_push($desserts, $entry);
      }

      return view('Recipes.index')->with('entrees', $entrees)
                                      ->with('mains', $mains)
                                      ->with('desserts', $desserts);
    }

    /**
    * Responds to requests to GET /recipes/search
    *
    * @return search recipes view (without results)
    */
    public function getSearch(){

      return view('Recipes.search');
    }

    /**
    * Responds to requests to POST /recipes/search
    *
    * Searches the recipes database for a recipe based on user input
    * @return search recipes page with results
    */
    public function postSearch(Request $request){

      $results = array();

      //Validate search input
      $this->validate($request, ['input' => 'required|max:255']);

      //Define search terms, and add search filters to search terms
      $search_terms = $request->input('input');
      $search_terms_array = array_map('strtolower', explode(" ", $search_terms));

      if( !(empty($request['prep_time'])) )
        $max_prep_time = $request->input('prep_time');
      else
        $max_prep_time = PHP_INT_MAX;

      if( !(empty($request['cook_time'])) )
        $max_cook_time = $request->input('cook_time');
      else
        $max_cook_time = PHP_INT_MAX;

      //Narrow down search to include only certain courses
      if( isset($request['course']) ){

        if( $request['course'] == 'entree' )
          $course_results = \App\Recipe::where('tags', 'LIKE', '%entree%')->get();

        if( $request['course'] == 'main' )
          $course_results = \App\Recipe::where('tags', 'LIKE', '%main%')->get();

        if( $request['course'] == 'dessert' )
          $course_results = \App\Recipe::where('tags', 'LIKE', '%dessert%')->get();
      }
      else{

        $course_results = \App\Recipe::all();
      }


      //Narrow down the search to include time constraints
      $timeconstraint_results = array();
      foreach( $course_results as $result ){

        if( ($result->prep_time <= $max_prep_time) && ($result->cook_time <= $max_cook_time) ){

          array_push($timeconstraint_results, $result);
        }
      }

      //Narrow down the search to only include search term matches
      $searchterm_results = array();
      foreach( $timeconstraint_results as $result ){

        //Get terms that potentially match search terms
        $title_terms = array_map('strtolower', array_map('trim', explode(" ", $result->title)));
        $tag_terms = array_map('strtolower', array_map('trim', explode("#", $result->tags)));
        $recipe_terms = array_merge($title_terms, $tag_terms);

        if( sizeof(array_intersect($search_terms_array, $recipe_terms)) > 0  ){

          array_push($results, $result);
        }
      }

      return view('Recipes.search')->with('results', $results);

    }

    /**
    * Responds to requests to GET /recipes/create
    *
    * @return create recipe view
    */
    public function getCreate(){

      return view('Recipes.create');
    }

    /**
    * Responds to requests to GET /recipes/create
    *
    * Creates a recipe, adding a new row in the recipe table with user input
    * @return recipe page for created recipe
    */
    public function postCreate(Request $request){

      //Validate create input
      $this->validate($request, ['title' => 'required|max:255']);
      $this->validate($request, ['description' => 'required|max:255']);
      $this->validate($request, ['prep_time' => 'required|max:300']);
      $this->validate($request, ['cook_time' => 'required|max:300']);
      $this->validate($request, ['ingredients' => 'required|max:8000']);
      $this->validate($request, ['instructions' => 'required|max:8000']);
      $this->validate($request, ['tags' => 'required|max:8000']);

      //Create a new recipe and save it to the table in the database
      $recipe = new \App\Recipe();

      $recipe->title = $request->input('title');
      $recipe->description = $request->input('description');
      $recipe->prep_time = $request->input('prep_time');
      $recipe->cook_time = $request->input('cook_time');
      $recipe->ingredients = $request->input('ingredients');
      $recipe->instructions = $request->input('instructions');
      $recipe->tags = $request->input('tags')." #".(string)($request['course']);
      $recipe->user_id = \Auth::user()->pluck('id');
      $recipe->save();

      //Return show recipes view with the name to be put in the url
      return view('Recipes.show')->with('recipe', $recipe);
    }

    /**
    * Responds to requests to GET /recipes/{recipe}
    *
    * Retrieves a recipe from the database
    * @return recipe page view
    */
    public function getRecipe($title){

      $recipe = new \App\Recipe();
      $recipe = \App\Recipe::where('title', '=', $title)->get()->first();

      return view('Recipes.show')->with('recipe', $recipe);
    }

    /**
    * Responds to requests to GET /recipe/{recipe}/edit
    *
    * @return edit recipe view
    */
    public function getEdit($title){

      $recipe = new \App\Recipe();
      $recipe = \App\Recipe::where('title', '=', $title)->get()->first();

      return view('Recipes.edit')->with('recipe', $recipe);
    }

    /**
    * Responds to requests to POST /recipe/{recipe}/edit
    *
    * Edits a recipe in the database, using the PUT method
    * @return recipe page for edited recipe
    */
    public function postEdit(Request $request, $title){

      //Get the recipe to update or delete
      $recipe = \App\Recipe::where('title', '=', $title)->get()->first();

      //Depending on which button was pressed, edit or delete recipe in table
      if( isset($_POST['edit']) ){

        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->prep_time = $request->input('prep_time');
        $recipe->cook_time = $request->input('cook_time');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->instructions = $request->input('instructions');
        $recipe->tags = $request->input('tags')." #".(string)($request['course']);
        $recipe->user_id = \Auth::user()->pluck('id');
        
        $recipe->save();

        //Return show recipes view with the name to be put in the url
        return view('Recipes.show')->with('recipe', $recipe);
      }
      else if( isset($_POST['delete']) ){

        $recipe->delete();
        return view('Recipes.index');
      }

    }

}
