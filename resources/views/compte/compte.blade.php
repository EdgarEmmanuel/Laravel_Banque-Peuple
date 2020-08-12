@extends('layout.layout')

@section('css')
        <link rel="stylesheet" href="{{ URL::asset('css/compte.css') }}">
@endsection



@section('content')
<header>
    <div class="brand">
        <h1>BANQUE DU PEUPLE<a href="/admin/cni">ANNULER</a></h1>
    </div>
</header>
<main>
    <form action="/compte" method="post">
        @csrf
         <!-- form for adding moral client $_SESSION["idClient"] -->

         <div class="Moral">
            <h2>INFORMATIONS COMPTE DU CLIENT </h2>
            <input type="text" name="" placeholder="nom complet"
         value="{{ session("nomCompletClient") }}" id="prenom" readonly/>

            <input type="text" name="" placeholder="cni" 
             value=" {{ session("idClient") }} " id="idClient" readonly/>
        </div>

        <label for="" style="color:white;">TYPE COMPTE </label>
            <select name="typeCompte" id="type_m" required>
                <option value="">Choisir...</option>
                <option value="Epargne">Compte Epargne</option>
                <option value="Courant">Compte Courant</option>
                <option value="Bloque">Compte Bloque</option>
            </select><br/> 
            <input type="text" name="raison" id="raison_social" placeholder="raison social"/>
            <input type="number" name="cle_rib" id="cle_rib" min="1" max="97" placeholder="Cle RIB"/><br/>
            <input type="number" name="montant" id="montant" min="10000" placeholder="montant" /> 
            <input type="text" name="Name_entreprise" id="nom_Entreprise" placeholder="nom Entreprise" /><br/>
            <input type="text" name="adresse_Entreprise" id="Adresse_Entreprise" placeholder="Adresse Entreprise" />
            <input type="text" name="numero_Agence" id="numeroAgence"  placeholder="numero Agence" value=" {{session("nameAgence")}} " readonly/><br/>

            
            <label for="" style="color:white;">DATE DEBLOCAGE COMPTE </label>
        <input type="date" placeholder="date deblocage compte" min="{{ $first["min"] }}" value="{{ $first["min"] }}" id="date_deblocage" name="dateDebloc"/> 
            
            <!-- pour la session avec la date , voir la page index.php(Ligne 16-18) -->
            <br/>
            <label for="" style="color:white;">DATE OUVERTURE COMPTE</label>
            <input type="date" value="{{ $first["date"] }}" name="dateOuvert" min="{{ $first["date"] }}" placeholder="date ouverture" id="date_m" /> 
            <div id="choix">
                <label for="" style="color:white;">FRAIS OUVERTURE</label><input  type="checkbox" name="souscription" value="souscri" id="frais"/>
            </div>
            <div id="choix2">
                <label for="" style="color:white;">RETRAIT AGIOS TOUS LES 3 MOIS</label> <input type="checkbox" name="agiosOBG" value="agios" id="fraisR"/>
            </div>
    <div class="button_for_s" id="button">
        <button id="btn_create" name="btn" value="C_compte" >Valider</button>  <button>Annuler</button>
    </div>
    </form>
   

</main>
@endsection



@section('js')
<script src="{{ URL::asset('js/compte.js') }}" type="text/javascript"></script>
@endsection