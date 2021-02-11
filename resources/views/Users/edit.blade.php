@extends('layouts.master')

@section('title')
    Cookbook | Edit User
@stop


@section('head')
    <link href="/css/edit.css" type='text/css' rel='stylesheet'>
@stop


@section('header')
  <!-- Page Title Section -->
  <div id = "pagetitle">
    <h1> Edit User </h1>
  </div>
@stop


@section('content')
<!-- Input Section -->
<div id = "input">

  <h3> Edit this user by filling in new values for the fields here: </h3>

  <form method='POST' action='/{{ $user->user_name }}/edit'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'>

    <label for="first_name"> First Name </label>
    <input type="text" id="first_name" name='first_name' value='{{ $user->first_name }}'/><br>
    <label for="lastname"> Last Name </label>
    <input type="text" id="last_name" name='last_name' value='{{ $user->last_name }}'/><br>
    <label for="email"> Email </label>
    <input type="text" id="email" name='email' value='{{ $user->email }}'/><br>
    <label for="user_name"> User Name </label>
    <input type="text" id="user_name" name='user_name' value='{{ $user->user_name }}'/><br>
    <label for="password"> Password </label>
    <input type="password" id="password" name='password' value='{{ $user->password }}'/><br>
    <label for="password_confirmation"> Confirm New Password </label>
    <input type="password" id="password_confirmation" name='password_confirmation' /><br>
    <label for="city"> City </label>
    <input type="text" id="city" name='city' value='{{ $user->city }}' /><br>
    <label for="country"> Country </label>
    <input type="text" id="country" name='country' value='{{ $user->country }}' /><br>
    <br>
    <input type='submit' class="submit_button" name='edit' value='Edit User'/>
    <input type='submit' class="submit_button" name='delete' value='Delete User'/>
  </form>

</div>
@stop
