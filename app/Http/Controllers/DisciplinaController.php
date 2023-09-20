<?php

namespace App\Http\Controllers;

use App\Models\AlunoCurso;
use App\Models\Atividade;
use App\Models\Aula;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Nota;
use App\Models\Pdf;
use App\Models\User;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $data = [
            'titulo' => 'Disciplinas',
            'subtitulo' => 'Gerenciando Disciplinas',
        ];
        if (request()->ajax()) {
            $disciplinas = Disciplina::all();

            $data = [];

            foreach ($disciplinas as $disciplina) {
                $data[] = [
                    'id' => $disciplina->id,
                    'nome' => '<a href="' . route('disciplinas.show', $disciplina->id) . '">' . $disciplina->nome . '</a>',
                    'modulo' => strtoupper($disciplina->modulo),
                    'acoes' => '<a href="' . route('disciplinas.show', $disciplina->id) . '" title="Visualizar Disciplina"><i class="fa-solid fa-eye text-info"></i></a> <a href="' . route('disciplinas.edit', $disciplina->id) . '" title="Editar Disciplina"><i class="fa-solid fa-pen-to-square text-success"></i></a> <a href="' . route("disciplinas.destroy", $disciplina->id) . '" title="Deletar Evento" onclick="event.preventDefault(); document.getElementById(\'delete-form-' . $disciplina->id . '\').submit();"><i class="fa-solid fa-trash text-danger"></i></a> <form id="delete-form-' . $disciplina->id . '" method="post" action="' . route("disciplinas.destroy", $disciplina->id) . '">' . csrf_field() . method_field("DELETE") . '</form>',
                ];
            }
            $retorno = [
                'data' => $data,
            ];
            return response()->json($retorno);
        }

        return view('disciplinas.index', $data);
    }

    public function create()
    {
        $cursos = Curso::all();
        $data = [
            'titulo' => 'Cadastrar Disciplina',
            'subtitulo' => 'Cadastrando Nova Disciplina no Sistema',
            'cursos' => $cursos,
        ];

        return view('disciplinas.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'curso_id' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'descricao' => ['nullable', 'string'],
            'ch' => ['nullable', 'numeric'],
            'link' => ['nullable', 'string'],
            'codigo' => ['nullable', 'string'],
            'modulo' => ['nullable', 'string'],
            'imagem' => ['nullable', 'file'],
        ]);

        $disciplina = new Disciplina();

        $disciplina->curso_id = $request->input('curso_id');
        $disciplina->nome = $request->input('nome');
        $disciplina->descricao = $request->input('descricao');
        $disciplina->ch = $request->input('ch');
        $disciplina->link = $request->input('link');
        $disciplina->codigo = $request->input('codigo');
        $disciplina->modulo = $request->input('modulo');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('cursos', $agora . '.' . $extension);
            $disciplina->imagem = $imagePath;
        }

        $disciplina->save();

        return redirect()->route('disciplinas.index')->with('success', 'Disciplina cadastrada com sucesso.');
    }

    public function show(string $id)
    {
        $disciplina = Disciplina::find($id);
        $curso_id = $disciplina->curso_id;
        $aulas = Aula::where('disciplina_id', $id)->get();
        $pdfs = Pdf::where('disciplina_id', $id)->get();
        $atividades = Atividade::where('disciplina_id', $id)->get();
        $usuarios =  User::all();
        $atributos = [
            'aluno_cursos.id as principal_id',
            'aluno_cursos.curso_id as curso_id',
            'aluno_cursos.aluno_id as aluno_id',
            'users.id as user_id',
            'users.name as name',
            'users.email as email',
        ];
        $alunos = AlunoCurso::select($atributos)
            ->where('curso_id', $curso_id)
            ->join('users', 'aluno_cursos.aluno_id', '=', 'users.id')
            ->get();
        $atr_notas = [
            'notas.disciplina_id as curso_id',
            'notas.user_id as aluno_id',
            'notas.nome as nome',
            'notas.nota as nota',
            'users.name as aluno',
        ];
        $notas = Nota::select($atr_notas)
            ->where('disciplina_id', $id)
            ->join('users', 'notas.user_id', '=', 'users.id')
            ->get();

        $data = [
            'titulo' => 'Disciplina: ' . $disciplina->nome,
            'subtitulo' => $disciplina->nome . ' | ' . $disciplina->modulo,
            'disciplina' => $disciplina,
            'aulas' => $aulas,
            'pdfs' => $pdfs,
            'atividades' => $atividades,
            'alunos' => $alunos,
            'notas' => $notas,
            'usuarios' => $usuarios,
        ];
        return view('disciplinas.show', $data);
    }

    public function storeAula(Request $request)
    {
        $request->validate([
            'disciplina_id' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'link' => ['required', 'string'],
            'codigo' => ['nullable', 'string'],
        ]);

        $aula = new Aula();

        $aula->disciplina_id = $request->input('disciplina_id');
        $aula->nome = $request->input('nome');
        $aula->link = $request->input('link');
        $aula->codigo = $request->input('codigo');

        $aula->save();

        return redirect()->back()->with('success', 'Aula cadastrada com sucesso.');
    }

    public function storePdf(Request $request)
    {
        $request->validate([
            'disciplina_id' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'link' => ['required', 'string'],
            'codigo' => ['nullable', 'string'],
        ]);

        $pdf = new Pdf();

        $pdf->disciplina_id = $request->input('disciplina_id');
        $pdf->nome = $request->input('nome');
        $pdf->link = $request->input('link');
        $pdf->codigo = $request->input('codigo');

        $pdf->save();

        return redirect()->back()->with('success', 'PDF cadastrada com sucesso.');
    }

    public function storeAtividade(Request $request)
    {
        // dd($request);
        $request->validate([
            'disciplina_id' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'link' => ['required', 'string'],
            'codigo' => ['nullable', 'string'],
        ]);

        $atividade = new Atividade();

        $atividade->disciplina_id = $request->input('disciplina_id');
        $atividade->nome = $request->input('nome');
        $atividade->link = $request->input('link');
        $atividade->codigo = $request->input('codigo');

        $atividade->save();

        return redirect()->back()->with('success', 'Atividade cadastrada com sucesso.');
    }

    public function storeAluno(Request $request)
    {
        $request->validate([
            'curso_id' => ['required', 'string'],
            'aluno_id' => ['required', 'string'],
        ]);

        $aluno = new AlunoCurso();

        $aluno->curso_id = $request->input('curso_id');
        $aluno->aluno_id = $request->input('aluno_id');

        $aluno->save();

        return redirect()->back()->with('success', 'Aluno(s) cadastrado(s) com sucesso.');
    }

    public function storeNota(Request $request)
    {
        // dd($request);
        $request->validate([
            'disciplina_id' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'nota' => ['required', 'string'],
        ]);

        $nota = new Nota();

        $nota->disciplina_id = $request->input('disciplina_id');
        $nota->user_id = $request->input('user_id');
        $nota->nome = $request->input('nome');
        $nota->nota = $request->input('nota');

        $nota->save();

        return redirect()->back()->with('success', 'Nota cadastrada com sucesso.');
    }

    public function edit(string $id)
    {
        $disciplina = Disciplina::find($id);
        $data = [
            'titulo' => 'Editar Disciplina',
            'subtitulo' => 'Editando Disciplina no Sistema',
            'disciplina' => $disciplina,
        ];

        return view('disciplinas.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        // dd($request);
        $request->validate([
            'curso_id' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'descricao' => ['nullable', 'string'],
            'ch' => ['nullable', 'numeric'],
            'link' => ['nullable', 'string'],
            'codigo' => ['nullable', 'string'],
            'modulo' => ['nullable', 'string'],
            'imagem' => ['nullable', 'file'],
        ]);

        $disciplina = Disciplina::find($id);

        $disciplina->curso_id = $request->input('curso_id');
        $disciplina->nome = $request->input('nome');
        $disciplina->descricao = $request->input('descricao');
        $disciplina->ch = $request->input('ch');
        $disciplina->link = $request->input('link');
        $disciplina->codigo = $request->input('codigo');
        $disciplina->modulo = $request->input('modulo');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('cursos', $agora . '.' . $extension);
            $disciplina->imagem = $imagePath;
        }

        $disciplina->save();

        return redirect()->route('disciplinas.index')->with('success', 'Disciplina atualizada com sucesso.');
    }

    public function destroy(string $id)
    {
        Disciplina::destroy($id);

        return redirect()->route('disciplinas.index')->with('success', 'Disciplina deletada com sucesso.');
    }
}
