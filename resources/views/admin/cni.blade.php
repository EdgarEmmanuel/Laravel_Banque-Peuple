@extends("layout.layout")

@section('css')
        <link rel="stylesheet" href="{{URL::asset('css/cni.css')}}">
@endsection

    <header>
        <div class="brand">
            Banque du Peuple
        </div>
    </header>
    <main>
     <input type="text" value="Matricule : {{ session('matricule')}} " placeholder="" id="caissiere" readonly/>
        <a href="/logout" id="a" >Deconnexion</a><br>
        <input type="text" value="Nom Complet : {{ session('nomRespo') }} " placeholder="" id="nom" readonly/><br>
        <form action="index.php" method="post" id="formGest">
            <label id="label"  for="">ANCIEN CLIENT</label><br/>
            <input type="text" placeholder="MATRICULE CLIENT" name="matricule" id="cni" autocomplete="off" required /> <br>
            <button id="verClient" name="btn" value="verify">Verifier</button>
        </form>
    </main> <br/><br/>
    <a class="new" id="add">NOUVEAU CLIENT</a> <br/><br/><br/><br/>
    <a class="addS" href="/client/clientSalarie" id="add">Nouveau Client Salarie </a> <br/><br/><br/><br/>
    <a class="addM" href="/client/clientMoral" id="add">Nouveau Client Moral </a> <br/><br/><br/><br/>
    <a class="addI" href="/client/clientIndependant" id="add">Nouveau Client Independant </a>

@section('js')
    <script src="{{ URL::asset('js/cni.js')}}" type="text/javascript"></script>
@endsection