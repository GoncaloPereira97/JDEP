<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlunosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('user')->insert([
        //     [
        //         'email' => 'email1@email.com',
        //         'password' => password_hash('email1@email.com', PASSWORD_DEFAULT),
        //         'primeiroNome' => 'Nome1',
        //         'ultimoNome' => 'Apelido1',
        //         'genero' => 'Feminino',
        //         'freguesia_id' => 1,
        //         'created_at' => now()
        //     ],
        //     [
        //         'email' => 'email2@email.com',
        //         'password' => password_hash('email2@email.com', PASSWORD_DEFAULT),
        //         'primeiroNome' => 'Nome2',
        //         'ultimoNome' => 'Apelido2',
        //         'genero' => 'Masculino',
        //         'freguesia_id' => 1,
        //         'created_at' => now()
        //     ],
        //     [
        //         'email' => 'email3@email.com',
        //         'password' => password_hash('email3@email.com', PASSWORD_DEFAULT),
        //         'primeiroNome' => 'Nome3',
        //         'ultimoNome' => 'Apelido3',
        //         'genero' => 'Feminino',
        //         'freguesia_id' => 1,
        //         'created_at' => now()
        //     ],
        // ]);
    }
}
