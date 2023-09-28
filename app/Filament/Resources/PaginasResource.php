<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaginasResource\Pages;
use App\Filament\Resources\PaginasResource\RelationManagers;
use App\Models\Paginas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaginasResource extends Resource
{
    protected static ?string $model = Paginas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Configuração do Site';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('chave')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tituloPagina')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('imagemPagina')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('subtituloPagina')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('conteudoPagina')
                    ->required()
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('chave')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tituloPagina')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('imagemPagina'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListPaginas::route('/'),
            'create' => Pages\CreatePaginas::route('/create'),
            'edit' => Pages\EditPaginas::route('/{record}/edit'),
        ];
    }
}
