<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CurrenciesListResource\Pages;
use App\Models\CurrenciesList;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CurrenciesListResource extends Resource
{
    protected static ?string $model = CurrenciesList::class;

    protected static ?string $breadcrumb = 'Currencies List';

    protected static ?string $label = 'Currencies List';

    protected static ?string $recordTitleAttribute = 'Currencies List';

    protected static ?string $navigationGroup = 'Currencies API';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Currencies List';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('symbol')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('symbol_native')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('decimal_digits')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rounding')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name_plural')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCurrenciesLists::route('/'),
        ];
    }
}
