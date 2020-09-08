@extends('layout.layout')

@section("css")
<link rel="stylesheet" href="{{URL::asset("css/page_operations.css")}}">
@endsection

@section("")
    <h1>INFORMATIONS DU COMPTE </h1>
    <table>
        <th>
            <td>Numero Compte </td>
            <td>CLE RIB </td>
            <td>DATE OUVERTURE </td>
        </th>
        @foreach($comptes as $c)
        <tr>
            <td>{{$c->num_compte}}</td>
            <td>{{$c->cle_rib}}</td>
            <td>{{$c->date_ouverture}}</td>
        </tr>
        @endforeach
    </table>

    <h1>INFORMATIONS DU COMPTE </h1>
    <table>
        <th>
            <td>Numero Compte </td>
            <td>CLE RIB </td>
            <td>DATE OUVERTURE </td>
        </th>
        @foreach($operations as $op)
        <tr>
            <td>{{$c->type_operation}}</td>
            <td>{{$c->montant}}</td>
            <td>{{$c->date_operation}}</td>
        </tr>
        @endforeach
    </table>
@endsection