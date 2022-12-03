@extends('./admin/template')
@section('titre')
Liste Clients
@endsection
@section('contenu')
<div style="margin: 2%">
    <livewire:clients-table theme="bootstrap-4"/>
</div>
@endsection
