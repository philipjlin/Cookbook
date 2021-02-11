@extends('layouts.master')

@section('title')
    Cookbook | Recipe
@stop


@section('head')
    <link href="/css/show.css" type='text/css' rel='stylesheet'>
@stop


@section('header')
  <!-- Page Title Section -->
  <div id = "pagetitle">
    <h1> Recipe </h1>
  </div>
@stop


@section('content')
  <!-- Menu Section -->
  <div id = "menu">
    <ul>
        <li> <a href="/" class=button> Home</a> </li>
        <li> <a href="/recipes" class=button> Recipes</a> </li>
        <li> <a href="<?php echo($recipe->title) ?>/edit" class=button> Edit</a> </li>
    </ul>
  </div>

  <div id = "recipe">
    <h3> <?php echo($recipe->title) ?> </h3>
    <img src="/images/recipe.jpg" title = "Cookbook." alt="Recipe." class="align-center medium"/>

    <h5> Prep Time: <?php echo($recipe->prep_time) ?></h5>
    <h5> Cook Time: <?php echo($recipe->cook_time) ?></h5>
    <h5> Description: <?php echo($recipe->description) ?> </h5>
    <h5> Ingredients: <?php echo($recipe->ingredients) ?> </h5>
    <h5> Instructions: <?php echo($recipe->instructions) ?> </h5>
    <h5> Tags: <?php echo($recipe->tags) ?> </h5>
  </div>
@stop
