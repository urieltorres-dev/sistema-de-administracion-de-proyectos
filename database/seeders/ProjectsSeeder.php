<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorities = ['Alto', 'Medio', 'Bajo'];
        $statuses = ['Finalizado', 'En curso', 'Pendiente'];

        Project::create([
            'name' => 'Project Alpha',
            'client' => 1, // Client ID
            'start_date' => '2024-01-01',
            'end_date' => '2024-12-31',
            'price' => 50000.00,
            'priority' => $priorities[array_rand($priorities)],
            'admin' => 1, // Admin User ID
            'description' => 'This is the Alpha project description.',
            'status' => $statuses[array_rand($statuses)],
            'file' => rand(1, 10) . '.jpg',
        ]);

        Project::create([
            'name' => 'Project Beta',
            'client' => 2,
            'start_date' => '2024-05-01',
            'end_date' => '2024-11-30',
            'price' => 25000.00,
            'priority' => $priorities[array_rand($priorities)],
            'admin' => 1,
            'description' => 'This is the Beta project description.',
            'status' => $statuses[array_rand($statuses)],
            'file' => rand(1, 10) . '.jpg',
        ]);

        Project::create([
            'name' => 'Project Gamma',
            'client' => 3,
            'start_date' => '2024-02-01',
            'end_date' => '2024-09-30',
            'price' => 30000.00,
            'priority' => $priorities[array_rand($priorities)],
            'admin' => 2,
            'description' => 'This is the Gamma project description.',
            'status' => $statuses[array_rand($statuses)],
            'file' => rand(1, 10) . '.jpg',
        ]);

        Project::create([
            'name' => 'Project Delta',
            'client' => 4,
            'start_date' => '2024-03-15',
            'end_date' => '2024-08-15',
            'price' => 45000.00,
            'priority' => $priorities[array_rand($priorities)],
            'admin' => 2,
            'description' => 'This is the Delta project description.',
            'status' => $statuses[array_rand($statuses)],
            'file' => rand(1, 10) . '.jpg',
        ]);

        Project::create([
            'name' => 'Project Epsilon',
            'client' => 5,
            'start_date' => '2024-06-01',
            'end_date' => '2024-10-31',
            'price' => 20000.00,
            'priority' => $priorities[array_rand($priorities)],
            'admin' => 3,
            'description' => 'This is the Epsilon project description.',
            'status' => $statuses[array_rand($statuses)],
            'file' => rand(1, 10) . '.jpg',
        ]);

        Project::create([
            'name' => 'Project Zeta',
            'client' => 6,
            'start_date' => '2024-07-01',
            'end_date' => '2024-12-31',
            'price' => 60000.00,
            'priority' => $priorities[array_rand($priorities)],
            'admin' => 3,
            'description' => 'This is the Zeta project description.',
            'status' => $statuses[array_rand($statuses)],
            'file' => rand(1, 10) . '.jpg',
        ]);

        Project::create([
            'name' => 'Project Eta',
            'client' => 7,
            'start_date' => '2024-04-01',
            'end_date' => '2024-10-01',
            'price' => 35000.00,
            'priority' => $priorities[array_rand($priorities)],
            'admin' => 4,
            'description' => 'This is the Eta project description.',
            'status' => $statuses[array_rand($statuses)],
            'file' => rand(1, 10) . '.jpg',
        ]);
    }
}
