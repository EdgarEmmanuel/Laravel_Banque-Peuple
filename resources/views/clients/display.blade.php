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

    <div class="diI">
        <table>
            <th>
                <td>NOM COMPLET </td>
                <td>LOCALISATION</td>
                <td> CNI </td>
                <td>PROFESSION</td>
                <td>ACTION</td>
            </th>
            @foreach($independants as $in)
                <tr>
                    <td>{{ $in->nom }} {{$in->prenom}} </td>
                    <td>{{ $in->localisation }} </td>
                    <td>{{ $in->cni }}</td>
                    <td>{{ $in->activite_client }}</td>
                    <td> 
                        <a href="{{$in->idClient}}">VOIR COMPTE(S)</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

   
@endsection


@section("js")
 <script src="{{URL::asset("js/display.js")}}" type="text/javascript"></script>
@endsection