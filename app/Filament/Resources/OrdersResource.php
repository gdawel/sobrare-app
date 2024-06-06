<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Orders;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrdersResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrdersResource\RelationManagers;

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
                            ->relationship('user' , 'name')
                            ->columnSpan(3),
                        Select::make('paymentMethod')
                        ->options([
                            'stripe' => 'Stripe',
                            'pix' => 'Pix',
                            'dinheiro' => 'Dinheiro',
                            'link' => 'Link Pgto'
                        ])
                        ->required(),
                        Select::make('paymentStatus')
                        ->options([
                            'pendente' => 'Pendente',
                            'pago' => 'Pago',
                            'falhou' => 'Falhou'
                        ])
                        ->default('pendente')
                        ->required(),
                        ToggleButtons::make('orderStatus')
                        ->options([
                            'novo' => 'Novo',
                            'pendente' => 'Pendente',
                            'concluido' => 'Concluído',
                            'cancelado' => 'Cancelado'
                        ]),
                            
                    ])
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrders::route('/create'),
            'view' => Pages\ViewOrders::route('/{record}'),
            'edit' => Pages\EditOrders::route('/{record}/edit'),
        ];
    }    
}
