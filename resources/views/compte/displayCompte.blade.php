@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/display.css')}}" />
@endsection

@section("content")
    <nav>
        <h1>INFORMATIONS DU/DES COMPTE(S) CLIENT </h1>

        <div class="menu">
            <a href="/admin/cni">RETOUR</a>
            <a href="/display/moraux">CLIENTS MORAUX </a>
            <a href="/display/salaries">CLIENTS SALARIES</a>
            <a href="/display/clients">CLIENTS INDEPENDANT</a>
        </div>
    </nav>

    @if($CE!=null)
                    <h1>COMPTE(S) EPARGNE(S)</h1>
            <div class="diI">
                <table>
                    <tr>
                        <td>DATE OUVERTURE</td>
                        <td>NUMERO COMPTE </td>
                        <td>SOLDE</td>
                        <td>ACTION</td>
                    </tr>
                    @foreach($CE as $c => $i)
                        @foreach($CE[$c] as $j)
                            <tr>
                                <td>{{ $j->date_ouverture }}</td>
                                <td>{{ $j->num_compte }}</td>
                                <td>{{ $j->solde }} FCFA</td>
                                <td><a href="/display/operations/{{$j->id_compte_epargne}}">VOIR OPERATION(S)</a></td>
                            </tr>
                        @endforeach
                     @endforeach
                </table>
            </div>
    @endif

    @if($CC!=null)
    <h1>COMPTE(S) COURANT(S)</h1>
            <div class="diI">
                <table>
                    <tr>
                        <td>DATE OUVERTURE</td>
                        <td>NUMERO COMPTE </td>
                        <td>SOLDE</td>
                        <td>ENTREPRISE CLIENT </td>
                        <td>ACTION</td>
                    </tr>
                    @foreach($CC as $c => $i)
                        @foreach($CC[$c] as $j)
                            <tr>
                                <td>{{ $j->date_ouverture }}</td>
                                <td>{{ $j->num_compte }}</td>
                                <td>{{ $j->solde }} FCFA</td>
                                <td>{{ $j->nom_entreprise }} FCFA</td>
                                <td><a href="/display/operations/{{$j->id_compte_courant}}">VOIR OPERATION(S)</a></td>
                            </tr>
                        @endforeach
                     @endforeach
                </table>
            </div>
    @endif


    @if($CC!=null)
    <h1>COMPTE(S) BLOQUE(S)</h1>
            <div class="diI">
                <table>
                    <tr>
                        <td>DATE DEBLOCAGE</td>
                        <td>NUMERO COMPTE</td>
                        <td>SOLDE</td>
                        <td>ENTREPRISE CLIENT </td>
                        <td>ACTION</td>
                    </tr>
                    @foreach($CB as $c => $i)
                        @foreach($CB[$c] as $j)
                            <tr>
                                <td>{{ $j->date_deblocage }}</td>
                                <td>{{ $j->solde }}</td>
                                <td><a href="/display/operations/{{$j->id_compte_courant}}">VOIR OPERATION(S)</a></td>
                            </tr>
                        @endforeach
                     @endforeach
                </table>
            </div>
    @endif

@endsection