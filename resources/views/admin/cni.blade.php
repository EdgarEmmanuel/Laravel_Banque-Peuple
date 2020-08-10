@extends("layout.layout")

@section('css')
        <link rel="stylesheet" href="{{URL::asset('css/cnicss')}}">
@endsection

    <header>
        <div class="brand">
            Banque du Peuple
        </div>
    </header>
    <main>
     <input type="text" value="Matricule : <?= $_SESSION['matricule'] ?> " placeholder="" id="caissiere" readonly/>
        <a href="index.php?code=deconnex" id="a" >Deconnexion</a><br>
        <input type="text" value="Nom Complet : <?= $_SESSION['nom_complet']?> " placeholder="" id="nom" readonly/><br>
        <form action="index.php" method="post" id="formGest">
            <label id="label"  for="">ANCIEN CLIENT</label><br/>
            <input type="text" placeholder="MATRICULE CLIENT" name="matricule" id="cni" autocomplete="off" required /> <br>
            <button id="verClient" name="btn" value="verify">Verifier</button>
        </form>
    </main> <br/><br/>
    <a class="new" id="add">NOUVEAU CLIENT</a> <br/><br/><br/><br/>
    <a class="addS" href="index.php?code=newCli" id="add">Nouveau Client Salarie </a> <br/><br/><br/><br/>
    <a class="addM" href="index.php?code=CliMoral" id="add">Nouveau Client Moral </a> <br/><br/><br/><br/>
    <a class="addI" href="index.php?code=CliNoSalarie" id="add">Nouveau Client Independant </a>

@section('js')
    <script src="{{ URL::asset('js/cni.js')}}" type="text/javascript"></script>
@endsection