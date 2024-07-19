<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\GruposDeTestes;
use Filament\Resources\Resource;
use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GruposDeTestesResource\Pages;
use App\Filament\Resources\GruposDeTestesResource\RelationManagers;

class GruposDeTestesResource extends Resource
{
    protected static ?string $model = GruposDeTestes::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    
    protected static ?string $navigationGroup = 'NeuroDiv - Configurações';
    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Grupo de Testes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Grid::make()
                         ->schema([
                        Forms\Components\TextInput::make('codGrupo')
                            ->label('Código do Grupo')
                            ->required()
                            ->maxLength(2)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('nomeGrupo')
                            ->label('Nome do Grupo de Testes (loja)')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur:true)
                            ->afterStateUpdated(fn (string $operation, $state, Set $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null )
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->unique(GruposDeTestes::class, 'slug', ignoreRecord: true)
                            ->columnSpan(2),
                        TinyEditor::make('descricaoCurta')
                            ->label('Descrição Curta')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        Forms\Components\MarkdownEditor::make('descricaoLonga')
                            ->label('Descrição Longa para o Grupo de Testes')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('imagemGrupo')
                            ->label('Imagem - aparece na loja')
                            ->image()
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('precoGrupo')
                            ->label('Preço para o Grupo de Testes (loja)')
                            ->prefix('R$')
                            ->required()
                            ->numeric()
                            ->columnSpan(2),
                        Forms\Components\Toggle::make('isActive')
                            ->label('Ativo?')
                            ->default(true)
                            ->required(),
                         ])->columns(5),
                    
                        
                    ]),

                 Section::make('Testes que Compõem este Grupo de Testes')
                        ->schema([
                            Repeater::make('gruposTestes_testes')
                                ->relationship()
                                ->label('Testes listados abaixo')
                                ->schema([
                                    Select::make('testes_id')
                                        ->relationship('testes', 'nomeTeste')
                                        ->label('Teste...')
                                        ->searchable()
                                        ->preload()
                                        ->required(),
                                        //->distinct()
                                        //->disableOptionsWhenSelectedInSiblingRepeaterItems(),
                                    
                                ])

                        ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codGrupo')
                    ->label('Código')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomeGrupo')
                    ->label('Título')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('imagemGrupo')
                    ->label('Imagem'),
                // Tables\Columns\TextColumn::make('slug')
                //    ->searchable(),
                Tables\Columns\TextColumn::make('precoGrupo')
                    ->label('Preço')
                    ->numeric(),
                    
                Tables\Columns\IconColumn::make('isActive')
                    ->label('Ativo?')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data de Criação')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Data de Alteração')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make()
                ])
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
            'index' => Pages\ListGruposDeTestes::route('/'),
            'create' => Pages\CreateGruposDeTestes::route('/create'),
            'view' => Pages\ViewGruposDeTestes::route('/{record}'),
            'edit' => Pages\EditGruposDeTestes::route('/{record}/edit'),
        ];
    }    
}
