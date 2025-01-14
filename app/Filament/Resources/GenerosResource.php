<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GenerosResource\Pages;
use App\Filament\Resources\GenerosResource\RelationManagers;
use App\Models\Generos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GenerosResource extends Resource
{
    protected static ?string $model = Generos::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationGroup = 'NeuroDiv - Configurações';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('genero')
                    ->required()
                    ->label('Gênero')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('genero')
                    ->label('Gênero')
                    ->searchable(),
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
            'index' => Pages\ListGeneros::route('/'),
            'create' => Pages\CreateGeneros::route('/create'),
            'edit' => Pages\EditGeneros::route('/{record}/edit'),
        ];
    }
}
