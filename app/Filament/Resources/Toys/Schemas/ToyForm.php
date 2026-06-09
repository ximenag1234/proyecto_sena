<?php

namespace App\Filament\Resources\Toys\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class ToyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),
                Select::make('type')
    ->label('Tipo')
    ->options([
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
    ])
    ->searchable()
    ->required(),
                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
            ]);
    }
}
