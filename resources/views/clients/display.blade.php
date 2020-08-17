@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/display.css')}}" />
@endsection


@section("content")
    <nav>
        <a href="" id="in">INDEPENDANTS</a>
        <a href="" id="mor">MORAUX</a>
        <a href="" id="sal">SALARIES</a>
    </nav>

    @foreach($independants as $in)
        {{ $in->nom }}
    @endforeach
@endsection


@section("js")
 <script src="{{URL::asset("js/display.js")}}" type="text/javascript"></script>
@endsection