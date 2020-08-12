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
    <div class="divLayout">

        @if(session('error'))
            <h1 style="color:white;font-size:50px;margin-top:-5rem;"> {{session('error')}} </h1>
        @endif
        
        
        @if(session('success'))
            <h1 style="color:white;font-size:50px;margin-top:-5rem;">{{ session('success') }} </h1>  
        @endif
        
        </div>

    {{-- for the content of all page  --}}
    @yield('content')



    {{-- the js for the page layout --}}
    <script type="text/javascript" src=" {{URL::asset('js/layout.js')}} "></script>

    {{-- for the js of all page  --}}
    @yield('js')
</body>
</html>