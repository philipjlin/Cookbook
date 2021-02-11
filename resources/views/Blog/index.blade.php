@extends('layouts.master')

@section('title')
    Cookbook | Blog
@stop


@section('head')
    <link href="/css/blog.css" type='text/css' rel='stylesheet'>
@stop


@section('header')
  <!-- Page Title Section -->
  <div id = "pagetitle">
    <h1> Cookbook | Blog </h1>
  </div>
@stop


@section('content')
  <!-- Menu Section -->
  <div id = "menu">
    <ul>
        <li> <a href="/" class=button> Home</a> </li>
        <li> <a href="/about" class=button> About</a> </li>
        <li> <a href="/recipes" class=button> Recipes</a> </li>
    </ul>
  </div>

  <div id = "blog">
    <br>
    @if(isset($recipes))
      <ul>
        @foreach($recipes as $recipe)
          {{ $recipe->title }}<br>
          {{ $recipe->description }}<br>
          Ingredients: {{ $recipe->ingredients}}<br>
          Prep Time: {{ $recipe->prep_time }}<br>
          Cook Time: {{ $recipe->cook_time }}<br>
          {{ $recipe->instructions }}<br>
          <hr>
          <br>
        @endforeach
      </ul>
    @else
      echo 'No recipes found';
    @endif
  </div>

@stop
