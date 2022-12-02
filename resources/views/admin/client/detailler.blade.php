@extends('./client/template')
@section('titre')
   YvanDesVoyages-Inscription
@endsection
@section('contenu')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        <form method="post" action="/admin/client/modifier">
            @csrf
                <div class="card shadow" style="margin-bottom: 15px">
                    <div class="car-header bg-success pt-2">
                        <div class="card-title font-weight-bold text-white text-center"> Création d'un compte </div>
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


                            <input type="hidden" name="id" value="{{$client->id}}">
                        <div class="form-group">
                            <label for="courriel"> Courriel </label>
                            {!! $errors->first('courriel', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="courriel" id="email" class="form-control" value="{{$client->courriel}}" >
                            <label for="prenom"> Prénom </label>
                            {!! $errors->first('prenom', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="prenom" id="prenom" class="form-control" value="{{$client->prenom}}" >
                            <label for="nom"> Nom </label>
                            {!! $errors->first('nom', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="nom" id="nom" class="form-control" value="{{$client->nom}}" >
                            <label for="adresse"> Adresse </label>
                            {!! $errors->first('adresse', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="adresse" id="adresse" class="form-control" value="{{$client->adresse}}" >
                            <label for="ville"> Ville </label>
                            {!! $errors->first('ville', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="ville" id="ville" class="form-control" value="{{$client->ville}}" >
                            <label for="codePostal"> Code postal </label>
                            {!! $errors->first('codePostal', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="codePostal" id="codePostal" class="form-control" value="{{$client->CP}}" >
                            <label for="telephone"> Téléphone </label>
                            {!! $errors->first('telephone', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="telephone" id="telephone" class="form-control" value="{{$client->telephone}}" >
                            <label for="genre"> Genre </label>
                            {!! $errors->first('genre', '<small class="text-danger">:message</small>') !!}
                            <select name="genre" id="genre" class="form-control" value="{{$client->genre}}" >
                                <option>M</option>
                                <option>F</option>
                                <option>A</option>
                            </select>
                            <label for="province"> Province </label>

                            {!! $errors->first('province', '<small class="text-danger">:message</small>') !!}



        <!-- Afficher les provinces de la table province -->
                            <select name="province" id="province" class="form-control" placeholder="" >
                                @foreach($toutLesProvinces as $province)
                                @if($province->id == $client->province->id)
                                    <option value="{{ $province->id }}" selected>{{ $province->province }}</option>
                                @else
                                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                                @endif
                                @endforeach
                            </select>


        <!-- Fin -->

                            <label for="premierContact"> De qu'elle façon nous avez vous découvert? </label>
                            {!! $errors->first('premierContact', '<small class="text-danger">:message</small>') !!}



        <!-- Afficher les premiers contacts de la table premiercontact -->
                            <select name="premierContact" id="premierContact" class="form-control" placeholder="">
                                @foreach($toutLesPremiersContacts as $premierContact)
                                @if($premierContact->id == $client->premierContact->id)
                                    <option value="{{ $premierContact->id }}" selected>{{ $premierContact->premierContact }}</option>
                                @else
                                    <option value="{{ $premierContact->id }}">{{ $premierContact->premierContact }}</option>
                                @endif
                                @endforeach
                            </select>

                            

        
                        </div>
                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-success"> Modifier </button>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection