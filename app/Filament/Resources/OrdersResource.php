<?php

namespace App\Filament\Resources;

use DateTime;
use Filament\Forms;
use Filament\Tables;
use App\Models\Orders;
use App\Models\Testes;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Number;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\OrdersResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrdersResource\RelationManagers;

use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;

class OrdersResource extends Resource
{
    protected static ?string $model = Orders::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    
    protected static ?string $navigationGroup = 'NeuroDiv - Vendas';
    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Pedidos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Informações do Pedido')->schema([
                        Select::make('user_id')
                            ->required()
                            ->label('Cliente')
                            ->searchable()
                            ->preload()
                            ->relationship('user' , 'name'),
                        DatePicker::make('orderDate')
                        ->label('Data do Pedido')
                        ->required(),
                
                        Select::make('paymentMethod')
                        ->label('Forma Pagto')
                        ->options([
                            'stripe' => 'Stripe',
                            'pix' => 'Pix',
                            'direto' => 'Direto',
                            'dinheiro' => 'Dinheiro',
                            'link' => 'Link Pgto'
                        ])
                        ->required(),
                        Select::make('paymentStatus')
                        ->label('Status Pagto')
                        ->options([
                            'pendente' => 'Pendente',
                            'pago' => 'Pago',
                            'falhou' => 'Falhou'
                        ])
                        ->default('pendente')
                        ->required(),
                        ToggleButtons::make('orderStatus')
                        ->label('Status Pedido')
                        ->default('novo')
                        ->inline()
                        ->required()
                        ->options([
                            'novo' => 'Novo',
                            'pendente' => 'Pendente',
                            'concluido' => 'Concluído',
                            'cancelado' => 'Cancelado'
                        ])
                        ->colors([
                            'novo' => 'info',
                            'pendente' => 'warning',
                            'concluido' => 'success',
                            'cancelado' => 'danger'
                        ])
                        ->icons([
                            'novo' => 'heroicon-m-sparkles',
                            'pendente' => 'heroicon-m-arrow-path',
                            'concluido' => 'heroicon-m-check-badge',
                            'cancelado' => 'heroicon-m-x-circle'
                        ])
                        ->columnSpanFull(),
                        Textarea::make('notes')
                        ->label('Notas do Pedido')
                        ->columnSpanFull(),
                            
                    ])->columns(2),

                    Section::make('Itens do Pedido')->schema([
                        Repeater::make('orderitem')
                            ->label('Itens')
                            ->relationship()
                            ->schema([
                                TextInput::make('id')
                                    ->label('N. Item')
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(1),
                                Select::make('testes_id')
                                    ->relationship('testes', 'nomeTeste')
                                    ->searchable()
                                    /* ->options(Testes::where('isActive', true)->get()) */
                                    ->preload()
                                    ->required()
                                    ->distinct()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, Set $set ) => $set('unitPrice', 
                                                        Testes::find($state)?->precoTeste ?? 0
                                                        ))
                                    ->afterStateUpdated(fn ($state, Set $set ) => $set('itemTotal', 
                                                        Testes::find($state)?->precoTeste ?? 0
                                                        ))
                                    ->columnSpan(8),
                                TextInput::make('unitPrice')
                                    ->label('Preço Unit.')
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(3),
                                Hidden::make('itemTotal'),
                                ToggleButtons::make('testeStatus')
                                    ->label('Sit. do Teste')
                                    ->default('novo')
                                    ->inline()
                                    ->required()
                                    ->options([
                                        'novo' => 'Novo',
                                        'iniciado' => 'Iniciado',
                                        'gerando' => 'Gerando',
                                        'concluido' => 'Concluído'
                                        
                                    ])
                                    ->colors([
                                        'novo' => 'info',
                                        'iniciado' => 'warning',
                                        'gerando' => 'warning',
                                        'concluido' => 'success'
                                        
                                    ])
                                    ->icons([
                                        'novo' => 'heroicon-m-sparkles',
                                        'iniciado' => 'heroicon-m-arrow-path',
                                        'gerando' => 'heroicon-m-arrow-path',
                                        'concluido' => 'heroicon-m-check-badge'
                                        
                                    ])
                                    ->columnSpanFull(),
                            ])->columns(12),
                        
                        Placeholder::make('total_geral_placeholder')
                                ->label('Total Geral do Pedido')
                                ->content(function (Get $get, Set $set) {   
                                    $total = 0;
                                    if(!$repeaters = $get('orderitem')) {
                                        return $total;
                                    }
                                    foreach ($repeaters as $key => $repeater) {
                                        $total += $get("orderitem.{$key}.itemTotal");
                                    }
                                    $set('grand_total', $total);
                                    return Number::currency($total, 'BRL');
                                    }),
                        Hidden::make('grand_total')
                                    ->default(0)

                    ])
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('N. Ped.')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('grand_total')
                    ->label('Total')
                    ->numeric()
                    ->searchable()
                    ->sortable()
                    ->money('BRL'),
                TextColumn::make('paymentMethod')
                    ->label('Forma Pagto')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('paymentStatus')
                    ->label('Sit.Pagto')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('orderStatus')
                    ->label('Sit.Pedido')
                    ->searchable()
                    ->sortable()
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrders::route('/create'),
            'view' => Pages\ViewOrders::route('/{record}'),
            'edit' => Pages\EditOrders::route('/{record}/edit'),
        ];
    }    
}
