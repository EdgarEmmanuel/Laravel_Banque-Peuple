@extends("layout.layout")

@section('css')
        <link rel="stylesheet" href="{{URL::asset('css/cni.css')}}">
@endsection


@section('content')
    <header>
        <div class="brand">
            Banque du Peuple
        </div>
    </header>
    <main>
     <input type="text" value="Matricule : {{ session('matricule')}} " placeholder="" id="caissiere" readonly/>
        <a href="/logout" id="a" >Deconnexion</a><br>
        <input type="text" value="Nom Complet : {{ session('nomRespo') }} " placeholder="" id="nom" readonly/><br>
        <form action="/checkCni" method="post" id="formGest">
            @csrf
            <label id="label"  for="">ANCIEN CLIENT</label><br/>
            <input type="text" placeholder="MATRICULE CLIENT" name="matricule" id="cni" autocomplete="off" required /> <br>
            <button id="verClient" name="btn" value="verify">Verifier</button>
        </form>
    </main> <br/><br/>
    <a class="new" id="add">NOUVEAU CLIENT</a> <br/><br/><br/><br/>
    <a class="addS" href="/client/clientSalarie" id="add">Nouveau Client Salarie </a> <br/><br/><br/><br/>
    <a class="addM" href="/client/clientMoral" id="add">Nouveau Client Moral </a> <br/><br/><br/><br/>
    <a class="addI" href="/client/clientIndependant" id="add">Nouveau Client Independant </a>

    <p class="display">
        <a href="/display/clients">LISTE DES CLIENTS INDEPENDANTS </a>
        <a href="/display/moraux">LISTE DES CLIENTS MORAUX </a>
        <a href="/display/salaries">LISTE DES CLIENTS SALARIES </a>
    </p>
@endsection
   

@section('js')
    <script src="{{ URL::asset('js/cni.js')}}" type="text/javascript"></script>
@endsection