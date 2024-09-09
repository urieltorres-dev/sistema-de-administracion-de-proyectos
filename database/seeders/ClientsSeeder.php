<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'name' => 'ClientOne',
            'lastname' => 'LastNameOne',
            'email' => 'clientone@example.com',
            'phone' => '1111111111',
            'company' => 'ClientCorp',
        ]);

        Client::create([
            'name' => 'ClientTwo',
            'lastname' => 'LastNameTwo',
            'email' => 'clienttwo@example.com',
            'phone' => '2222222222',
            'company' => 'ClientEnterprise',
        ]);

        Client::create([
            'name' => 'ClientThree',
            'lastname' => 'LastNameThree',
            'email' => 'clientthree@example.com',
            'phone' => '3333333333',
            'company' => 'GlobalClient',
        ]);

        Client::create([
            'name' => 'ClientFour',
            'lastname' => 'LastNameFour',
            'email' => 'clientfour@example.com',
            'phone' => '4444444444',
            'company' => 'ClientSolutions',
        ]);

        Client::create([
            'name' => 'ClientFive',
            'lastname' => 'LastNameFive',
            'email' => 'clientfive@example.com',
            'phone' => '5555555555',
            'company' => 'ClientInnovators',
        ]);

        Client::create([
            'name' => 'ClientSix',
            'lastname' => 'LastNameSix',
            'email' => 'clientsix@example.com',
            'phone' => '6666666666',
            'company' => 'EnterpriseGroup',
        ]);

        Client::create([
            'name' => 'ClientSeven',
            'lastname' => 'LastNameSeven',
            'email' => 'clientseven@example.com',
            'phone' => '7777777777',
            'company' => 'NextGenClients',
        ]);
    }
}
