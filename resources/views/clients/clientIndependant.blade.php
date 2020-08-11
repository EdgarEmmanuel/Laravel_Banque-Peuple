@extends('layout.layout')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/client_insertIndependant.css') }}">
@endsection


@section('content')
<header>
    <div class="brand"> 
        <h1>BANQUE DU PEUPLE<a href="/admin/cni">ACCUEIL</a></h1>
    </div>
</header>
<main>
    <div class="form">
            <form action="index.php" method="post">
                @csrf

            <!-- form for adding Indepndant client -->
            <div class="Independant">
                <h2>INFORMATIONS CLIENT INDEPENDANT</h2>
                <input type="text" name="nomi" placeholder="nom" id="nom_i" autocomplete="off" required/>
                <input type="text" name="prenomi" placeholder="prenom" id="prenom_i" autocomplete="off" required /><br/>
                <input type="text" name="adressei" placeholder="adresse" id="adresse_i" autocomplete="off" required />
                <input type="text" name="teli" placeholder="telephone" id="telephone_i" autocomplete="off" required /><br/>
                <input type="email" name="emaili" placeholder="email" id="email_i" autocomplete="off" required/>
                <input type="text" name="mati" value="{{ $matriculeNoSalarie }}" autocomplete="off" placeholder="mat_client" id="mat_client" required readonly/><br/>
                <input type="text" name="activitei" placeholder="activite" id="activite_i" autocomplete="off" required /><br/>
                <input type="text" name="cni" placeholder="CNI" id="activite_i" autocomplete="off" required/><br/>
            </div>
           <button name="btn" value="Cindependant">Valider</button><button>Annuler</button>
        </form>
    </div>
</main>
@endsection



@section('js')
<script type="text/javascript" src="{{ URL::asset('js/client_insertIndependant.js') }}"></script>
@endsection