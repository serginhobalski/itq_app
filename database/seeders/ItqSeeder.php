<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [

            [
                'name' => 'ÁGATA SOARES',
                'username' => 'agatatxsoares',
                'email' => 'agatatxsoares@gmail.com',
                'password' => 'AlunoItq#2214',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ALONSO SILVA DE MORAIS',
                'username' => 'silvaalonso955',
                'email' => 'silvaalonso955@gmail.com',
                'password' => 'AlunoItq#2215',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ANA ADÉLIA DE CASTRO FARIAS PINTO',
                'username' => 'adeliafariaspinto68',
                'email' => 'adeliafariaspinto68@gmail.com',
                'password' => 'AlunoItq#2216',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ANA PAULA DE OLIVEIRA MACHADO',
                'username' => 'anapaulamachado13',
                'email' => 'anapaulamachado13@gmail.com',
                'password' => 'AlunoItq#2217',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ANTONIO FABRICIO CARNEIRO DA SILVA',
                'username' => 'studiomegavox',
                'email' => 'studiomegavox@gmail.com',
                'password' => 'AlunoItq#2218',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ANTONIO LUIS VIEIRA DE ALMEIDA',
                'username' => 'a.l.vpessoal',
                'email' => 'a.l.vpessoal@gmail.com',
                'password' => 'AlunoItq#2219',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ANTONIO PEDRO FERREIRA DA CONCEICAO',
                'username' => 'apedrofconceicao',
                'email' => 'apedrofconceicao@gmail.com',
                'password' => 'AlunoItq#2220',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ATTILIO DE FREITAS ANTONINI',
                'username' => 'attilioantonini29',
                'email' => 'attilioantonini29@hotmail.com',
                'password' => 'AlunoItq#2221',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'BEATRIZ DIAS GONÇALVES ',
                'username' => 'goncalvesbeatrizdias',
                'email' => 'goncalvesbeatrizdias@gmail.com',
                'password' => 'AlunoItq#2222',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'BENEDITO JUNIOR COSTA TAVARES',
                'username' => '4junior3',
                'email' => '4junior3@gmail.com',
                'password' => 'AlunoItq#2223',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'CARLOS ALEXANDRE DA SILVA GONÇALVES ',
                'username' => 'c.alexandreg86',
                'email' => 'c.alexandreg86@gmail.com',
                'password' => 'AlunoItq#2224',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'CAROLINE INGRID DE MIRANDA MELO',
                'username' => 'carolinemelo3',
                'email' => 'carolinemelo3@outlook.com',
                'password' => 'AlunoItq#2225',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'CASSIA FERNANDA LIMA DO CARMO',
                'username' => 'cassiaealexdocarmo250115',
                'email' => 'cassiaealexdocarmo250115@gmail.com',
                'password' => 'AlunoItq#2226',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'CICERO CARVALHO ROMAO',
                'username' => 'romaocicero561',
                'email' => 'romaocicero561@gmail.com',
                'password' => 'AlunoItq#2227',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'CID TADEO SILVA DOS REIS',
                'username' => 'cidtadeu123',
                'email' => 'cidtadeu123@gmail.com',
                'password' => 'AlunoItq#2228',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'CLARICE DOS ANJOS DE SOUSA MONTEIRO',
                'username' => 'clarice.monteiro1968',
                'email' => 'clarice.monteiro1968@yahoo.com',
                'password' => 'AlunoItq#2229',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'DARLAN ERIBELTO DE JESUS PIMENTEL',
                'username' => 'darlanpimentel722',
                'email' => 'darlanpimentel722@gmail.com',
                'password' => 'AlunoItq#2230',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'DELMA SANDOLI PEREIRA DO LAGO',
                'username' => 'delmasandoli6130',
                'email' => 'delmasandoli6130@gmail.com',
                'password' => 'AlunoItq#2231',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'DIEIGUE RODRIGUES DOS SANTOS',
                'username' => 'rodriguesdieigue',
                'email' => 'rodriguesdieigue@gmail.com',
                'password' => 'AlunoItq#2232',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'DUCIRENE DE MELO SILVA',
                'username' => 'ducemelodilva',
                'email' => 'ducemelodilva@gmail.com',
                'password' => 'AlunoItq#2233',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'EDINETE DE SOUSA COSTA',
                'username' => 'pastoraedinetedesousa',
                'email' => 'pastoraedinetedesousa@gmail.com',
                'password' => 'AlunoItq#2234',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ELIANA TEIXEIRA DANTAS',
                'username' => 'elianateixeiradantas78',
                'email' => 'elianateixeiradantas78@gmail.com',
                'password' => 'AlunoItq#2235',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ELITON MAICON CARMO SILVA',
                'username' => 'glaucimcs1990',
                'email' => 'glaucimcs1990@gmail.com',
                'password' => 'AlunoItq#2236',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ELIZONETE FERREIRA DOS SANTOS FARIAS',
                'username' => 'elizonete89',
                'email' => 'elizonete89@gmail.com',
                'password' => 'AlunoItq#2237',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'FRANCISCO EDER PEREIRA AMARAL',
                'username' => 'eder121130',
                'email' => 'eder121130@gmail.com',
                'password' => 'AlunoItq#2238',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'GECIONY SILVA MOTA ',
                'username' => 'gecyonymota',
                'email' => 'gecyonymota@gmail.com',
                'password' => 'AlunoItq#2239',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'GILSON GALVAO DE SOUSA',
                'username' => 'gilsonsukoi',
                'email' => 'gilsonsukoi@gmail.com',
                'password' => 'AlunoItq#2240',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'GISELE SILVA DE ALMEIDA',
                'username' => 'gisellealmeidagsa',
                'email' => 'gisellealmeidagsa@gmail.com',
                'password' => 'AlunoItq#2241',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ILDENE DOS SANTOS PRATES',
                'username' => 'ildeneprates',
                'email' => 'ildeneprates@hotmail.com',
                'password' => 'AlunoItq#2242',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ILDIS SUELY DE OLIVEIRA SETUBAL',
                'username' => 'setubalildis',
                'email' => 'setubalildis@gmail.com',
                'password' => 'AlunoItq#2243',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'IRALICE PORTUGUES DE SOUZA',
                'username' => 'iraliceportugue',
                'email' => 'iraliceportugue@gmail.com',
                'password' => 'AlunoItq#2244',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'JANAINA FERNANDA DE MELLO FERREIRA',
                'username' => 'fernandaferreirajpdmc',
                'email' => 'fernandaferreirajpdmc@gmail.com',
                'password' => 'AlunoItq#2245',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'JANIELE DA CONCEICAO FIGUEREDO BRAGA CABRAL',
                'username' => 'nielybraga1988',
                'email' => 'nielybraga1988@gmail.com',
                'password' => 'AlunoItq#2246',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'JEFFERSON MONTEIRO SOUZA',
                'username' => 'jeffersouza22',
                'email' => 'jeffersouza22@hotmail.com',
                'password' => 'AlunoItq#2247',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'JERRY ADRIANO ARAÚJO DOS SANTOS',
                'username' => 'jerryadrianogospel',
                'email' => 'jerryadrianogospel@gmail.com',
                'password' => 'AlunoItq#2248',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'JOÃO JERFFESSON FERREIRA DE OLIVEIRA',
                'username' => 'ojerffesson',
                'email' => 'ojerffesson@gmail.com',
                'password' => 'AlunoItq#2249',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'JONH SANTOS SILVA',
                'username' => 'jonhmaraba',
                'email' => 'jonhmaraba@gmail.com',
                'password' => 'AlunoItq#2250',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'JOSÉ DOMINGOS DE CARVALHO MACHADO FILHO',
                'username' => 'franciscamariarm654',
                'email' => 'franciscamariarm654@gmail.com',
                'password' => 'AlunoItq#2251',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'JOSÉ VINICIUS DOS SANTOS ',
                'username' => 'viniciusantos6',
                'email' => 'viniciusantos6@hotmail.com',
                'password' => 'AlunoItq#2252',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'JUAN FERREIRA SALES DA SILVA',
                'username' => 'juansales41',
                'email' => 'juansales41@gmail.com',
                'password' => 'AlunoItq#2253',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'LANA CRISTINA DA COSTA CORREA',
                'username' => 'lanacristinadacostacorrea',
                'email' => 'lanacristinadacostacorrea@gmail.com',
                'password' => 'AlunoItq#2254',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'LEANDRO EUSTAQUIO VIEIRA BAETA',
                'username' => 'leandro.baeta@yahoo',
                'email' => 'leandro.baeta@yahoo.com.br',
                'password' => 'AlunoItq#2255',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'LEONEL FERREIRA DA SILVA JUNIOR',
                'username' => 'leonelfsjr',
                'email' => 'leonelfsjr@gmail.com',
                'password' => 'AlunoItq#2256',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'LINDALVA DE ALMEIDA SILVA',
                'username' => 'lindalva.5619',
                'email' => 'lindalva.5619@gmail.com',
                'password' => 'AlunoItq#2257',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'MARCIA BORGES BUENO',
                'username' => 'pastoramarciabueno17',
                'email' => 'pastoramarciabueno17@gmail.com',
                'password' => 'AlunoItq#2258',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'MARIA ALDEIDE DE ANDRADE SOUSA',
                'username' => 'aaldeide76',
                'email' => 'aaldeide76@gmail.com',
                'password' => 'AlunoItq#2259',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'MARIA FRANCISCA LOPES CANTANHEDE ',
                'username' => 'franciscalopes1981',
                'email' => 'franciscalopes1981@gmail.com',
                'password' => 'AlunoItq#2260',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'MARIA JOSE MORAES DIAS',
                'username' => 'mzezapoetiza',
                'email' => 'mzezapoetiza@gmail.com',
                'password' => 'AlunoItq#2261',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'MARIA NATÁLIA SERRA PEREIRA ',
                'username' => 'nathyserra51',
                'email' => 'nathyserra51@gmail.com',
                'password' => 'AlunoItq#2262',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'MARIA SOLANGE DE OLIVEIRA SANTOS',
                'username' => 'sol.maria8824',
                'email' => 'sol.maria8824@gmail.com',
                'password' => 'AlunoItq#2263',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'MICHELE GOMES PINTO RESENDE BAÊTA',
                'username' => 'micheli.resende@yahoo',
                'email' => 'micheli.resende@yahoo.com.br',
                'password' => 'AlunoItq#2264',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'NEY JACKSON PINHEIRO DE SOUZA',
                'username' => 'njp_74',
                'email' => 'njp_74@hotmail.com',
                'password' => 'AlunoItq#2265',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'NILSON CARVALHO BOTELHO',
                'username' => 'nilsoncarvalhoupa',
                'email' => 'nilsoncarvalhoupa@gmail.com',
                'password' => 'AlunoItq#2266',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'PAULO DE SOUSA SANTOS',
                'username' => 'paulosantosrs982',
                'email' => 'paulosantosrs982@gmail.com',
                'password' => 'AlunoItq#2267',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'RICARDO LUIZ LOPES',
                'username' => 'ricocruzlopes',
                'email' => 'ricocruzlopes@gmail.com',
                'password' => 'AlunoItq#2268',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ROSA MARIA FREITAS FROZ',
                'username' => 'rozangelafreitas11975',
                'email' => 'rozangelafreitas11975@gmail.com',
                'password' => 'AlunoItq#2269',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ROSANA BRAGA DE SOUZA',
                'username' => 'rosana.owzadia',
                'email' => 'rosana.owzadia@hotmail.com',
                'password' => 'AlunoItq#2270',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'ROSÉLIA COSTA SOARES',
                'username' => 'rosecs.20',
                'email' => 'rosecs.20@hotmail.com',
                'password' => 'AlunoItq#2271',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'STEPHANIE GABRIELA MOUTINHO PEREIRA',
                'username' => 'stephaniemgpereira',
                'email' => 'stephaniemgpereira@icloud.com',
                'password' => 'AlunoItq#2272',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'SUÉLEN ROSA FURTADO',
                'username' => 'assistentesocialsuelenrosa',
                'email' => 'assistentesocialsuelenrosa@gmail.com',
                'password' => 'AlunoItq#2273',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'VALÉRIA FARIAS BAIA MIRANDA',
                'username' => 'mirandaval.2019',
                'email' => 'mirandaval.2019@gmail.com',
                'password' => 'AlunoItq#2274',
                'group' => 'aluno_itq',
            ],
            [
                'name' => 'VILSON SILVA DA MATA',
                'username' => 'psiquevilsondamata',
                'email' => 'psiquevilsondamata@gmail.com',
                'password' => 'AlunoItq#2275',
                'group' => 'aluno_itq',
            ]

        ];

        foreach ($usuarios as $user) {
            $user = User::create($user);

            $user_id = $user->id;

            $attr = [
                'user_id' => $user_id,
                'grupo_id' => 4,
            ];
            DB::table('usuario_grupos')->insert($attr);
        }

        echo 'Alunos do ITQ cadastrados com sucesso!';
    }
}
