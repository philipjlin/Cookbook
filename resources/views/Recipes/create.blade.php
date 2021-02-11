@extends('layouts.master')

@section('title')
    Cookbook | Create Recipe
@stop


@section('head')
    <link href="/css/create.css" type='text/css' rel='stylesheet'>
@stop


@section('header')
  <!-- Page Title Section -->
  <div id = "pagetitle">
    <h1> Cookbook | Create Recipe </h1>
  </div>
@stop


@section('content')
<!-- Input Section -->
<div id = "input">
  @if(count($errors) > 0)
      <ul class='errors'>
          @foreach ($errors->all() as $error)
              <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
          @endforeach
      </ul>
  @endif

  <h3> Create a new recipe by filling in the fields here: </h3>

  <form method='POST' action='/recipes/create'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'>

    <label for="title"> Recipe Title </label>
    <input type="text" id="title" name='title' /><br>
    <label for="description"> Recipe Description </label>
    <input type="text" id="description" name='description' class="mediuminput" /><br>
    <label for="prep_time"> Prep Time </label>
    <input type="number" id="prep_time" name='prep_time' /><br>
    <label for="cook_time"> Cook Time </label>
    <input type="number" id="cook_time" name='cook_time' /><br>
    <label for="ingredients"> Ingredients </label>
    <textarea id="ingredients" name='ingredients'></textarea><br>
    <label for="instructions"> Instructions </label>
    <textarea id="instructions" name='instructions'></textarea><br>
    <label for="tags"> Tags </label>
    <input type="text" id="tags" name='tags' class="mediuminput" /><br>
    <label for="course"> Course </label>
    <select name="course">
      <option value="entree"> Entree </option>
      <option value="main"> Main </option>
      <option value="dessert"> Dessert </option>
    </select><br>
    <br>
    <input type='submit' class="submit_button" value='Create Recipe'/>
  </form>

</div>
@stop
