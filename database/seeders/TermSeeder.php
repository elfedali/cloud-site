<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceTerms = [
            'Surplace',
            'Livraison',
            'Emporter',
        ];

        $kitchenTermFr = [
            'Marocain',
            'Italien',
            'Chinois',
            'Indien',
            'Thailandais',
            'Mexicain',
            'Français',
            'Espagnol',
            'Portugais',
            'Allemand',
            'Anglais',
            'Américain',
            'Libanais',
            'Turc',
            'Grec',
            'Vietnamien',
            'Coréen',
            'Brésilien',
            'Argentin',
            'Africain',
            'Méditerranéen',
            'Fusion',
            'Végétarien',
            'Végan',


            'Café',



        ];
        foreach ($serviceTerms as $term) {
            \App\Models\Term::factory()->create([
                'name' => $term,
                'type' => \App\Models\Term::TYPE_SERVICE,
            ]);
        }
    }
}
