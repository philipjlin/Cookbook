<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/debug', function(){

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database cookbook');
        DB::statement('CREATE database cookbook');

        return 'Dropped cookbook; created cookbook.';
    });
};

Route::get('/confirm-login-worked', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }
    return;
});

Route::get('/', 'HomeController@getIndex');
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('/about', 'AboutController@getIndex');

Route::group(['middleware' => 'auth'], function () {

  Route::get('/logout', 'Auth\AuthController@getLogout');

  Route::get('/blog', 'BlogController@getIndex');

  Route::get('/recipes', 'RecipeController@getIndex');

  Route::get('/recipes/search', 'RecipeController@getSearch');
  Route::post('/recipes/search', 'RecipeController@postSearch');

  Route::get('/recipes/create', 'RecipeController@getCreate');
  Route::post('/recipes/create', 'RecipeController@postCreate');

  Route::get('/recipes/{title}', 'RecipeController@getRecipe');
  Route::get('/recipes/{title}/edit', 'RecipeController@getEdit');
  Route::post('/recipes/{title}/edit', 'RecipeController@postEdit');

  Route::get('/{user}', 'UserController@getUser');
  Route::get('/{user}/edit', 'UserController@getEdit');
  Route::post('/{user}/edit', 'UserController@postEdit');

});
