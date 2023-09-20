<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cursos = [
            [
                // ID: 1
                'nome' => 'ITQ 1º Ano - Módulo 01',
                'descricao' => 'Módulo 01 do 1º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 260.00,
                'ativo' => true,
                'categoria' => 'itq',
                'codigo' => 'A1M1',
            ],
            [
                // ID: 2
                'nome' => 'ITQ 1º Ano - Módulo 02',
                'descricao' => 'Módulo 02 do 1º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A1M2',
            ],
            [
                // ID: 3
                'nome' => 'ITQ 1º Ano - Módulo 03',
                'descricao' => 'Módulo 03 do 1º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A1M3',
            ],
            [
                // ID: 4
                'nome' => 'ITQ 1º Ano - Módulo 04',
                'descricao' => 'Módulo 04 do 1º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A1M4',
            ],
            [
                // ID: 5
                'nome' => 'ITQ 1º Ano - Módulo 05',
                'descricao' => 'Módulo 05 do 1º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A1M5',
            ],
            [
                // ID: 6
                'nome' => 'ITQ 1º Ano - Módulo 06',
                'descricao' => 'Módulo 06 do 1º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A1M6',
            ],
            [
                // ID: 7
                'nome' => 'ITQ 2º Ano - Módulo 01',
                'descricao' => 'Módulo 01 do 2º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 260.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A2M1',
            ],
            [
                // ID: 8
                'nome' => 'ITQ 2º Ano - Módulo 02',
                'descricao' => 'Módulo 02 do 2º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A2M2',
            ],
            [
                // ID: 9
                'nome' => 'ITQ 2º Ano - Módulo 03',
                'descricao' => 'Módulo 03 do 2º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A2M3',
            ],
            [
                // ID: 10
                'nome' => 'ITQ 2º Ano - Módulo 04',
                'descricao' => 'Módulo 04 do 2º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A2M4',
            ],
            [
                // ID: 11
                'nome' => 'ITQ 2º Ano - Módulo 05',
                'descricao' => 'Módulo 05 do 2º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A2M5',
            ],
            [
                // ID: 12
                'nome' => 'ITQ 2º Ano - Módulo 06',
                'descricao' => 'Módulo 06 do 2º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A2M6',
            ],
            [
                // ID: 13
                'nome' => 'ITQ 3º Ano - Módulo 01',
                'descricao' => 'Módulo 01 do 3º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 260.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A3M1',
            ],
            [
                // ID: 14
                'nome' => 'ITQ 3º Ano - Módulo 02',
                'descricao' => 'Módulo 02 do 3º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A3M2',
            ],
            [
                // ID: 15
                'nome' => 'ITQ 3º Ano - Módulo 03',
                'descricao' => 'Módulo 03 do 3º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A3M3',
            ],
            [
                // ID: 16
                'nome' => 'ITQ 3º Ano - Módulo 04',
                'descricao' => 'Módulo 04 do 3º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A3M4',
            ],
            [
                // ID: 17
                'nome' => 'ITQ 3º Ano - Módulo 05',
                'descricao' => 'Módulo 05 do 3º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A3M5',
            ],
            [
                // ID: 18
                'nome' => 'ITQ 3º Ano - Módulo 06',
                'descricao' => 'Módulo 06 do 3º ano do Instituto Teológico Quadrangular EAD',
                'valor' => 220.00, // 1
                'ativo' => true, // 1
                'categoria' => 'itq',
                'codigo' => 'A3M6',
            ],
            [
                // ID: 19
                'nome' => 'Curso de Postulantes - 2023',
                'descricao' => 'Curso preparatório para postulantes ao ingresso ou progressão ministerial na Igreja do Evangelho Quadrangular.',
                'valor' => 150.00,
                'ativo' => false, // 0
                'categoria' => 'postulantes',
            ],
            [
                // ID: 20
                'nome' => 'Alinhando-se com o céu',
                'descricao' => 'Capacitação ministerial',
                'valor' => 50.00,
                'ativo' => false, // 0
                'categoria' => 'ministerial',
            ],
            [
                // ID: 21
                'nome' => 'Escola de servos',
                'descricao' => 'Capacitação ministerial',
                'valor' => 50.00,
                'ativo' => false, // 0
                'categoria' => 'ministerial',
            ],
        ];

        foreach ($cursos as $curso) {
            $curso = Curso::create($curso);
        }

        echo 'Cursos semeados com sucesso!';
    }
}
