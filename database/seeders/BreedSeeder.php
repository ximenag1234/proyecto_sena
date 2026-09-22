<?php

namespace Database\Seeders;

use App\Models\Breed;
use Illuminate\Database\Seeder;

class BreedSeeder extends Seeder
{
    public function run(): void
    {
        $razas = [

            // =========================
            // PERROS
            // =========================

            [
                'name' => 'Labrador Retriever',
                'species' => 'perro',
                'size' => 'Grande',
                'description' => 'Perro familiar, cariñoso e inteligente.',
            ],
            [
                'name' => 'Pastor Alemán',
                'species' => 'perro',
                'size' => 'Grande',
                'description' => 'Perro inteligente, activo y protector.',
            ],
            [
                'name' => 'Golden Retriever',
                'species' => 'perro',
                'size' => 'Grande',
                'description' => 'Perro amigable, cariñoso y juguetón.',
            ],
            [
                'name' => 'Bulldog Francés',
                'species' => 'perro',
                'size' => 'Pequeño',
                'description' => 'Perro pequeño, sociable y tranquilo.',
            ],
            [
                'name' => 'Bulldog Inglés',
                'species' => 'perro',
                'size' => 'Mediano',
                'description' => 'Perro tranquilo y de carácter amigable.',
            ],
            [
                'name' => 'Beagle',
                'species' => 'perro',
                'size' => 'Mediano',
                'description' => 'Perro activo, curioso y sociable.',
            ],
            [
                'name' => 'Poodle',
                'species' => 'perro',
                'size' => 'Mediano',
                'description' => 'Perro inteligente y activo.',
            ],
            [
                'name' => 'Chihuahua',
                'species' => 'perro',
                'size' => 'Pequeño',
                'description' => 'Perro pequeño, activo y atento.',
            ],
            [
                'name' => 'Yorkshire Terrier',
                'species' => 'perro',
                'size' => 'Pequeño',
                'description' => 'Perro pequeño, activo y sociable.',
            ],
            [
                'name' => 'Rottweiler',
                'species' => 'perro',
                'size' => 'Grande',
                'description' => 'Perro fuerte, inteligente y protector.',
            ],
            [
                'name' => 'Dachshund',
                'species' => 'perro',
                'size' => 'Pequeño',
                'description' => 'Perro pequeño y activo.',
            ],
            [
                'name' => 'Husky Siberiano',
                'species' => 'perro',
                'size' => 'Grande',
                'description' => 'Perro activo y resistente.',
            ],
            [
                'name' => 'Shih Tzu',
                'species' => 'perro',
                'size' => 'Pequeño',
                'description' => 'Perro pequeño y de compañía.',
            ],
            [
                'name' => 'Pomerania',
                'species' => 'perro',
                'size' => 'Pequeño',
                'description' => 'Perro pequeño, activo y sociable.',
            ],
            [
                'name' => 'Mestizo',
                'species' => 'perro',
                'size' => 'Variado',
                'description' => 'Perro sin raza definida.',
            ],

            // =========================
            // GATOS
            // =========================

            [
                'name' => 'Persa',
                'species' => 'gato',
                'size' => 'Mediano',
                'description' => 'Gato de pelaje largo y abundante.',
            ],
            [
                'name' => 'Siamés',
                'species' => 'gato',
                'size' => 'Mediano',
                'description' => 'Gato activo, inteligente y sociable.',
            ],
            [
                'name' => 'Maine Coon',
                'species' => 'gato',
                'size' => 'Grande',
                'description' => 'Gato grande, tranquilo y sociable.',
            ],
            [
                'name' => 'Bengalí',
                'species' => 'gato',
                'size' => 'Mediano',
                'description' => 'Gato activo y juguetón.',
            ],
            [
                'name' => 'Ragdoll',
                'species' => 'gato',
                'size' => 'Grande',
                'description' => 'Gato tranquilo y cariñoso.',
            ],
            [
                'name' => 'British Shorthair',
                'species' => 'gato',
                'size' => 'Mediano',
                'description' => 'Gato tranquilo y de compañía.',
            ],
            [
                'name' => 'Esfinge',
                'species' => 'gato',
                'size' => 'Mediano',
                'description' => 'Gato de apariencia sin pelo.',
            ],
            [
                'name' => 'Angora',
                'species' => 'gato',
                'size' => 'Mediano',
                'description' => 'Gato de pelaje largo y sedoso.',
            ],
            [
                'name' => 'Azul Ruso',
                'species' => 'gato',
                'size' => 'Mediano',
                'description' => 'Gato tranquilo y elegante.',
            ],
            [
                'name' => 'Mestizo',
                'species' => 'gato',
                'size' => 'Variado',
                'description' => 'Gato sin raza definida.',
            ],

            // =========================
            // AVES
            // =========================

            [
                'name' => 'Canario',
                'species' => 'ave',
                'size' => 'Pequeño',
                'description' => 'Ave pequeña conocida por su canto.',
            ],
            [
                'name' => 'Periquito Australiano',
                'species' => 'ave',
                'size' => 'Pequeño',
                'description' => 'Ave pequeña y sociable.',
            ],
            [
                'name' => 'Cacatúa',
                'species' => 'ave',
                'size' => 'Mediano',
                'description' => 'Ave inteligente y sociable.',
            ],
            [
                'name' => 'Ninfa',
                'species' => 'ave',
                'size' => 'Mediano',
                'description' => 'Ave doméstica sociable y activa.',
            ],
            [
                'name' => 'Agapornis',
                'species' => 'ave',
                'size' => 'Pequeño',
                'description' => 'Ave pequeña y sociable.',
            ],
            [
                'name' => 'Guacamaya',
                'species' => 'ave',
                'size' => 'Grande',
                'description' => 'Ave grande de colores llamativos.',
            ],
            [
                'name' => 'Loro',
                'species' => 'ave',
                'size' => 'Mediano',
                'description' => 'Ave inteligente y sociable.',
            ],
            [
                'name' => 'Mestiza',
                'species' => 'ave',
                'size' => 'Variado',
                'description' => 'Ave sin raza definida.',
            ],

            // =========================
            // CONEJOS
            // =========================

            [
                'name' => 'Mini Lop',
                'species' => 'conejo',
                'size' => 'Pequeño',
                'description' => 'Conejo pequeño de orejas caídas.',
            ],
            [
                'name' => 'Rex',
                'species' => 'conejo',
                'size' => 'Mediano',
                'description' => 'Conejo de pelaje corto y suave.',
            ],
            [
                'name' => 'Cabeza de León',
                'species' => 'conejo',
                'size' => 'Pequeño',
                'description' => 'Conejo pequeño con abundante pelo alrededor de la cabeza.',
            ],
            [
                'name' => 'Holandés',
                'species' => 'conejo',
                'size' => 'Pequeño',
                'description' => 'Conejo pequeño de colores característicos.',
            ],
            [
                'name' => 'Gigante de Flandes',
                'species' => 'conejo',
                'size' => 'Grande',
                'description' => 'Conejo de gran tamaño.',
            ],
            [
                'name' => 'Angora',
                'species' => 'conejo',
                'size' => 'Mediano',
                'description' => 'Conejo de pelo largo.',
            ],

            // =========================
            // HÁMSTER
            // =========================

            [
                'name' => 'Hámster Sirio',
                'species' => 'hamster',
                'size' => 'Pequeño',
                'description' => 'Hámster doméstico de tamaño pequeño.',
            ],
            [
                'name' => 'Hámster Roborovski',
                'species' => 'hamster',
                'size' => 'Pequeño',
                'description' => 'Hámster muy pequeño y activo.',
            ],
            [
                'name' => 'Hámster Ruso',
                'species' => 'hamster',
                'size' => 'Pequeño',
                'description' => 'Hámster pequeño de compañía.',
            ],
            [
                'name' => 'Hámster Chino',
                'species' => 'hamster',
                'size' => 'Pequeño',
                'description' => 'Hámster pequeño y activo.',
            ],

            // =========================
            // OTRAS MASCOTAS
            // =========================

            [
                'name' => 'Otra raza',
                'species' => 'otro',
                'size' => 'Variado',
                'description' => 'Otra especie o raza de mascota.',
            ],
        ];

        foreach ($razas as $raza) {
            Breed::updateOrCreate(
                [
                    'name' => $raza['name'],
                    'species' => $raza['species'],
                ],
                $raza
            );
        }
    }
}