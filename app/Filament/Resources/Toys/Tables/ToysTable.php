<?php

namespace App\Filament\Resources\Toys\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ToysTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()

            ->columns([

                TextColumn::make('name')
                    ->label('🧸 Juguete')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon('heroicon-m-gift')
                    ->color('primary')
                    ->description('Nombre del juguete')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label('🎯 Tipo')
                    ->badge()
                    ->weight(FontWeight::Bold)
                    ->icon(fn ($state) => match ($state) {
                        'mordedores' => 'heroicon-m-face-smile',
                        'pelotas_y_lanzamiento' => 'heroicon-m-globe-alt',
                        'interactivos' => 'heroicon-m-puzzle-piece',
                        'peluches' => 'heroicon-m-heart',
                        'cuerdas' => 'heroicon-m-link',
                        'sonoros' => 'heroicon-m-speaker-wave',
                        'juguetes_para_gatos' => 'heroicon-m-heart',
                        'entrenamiento_y_ejercicio' => 'heroicon-m-bolt',
                        'acuaticos' => 'heroicon-m-sparkles',
                        'dispensadores_de_premios' => 'heroicon-m-cake',
                        'persecucion_y_caza' => 'heroicon-m-eye',
                        'tuneles_y_escondites' => 'heroicon-m-home',
                        'rascadores_y_accesorios_de_juego' => 'heroicon-m-hand-raised',
                        'juguetes_para_aves' => 'heroicon-m-academic-cap',
                        'juguetes_para_roedores' => 'heroicon-m-heart',
                        'juguetes_para_mascotas_pequenas' => 'heroicon-m-heart',
                        'juguetes_electronicos' => 'heroicon-m-cpu-chip',
                        'juguetes_dentales' => 'heroicon-m-face-smile',
                        'juguetes_para_cachorros' => 'heroicon-m-sparkles',
                        'juguetes_para_mascotas_senior' => 'heroicon-m-heart',
                        'otros' => 'heroicon-m-gift',
                        default => 'heroicon-m-gift',
                    })
                    ->color(fn ($state) => match ($state) {
                        'mordedores' => 'danger',
                        'pelotas_y_lanzamiento' => 'success',
                        'interactivos' => 'info',
                        'peluches' => 'primary',
                        'cuerdas' => 'warning',
                        'sonoros' => 'info',
                        'juguetes_para_gatos' => 'primary',
                        'entrenamiento_y_ejercicio' => 'success',
                        'acuaticos' => 'info',
                        'dispensadores_de_premios' => 'warning',
                        'persecucion_y_caza' => 'danger',
                        'tuneles_y_escondites' => 'gray',
                        'rascadores_y_accesorios_de_juego' => 'primary',
                        'juguetes_para_aves' => 'success',
                        'juguetes_para_roedores' => 'warning',
                        'juguetes_para_mascotas_pequenas' => 'primary',
                        'juguetes_electronicos' => 'info',
                        'juguetes_dentales' => 'danger',
                        'juguetes_para_cachorros' => 'success',
                        'juguetes_para_mascotas_senior' => 'gray',
                        'otros' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'mordedores' => 'Mordedores',
                        'pelotas_y_lanzamiento' => 'Pelotas y Lanzamiento',
                        'interactivos' => 'Interactivos',
                        'peluches' => 'Peluches',
                        'cuerdas' => 'Cuerdas',
                        'sonoros' => 'Sonoros',
                        'juguetes_para_gatos' => 'Juguetes para Gatos',
                        'entrenamiento_y_ejercicio' => 'Entrenamiento y Ejercicio',
                        'acuaticos' => 'Acuáticos',
                        'dispensadores_de_premios' => 'Dispensadores de Premios',
                        'persecucion_y_caza' => 'Persecución y Caza',
                        'tuneles_y_escondites' => 'Túneles y Escondites',
                        'rascadores_y_accesorios_de_juego' => 'Rascadores y Accesorios de Juego',
                        'juguetes_para_aves' => 'Juguetes para Aves',
                        'juguetes_para_roedores' => 'Juguetes para Roedores',
                        'juguetes_para_mascotas_pequenas' => 'Juguetes para Mascotas Pequeñas',
                        'juguetes_electronicos' => 'Juguetes Electrónicos',
                        'juguetes_dentales' => 'Juguetes Dentales',
                        'juguetes_para_cachorros' => 'Juguetes para Cachorros',
                        'juguetes_para_mascotas_senior' => 'Juguetes para Mascotas Senior',
                        'otros' => 'Otros Juguetes para Mascotas',
                        default => $state ?? 'Sin tipo',
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('➕ Creado')
                    ->icon('heroicon-m-plus-circle')
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(
                        fn ($state) => Carbon::parse($state)->diffForHumans()
                    )
                    ->tooltip(
                        fn ($record) => Carbon::parse($record->created_at)->format('d/m/Y H:i')
                    )
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('🔄 Actualizado')
                    ->icon('heroicon-m-arrow-path')
                    ->badge()
                    ->color('warning')
                    ->formatStateUsing(
                        fn ($state) => Carbon::parse($state->updated_at)->format('d/m/Y H:i')
                    )
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([])

            ->recordActions([
                ViewAction::make()
                    ->label('')
                    ->icon('heroicon-m-eye')
                    ->color('info')
                    ->tooltip('Ver juguete'),

                EditAction::make()
                    ->label('')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->tooltip('Editar juguete'),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateIcon('heroicon-o-gift')
            ->emptyStateHeading('No hay juguetes registrados')
            ->emptyStateDescription(
                'Cuando registres un juguete aparecerá aquí.'
            )

            ->paginated([10, 25, 50]);
    }
}

