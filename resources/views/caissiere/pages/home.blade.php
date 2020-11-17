@extends("caissiere.layout.layout_caissiere")

@section("css")
    <link rel="stylesheet" href="{{URL::asset("css/css_caissiere/home.css")}}" />
@endsection

@section("content")
    <div class="Home">
    <h1>WELCOME , {{session("nom_caissiere")}}</h1>

    <img src="{{URL::asset('avatarFemme.png')}}" id="imageIcon" alt="icone femme" />
    </div>
@endsection