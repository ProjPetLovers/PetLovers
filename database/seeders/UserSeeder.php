<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'Alice Silva', 'email' => 'alice.silva@example.com', 'password' => 'senha1'],
            ['name' => 'Bob Santos', 'email' => 'bob.santos@example.com', 'password' => 'senha2'],
            ['name' => 'Carol Souza', 'email' => 'carol.souza@example.com', 'password' => 'senha3'],
            ['name' => 'David Oliveira', 'email' => 'david.oliveira@example.com', 'password' => 'senha4'],
            ['name' => 'Eva Costa', 'email' => 'eva.costa@example.com', 'password' => 'senha5'],
            ['name' => 'Felipe Lima', 'email' => 'felipe.lima@example.com', 'password' => 'senha6'],
            ['name' => 'Gabriela Rocha', 'email' => 'gabriela.rocha@example.com', 'password' => 'senha7'],
            ['name' => 'Henrique Dias', 'email' => 'henrique.dias@example.com', 'password' => 'senha8'],
            ['name' => 'Isabela Melo', 'email' => 'isabela.melo@example.com', 'password' => 'senha9'],
            ['name' => 'João Pereira', 'email' => 'joao.pereira@example.com', 'password' => 'senha10'],
            ['name' => 'Karina Alves', 'email' => 'karina.alves@example.com', 'password' => 'senha11'],
            ['name' => 'Lucas Ferreira', 'email' => 'lucas.ferreira@example.com', 'password' => 'senha12'],
            ['name' => 'Mariana Gomes', 'email' => 'mariana.gomes@example.com', 'password' => 'senha13'],
            ['name' => 'Nicolas Matos', 'email' => 'nicolas.matos@example.com', 'password' => 'senha14'],
            ['name' => 'Olivia Ramos', 'email' => 'olivia.ramos@example.com', 'password' => 'senha15'],
            ['name' => 'Pedro Martins', 'email' => 'pedro.martins@example.com', 'password' => 'senha16'],
            ['name' => 'Daniela Cardoso', 'email' => 'daniela.cardoso@example.com', 'password' => 'senha17'],
            ['name' => 'Rafael Araujo', 'email' => 'rafael.araujo@example.com', 'password' => 'senha18'],
            ['name' => 'Sabrina Pinto', 'email' => 'sabrina.pinto@example.com', 'password' => 'senha19'],
            ['name' => 'Thiago Correia', 'email' => 'thiago.correia@example.com', 'password' => 'senha20'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
}
