<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Livewire\Livewire;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Forms\Components\SelectColumn;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = 'Usuários / Cliente';

    public static function form(Form $form): Form
    {
        return $form
            
                ->schema([
                    Section::make('Informações Básicas do Usuário / Cliente')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Nome')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->label('E-mail')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label('E-mail verificado em:'),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->label('Senha')
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                            ->maxLength(255),
                        Forms\Components\Select::make('usertype')
                            ->options([
                                'Admin' => 'Admin',
                                'Gestor' => 'Gestor',
                                'Cliente' => 'Cliente',
                                'Convidado' => 'Convidado',
                            ])
                            ->label('Tipo de Usuário')
                            ->required(),
                            ])->columns(2),
                
            
                    Section::make('Informações Estáticas do Cliente')
                    ->schema([
                        Forms\Components\DatePicker::make('data_nascimento')
                            ->label('Data Nasc.'),
                            
                        Forms\Components\Select::make('sexo_biologico')
                            ->label('Sexo Biológico')
                            ->options([
                                'F' => 'Feminino',
                                'M' => 'Masculino'
                            ]),
                        Forms\Components\Select::make('estado_nascimento')
                            ->label('UF do Nascimento')
                            
                            ->options([
                                'BA' => 'BA',
                                'SP' => 'SP',
                                'PE' => 'PE'
                            ]),
                           /*  ->dehydrated()
                            ->unique(Testes::class, 'slug', ignoreRecord: true), */
                    ])->columns(3)
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Nome'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('E-mail')
                    ->sortable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->label('Email verificado em:'),
                Tables\Columns\TextColumn::make('usertype')
                    ->sortable()
                    ->label('Tipo de Usuário')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Data de Criação')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Data de Alteração')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
