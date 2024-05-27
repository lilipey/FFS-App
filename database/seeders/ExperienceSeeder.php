<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Experience;


class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Exemple de données pour les rapports de spéléologies
        experiences = [
            // ...
            [
                'email' => 'john@example.com',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'site_name' => 'Caverna de São Tomé',
                'title' => 'Exploration of Caverna de São Tomé',
                'place' => 'Brazil',
                'date' => '2023-07-15',
                'distance' => 500, 
                'description' => 'Lors de cette exploration passionnante de la Caverna de São Tomé, nous avons rencontré un défi majeur : une partie de la grotte était inondée et nous avons dû utiliser des équipements de plongée pour continuer.',
                'image' => 'https://placehold.co/400',
                'activity'=>'spéléologie',
                'last_modif' => '',
                'published_at' => '2023-07-20 12:00:00',
            ],
            [
                'email' => 'jane@example.com',
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'site_name' => 'Mammoth Cave',
                'title' => 'Survey of Mammoth Cave System',
                'place' => 'United States',
                'date' => '2023-09-20',
                'distance' => 1000, 
                'description' => 'Lors de notre enquête exhaustive du système de la Mammoth Cave, nous avons rencontré un problème : une section de la grotte s'était effondrée, bloquant l'accès à certaines parties. Nous avons dû trouver un autre chemin pour continuer notre enquête.',
                'image' => 'https://placehold.co/400',
                'activity'=>'spéléologie',
                'last_modif' => 'p1err0t',
                'published_at' => now(),
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
?>