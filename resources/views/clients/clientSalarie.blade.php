@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/clientSalarie_css.css') }}">
@endsection

    <header>
        <div class="brand"> 
            <h1>BANQUE DU PEUPLE <a href="/admin/cni">ACCUEIL</a></h1>
        </div>
    </header>

    <main>
        <div class="form"> 
                <!-- form for adding Employee client  -->
                <form action="/insert/Salarie" method="post">
                    @csrf
                    <div class="salarie"> 
                        <h2>INFORMATIONS CLIENT SALARIE</h2>
                        <input type="text" name="nom" placeholder="nom" id="nom_salarie" autocomplete="off" required />
                        <input type="text" name="prenom" placeholder="prenom" id="prenom_salarie" autocomplete="off" required /><br/>
                        <input type="text" name="adresseforCl" placeholder="Adresse Entreprise" id="addr_salarie" autocomplete="off" required />
                        <input type="text" name="telephone" placeholder="telephone" id="tele_salarie" autocomplete="off" required/><br/>
                        <input type="text" name="email" placeholder="email" id="email_salarie" autocomplete="off" required/>
                        <input type="text" name="matricule" placeholder="mat_client" id="mat_client" autocomplete="off" value="{{ $value }}" required readonly/><br/>
                        <input type="text" name="profession" placeholder="profession" id="emploi_salarie" autocomplete="off" required/>
                        <input type="text" name="nom_Entreprise" placeholder="nom entreprise" id="NameEnter_salarie" autocomplete="off" required/><br/>
                        <input type="text" name="cni" placeholder="CNI" id="cni_salarie" autocomplete="off" required/>
                    </div>
                    <div class="button_for_s" id="button">
                        <button id="btn_Csalarie" name="btn" value="cSalarie" >Valider</button>  <button>Annuler</button>
                    </div>
                <!-- end of all the  -->
            </form>
        </div>
    </main>

@section('js')
    <script type="text/javascript" src="{{URL::asset('js/clientSalarie_js.js')}}"></script>
@endsection
