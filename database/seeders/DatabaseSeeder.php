<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Grupo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $grupos = [
            ['grupo' => 'admin'], # ID: 1
            ['grupo' => 'uetp'], # ID: 2
            ['grupo' => 'aluno_itq'], # ID: 3
            ['grupo' => 'aluno_postulante'], # ID: 4
            ['grupo' => 'professor'], # ID: 5
            ['grupo' => 'secretario'], # ID: 6
            ['grupo' => 'visitante'], # ID: 7
        ];

        foreach ($grupos as $grupo) {
            Grupo::create($grupo);
        }

        $adm = User::create([
            'name' => 'Adm',
            'surname' => 'Geral',
            'username' => 'adm',
            'email' => 'adm@geral.com',
            'group' => 'adm',
            'password' => Hash::make('123456789'),
        ]);

        $user_id = $adm->id;

        $attr = [
            'user_id' => $user_id,
            'grupo_id' => 1,
        ];
        DB::table('usuario_grupos')->insert($attr);


        echo 'Grupos e usuário ADM criados com sucesso!';
    }
}
