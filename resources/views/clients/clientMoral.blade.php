@extends('layout.layout')


@section('css')

<link rel="stylesheet" href="{{ URL::asset('css/client_insertMoral.css') }}">

@endsection


@section('content')

<header>
    <div class="brand"> 
        <h1>BANQUE DU PEUPLE<a href="/admin/cni">ACCUEIL</a></h1>
    </div>
</header> 
<main>
    <div class="form">
            <!-- form for adding client Moral -->
            <form action="/insert/clientMoral" method="post">
                @csrf
            <div class="Moral">
                    <h2>INFORMATIONS CLIENT MORAL</h2>
                <input type="text" name="nom" placeholder="nom Entreprise" id="nom_enter_m" required autocomplete="off"/>
                <input type="text" name="adresse" placeholder="adresse" id="adresse_m" required autocomplete="off"/><br/>
                <input type="text" name="telephone" placeholder="telephone Professionel" id="tel_m" required autocomplete="off"/>
                <input type="text" name="email" placeholder="email entreprise" id="email_m" required autocomplete="off"/><br/>
                <input type="text" name="matricule" placeholder="matricule" value="{{ $matriculeMoral }}" id="mat_client" required readonly/>
                <input type="text" name="type" placeholder="type entreprise" id="type_enter_m" required autocomplete="off"/><br/>
                <input type="text" name="activite" placeholder="activite Entreprise" id="activite_m" required autocomplete="off"/><br/>
                <input type="number" name="ninea" placeholder="NINEA Entreprise" min="1" id="activite_m" required autocomplete="off"/><br/>
            </div>
            <!-- end of all the  -->
            <button name="btn" value="CMoral">Valider</button><button>Annuler</button>
        </form>
    </div>
</main>

@endsection


@section('js')
<script type="text/javscript" src="{{ URL::asset('js/client_insertMoral.js') }}"></script>
@endsection