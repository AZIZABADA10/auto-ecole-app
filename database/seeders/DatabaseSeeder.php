<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roleAdmin = \App\Models\Role::create(['name' => 'admin']);
        $roleAssistante = \App\Models\Role::create(['name' => 'assistante']);
        $roleCandidat = \App\Models\Role::create(['name' => 'candidat']);
        $roleMoniteur = \App\Models\Role::create(['name' => 'moniteur']);

        User::create([
            'name' => 'Administrateur',
            'email' => 'admin@auto-ecole.com',
            'password' => bcrypt('password'),
            'role_id' => $roleAdmin->id,
            'is_active' => true,
        ]);
        
        $assistante = User::create([
            'name' => 'Assistante',
            'email' => 'assistante@auto-ecole.com',
            'password' => bcrypt('password'),
            'role_id' => $roleAssistante->id,
            'is_active' => true,
        ]);

        $prof = User::create([
            'name' => 'Moniteur Ahmed',
            'email' => 'moniteur@auto-ecole.com',
            'password' => bcrypt('password'),
            'role_id' => $roleMoniteur->id,
            'is_active' => true,
        ]);
        
        \App\Models\Moniteur::create(['user_id' => $prof->id, 'specialite' => 'Permis B']);

        $eleve = User::create([
            'name' => 'Élève Test',
            'email' => 'eleve@auto-ecole.com',
            'password' => bcrypt('password'),
            'role_id' => $roleCandidat->id,
            'is_active' => true,
        ]);
        
        \App\Models\Candidat::create(['user_id' => $eleve->id]);

        $this->call([
            FormationSeeder::class,
        ]);
    }
}
