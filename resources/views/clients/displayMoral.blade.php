@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/display.css')}}" />
@endsection


@section("content")
<nav>
    <h1>CLIENTS MORAUX</h1>

    <div class="menu">
        <a href="/admin/cni">RETOUR</a>
        <a href="/display/clients">CLIENTS INDEPENDANTS </a>
        <a href="/display/salaries">CLIENTS SALARIES</a>
    </div>

</nav>
    <div class="diI">
        <table>
            <tr>
                <td>NOM COMPLET </td>
                <td>LOCALISATION</td>
                <td> CNI </td>
                <td>PROFESSION</td>
                <td>ACTION</td>
            </tr>
            @foreach($independants as $in)
                <tr>
                    <td>{{ $in->nom }} {{$in->prenom}}</td>
                    <td>{{ $in->localisation }}</td>
                    <td>{{ $in->cni }}</td>
                    <td>{{ $in->activite_client }}</td>
                    <td>
                        <a href="{{ $in->idClient }}">VOIR COMPTE(S)</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection