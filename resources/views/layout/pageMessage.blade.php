@extends("layout.layout")


@section("css")
    <link rel="stylesheet" href="{{URL::asset("css/styleMess.css")}}">
@endsection


@section("content")
    <div class="message">
        <h1>{{session("message")}}</h1>
        <a href="/admin/cni">RETOUR</a>
    </div>
@endsection

