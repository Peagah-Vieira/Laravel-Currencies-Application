<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConversionHistoryResource\Pages;
use App\Models\ConversionHistory;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Carbon\Carbon;

class ConversionHistoryResource extends Resource
{
    protected static ?string $model = ConversionHistory::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'Currencies';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('old_currency')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('new_currency')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('old_amount')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('new_amount')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->searchable()
                    ->sortable()
                    ->date()
                    ->description(fn ($record) => Carbon::parse($record->created_at)->format('H:i:s')),
                Tables\Columns\TextColumn::make('updated_at')
                    ->searchable()
                    ->sortable()
                    ->date()
                    ->description(fn ($record) => Carbon::parse($record->created_at)->format('H:i:s')),
            ])->defaultSort('id')
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConversionHistories::route('/'),
        ];
    }
}
