<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Client;

class ClientsTable extends DataTableComponent
{
    protected $model = Client::class;
    public ?string $defaultSortColumn = 'prenom';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        //$this->setDebugEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Prenom", "prenom")
                ->searchable()
                ->sortable(),
            Column::make("Nom", "nom")
                ->searchable()
                ->sortable(),
            Column::make("Adresse", "adresse")
                ->searchable()
                ->sortable(),
            Column::make("Ville", "ville")
                ->searchable()
                ->sortable(),
            Column::make("CP", "CP")
                ->searchable()
                ->sortable(),
            Column::make("Telephone", "telephone")
                ->sortable(),
            Column::make("Courriel", "courriel")
                ->sortable(),
            Column::make("Genre", "genre")
                ->sortable()
        ];
    }
}
