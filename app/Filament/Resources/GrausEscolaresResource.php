<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GrausEscolaresResource\Pages;
use App\Filament\Resources\GrausEscolaresResource\RelationManagers;
use App\Models\GrausEscolares;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GrausEscolaresResource extends Resource
{
    protected static ?string $model = GrausEscolares::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'NeuroDiv - Configurações';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('grau_escolar')
                    ->required()
                    ->label('Grau Escolar')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('grau_escolar')
                    ->label('Grau Escolar')
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
            'index' => Pages\ListGrausEscolares::route('/'),
            'create' => Pages\CreateGrausEscolares::route('/create'),
            'edit' => Pages\EditGrausEscolares::route('/{record}/edit'),
        ];
    }
}
