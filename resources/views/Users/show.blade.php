@extends('layouts.master')

@section('title')
    Cookbook | User
@stop


@section('head')
    <link href="/css/show.css" type='text/css' rel='stylesheet'>
@stop


@section('header')
  <!-- Page Title Section -->
  <div id = "pagetitle">
    <h1> Profile </h1>
  </div>
@stop


@section('content')
  <!-- Menu Section -->
  <div id = "menu">
    <ul>
        <li> <a href="/" class=button> Home</a> </li>
        <li> <a href="/recipes" class=button> Recipes</a> </li>
        <li> <a href="<?php echo($user->user_name) ?>/edit" class=button> Edit</a> </li>
    </ul>
  </div>

  <div id = "user">
    <h3> <?php echo($user->user_name) ?> </h3>
    <img src="/images/blankprofile.jpg" title = "Profile." class="align-center medium"/>

    <h5> First Name: <?php echo($user->first_name) ?></h5>
    <h5> Last Name: <?php echo($user->last_name) ?></h5>
    <h5> Email: <?php echo($user->email) ?> </h5>
    <h5> City: <?php echo($user->city) ?> </h5>
    <h5> Country: <?php echo($user->country) ?> </h5>
  </div>

@stop
