@if(session('success'))
    <h1 style="color:white;font-size:50px;">{{ session('success') }} </h1>
@endif


@if(session('error'))
    <h1 style="color:white;font-size:50px;"> {{session('error')}} </h1>
@endif