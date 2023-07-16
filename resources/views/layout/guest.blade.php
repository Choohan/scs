

<!DOCTYPE html>
<html>
    <head>
        <title>Student Counseling Services - TAR UMT Penang Branch</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/cfg.css') }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
        <div class="full-width-container">
            @yield('content')
        </div>
    </body>
</html>
@include('sweetalert::alert')