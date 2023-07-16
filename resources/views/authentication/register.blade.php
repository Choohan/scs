@extends('layout.guest')
@section('content')
<div class="container-holder">
    <div class="content-50">
        <h1>Register Now!</h1>
        <h2>Student Counseling Services of TAR UMT Penang Branch</h2>
        <form method="post" action="{{ route('registerPost'); }}" id="login-form" name="login-form">
            @csrf
            <input type="text" name="full-name" id="full-name" placeholder="Full Name*" required />
            <input type="email" name="email" placeholder="Student's Email*" id="email" required />
            <input type="text" name="studentid" id="studentid" placeholder="Student ID*" required />
            <input type="text" name="contact-no" id="contact-no" placeholder="Contact No*" required />
            <input type="password" name="password" placeholder="Password*" id="password" />
            <input type="password" name="cpassword" placeholder="Confirm Password*" id="cpassword" required />
            <input type="submit" value="Register Now" />
        </form>
        <p><a href="{{ route('login') }}">Registered? Login now!</a></p>
    </div>
</div>
@endsection