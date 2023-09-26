<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\SiteConfiguration;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiteConfigurationResource\Pages;
use App\Filament\Resources\SiteConfigurationResource\RelationManagers;

class SiteConfigurationResource extends Resource
{
    protected static ?string $model = SiteConfiguration::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Configuração do Site';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Dados Principais do Site')
                    ->description('Informações básicas para compor a página principal do Site')
                    ->collapsible()
                    ->schema(
                        [
                            Forms\Components\TextInput::make('tituloSite')
                                ->label('Título do Site')
                                ->columnSpanFull()
                                ->maxLength(250),
                            Forms\Components\FileUpload::make('logoClaro')
                                ->nullable()
                                ->label('Logo para Design Claro'),
                            Forms\Components\FileUpload::make('logoEscuro')
                                ->nullable()
                                ->label('Logo para Design Escuro'),

                            Forms\Components\TextInput::make('cta1Titulo')
                                ->label('Título para o CTA 1 - Abaixo do Cabeçalho')
                                ->required()
                                ->maxLength(200)
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('cta1TextoBase')
                                ->label('Texto para o Call to Action')
                                ->required()
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('cta1TextoBotao')
                                ->label('Texto para o botão CTA 1')
                                ->required()
                                ->maxLength(25),
                            Forms\Components\TextInput::make('cta1TextoExtra')
                                ->label('Texto Adicional para o CTA 1')
                                ->required()
                                ->maxLength(200),

                        ]
                    ),

                Section::make('Ordem das Sessões na Página Principal')
                    ->collapsible()
                    ->schema(
                        [
                            Forms\Components\Select::make('sessionPosition1')
                                ->label('Selecione qual sessão carregar na posição 1')
                                ->required()
                                ->options([
                                    'sobre' => 'Sobre',
                                    'servicos' => 'Serviços',
                                    'depoimentos' => 'Depoimentos',
                                    'artigos-recentes' => 'Artigos',
                                    'cta2' => 'Call to Action 2',
                                ])
                                ->default('cta2')
                                ->columnSpanFull(),
                            Forms\Components\Select::make('sessionPosition2')
                                ->label('Selecione qual sessão carregar na posição 2')
                                ->required()
                                ->options([
                                    'sobre' => 'Sobre',
                                    'servicos' => 'Serviços',
                                    'depoimentos' => 'Depoimentos',
                                    'artigos-recentes' => 'Artigos',
                                    'cta2' => 'Call to Action 2',
                                ])
                                ->default('sobre')
                                ->columnSpanFull(),
                            Forms\Components\Select::make('sessionPosition3')
                                ->label('Selecione qual sessão carregar na posição 3')
                                ->required()
                                ->options([
                                    'sobre' => 'Sobre',
                                    'servicos' => 'Serviços',
                                    'depoimentos' => 'Depoimentos',
                                    'artigos-recentes' => 'Artigos',
                                    'cta2' => 'Call to Action 2',
                                ])
                                ->default('servicos')
                                ->columnSpanFull(),
                            Forms\Components\Select::make('sessionPosition4')
                                ->label('Selecione qual sessão carregar na posição 4')
                                ->required()
                                ->options([
                                    'sobre' => 'Sobre',
                                    'servicos' => 'Serviços',
                                    'depoimentos' => 'Depoimentos',
                                    'artigos-recentes' => 'Artigos',
                                    'cta2' => 'Call to Action 2',
                                ])
                                ->default('depoimentos')
                                ->columnSpanFull(),
                            Forms\Components\Select::make('sessionPosition5')
                                ->label('Selecione qual sessão carregar na posição 5')
                                ->required()
                                ->options([
                                    'sobre' => 'Sobre',
                                    'servicos' => 'Serviços',
                                    'depoimentos' => 'Depoimentos',
                                    'artigos-recentes' => 'Artigos',
                                    'cta2' => 'Call to Action 2',
                                ])
                                ->default('artigos')
                                ->columnSpanFull(),
                        ]
                    ),

                Section::make('Informações para o CTA 2 - Curso, E-book ou outro')
                    ->collapsible()
                    ->schema(
                        [
                            Forms\Components\TextInput::make('cta2Titulo1')
                                ->label('Título para o Call To Action 2')
                                ->required()
                                ->maxLength(200)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('cta2Titulo2')
                                ->label('Título CTA2 - Segunda Linha')
                                ->required()
                                ->maxLength(200)
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('cta2TextoBase')
                                ->label('Texto para o Call to Action 2')
                                ->required()
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('cta2TextoBotao')
                                ->label('Texto para o botão CTA 2')
                                ->required()
                                ->maxLength(25),
                            Forms\Components\TextInput::make('cta2LinkBotao')
                                ->label('Link Video ou Página o CTA 2')
                                ->required()
                                ->maxLength(200),

                        ]
                    ),

                Section::make('Página Principal - Informações para a seção SOBRE')
                    ->collapsible()
                    ->schema(
                        [
                            Forms\Components\TextInput::make('aboutChamada')
                                ->label('Chamada da seção Sobre - em geral, uma pergunta')
                                ->required()
                                ->maxLength(200)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('aboutTitulo')
                                ->label('Título da Seção Sobre')
                                ->required()
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('aboutResumo')
                                ->label('Texto a seção Sobre')
                                ->required(),
                            Forms\Components\TextInput::make('aboutTextoBotao')
                                ->label('Texto para o Botão da seção Sobre')
                                ->required()
                                ->maxLength(25),
                            Forms\Components\TextInput::make('aboutLinkBotao')
                                ->label('Link Video ou Página a seção Sobre')
                                ->required()
                                ->maxLength(200),

                        ]
                    ),

                Section::make('Página Principal - Informações para a seção SERVIÇOS')
                    ->collapsible()
                    ->schema(
                        [
                            Forms\Components\TextInput::make('servicosTitulo')
                                ->label('Título da seção Serviços')
                                ->required()
                                ->maxLength(250)
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('servicosResumo')
                                ->label('Texto para a seção Serviços')
                                ->required(),
                        ]
                    ),

                Section::make('Página Principal - Informações para a seção DEPOIMENTOS')
                    ->collapsible()
                    ->schema(
                        [
                            Forms\Components\TextInput::make('depoimentosTitulo')
                                ->label('Título da seção Depoimentos')
                                ->required()
                                ->maxLength(250)
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('depoimentosResumo')
                                ->label('Texto para a seção Depoimentos')
                                ->required(),
                        ]
                    ),

                Section::make('Página Principal - Informações para a seção ARTIGOS')
                    ->collapsible()
                    ->schema(
                        [
                            Forms\Components\TextInput::make('blogHomeTitulo')
                                ->label('Título da seção Artigos')
                                ->required()
                                ->maxLength(250)
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('blogHomeResumo')
                                ->label('Texto para a seção Artigos')
                                ->required(),
                        ]
                    ),

                Section::make('Página Principal - Informações para a seção CONTATOS')
                    ->collapsible()
                    ->schema(
                        [
                            Forms\Components\TextInput::make('contatoTitulo')
                                ->label('Título da seção Contatos')
                                ->required()
                                ->maxLength(250)
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('contatoResumo')
                                ->label('Texto para a seção Contatos')
                                ->required(),
                        ]
                    ),


                Section::make('Página Principal - Informações para a seção CONTATOS')
                    ->collapsible()
                    ->schema(
                        [
                            Forms\Components\TextInput::make('rodapeEmailTitulo')
                                ->label('Rodapé: título sobre o campo e-mail')
                                ->maxLength(30),
                            Forms\Components\TextInput::make('rodapeEmailTexto')
                                ->label('Rodapé: informe o e-mail que aparece sob o título')
                                ->maxLength(60),



                            Forms\Components\TextInput::make('rodapeLocalTitulo')
                                ->label('Título para o Endereço')
                                ->maxLength(30)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('rodapeLocalEndereco1')
                                ->label('Linha 1 para Endereço')
                                ->maxLength(60)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('rodapeLocalEndereco2')
                                ->label('Linha 2 para Endereço')
                                ->maxLength(60)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('rodapeLocalEndereco3')
                                ->label('Linha 3 para Endereço, ou deixar em branco')
                                ->maxLength(60)
                                ->columnSpanFull(),

                            Forms\Components\TextInput::make('rodapeTelefoneTitulo')
                                ->label('Título para a Informação de Telefone')
                                ->maxLength(30),
                            Forms\Components\TextInput::make('rodapeTelefoneTexto')
                                ->label('Informe o Telefone de Contato')
                                ->maxLength(60),
                            Forms\Components\TextInput::make('rodapeOutrosTitulo')
                                ->label('Título para a Informação Adicional')
                                ->maxLength(30),
                            Forms\Components\TextInput::make('rodapeOutrosTexto')
                                ->label('Entre com as Informações Adicionais - CNPJ...')
                                ->maxLength(60),
                            Forms\Components\TextInput::make('rodapeMediasTitulo')
                                ->label('Título para as Mídias Sociais')
                                ->maxLength(30),
                            Forms\Components\RichEditor::make('rodapeTextoBase')
                                ->required()
                                ->label('Texto Base para o Rodapé'),

                        ]
                    )

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tituloSite')
                    ->label('Título do Site')
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
            'index' => Pages\ListSiteConfigurations::route('/'),
            'create' => Pages\CreateSiteConfiguration::route('/create'),
            'edit' => Pages\EditSiteConfiguration::route('/{record}/edit'),
        ];
    }
}
