<?php

namespace App\Http\Controllers;

use App\Models\AlunoCurso;
use App\Models\Atividade;
use App\Models\Aula;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Nota;
use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('acesso');
        $this->middleware('itq');
    }

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

    public function cursos_aluno()
    {
        $cursos = $this->CursosDoAluno();

        $data = [
            'titulo' => 'Módulos do ITQ',
            'subtitulo' => 'Módulos do ITQ EAD',
            'cursos' => $cursos,
        ];

        return view('itq.cursos', $data);
    }

    public function curso($id)
    {
        $curso = Curso::find($id);
        $disciplinas = Disciplina::all()->where('curso_id', '=', $id);
        $aluno_cursos = $this->CursosDoAluno();
        $data = [
            'titulo' => $curso->nome,
            'subtitulo' => $curso->descricao,
            'curso' => $curso,
            'disciplinas' => $disciplinas,
            'aluno_cursos' => $aluno_cursos,
        ];
        return view('itq.curso', $data);
    }

    public function disciplina($id)
    {
        $disciplina = Disciplina::find($id);
        // $disciplina_id = $disciplina->id;
        $curso_id = $disciplina->curso_id;
        $curso = Curso::find($curso_id);
        $aulas = Aula::all()->where('disciplina_id', '=', $id);
        $pdfs = Pdf::all()->where('disciplina_id', '=', $id);
        $atividades = Atividade::all()->where('disciplina_id', '=', $id);
        $aluno_cursos = $this->CursosDoAluno();


        $data = [
            'titulo' => $disciplina->nome,
            'subtitulo' => 'Disciplina do módulo ' . $disciplina->modulo,
            'disciplina' => $disciplina,
            'aluno_cursos' => $aluno_cursos,
            'curso' => $curso,
            'aulas' => $aulas,
            'pdfs' => $pdfs,
            'atividades' => $atividades,
        ];
        // dd($data);
        return view('itq.disciplina', $data);
    }

    public function notas()
    {
        $aluno_cursos = $this->CursosDoAluno();

        $user_id = Auth::id();

        $notas = Nota::where('user_id', $user_id)->orderBy('disciplina_id', 'asc')->get();


        $data = [
            'titulo' => 'Minhas Notas',
            'subtitulo' => 'Notas de ' . Auth::user()->name,
            'aluno_cursos' => $aluno_cursos,
            'notas' => $notas,
        ];
        // dd($data);
        return view('itq.notas', $data);
    }

    public function perfil()
    {
        $aluno_cursos = $this->CursosDoAluno();
        $user_id = Auth::user()->id;
        $notas = Nota::where('user_id', $user_id)->orderBy('disciplina_id', 'asc')->get();


        $data = [
            'titulo' => 'Meu Perfil',
            'subtitulo' => 'Perfil de ' . Auth::user()->name,
            'aluno_cursos' => $aluno_cursos,
            'notas' => $notas,
        ];
        // dd($data);
        return view('itq.perfil', $data);
    }

    public function resultados_enaq()
    {
        $aluno_cursos = $this->CursosDoAluno();
        $data = [
            'titulo' => 'Resultados do ENAQ',
            'subtitulo' => 'Fique por dentro dos resultados do ENAQ!',
            'aluno_cursos' => $aluno_cursos,
        ];

        return view('itq/resultados_enaq', $data);
    }

    //=======================================
    // Private functions | Funções privadas
    //=======================================
    /**
     * Find user courses | Busca os curso do usuário logado
     *
     * @return void
     */
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
