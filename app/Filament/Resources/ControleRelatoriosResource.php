<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ControleRelatoriosResource\Pages;
use App\Models\ControleRelatorios; // Garanta que o namespace do seu modelo está correto
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class ControleRelatoriosResource extends Resource
{
    protected static ?string $model = ControleRelatorios::class;
    
    // Nome para aparecer na navegação
    protected static ?string $navigationLabel = 'Controle de Relatórios'; 
    protected static ?string $modelLabel = 'Relatório';
    protected static ?string $pluralModelLabel = 'Relatórios';

    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';

    /**
     * Define o formulário para edição.
     * Apenas o status poderá ser alterado.
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->options([
                        'pendente' => 'Pendente',
                        'gerando' => 'Gerando',
                        'completo' => 'Completo',
                        'falha' => 'Falha',
                    ])
                    ->required(),
                
                // Campos de visualização (não editáveis)
                Forms\Components\TextInput::make('user.name')
                    ->label('Cliente')
                    ->disabled(),
                
                Forms\Components\TextInput::make('testes.nomeTeste')
                    ->label('Teste')
                    ->disabled(),

                Forms\Components\Placeholder::make('created_at')
                    ->label('Criado em')
                    ->content(fn ($record): ?string => $record?->created_at?->format('d/m/Y H:i')),
            ]);
    }

    /**
     * Define a tabela de listagem.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('Cliente')->searchable(),
                Tables\Columns\TextColumn::make('testes.nomeTeste')->label('Teste')->searchable(),
                
                // CORREÇÃO: Usar BadgeColumn para que as cores funcionem
                Tables\Columns\TextColumn::make('status')
                    ->colors([
                        'primary' => 'gerando',
                        'warning' => 'pendente',
                        'success' => 'completo',
                        'danger' => 'falha',
                    ]),
                
                Tables\Columns\TextColumn::make('created_at')->dateTime('d/m/Y H:i')->label('Criado em'),
            ])
            ->filters([
                //
            ])
            ->actions([
                /* Tables\Actions\EditAction::make(), */ // Permite a edição (abre o formulário acima)
                //Tables\Actions\ViewAction::make(), // Opcional, o EditAction já permite ver os dados
                
                // CORREÇÃO: Ação de download corrigida
                Action::make('download')
                    ->label('Baixar PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->url(fn (ControleRelatorios $record): ?string => route('reports.download', $record))
                    ->openUrlInNewTab()
                    // A condição deve bater com o valor no banco ('completo')
                    ->visible(fn (ControleRelatorios $record): bool => $record->status === 'completo' && !empty($record->file_path)),
            ])
            ->bulkActions([
                // Ação de exclusão em massa foi removida
            ]);
    }

    /**
     * Impede que novos registros sejam criados pela interface do Filament.
     */
    public static function canCreate(): bool
    {
        return false;
    }

    /**
     * Impede que registros sejam deletados pela interface do Filament.
     */
    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return false;
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
            'index' => Pages\ListControleRelatorios::route('/'),
            // 'create' => Pages\CreateControleRelatorios::route('/create'), // Rota de criação removida
            'edit' => Pages\EditControleRelatorios::route('/{record}/edit'),
        ];
    }
}