<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;

use App\Models\Vente;
use App\Models\Voyage;

class VentesTable extends DataTableComponent
{
    protected $model = Vente::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function filters(): array 
    {
        return [
            DateFilter::make('DateVente', 'dateVente'),
            MultiSelectFilter::make('Voyage')
                ->options(
                    Voyage::all()
                        ->pluck('nomVoyage', 'id')
                        ->toArray()
                ),
        ];

    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nom", "client.nom", "client.prenom")
                ->sortable(),
            Column::make("Prénom", "client.prenom")
                ->sortable(),
            Column::make("DateVente", "dateVente")
                ->sortable(),
            Column::make("Destination", "voyage.nomVoyage")
                ->sortable(),
            Column::make("Quantité de voyageurs", "quantiteVoyageurs")
                ->sortable(),
        ];
    }
}
