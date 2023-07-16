@extends('layout.guest')
@section('content')
<div class="container-holder">
    <div class="content-50">
        <h1>Welcome back!</h1>
        <h2>Student Counseling Services of TAR UMT Penang Branch</h2>
        <form method="post" action="{{ route('loginPost'); }}" id="login-form" name="login-form">
            @csrf
            <input type="email" name="email" placeholder="Student's Email*" id="email" />
            <input type="password" name="password" placeholder="Password*" id="password" />
            <input type="submit" value="Login Now" />
        </form>
        <p><a href="{{ route('register') }}">Not registered yet? Create an account now.</a></p>
    </div>
</div>
@endsection