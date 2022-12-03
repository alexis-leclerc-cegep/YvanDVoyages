<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Vente;

class VentesTable extends DataTableComponent
{
    protected $model = Vente::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nom Client", "client.prenom"."client.nom")
                ->sortable(),
            Column::make("DateVente", "dateVente")
                ->sortable(),
            Column::make("Voyage id", "voyage_id")
                ->sortable(),
            Column::make("QuantiteVoyageurs", "quantiteVoyageurs")
                ->sortable(),
        ];
    }
}
