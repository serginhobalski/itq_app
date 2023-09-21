<?php

namespace Database\Seeders;

use App\Models\Disciplina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $disciplinas = [
            [
                // ID: 1
                'curso_id' => 1,
                'nome' => 'Vivência Cristã',
                'descricao' => 'Disciplina do Módulo 1 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M1',
                'modulo' => 'Módulo 01 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 2
                'curso_id' => 1,
                'nome' => 'Bibliologia',
                'descricao' => 'Disciplina do Módulo 1 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M1',
                'modulo' => 'Módulo 01 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 3
                'curso_id' => 1,
                'nome' => 'Metodologia do Trabalho Acadêmico',
                'descricao' => 'Disciplina do Módulo 1 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M1',
                'modulo' => 'Módulo 01 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 4
                'curso_id' => 2,
                'nome' => 'Introdução à Teologia',
                'descricao' => 'Disciplina do Módulo 2 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M2',
                'modulo' => 'Módulo 02 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 5
                'curso_id' => 2,
                'nome' => 'Dons e Ministérios',
                'descricao' => 'Disciplina do Módulo 2 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M2',
                'modulo' => 'Módulo 02 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 6
                'curso_id' => 2,
                'nome' => 'Pastoral Urbana',
                'descricao' => 'Disciplina do Módulo 2 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M2',
                'modulo' => 'Módulo 02 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 7
                'curso_id' => 3,
                'nome' => 'Vida de Cristo e Espiritualidade',
                'descricao' => 'Disciplina do Módulo 3 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M3',
                'modulo' => 'Módulo 03 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 8
                'curso_id' => 3,
                'nome' => 'Evangelho Quadrangular',
                'descricao' => 'Disciplina do Módulo 3 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M3',
                'modulo' => 'Módulo 03 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 9
                'curso_id' => 3,
                'nome' => 'Cidadania',
                'descricao' => 'Disciplina do Módulo 3 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M3',
                'modulo' => 'Módulo 03 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 10
                'curso_id' => 4,
                'nome' => 'Disciplulado',
                'descricao' => 'Disciplina do Módulo 4 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M4',
                'modulo' => 'Módulo 04 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 11
                'curso_id' => 4,
                'nome' => 'Evangelismo',
                'descricao' => 'Disciplina do Módulo 4 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M4',
                'modulo' => 'Módulo 04 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 12
                'curso_id' => 4,
                'nome' => 'Introdução à Educação Cristã',
                'descricao' => 'Disciplina do Módulo 4 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M4',
                'modulo' => 'Módulo 04 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 13
                'curso_id' => 4,
                'nome' => 'Hermenêutica',
                'descricao' => 'Disciplina do Módulo 4 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M4',
                'modulo' => 'Módulo 04 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 14
                'curso_id' => 5,
                'nome' => 'Administração Eclesiástica',
                'descricao' => 'Disciplina do Módulo 5 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M5',
                'modulo' => 'Módulo 05 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 15
                'curso_id' => 5,
                'nome' => 'Aconselhamento e Orientação Familiar',
                'descricao' => 'Disciplina do Módulo 5 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M5',
                'modulo' => 'Módulo 05 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 16
                'curso_id' => 5,
                'nome' => 'Métodos de Estudo Bíblico',
                'descricao' => 'Disciplina do Módulo 5 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M5',
                'modulo' => 'Módulo 05 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 17
                'curso_id' => 5,
                'nome' => 'Teologia do Culto',
                'descricao' => 'Disciplina do Módulo 5 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M5',
                'modulo' => 'Módulo 05 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 18
                'curso_id' => 6,
                'nome' => 'Liderança 1 - Gestão Pessoal',
                'descricao' => 'Disciplina do Módulo 6 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M6',
                'modulo' => 'Módulo 06 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 19
                'curso_id' => 6,
                'nome' => 'Teologia Pastoral',
                'descricao' => 'Disciplina do Módulo 6 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M6',
                'modulo' => 'Módulo 06 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 20
                'curso_id' => 6,
                'nome' => 'Homilética',
                'descricao' => 'Disciplina do Módulo 6 do 1º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A1M6',
                'modulo' => 'Módulo 06 | 1º Ano',
                'ch' => '36',
            ],
            [
                // ID: 21
                'curso_id' => 7,
                'nome' => 'Cultura Bíblica',
                'descricao' => 'Disciplina do Módulo 1 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M1',
                'modulo' => 'Módulo 01 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 22
                'curso_id' => 7,
                'nome' => 'Pentateuco (parte 1)',
                'descricao' => 'Disciplina do Módulo 1 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M1',
                'modulo' => 'Módulo 01 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 23
                'curso_id' => 7,
                'nome' => 'Teologia do Antigo Testamento',
                'descricao' => 'Disciplina do Módulo 1 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M1',
                'modulo' => 'Módulo 01 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 24
                'curso_id' => 8,
                'nome' => 'Teologia do Novo Testamento',
                'descricao' => 'Disciplina do Módulo 2 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M2',
                'modulo' => 'Módulo 02 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 25
                'curso_id' => 8,
                'nome' => 'Hebreus',
                'descricao' => 'Disciplina do Módulo 2 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M2',
                'modulo' => 'Módulo 02 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 26
                'curso_id' => 8,
                'nome' => 'Pentateuco (parte 2)',
                'descricao' => 'Disciplina do Módulo 2 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M2',
                'modulo' => 'Módulo 02 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 27
                'curso_id' => 9,
                'nome' => 'Evangelhos (parte 1)',
                'descricao' => 'Disciplina do Módulo 3 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M3',
                'modulo' => 'Módulo 03 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 28
                'curso_id' => 9,
                'nome' => 'Atos dos Apóstolos',
                'descricao' => 'Disciplina do Módulo 3 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M3',
                'modulo' => 'Módulo 03 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 29
                'curso_id' => 9,
                'nome' => 'História de Israel (parte 1)',
                'descricao' => 'Disciplina do Módulo 3 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M3',
                'modulo' => 'Módulo 03 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 30
                'curso_id' => 10,
                'nome' => 'História de Israel (parte 2)',
                'descricao' => 'Disciplina do Módulo 4 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M4',
                'modulo' => 'Módulo 04 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 31
                'curso_id' => 10,
                'nome' => 'Evangelhos (parte 2)',
                'descricao' => 'Disciplina do Módulo 4 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M4',
                'modulo' => 'Módulo 04 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 32
                'curso_id' => 10,
                'nome' => 'Epístolas Paulinas (parte 1)',
                'descricao' => 'Disciplina do Módulo 4 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M4',
                'modulo' => 'Módulo 04 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 33
                'curso_id' => 11,
                'nome' => 'História de Israel (parte 3)',
                'descricao' => 'Disciplina do Módulo 5 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M5',
                'modulo' => 'Módulo 05 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 34
                'curso_id' => 11,
                'nome' => 'Epístolas Paulinas (parte 2)',
                'descricao' => 'Disciplina do Módulo 5 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M5',
                'modulo' => 'Módulo 05 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 35
                'curso_id' => 11,
                'nome' => 'Epístolas Gerais',
                'descricao' => 'Disciplina do Módulo 5 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M5',
                'modulo' => 'Módulo 05 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 36
                'curso_id' => 12,
                'nome' => 'Livros Poéticos',
                'descricao' => 'Disciplina do Módulo 6 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M6',
                'modulo' => 'Módulo 06 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 37
                'curso_id' => 12,
                'nome' => 'Missão Integral da Igreja',
                'descricao' => 'Disciplina do Módulo 6 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M6',
                'modulo' => 'Módulo 06 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 38
                'curso_id' => 12,
                'nome' => 'Teologia Sistemática I',
                'descricao' => 'Disciplina do Módulo 6 do 2º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A2M6',
                'modulo' => 'Módulo 06 | 2º Ano',
                'ch' => '36',
            ],
            [
                // ID: 39
                'curso_id' => 13,
                'nome' => 'TCC - Trabalho de Conclusão de Curso',
                'descricao' => 'Disciplina do Módulo 1 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M1',
                'modulo' => 'Módulo 01 | 3º Ano',
                'ch' => '72',
            ],
            [
                // ID: 40
                'curso_id' => 13,
                'nome' => 'Estágio Supervisionado',
                'descricao' => 'Disciplina do Módulo 1 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M1',
                'modulo' => 'Módulo 01 | 3º Ano',
                'ch' => '60',
            ],
            [
                // ID: 41
                'curso_id' => 13,
                'nome' => 'Teologia Sistemática II (parte 1)',
                'descricao' => 'Disciplina do Módulo 1 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M1',
                'modulo' => 'Módulo 01 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 42
                'curso_id' => 14,
                'nome' => 'Teologia Sistemática II (parte 2)',
                'descricao' => 'Disciplina do Módulo 2 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M2',
                'modulo' => 'Módulo 02 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 43
                'curso_id' => 14,
                'nome' => 'História da Igreja (parte 1)',
                'descricao' => 'Disciplina do Módulo 2 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M2',
                'modulo' => 'Módulo 02 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 44
                'curso_id' => 14,
                'nome' => 'Aconselhamento Pastoral',
                'descricao' => 'Disciplina do Módulo 2 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M2',
                'modulo' => 'Módulo 02 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 45
                'curso_id' => 15,
                'nome' => 'Escatologia Bíblica (parte 1)',
                'descricao' => 'Disciplina do Módulo 3 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M3',
                'modulo' => 'Módulo 03 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 46
                'curso_id' => 15,
                'nome' => 'Teologia Sistemática III (parte 1)',
                'descricao' => 'Disciplina do Módulo 3 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M3',
                'modulo' => 'Módulo 03 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 47
                'curso_id' => 15,
                'nome' => 'História da Igreja (parte 2)',
                'descricao' => 'Disciplina do Módulo 3 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M3',
                'modulo' => 'Módulo 03 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 48
                'curso_id' => 16,
                'nome' => 'Teologia Sistemática III (parte 2)',
                'descricao' => 'Disciplina do Módulo 4 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M4',
                'modulo' => 'Módulo 04 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 49
                'curso_id' => 16,
                'nome' => 'Escatologia Bíblica (parte 2)',
                'descricao' => 'Disciplina do Módulo 4 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M4',
                'modulo' => 'Módulo 04 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 50
                'curso_id' => 16,
                'nome' => 'Liderança II - Gestão Ministerial',
                'descricao' => 'Disciplina do Módulo 4 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M4',
                'modulo' => 'Módulo 04 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 51
                'curso_id' => 17,
                'nome' => 'Introdução à Missiologia',
                'descricao' => 'Disciplina do Módulo 5 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M5',
                'modulo' => 'Módulo 05 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 52
                'curso_id' => 17,
                'nome' => 'Movimentos Religiosos Contemporâneos',
                'descricao' => 'Disciplina do Módulo 5 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M5',
                'modulo' => 'Módulo 05 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 53
                'curso_id' => 17,
                'nome' => 'Liderança 3',
                'descricao' => 'Disciplina do Módulo 5 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M5',
                'modulo' => 'Módulo 05 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 54
                'curso_id' => 18,
                'nome' => 'Comunicação Social',
                'descricao' => 'Disciplina do Módulo 6 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M6',
                'modulo' => 'Módulo 06 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 55
                'curso_id' => 18,
                'nome' => 'Teologia Contemporânea',
                'descricao' => 'Disciplina do Módulo 6 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M6',
                'modulo' => 'Módulo 06 | 3º Ano',
                'ch' => '36',
            ],
            [    // ID: 56
                'curso_id' => 18,
                'nome' => 'Ética Cristã',
                'descricao' => 'Disciplina do Módulo 6 do 3º ano do Instituto Teológico Quadrangular EAD',
                'codigo' => 'A3M6',
                'modulo' => 'Módulo 06 | 3º Ano',
                'ch' => '36',
            ],
            [
                // ID: 57
                'curso_id' => 19,
                'nome' => 'Introdução Geral',
                'descricao' => 'Disciplina integrante do Curso de Postulantes',
            ],
            [
                // ID: 58
                'curso_id' => 19,
                'nome' => 'Doutrinas Bíblicas',
                'descricao' => 'Disciplina integrante do Curso de Postulantes',
            ],
            [
                // ID: 59
                'curso_id' => 19,
                'nome' => 'Declaração de Fé',
                'descricao' => 'Disciplina integrante do Curso de Postulantes',
            ],
            [
                // ID: 60
                'curso_id' => 19,
                'nome' => 'Evangelho Quadrangular',
                'descricao' => 'Disciplina integrante do Curso de Postulantes',
            ],
            [
                // ID: 61
                'curso_id' => 19,
                'nome' => 'Panorama Bíblico',
                'descricao' => 'Disciplina integrante do Curso de Postulantes',
            ],
            [
                // ID: 62
                'curso_id' => 19,
                'nome' => 'Ética e Cidadania',
                'descricao' => 'Disciplina integrante do Curso de Postulantes',
            ],
            [
                // ID: 63
                'curso_id' => 19,
                'nome' => 'Administração da Igreja',
                'descricao' => 'Disciplina integrante do Curso de Postulantes',
            ],
            [
                // ID: 64
                'curso_id' => 19,
                'nome' => 'Células e Plantação de Igrejas',
                'descricao' => 'Disciplina integrante do Curso de Postulantes',
            ],
            [
                // ID: 65
                'curso_id' => 19,
                'nome' => 'Atualidades',
                'descricao' => 'Disciplina integrante do Curso de Postulantes',
            ],
            [
                // ID: 66
                'curso_id' => 19,
                'nome' => 'Leitura Obrigatória e Redação',
                'descricao' => 'Disciplina integrante do Curso de Postulantes',
            ],
        ];

        foreach ($disciplinas as $disciplina) {
            $disciplina = Disciplina::create($disciplina);
        }

        echo 'Disciplinas cadastradas com sucesso!';
    }
}
