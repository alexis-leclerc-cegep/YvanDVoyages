@extends('/admin/template')
@section('titre')
    Ajouter un voyage
@endsection
@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Modifier un voyage</h1>
                <form action="/admin/voyage/modifier/{{$voyage->id}}" method="post">
                    @csrf
                    <div class="card shadow" style="margin-bottom: 15px">
                        <div class="car-header bg-success pt-2">
                            <div class="card-title font-weight-bold text-white text-center"> Ajouter un voyage </div>
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
                                <label for="titre">Nom du voyage </label>
                                {!! $errors->first('nom', '<small class="text-danger">:message</small>') !!}
                                <input type="text" name="nomVoyage" id="nomVoyage" class="form-control" placeholder="" value="{{$voyage->nomVoyage}}" disabled/>
                                <label for="dateDebut">Date de début du voyage </label>
                                {!! $errors->first('dateDebut', '<small class="text-danger">:message</small>') !!}
                                <input type="date" name="dateDebut" id="dateDebut" class="form-control" placeholder="" value="{{$voyage->dateDebut}}"/>
                                <label for="duree">Durée du voyage (Jours) </label>
                                {!! $errors->first('duree', '<small class="text-danger">:message</small>') !!}
                                <input type="number" name="duree" id="duree" class="form-control" placeholder="" value="{{$voyage->duree}}"/>
                                <label for="ville">Ville de départ </label>
                                {!! $errors->first('ville', '<small class="text-danger">:message</small>')  !!}
                                <input type="text" name="ville" id="ville" class="form-control" placeholder="" value="{{$voyage->ville}}"/>
                                <label for="prix">Prix du voyage </label>
                                {!! $errors->first('prix', '<small class="text-danger">:message</small>')  !!}
                                <input type="text" name="prix" id="prix" class="form-control" placeholder="" value="{{$voyage->prix}}"/>
                                <label for="imgLink">Lien de l\'image </label>
                                {!! $errors->first('imgLink', '<small class="text-danger">:message</small>')  !!}
                                <input type="text" name="imgLink" id="imgLink" class="form-control" placeholder="" value="{{$voyage->imgLink}}"/>
                                <label for="departement"> Sélectionnez le département </label>
                                {!! $errors->first('departement', '<small class="text-danger">:message</small>') !!}
                                <select name="departement" id="departement" class="form-control">
                                    @foreach($listeDepartements as $unDepartement)
                                        <option value="{{ $unDepartement->id }}">{{ $unDepartement->nomDepartement }}</option>
                                    @endforeach
                                </select>
                                <label for="categorie"> Sélectionnez la catégorie </label>
                                <select name="categorie" id="categorie" class="form-control">
                                    @foreach($listeCategories as $uneCategorie)
                                        <option value="{{ $uneCategorie->id }}">{{ $uneCategorie->categorie }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer d-inline-block">
                            <button type="submit" class="btn btn-success"> Ajouter un voyage </button>
                        </div>
                        @csrf
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
