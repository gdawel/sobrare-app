<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DescendenciasResource\Pages;
use App\Filament\Resources\DescendenciasResource\RelationManagers;
use App\Models\Descendencias;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DescendenciasResource extends Resource
{
    protected static ?string $model = Descendencias::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationGroup = 'NeuroDiv - Configurações';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('descendencia')
                    ->required()
                    ->label('Descendência')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('descendencia')
                    ->label('Descendência')
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
            'index' => Pages\ListDescendencias::route('/'),
            'create' => Pages\CreateDescendencias::route('/create'),
            'edit' => Pages\EditDescendencias::route('/{record}/edit'),
        ];
    }
}
