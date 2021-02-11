@extends('layouts.master')

@section('title')
    Cookbook | Search
@stop

@section('head')
    <link href="/css/search.css" type='text/css' rel='stylesheet'>
@stop

@section('header')
    <!-- Page Title Section -->
    <div id = "pagetitle">
      <h1> Cookbook | Search </h1>
    </div>
@stop

@section('content')

  <!-- Menu Section -->
  <div id = "menu">
    <ul>
        <li> <a href="/" class=button> Home</a> </li>
        <li> <a href="/recipes" class=button> Recipes</a> </li>
    </ul>
  </div>

    <!-- Results Section -->
    <div id = "results">
      <br><hr>
      @if(isset($results))
        @foreach($results as $result)
          <a href="/recipes/<?php echo($result->title)?>" class=button> {{ $result->title }}</a><br>
        @endforeach
      @endif
    </div>

    <!-- Search Section -->
    <div id = "search">

      @if(count($errors) > 0)
          <ul class='errors'>
              @foreach ($errors->all() as $error)
                  <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
              @endforeach
          </ul>
      @endif

      <form method='POST' action='/recipes/search'>
        <input type='hidden' name='_token' value='{{ csrf_token() }}'>

        <!-- Search box -->
        <input type="text" id="input" name='input' class="mediuminput" /><br>

        <input type='submit' class="submit_button" value='Search'/>

        <!-- Optional Filters -->
        <br><br>
        <h5> Optional Search Filters: </h5>
        <label for="course"> Course </label>
        <select name="course">
          <option disabled selected> -- Select Course -- </option>
          <option value="entree"> Entree </option>
          <option value="main"> Main </option>
          <option value="dessert"> Dessert </option>
        </select><br><br>

        <label for="prep_time"> Max Prep Time </label>
        <input type='number' id="prep_time" name="prep_time" />
        <label for="cook"> Max Cook Time </label>
        <input type='number' id="cook_time" name="cook_time" />

      </form>

    </div>

@stop
