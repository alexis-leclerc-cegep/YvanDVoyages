@extends('./admin/template')
@section('titre')
    Liste des voyages
@endsection
@section('contenu')
<div style="margin: 2%">
    <livewire:voyages-table theme="bootstrap-4"/>
</div>
@endsection