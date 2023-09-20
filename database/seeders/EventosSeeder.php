<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $eventos = [
            [
                'title' => 'Capacitação de Diretores Pará',
                'description' => 'Evento de treinamento destinado a todos os diretores de ITQ´s, MQTI´s e Coordenadores de DEBQ do Pará',
                'place' => 'Hotel Riviera D´Amazônia',
                'address' => 'Rodovia Mário Covas...',
                'image' => 'storage/eventos/1.jpg',
                'color' => '#010fff;',
                'start' => '2023-01-06 18:00:00',
                'end' => '2023-01-08 12:00:00',
            ],
            [
                'title' => 'Início do Curso de Capacitação dos Postulantes',
                'description' => 'Início das aulas na plataforma do Curso de Postulantes',
                'place' => 'Plataforma SEEC',
                'address' => 'https://seecpa.app',
                'image' => 'storage/eventos/capa-postulantes.jpg',
                'color' => '#01012f;',
                'start' => '2023-03-20 20:00:00',
                'end' => '2023-06-26 22:00:00',
            ],
            [
                'title' => 'Entrevista Estadual',
                'description' => 'Encerramento da etapa de entrevistas dos postulantes que estáo participando do processo 2023',
                'place' => 'Secretarias Regionais',
                'address' => 'Secretarias Regionais',
                'image' => 'storage/eventos/2.jpg',
                'color' => '#0101ff;',
                'start' => '2023-04-17 00:00:00',
                'end' => '2023-04-17 00:30:00',
            ],
            [
                'title' => 'Prova ENAQ 2023',
                'description' => 'Realização do Exame Nacional Quadrangula (ENAQ)',
                'place' => 'Polos de Prova Regionais',
                'address' => 'Polos de Prova Regionais',
                'image' => 'storage/eventos/capa-postulantes.jpg',
                'color' => '#01019f;',
                'start' => '2023-08-26 14:00:00',
                'end' => '2023-08-26 18:00:00',
            ],
            [
                'title' => 'Divulgação dos resultados ENAQ 2023',
                'description' => 'Divulgação das notas e resultados do ENAQ 2023',
                'place' => 'Plataforma SEEC-PA',
                'address' => 'https://seecpa.app',
                'image' => 'storage/eventos/capa-postulantes.jpg',
                'color' => '#f5a425;',
                'start' => '2023-09-04 18:00:00',
                'end' => '2023-09-04 23:59:00',
            ],
            [
                'title' => 'Encerramento do Processo 2023',
                'description' => 'Finalização do processo referente aos postulantes 2023',
                'place' => 'CRM',
                'address' => 'CRM',
                'image' => 'storage/eventos/capa-ministerial.jpg',
                'color' => '#f5a000;',
                'start' => '2023-09-15 00:01:00',
                'end' => '2023-09-15 23:59:00',
            ],
            [
                'title' => 'IEQ-PA | 48ª Convenção Estadual',
                'description' => '48ª Convenção Estadual de Pastores da Igreja do Evangelho Quadrangular do Pará',
                'place' => 'IEQ Sede',
                'address' => 'Trav. Timbó, 1212, Pedreira, Belém-PA',
                'image' => 'storage/eventos/capa-postulantes.jpg',
                'color' => '#0f0ff0;',
                'start' => '2023-10-17 00:00:00',
                'end' => '2023-06-20 0:00:00',
            ],
        ];

        foreach ($eventos as $evento) {
            $evento = Evento::create($evento);
        }

        echo 'Eventos cadastrados com sucesso!';
    }
}
