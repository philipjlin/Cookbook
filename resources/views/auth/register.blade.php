@extends('layouts.master')

@section('title')
    Cookbook | Register
@stop

@section('head')
    <link href="/css/create.css" type='text/css' rel='stylesheet'>
@stop

@section('header')
  <!-- Page Title Section -->
  <div id = "pagetitle">
    <h1> Cookbook | Register </h1>
  </div>
@stop

@section('content')

  <div id = "input">
    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/register'>
      <input type='hidden' name='_token' value='{{ csrf_token() }}'>

      <label for="first_name"> First Name </label>
      <input type="text" id="first_name" name='first_name' /><br>
      <label for="last_name"> Last Name </label>
      <input type="text" id="last_name" name='last_name' /><br>
      <label for="email"> Email </label>
      <input type="text" id="email" name='email' /><br>
      <label for="user_name"> User Name </label>
      <input type="text" id="user_name" name='user_name' /><br>
      <label for="password"> Password </label>
      <input type="password" id="password" name='password' /><br>
      <label for="password_confirmation"> Confirm Password </label>
      <input type="password" id="password_confirmation" name='password_confirmation' /><br>
      <label for="city"> City </label>
      <input type="text" id="city" name='city' /><br>
      <label for="country"> Country </label>
      <input type="text" id="country" name='country' /><br>
      <br>
      <input type='submit' class="submit_button" value='Create User'/>
    </form>

  </div>

@stop
