@extends('layouts.master')

@section('title')
    Cookbook | Login
@stop


@section('head')
    <link href="/css/login.css" type='text/css' rel='stylesheet'>
@stop


@section('header')
  <!-- Page Title Section -->
  <div class = "container">

    <div id = "pagetitle">
      <h1> Cookbook </h1>
    </div>

    <div id = "login">

      @if(count($errors) > 0)
        <ul class='errors'>
          @foreach ($errors->all() as $error)
          <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
          @endforeach
        </ul>
      @endif

      <form method='POST' action='/login'>
        <input type='hidden' name='_token' value='{{ csrf_token() }}'>

        <div class='form-group row'>
          <label for="user_name"> User </label>
          <input type='text' id="user_name" name="user_name" value='{{ old('user_name') }}'/>
          <label for="user_name"> Password </label>
          <input type='password' id="password" name="password" value='{{ old('password') }}'/>
          <input type='submit' class='submit_button' name="submit" value='Login'/>
        </div>

        <div class='form-group'>
          <input type='checkbox' name='remember' id='remember'>
          <label for='remember' class='checkboxLabel'>Remember me</label>
        </div>

      </form>
      <br>
      New User? <a href="/register"> Create Profile Here</a>
    </div>

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
        <li> <img src = "images/cheesecake.jpg" title = "Food." alt="Login." class="align-center medium"/> </li>
        <li> <img src = "images/friedcalamari.jpg" title = "Food." alt="Login." class="align-center medium"/> </li>
        <li> <img src = "images/pastrycreambaskets.jpg" title = "Food." alt="Login." class="align-center medium"/> </li>
        <li> <img src = "images/steakslices.jpg" title = "Food." alt="Login." class="align-center medium"/> </li>
      </ul>
    </div>
    <div id = "galleryrow2">
      <ul>
        <li> <img src = "images/steakmushrooms.jpg" title = "Food." alt="Login." class="align-center medium"/> </li>
        <li> <img src = "images/stickypudding.jpg" title = "Food." alt="Login." class="align-center medium"/> </li>
        <li> <img src = "images/taco.jpg" title = "Food." alt="Login." class="align-center medium"/> </li>
        <li> <img src = "images/cremebrulee.jpg" title = "Food." alt="Login." class="align-center medium"/> </li>
      </ul>
    </div>
  </div>
@stop
