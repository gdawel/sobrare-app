<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Artigo;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Categoria;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ArtigoResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArtigoResource\RelationManagers;
use Filament\Forms\FormsComponent;

class ArtigoResource extends Resource
{
    protected static ?string $model = Artigo::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Conteúdo do Blog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()

                    ->schema(
                        [
                            Grid::make(2)
                                ->schema([
                                    Forms\Components\TextInput::make('title')
                                        ->label('Título')
                                        ->required()
                                        ->maxLength(2048)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                    Forms\Components\TextInput::make('slug')
                                        ->required()
                                        ->maxLength(2048),
                                ]),


                            TinyEditor::make('body')
                                ->label('Conteúdo')
                                ->required()
                                ->columnSpanFull(),
                            Forms\Components\Toggle::make('active')
                                ->label('Ativo')
                                ->required(),
                            Forms\Components\DateTimePicker::make('published_at')
                                ->label('Publicado em'),
                            Forms\Components\Select::make('user_id')
                                ->label('Autor')
                                ->relationship('user', 'name')
                                ->required(),

                        ]
                    )->columnSpan(8),
                Section::make()
                    ->schema(
                        [
                            Forms\Components\FileUpload::make('thumbnail')
                                ->label('Imagem'),
                            Forms\Components\Select::make('categoria_id')
                                ->label('Categorias')
                                ->multiple()
                                ->relationship('categoria', 'title')    
                                ->options(Categoria::all()->pluck('title', 'id'))
                                
                                ->searchable()
                                ->required(),
                        ]
                    )->columnSpan(4)

            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Imagem'),
                Tables\Columns\IconColumn::make('active')
                    ->label('Artigo')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Publicado em')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Autor')
                    ->numeric()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListArtigos::route('/'),
            'create' => Pages\CreateArtigo::route('/create'),
            'view' => Pages\ViewArtigo::route('/{record}'),
            'edit' => Pages\EditArtigo::route('/{record}/edit'),
        ];
    }
}
