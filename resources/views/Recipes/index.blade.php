@extends('layouts.master')

@section('title')
    Cookbook | Recipes
@stop


@section('head')
    <link href="/css/recipes.css" type='text/css' rel='stylesheet'>
@stop


@section('header')
  <!-- Page Title Section -->
  <div id = "pagetitle">
    <h1> Recipes </h1>
  </div>
@stop


@section('content')
  <!-- Menu Section -->
  <div id = "menu">
    <ul>
      <li> <a href="/" class=button> Home</a> </li>
      <li> <a href="/recipes/search" class=button> Search</a> </li>
      <li> <a href="/recipes/create" class=button> Create</a> </li>
    </ul>
  </div>

  <!-- Recipes Section -->
  <div id = "entrees">
    <h3> Entrees </h3>
    @if(isset($entrees))
        @foreach($entrees as $recipe)
          <a href="/recipes/<?php echo($recipe->title)?>" class=button> {{ $recipe->title }}</a><br>
        @endforeach
    @else
      echo 'No recipes found';
    @endif
    <br>
  </div>


  <div id = "mains">
    <h3> Mains </h3>
    @if(isset($mains))
        @foreach($mains as $recipe)
          <a href="/recipes/<?php echo($recipe->title)?>" class=button> {{ $recipe->title }}</a><br>
        @endforeach
    @else
      echo 'No recipes found';
    @endif
    <br>
  </div>

  <div id = "desserts">
    <h3> Desserts </h3>
    @if(isset($desserts))
        @foreach($desserts as $recipe)
          <a href="/recipes/<?php echo($recipe->title)?>" class=button> {{ $recipe->title }}</a><br>
        @endforeach
    @else
      echo 'No recipes found';
    @endif
    <br>
  </div>
@stop
