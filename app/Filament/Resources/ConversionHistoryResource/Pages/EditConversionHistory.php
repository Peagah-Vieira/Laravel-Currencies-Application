<?php

namespace App\Filament\Resources\ConversionHistoryResource\Pages;

use App\Filament\Resources\ConversionHistoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConversionHistory extends EditRecord
{
    protected static string $resource = ConversionHistoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
