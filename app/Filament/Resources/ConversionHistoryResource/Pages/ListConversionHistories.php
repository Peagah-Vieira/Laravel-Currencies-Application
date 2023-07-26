<?php

namespace App\Filament\Resources\ConversionHistoryResource\Pages;

use App\Filament\Resources\ConversionHistoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConversionHistories extends ListRecords
{
    protected static string $resource = ConversionHistoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
