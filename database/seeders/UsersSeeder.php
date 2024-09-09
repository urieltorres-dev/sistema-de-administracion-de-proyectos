<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
            'phone' => '1234567890',
            'job' => 'Project Manager',
            'company' => 'TechCorp',
            'profilephoto' => null,
            'usertype' => 'admin'
        ]);

        // Collaborators
        User::create([
            'name' => 'Jane',
            'lastname' => 'Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password123'),
            'phone' => '0987654321',
            'job' => 'Developer',
            'company' => 'DevStudio',
            'profilephoto' => null,
            'usertype' => 'collaborator'
        ]);

        User::create([
            'name' => 'Mike',
            'lastname' => 'Johnson',
            'email' => 'mike@example.com',
            'password' => Hash::make('password123'),
            'phone' => '1112223333',
            'job' => 'Designer',
            'company' => 'CreativeWorks',
            'profilephoto' => null,
            'usertype' => 'collaborator'
        ]);

        User::create([
            'name' => 'Emily',
            'lastname' => 'Brown',
            'email' => 'emily@example.com',
            'password' => Hash::make('password123'),
            'phone' => '4445556666',
            'job' => 'Tester',
            'company' => 'QualityCheck',
            'profilephoto' => null,
            'usertype' => 'collaborator'
        ]);

        User::create([
            'name' => 'Chris',
            'lastname' => 'Williams',
            'email' => 'chris@example.com',
            'password' => Hash::make('password123'),
            'phone' => '7778889999',
            'job' => 'DevOps',
            'company' => 'CloudSolutions',
            'profilephoto' => null,
            'usertype' => 'collaborator'
        ]);

        User::create([
            'name' => 'Sarah',
            'lastname' => 'Miller',
            'email' => 'sarah@example.com',
            'password' => Hash::make('password123'),
            'phone' => '1010101010',
            'job' => 'Support',
            'company' => 'HelpDesk',
            'profilephoto' => null,
            'usertype' => 'collaborator'
        ]);
    }
}
