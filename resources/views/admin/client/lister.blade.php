<<<<<<< HEAD
@extends('./admin/templatetable')
@section('contenu')
<livewire:clients-table theme="bootstrap-4"/>
@endsection
=======
@extends('./client/template')
@section('contenu')
    <h2>ok</h2>
    <livewire:table :config="App\Tables\ClientsTable::class" />

@endsection
>>>>>>> 2539db1dfb95ee67c2f1e5ed42d4a10f1afa8301
