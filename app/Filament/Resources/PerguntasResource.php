<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Perguntas;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PerguntasResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PerguntasResource\RelationManagers;

class PerguntasResource extends Resource
{
    protected static ?string $model = Perguntas::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'NeuroDiv - Configurações';
    protected static ?int $navigationSort = 3;

    protected static ?string $modelLabel = 'Pergunta';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('testes_id')
                            ->required()
                            ->label('Pertence a qual teste?')
                            ->searchable()
                            ->preload()
                            ->relationship('testes' , 'nomeTeste')
                            ->columnSpan(3),
                Select::make('sexo') 
                    ->required()
                    ->label('Sexo')
                    ->options([
                        'I' => 'Indiferente' ,
                        'H'  => 'Homens',
                        'M'  => 'Mulheres'
                    ])
                    ->default('I')
                    ->columnSpan(1),
                Select::make('grupo_opcoes_respostas_id')
                            ->required()
                            ->label('Grupo Op. Resp.')
                            ->searchable()
                            ->preload()
                            ->relationship('grupoOpcoesRespostas' , 'codGrupoOpcRespostas')
                            ->columnSpan(2),
                    //Forms\Components\TextInput::make('codGrupoOpcRespostas')
                    
                    //->required(),
              
                Forms\Components\TextInput::make('sequencia')
                    ->required()
                    ->numeric()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('enunciado')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(4),
            ])->columns(6);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('testes.codTeste')
                    ->numeric()
                    ->label('Cod. do Teste')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sequencia')
                    ->numeric()
                    ->label('Seq.')
                    ->sortable(),
                Tables\Columns\TextColumn::make('enunciado')
                    ->label('Enunciado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sexo')
                    ->label('Sexo')
                    ->default('Indiferente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('grupoOpcoesRespostas')
                ->label('Grupo Op. Resp.')
                ->relationship('grupoOpcoesRespostas' , 'codGrupoOpcRespostas'),
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
            'index' => Pages\ListPerguntas::route('/'),
            'create' => Pages\CreatePerguntas::route('/create'),
            'view' => Pages\ViewPerguntas::route('/{record}'),
            'edit' => Pages\EditPerguntas::route('/{record}/edit'),
        ];
    }    
}
