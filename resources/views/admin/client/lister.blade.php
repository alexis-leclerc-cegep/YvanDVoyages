@extends('./client/template')
@section('contenu')
    <h2>ok</h2>
    <livewire:table :config="App\Tables\ClientsTable::class" />

@endsection