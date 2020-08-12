
<div class="divLayout">

@if(session('error'))
    <h1 style="color:white;font-size:50px;margin-top:-5rem;"> {{session('error')}} </h1>
@endif


@if(session('success'))
    <h1 style="color:white;font-size:50px;margin-top:-5rem;">{{ session('success') }} </h1>  
@endif

</div>