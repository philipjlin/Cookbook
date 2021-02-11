@extends('layouts.master')

@section('title')
    Cookbook | Home
@stop


@section('head')
    <link href="/css/home.css" type='text/css' rel='stylesheet'>
@stop


@section('header')
  <!-- Page Title Section -->
  <div id = "container">
    <div id = "pagetitle">
      <h1> Cookbook </h1>
    </div>

    @if(isset($user))
    <div id = "profile">

      <div style="clear:both">
        <h3 style="float:left"> Welcome, <?php echo($user->first_name) ?>! &#160;&#160;&#160;&#160;&#160; </h3>

        <h5 style="float:right">
          <a href="<?php echo($user->user_name) ?>" class=button> Profile</a>
          <a href="/logout" class=button> Logout</a>
        </h5>
      </div>
    </div>
    @else
      <h5 style="float:right">
        <a href="/login" class=button> Login Here</a>
      </h5>
    @endif
</div>
@stop


@section('content')
  <!-- Menu Section -->
  <div id = "menu">
    <ul>
      <li> <a href="/about" class=button> About</a> </li>
      <li> <a href="/blog" class=button> Blog</a> </li>
      <li> <a href="/recipes" class=button> Recipes</a> </li>
    </ul>
  </div>

  <!-- Gallery Section -->
  <div id = "gallery">
    <div id = "galleryrow1">
      <ul>
        <li> <img src = "images/ramenburger.jpg" title = "Food." alt="Home." class="align-center medium"/> </li>
        <li> <img src = "images/caramelapple.jpg" title = "Food." alt="Home." class="align-center medium"/> </li>
        <li> <img src = "images/surfandturf.jpg" title = "Food." alt="Home." class="align-center medium"/> </li>
        <li> <img src = "images/matchafondant.jpg" title = "Food." alt="Home." class="align-center medium"/> </li>
      </ul>
    </div>
    <div id = "galleryrow2">
      <ul>
        <li> <img src = "images/profiteroles.jpg" title = "Food." alt="Home." class="align-center medium"/> </li>
        <li> <img src = "images/lobstertail.jpg" title = "Food." alt="Home." class="align-center medium"/> </li>
        <li> <img src = "images/chickenroulade.jpg" title = "Food." alt="Home." class="align-center medium"/> </li>
        <li> <img src = "images/sesametuna.jpg" title = "Food." alt="Home." class="align-center medium"/> </li>
      </ul>
    </div>
  </div>
@stop
