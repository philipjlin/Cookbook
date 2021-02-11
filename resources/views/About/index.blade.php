@extends('layouts.master')

@section('title')
    Cookbook | About
@stop


@section('head')
    <link href="/css/about.css" type='text/css' rel='stylesheet'>
@stop


@section('header')
  <!-- Page Title Section -->
  <div id = "pagetitle">
    <h1> Cookbook | About </h1>
  </div>
@stop


@section('content')
  <!-- Menu Section -->
  <div id = "menu">
    <ul>
        <li> <a href="/" class=button> Home</a> </li>
        <li> <a href="/recipes" class=button> Recipes</a> </li>
        <li> <a href="/blog" class=button> Blog</a> </li>
    </ul>
  </div>

  <!-- Description Section -->
  <div id = "description">
    <h5>
      Cookbook is a web application for home cooks and professional chefs alike.
      Create an account, upload your own recipes to your the cookbook,
      and search for recipes from other users to inspire you!

      Take your first or five hundreth step towards becoming a better cook today.
      <br><br>
      <a href="/register" class=button> Sign up here!</a>
    </h5>
  </div>

  <div id = "picture">
    <img src = "images/waffle.jpg" title = "Food." class="align-center medium"/>
  </div>

@stop
