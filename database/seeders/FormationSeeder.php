<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formation;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formations = [
            [
                'nom' => 'Permis B',
                'description' => 'Conduite voiture classique.',
                'prix' => 3500,
                'image_path' => 'formations/permis-b.jpg',
                'duree_heures' => 20
            ],
            [
                'nom' => 'Permis C',
                'description' => 'Conduite de poids lourds et camions.',
                'prix' => 5000,
                'image_path' => 'formations/permis-c.jpg',
                'duree_heures' => 30
            ],
            [
                'nom' => 'Permis Moto',
                'description' => 'Conduite de deux-roues motorisés.',
                'prix' => 2800,
                'image_path' => 'formations/permis-moto.jpg',
                'duree_heures' => 15
            ]
        ];

        foreach ($formations as $formation) {
            Formation::updateOrCreate(
                ['nom' => $formation['nom']],
                $formation
            );
        }
    }
}
