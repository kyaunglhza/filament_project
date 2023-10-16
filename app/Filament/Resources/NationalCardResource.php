<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NationalCardResource\Pages;
use App\Models\NationalCard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class NationalCardResource extends Resource
{
    protected static ?string $model = NationalCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name_en'),
                TextColumn::make('name_mm'),
                TextColumn::make('nrc_code'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListNationalCards::route('/'),
            'create' => Pages\CreateNationalCard::route('/create'),
            'edit' => Pages\EditNationalCard::route('/{record}/edit'),
        ];
    }
}
