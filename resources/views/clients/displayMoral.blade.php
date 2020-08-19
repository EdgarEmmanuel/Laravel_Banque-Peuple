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
                <td>NOM ENTREPRISE </td>
                <td>NINEA</td>
                <td>ACTIVITE ENTREPRISE</td>
                <td>TYPE ENTREPRISE</td>
                <td>ACTION</td>
            </tr>
            @foreach($moraux as $moral)
                <tr>
                    <td>{{ $moral->nom_entreprise }}</td>
                    <td>{{ $moral->ninea }}</td>
                    <td>{{ $moral->activite_entreprise }}</td>
                    <td>{{ $moral->type_entreprise }}</td>
                    <td>
                        <a href="/display/comptes/{{$moral->idClient}}">VOIR COMPTE(S)</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection