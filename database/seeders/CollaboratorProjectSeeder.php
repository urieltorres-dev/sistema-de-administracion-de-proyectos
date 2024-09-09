<?php

namespace Database\Seeders;

use App\Models\CollaboratorProject;
use Illuminate\Database\Seeder;

class CollaboratorProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collaborators = [2, 3, 4, 5, 6]; // IDs de los colaboradores

        // Recorremos los proyectos (ID 1 al 6) para asignarles entre 2 y 4 colaboradores
        foreach (range(1, 6) as $projectId) {
            // Seleccionamos entre 2 y 4 colaboradores de forma aleatoria
            $selectedCollaborators = collect($collaborators)->random(rand(2, 4));

            foreach ($selectedCollaborators as $collaboratorId) {
                CollaboratorProject::create([
                    'collaborator_id' => $collaboratorId, // ID del colaborador
                    'project_id' => $projectId, // ID del proyecto
                    'payment' => rand(800, 1500), // Pago aleatorio entre 800 y 1500
                ]);
            }
        }
    }
}
