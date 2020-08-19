@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/display.css')}}"/>
@endsection


@section("content")
    <nav>
        <h1>CLIENTS SALARIES</h1>
        <div class="menu">
            <a href="/admin/cni">RETOUR</a>
            <a href="/display/moraux">CLIENTS MORAUX </a>
            <a href="/display/clients">CLIENTS INDEPENDANTS</a>
        </div>
    </nav>

    <div class="diI">
        <table>
            <tr>
                <td>NOM COMPLET </td>
                <td>PROFESSION</td>
                <td> CNI </td>
                <td>NOM ET LIEU ENTRPRISE</td>
                <td>ACTION</td>
            </tr>
            @foreach($salaries as $salarie)
                <tr>
                    <td>{{ $salarie->nom }} {{$salarie->prenom}}</td>
                    <td>{{ $salarie->profession }}</td>
                    <td>{{ $salarie->cni }}</td>
                    <td>{{ $salarie->nom_entreprise }} ,{{ $salarie->adresse_entreprise }}</td>
                    <td>
                        <a href="/display/comptes/{{$salarie->idClient}}">VOIR COMPTE(S)</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection