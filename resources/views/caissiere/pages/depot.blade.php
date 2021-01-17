@extends("caissiere.layout.layout_caissiere")

@section("css")
    <link rel="stylesheet" href="{{URL::asset('css/css_caissiere/depot.css')}}" />
@endsection

@section("content")
<h1>DEPOT BANCAIRE</h1>
<div class="container">
    <div class="left">
        <img src="https://billetdebanque.panorabanques.com/wp-content/uploads/2015/11/D%C3%A9p%C3%B4t-desp%C3%A8ces-d%C3%A9lai-dencaissement.jpg"
         alt="depot argent" />
    </div>
    <div class="right">
        <form action="/depot_bancaire" method="POST">
            @csrf
            <label>Numero Compte</label><br/>
            <input type="text" name="numeroCompte" placeholder="numero Compte" required/><br/>
            <label>Montant</label><br/>
            <input type="number" name="montant" min="1000" placeholder="montant" required/><br/>
            <input type="submit" value="ENVOYER" />
        </form>
    </div>

</div>

   
@endsection