@extends('layout.layout')
   
@section('css')
    <link rel="stylesheet" href="{{URL::asset('css/login.css')}}"/> 
@endsection

@section('content')
<header>
    <div class="brand">Sign In</div>
</header>
{{-- 
    <form action="" method="post">
                <select name="type" id="type_employe">
                    <option value="">...</option>
                    <option value="responsable">Responsable Compte</option>
                    <option value="administrateur">Administrateur</option>
                    <option value="caissiere">Caissiere</option>
                </select><br>
                <input class="input" type="text" name="login" id="login" autocomplete="off" placeholder="entrer votre login"/><br>
                <input class="input" type="password" name="password" id="pwd" placeholder="entrer votre mot de passe"/><br>
                <button type="submit" name="btn" value="connex" >CONNEXION</button> <button type="reset" id="annuler">ANNULER</button>
            </form>    
    --}}
    <div class="div_form">
        <form action="/user" method="post">
            @csrf
            <select name="type" id="type_employe">
                <option value="">...</option>
                <option value="responsable">Responsable Compte</option>
                <option value="administrateur">Administrateur</option>
                <option value="caissiere">Caissiere</option>
            </select><br>
            <input class="input" type="text" name="login" id="login" autocomplete="off" placeholder="entrer votre login"/><br>
            <input class="input" type="password" name="password" id="pwd" placeholder="entrer votre mot de passe"/><br>
            <button type="submit" name="btn" value="connex" >CONNEXION</button> <button type="reset" id="annuler">ANNULER</button>
        </form>    
    </div>

    {{-- <?php 
        if(!empty($_SESSION["message"])){ ?>
            <div class="divMess">
        <h1><?=  $_SESSION["message"]; ?></h1>
            </div>
       <?php }unset($_SESSION["message"]);
    ?> --}}

@endsection

    
@section('js')
        <script src="{{URL::asset('js/login.js')}}" type="text/javascript"></script>
@endsection
