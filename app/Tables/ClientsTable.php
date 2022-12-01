<?php

namespace App\Tables;

use App\Models\Client;
use Okipa\LaravelTable\Abstracts\AbstractTableConfiguration;
use Okipa\LaravelTable\Column;
use Okipa\LaravelTable\Formatters\DateFormatter;
use Okipa\LaravelTable\RowActions\DestroyRowAction;
use Okipa\LaravelTable\RowActions\EditRowAction;
use Okipa\LaravelTable\Table;

class ClientsTable extends AbstractTableConfiguration
{
    protected function table(): Table
    {
        return Table::make()->model(Client::class);
        /*
            ->rowActions(fn(Client $client) => [
                new EditRowAction(route('client.edit', $client)),
                new DestroyRowAction(),
            ]);
            */
    }

    protected function columns(): array
    {
        return [
            Column::make('id')->sortable(),
            Column::make('nom')->searchable()->sortable(),
            Column::make('prenom')->searchable()->sortable(),
            Column::make('adresse')->searchable()->sortable(),
            Column::make('ville')->searchable()->sortable(),
            Column::make('CP')->searchable()->sortable(),
            Column::make('telephone')->searchable()->sortable(),
            Column::make('courriel')->searchable()->sortable()
        ];
    }

    protected function results(): array
    {
        return [
            // The table results configuration.
            // As results are optional on tables, you may delete this method if you do not use it.
        ];
    }
}
