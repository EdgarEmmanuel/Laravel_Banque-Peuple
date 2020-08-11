<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANQUE PEUPLE</title>
     <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }} " type="image/x-icon"/>
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>

    <!-- link for stylesheet -->
    @yield('css')
</head>
<body> 

    @include("layout.message")

    {{-- for the content of all page  --}}
    @yield('content')


    {{-- for the js of all page  --}}
    @yield('js')
</body>
</html>