<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $aluno_cursos = $this->CursosDoAluno();

        $cursos = Curso::all()->where('categoria', '=', 'itq');
        $usuario = Auth::user();
        $primeiros = Curso::all()
            ->where('id', '<', 7);

        $segundos = Curso::all()
            ->where('categoria', 'itq')
            ->where('id', '>', 6)
            ->where('id', '<', 13);

        $terceiros = Curso::all()
            ->where('categoria', 'itq')
            ->where('id', '>', 12)
            ->where('id', '<', 19);
        $data = [
            'titulo' => 'ITQ EAD',
            'subtitulo' => 'Instituto Teológico Quadrangular EAD',
            'cursos' => $cursos,
            'primeiros' => $primeiros,
            'segundos' => $segundos,
            'terceiros' => $terceiros,
            'usuario' => $usuario,
            'aluno_cursos' => $aluno_cursos,
        ];
        // dd($data);
        return view('itq.painel', $data);
    }

    public function cursos()
    {
        $aluno_cursos = $this->CursosDoAluno();

        $data = [
            'titulo' => 'Módulos do ITQ',
            'subtitulo' => 'Módulos do ITQ EAD',
            'aluno_cursos' => $aluno_cursos,
        ];

        return view('home.cursos', $data);
    }

    public function usuarios_online(Request $request)
    {
        $data_atual = date('Y-m-d H:i:s');

        $qtd_usr_on = DB::table('log_acessos')
            ->where('created_at', '>=', $data_atual)
            ->count();

        $retorno = ['status' => true, 'qtd_usuarios' => $qtd_usr_on];

        return response()->json($retorno);
    }


    private function CursosDoAluno()
    {
        $usuario_id = Auth::user()->id;
        $query = "SELECT * FROM aluno_cursos
              JOIN cursos ON aluno_cursos.curso_id = cursos.id
              WHERE aluno_cursos.aluno_id = ?";
        $cursos = DB::select($query, [$usuario_id]);

        return $cursos;
    }
}
