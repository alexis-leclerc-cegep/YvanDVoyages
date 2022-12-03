
@extends('./admin/template')
@section('titre')
Liste Ventes
@endsection
@section('contenu')
<div style="margin: 2%">
    <livewire:ventes-table theme="bootstrap-5"/>
</div>
@endsection
