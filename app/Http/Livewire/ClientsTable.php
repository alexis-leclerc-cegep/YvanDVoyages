<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Client;

class ClientsTable extends DataTableComponent
{
    protected $model = Client::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDebugEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Prenom", "prenom")
                ->sortable(),
            Column::make("Nom", "nom")
                ->sortable(),
            Column::make("MotDePasse", "motDePasse")
                ->sortable(),
            Column::make("Adresse", "adresse")
                ->sortable(),
            Column::make("Ville", "ville")
                ->sortable(),
            Column::make("CP", "CP")
                ->sortable(),
            Column::make("Telephone", "telephone")
                ->sortable(),
            Column::make("Courriel", "courriel")
                ->sortable(),
            Column::make("Genre", "genre")
                ->sortable(),
            Column::make("Province id", "province_id")
                ->sortable(),
            Column::make("PremierContact id", "premierContact_id")
                ->sortable(),
        ];
    }
}
