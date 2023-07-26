<?php

namespace App\Filament\Resources\CurrenciesListResource\Pages;

use App\Filament\Resources\CurrenciesListResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCurrenciesLists extends ManageRecords
{
    protected static string $resource = CurrenciesListResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
