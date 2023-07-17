

<!DOCTYPE html>
<html>
    <head>
        <title>Student Counseling Services - TAR UMT Penang Branch</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/regular.min.css" integrity="sha512-WidMaWaNmZqjk3gDE6KBFCoDpBz9stTsTZZTeocfq/eDNkLfpakEd7qR0bPejvy/x0iT0dvzIq4IirnBtVer5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.datatables.net/v/dt/dt-1.13.5/r-2.5.0/datatables.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="{{ asset('css/base.css') }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
        <div class="full-width-container">
            <header class="content-container">
                <div class="column-20 logo-holder">
                    <a href="{{ route('sm.list') }}"><img src="{{asset('img/logo.png')}}" class="logo" alt="Student Counseling Services" /></a>
                </div>
                <div class="column-80 top-nav" >
                    <p class="logout"><a href="{{ route('logout') }}">Logout ( {{ Auth::user()->name }} )</a></p>
                </div>
            </header>
            <div class="content-container">
                <nav class="column-20 mobile-hide">
                    <p class="nav-title">SECRET MAILBOX</p>
                    <p class="nav-item active-item"><a href="{{ route('sm.list') }}"><i class="fa-icon fa-solid fa-envelope-open-text"></i>Mails</a></p>
                </nav>
                <div class="column-80 page-content">
                    @yield('content')
                </div>
            </div>
            
            
        </div>
    </body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.5/r-2.5.0/datatables.min.js"></script>
@yield('js')
@include('sweetalert::alert')