@extends('layouts/app')


@section('css')
  <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" />
@endsection

@section('content')
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first m-5">
      <h3>Login</h3>
    </div>

    <!-- Login Form -->
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Enter your Email">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="Enter your Password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

@endsection