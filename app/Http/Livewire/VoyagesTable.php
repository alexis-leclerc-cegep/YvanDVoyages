<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Voyage;

class VoyagesTable extends DataTableComponent
{
    protected $model = Voyage::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->hideIf(true),
            Column::make("NomVoyage", "nomVoyage")
                ->searchable()
                ->sortable(),
            Column::make("DateDebut", "dateDebut")
                ->searchable()
                ->sortable(),
            Column::make("Duree", "duree")
                ->searchable()
                ->sortable(),
            Column::make("Ville", "ville")
                ->searchable()
                ->sortable(),
            Column::make("Prix", "prix")
                ->searchable()
                ->sortable(),
            Column::make("Département", "departement.nomDepartement")
                ->searchable()
                ->sortable(),
            Column::make("Région", "departement.region.nomRegion")
                ->searchable()
                ->sortable(),
            Column::make("Catégorie", "categorie.categorie")
                ->sortable(),
            Column::make('Actions')
                ->label(
                    function($row){
                        //echo "ok";
                        $delete = '<button class="font-bold p-2 rounded m-1" onclick="location.href = \'/admin/voyage/supprimer/' . $row->id . '\'">Supprimer</button>';
                        $edit = '<button class="font-bold p-2 rounded m-1" onclick="location.href=\'/admin/voyage/detailler/' . $row->id . '\'">Modifier</button>';
                        return $delete.$edit;
                        //return redirect('/admin/clients/detailler/'.$row->id);
                    }
                )->html()
        ];
    }
}
