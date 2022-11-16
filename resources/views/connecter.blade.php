@extends('./client/template')
@section('titre')
   YvanDesVoyages-Connexion
@endsection
@section('contenu')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        <form method="post" action="/authentifier">
            @csrf
                <div class="card shadow" style="margin-bottom: 15px">
                    <div class="car-header bg-success pt-2">
                        <div class="card-title font-weight-bold text-white text-center"> Login </div>
                    </div>

                    <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif


                        <div class="form-group">
                            <label for="courriel"> Entrez votre courriel </label>
                            <input type="text" name="courriel" id="email" class="form-control" placeholder="" value="{{ old('courriel') }}"/>
                            {!! $errors->first('courriel', '<small class="text-danger">:message</small>') !!}
                            <label for="motDePasse"> Entrez votre mot de passe </label>
                            <input type="password" name="motDePasse" id="motDePasse" class="form-control" placeholder="" value="{{ old('motDePasse') }}"/>
                            {!! $errors->first('motDePasse', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-success"> Se connecter </button>
                        <a href="/client/creerCompte" class="btn btn-success"> Créer un compte </a>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection