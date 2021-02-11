# CookBook


## Repository
<https://github.com/philipjlin/CookBook>


## Description
Web application that serves as a digital recipe library for individuals who love to make food.

The application will store recipes, uploaded by registered users, in a central, shared database. Anyone will be able to access all recipes on the site, and use a search engine to construct queries for specific recipes. Individual recipes with photos can be displayed in their own page with ingredients, instructions, cooking time, and other searchable tags/parameters.

A user can create an account, and upon login will gain functionality to the cookbook feature of the site.

Registered users, when logged in, will be able to add recipes that they like to their own personal cookbook. The cookbook will be able aggregate and present these recipes by parameters such as course, cuisine type, or total cook time.

Registered users will also have a means means to upload recipes into the shared organized database using a template provided by the site.

There will also be a blog component to the site, which allows users a way to display all their recipes in a chronological style.

This project was developed using the Laravel Framework (LAMP stack).


## High Level Components
* Database with information about recipes
* Table of user accounts with login and password info, with supporting operations
* Table of recipes for each user, with supporting operations
* User authentication service
* CRUD operations controller for users
* CRUD operations controller for recipes
* Blog page for users
* Administrator mode, with additional options
* Detailed search bar for recipes in the database based on tags or keywords


## Class Overview
Domain Objects <br>
    - Recipe - represents a recipe with associated information. <br>
    - Tag - individual piece of information about a recipe. <br>
    - User - represents an application user with associated information. <br>

Controllers <br>
    - AboutController - defines about page functions. <br>
    - AuthController - defines account and authentication functions. <br>
    - BlogController - defines blog page functions. <br>
    - HomeController - defines home page functions. <br>
    - RecipesController - defines recipe page functions. <br>
    - UserController - defines user in-app functionality. <br>


## Views
About <br>
    - index <br>

Auth <br>
    - login <br>
    - register <br>

Blog <br>
    - index <br>

Home <br>
    - index <br>

Recipes <br>
    - index <br>
    - search<br>
    - create <br>
    - edit <br>
    - show <br>

Home <br>
    - index <br>

Users <br>
    - edit <br>
    - show <br>



## Route Plan
|   Purpose                 |   Method  |   URI                   |   Corresponding Controller Method |
|   ---                     |   ---     |   ---                   |   ---                             |
|   Home                    |   GET     |   /                     |   HomeController.getIndex         |
|   Login                   |	GET     |	/login                |	  AuthController.getLogin         |
|   Login                   |	POST    |	/login                |	  AuthController.postLogin        |
|   Home/Logout             |	GET     |	/logout               |	  AuthController.getLogout        |
|   User/Create             |	GET     |	/register             |   AuthController.getRegister      |
|   Create User/Create      |	POST	|   /register             |   AuthController.postRegister     |
|   User/Show               |	GET	    |   /{user}               |   UserController.getUser          |
|   User/Edit (or Delete)   |	GET     |	/{user}/edit	      |   UserController.getEdit          |
|   User/Edit (or Delete)   |	POST    |	/{user}/edit	      |   UserController.postEdit         |
|   About                   |	GET     |	/about	              |   AboutController.getIndex        |
|   Recipes Home            |	GET     |   /recipes	          |   RecipeController.getIndex       |
|   Recipes MyRecipes       |	GET     |   /recipes/myrecipes    |	  RecipeController.getMyRecipes   |   
|   Recipes/Search          |	GET     |	/recipes/search       |	  RecipeController.getSearch      |
|   Recipes/Search          |	POST    |   /recipes/search       |	  RecipeController.postSearch     |
|   Recipes/Create          |	GET     |   /recipes/create       |	  RecipeController.getCreate      |
|   Recipes/Create          |	POST    |   /recipes/create       |	  RecipeController.postCreate     |
|   Recipes/Show            |	GET     |   /recipes/{recipe}     |	  RecipeController.getRecipe      |
|   Recipes/Edit(or Delete) |	GET     |   /recipes/{recipe}/edit|   RecipeController.getEdit        |
|   Recipes/Edit(or Delete) |	POST    |   /recipes/{recipe}/edit|	  RecipeController.postEdit       |
|   Blog                    |	GET     |   /blog                 |	  BlogController.getIndex         |



## Database Sketch
Table name: users
Description: Will store individual users with account information
Fields:
●	(int, primary key, auto_increment) id
●	(timestamp) created_at
●	(timestamp) updated_at
●	(varchar) username
●	(varchar) password
●	(varchar) first_name
●	(varchar) last_name
●	(varchar) email
●	(varchar) city
●	(varchar) country


Table name: recipes
Description: Will store individual recipes that are a part of the user's online cookbook
Fields:
●	(int, primary key, auto_increment) id
●	(timestamp) created_at
●	(timestamp) updated_at
●	(text) description
●	(varchar) title
●	(int) prep_time
●	(int) cooking_time
●	(text) procedure
●	(text) tags


Table name: tags
Description: Stores tags used in recipes to be searched
Fields:
●	(int, primary key, auto_increment) id
●	(timestamp) created_at
●	(timestamp) updated_at
●	(text) tag


Table name: recipe_tag
Description: Pivot table between the recipes table and the tags table.
Fields:
●	(int, primary key, auto_increment) id
●	(timestamp) created_at
●	(timestamp) updated_at
●	(int) recipe_id
●	(int) tag_id
