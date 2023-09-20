<?php

namespace App\Http\Controllers;

use App\Models\AlunoCurso;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunoCursoController extends Controller
{

    public function index()
    {
        $data = [
            'titulo' => 'Alunos x Cursos',
            'subtitulo' => 'Alunos cadastrados em cursos',
        ];
        if (request()->ajax()) {
            $alunos_cursos = DB::table('users')
                ->join('aluno_cursos', 'users.id', '=', 'aluno_cursos.aluno_id')
                ->join('cursos', 'cursos.id', '=', 'aluno_cursos.curso_id')
                ->select('users.*', 'cursos.*', 'aluno_cursos.*')
                ->get();

            $data = [];

            foreach ($alunos_cursos as $aluno_curso) {
                $data[] = [
                    'id' => $aluno_curso->id,
                    'curso' => $aluno_curso->nome,
                    'aluno' => $aluno_curso->name . ' ' . $aluno_curso->surname,
                ];
            }
            $retorno = [
                'data' => $data,
            ];
            return response()->json($retorno);
        }
        return view('alunos_cursos.index', $data);
    }


    public function create()
    {
        $aluno_cursos = Curso::all();
        $alunos = User::all();
        $data = [
            'titulo' => 'Cadastrar Alunos',
            'subtitulo' => 'Cadastrando alunos no curso',
            'cursos' => $aluno_cursos,
            'alunos' => $alunos,
        ];
        return view('alunos_cursos.create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'curso_id' => ['required'],
            'aluno_id' => ['required', 'array'],
        ]);

        $alunos = $request->input('aluno_id');

        foreach ($alunos as $aluno) {
            $aluno_curso = new AlunoCurso();
            $aluno_curso->curso_id = $request->input('curso_id');
            $aluno_curso->aluno_id = $aluno;
            $aluno_curso->save();
        }

        return redirect()->route('alunos_cursos.index')->with('success', 'Alunos cadastrados com sucesso.');
    }



    public function show(string $id)
    {
        $data = [
            'titulo' => '',
            'subtitulo' => '',
        ];
        return view('alunos_cursos.show', $data);
    }


    public function edit(string $id)
    {
        $data = [
            'titulo' => '',
            'subtitulo' => '',
        ];
        return view('alunos_cursos.edit', $data);
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
