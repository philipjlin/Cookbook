@extends('layouts.master')

@section('title')
    Cookbook | Edit Recipe
@stop


@section('head')
    <link href="/css/edit.css" type='text/css' rel='stylesheet'>
@stop


@section('header')
  <!-- Page Title Section -->
  <div id = "pagetitle">
    <h1> Edit Recipe </h1>
  </div>
@stop


@section('content')
<!-- Input Section -->
<div id = "input">

  <h3> Edit this recipe by filling in new values for the fields here: </h3>

  <form method='POST' action='/recipes/{{ $recipe->title }}/edit'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'>

    <label for="title"> Recipe Title </label>
    <input type="text" id="title" name='title' value='{{ $recipe->title }}' /><br>
    <label for="title"> Recipe Description </label>
    <input type="text" id="title" name='title' class="mediuminput" value='{{ $recipe->description }}' /><br>
    <label for="prep_time"> Prep Time </label>
    <input type="number" id="prep_time" name='prep_time' value='{{ $recipe->prep_time }}'/><br>
    <label for="cook_time"> Cook Time </label>
    <input type="number" id="cook" name='cook_time' value='{{ $recipe->cook_time }}'/><br>
    <label for="user"> Ingredients </label>
    <textarea id="ingredients" name='ingredients'> {{ $recipe->ingredients }} </textarea><br>
    <label for="instructions"> Instructions </label>
        <textarea id="instructions" name='instructions'> {{ $recipe->instructions }} </textarea><br>
    <label for="tags"> Tags </label>
    <input type="text" id="tags" name='tags' class="mediuminput" value='{{ $recipe->tags }}'/><br>
    <label for="course"> Course </label>
    <select name="course">
      <option value="entree"> Entree </option>
      <option value="main"> Main </option>
      <option value="dessert"> Dessert </option>
    </select>
    <br>
    <input type='submit' class="submit_button" name="edit" value='Edit Recipe'/>
    <input type='submit' class="submit_button" name="delete" value='Delete Recipe'/>
  </form>

</div>
@stop
