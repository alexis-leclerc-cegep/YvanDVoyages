@extends('./admin/template')
@section('titre')
    Liste des voyages
@endsection
@section('contenu')
<div style="margin: 2%">
    <a href="/admin/voyage/creer" ><button style="margin-bottom: 1%">Ajouter un voyage</button></a>
    <livewire:voyages-table theme="bootstrap-4"/>
</div>
@endsection
