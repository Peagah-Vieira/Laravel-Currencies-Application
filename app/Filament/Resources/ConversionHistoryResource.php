<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConversionHistoryResource\Pages;
use App\Filament\Resources\ConversionHistoryResource\RelationManagers;
use App\Models\ConversionHistory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConversionHistoryResource extends Resource
{
    protected static ?string $model = ConversionHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('old_currency')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('new_currency')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('old_amount')
                    ->required(),
                Forms\Components\TextInput::make('new_amount')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('old_currency'),
                Tables\Columns\TextColumn::make('new_currency'),
                Tables\Columns\TextColumn::make('old_amount'),
                Tables\Columns\TextColumn::make('new_amount'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConversionHistories::route('/'),
            'create' => Pages\CreateConversionHistory::route('/create'),
            'edit' => Pages\EditConversionHistory::route('/{record}/edit'),
        ];
    }    
}
