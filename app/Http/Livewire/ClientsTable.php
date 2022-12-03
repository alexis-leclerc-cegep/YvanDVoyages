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
                ->hideIf(True), //Cacher la colonne afin d'être capable de l'obtenir en bas sur les boutons sans la montrer a lutilisateur
            Column::make("Prénom", "prenom")
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
            Column::make("Téléphone", "telephone")
                ->searchable()
                ->sortable(),
            Column::make("Courriel", "courriel")
                ->searchable()
                ->sortable(),
            Column::make("Genre", "genre")
                ->sortable(),
            Column::make("Province", "province.province")
                ->sortable(),
            //Column::make("PremierContact", "premiercontact.premiercontact")
             //   ->sortable(),
            Column::make('Actions')
                ->label(
                    function($row){
                        //echo "ok";
                        $delete = '<button class="font-bold p-2 rounded m-1" onclick="location.href = \'/admin/client/supprimer/' . $row->id . '\'">Trash</button>';
                        $edit = '<button class="font-bold p-2 rounded m-1" onclick="location.href=\'/admin/client/detailler/' . $row->id . '\'">Edit</button>';
                        return $delete.$edit;
                        //return redirect('/admin/clients/detailler/'.$row->id);
                    }
                )->html()
        ];
    }
}
