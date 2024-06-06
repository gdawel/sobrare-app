<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Testes;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\gruposDeTestes;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\TestesResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TestesResource\RelationManagers;

class TestesResource extends Resource
{
    protected static ?string $model = Testes::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationGroup = 'NeuroDiv - Configurações';
    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Teste';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                ->schema([
                    Section::make('Informações Básicas do Teste')
                    ->schema([
                        Forms\Components\TextInput::make('codTeste')
                            ->required()
                            ->label('Cód. do Teste')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nomeTeste')
                            ->required()
                            ->label('Nome do Teste')
                            ->maxLength(255)
                            ->live(onBlur:true)
                            ->afterStateUpdated(fn (string $operation, $state, Set $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null ),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->maxLength(255)
                            ->dehydrated()
                            ->unique(Testes::class, 'slug', ignoreRecord: true)
                            ->columnSpanFull(),
                        
                        TinyEditor::make('descricaoExterna')
                            ->required()
                            ->label('Descrição Externa')
                            ->columnSpanFull(),
                        TinyEditor::make('textoIntro')
                            ->label('Texto de Introdução para o relatório')
                            ->columnSpanFull(),
                        TinyEditor::make('textoFecha')
                            ->label('Texto de Fechamento para o relatório')
                            ->columnSpanFull(),
                        TinyEditor::make('textoRodape')
                            ->label('Texto para o rodapé do relatorio')
                            ->columnSpanFull(),
               
                    ])->columns(2),
                    ])->columnSpan(2),

                    Section::make()
                    ->schema([
                        //Forms\Components\FileUpload::make('imagens')
                        //    ->multiple()
                        //    ->directory('Testes')
                        //    ->maxfiles(5)
                        //    ->reorderable(),
                        Forms\Components\Textarea::make('memoInterno')
                            ->required()
                            ->maxLength(65535),
                        Forms\Components\TextInput::make('precoTeste')
                            ->required()
                            ->label('Preço deste Teste')
                            ->prefix('R$')
                            ->numeric(),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Está ativo?')
                            ->default(true)
                            ->required(),
                        Forms\Components\Select::make('grupos_de_testes_id')
                            ->required()
                            ->label('Grupo de Testes')
                            ->searchable()
                            ->preload()
                            ->multiple()
                            ->relationship('gruposTestes', 'nomeGrupo')    
                            ->options(GruposDeTestes::all()->pluck('nomeGrupo', 'id')),
                    ])->columnSpan(1),
                
                
                
                
            ])->columns(3);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('nomeTeste')
                    ->label('Nome do Teste')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gruposTestes.codGrupo')
                    ->label('Grupo')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('precoTeste')
                    ->label('Preço do Teste')
                    ->numeric()
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\IconColumn::make('isActive')
                    ->label('Ativo?')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data de Criação')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Data da Alteração')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('gruposTestes')
                ->label('Grupo')
                ->relationship('gruposTestes', 'nomeGrupo'),
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
            'index' => Pages\ListTestes::route('/'),
            'create' => Pages\CreateTestes::route('/create'),
            'view' => Pages\ViewTestes::route('/{record}'),
            'edit' => Pages\EditTestes::route('/{record}/edit'),
        ];
    }    
}
