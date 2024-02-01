<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Clientes;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ClientesResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ClientesResource\RelationManagers;

class ClientesResource extends Resource
{
    protected static ?string $model = Clientes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('cpf_cnpj')
                    ->required()
                    ->maxLength(15),
                Forms\Components\Select::make('user_id')
                    ->label('Usuário')
                    ->relationship('user', 'name')    
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\TextInput::make('cep')
                    ->required()
                    ->maxLength(8),
                Forms\Components\TextInput::make('endereco_cob')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('complemento')
                    
                    ->maxLength(255),
                Forms\Components\TextInput::make('bairro')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cidade')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('uf')
                    ->required()
                    ->maxLength(2),
                Forms\Components\TextInput::make('pais')
                    ->required()
                    ->maxLength(30)
            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cpf_cnpj')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uf')
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
            'index' => Pages\ListClientes::route('/'),
            'create' => Pages\CreateClientes::route('/create'),
            'edit' => Pages\EditClientes::route('/{record}/edit'),
        ];
    }    
}
