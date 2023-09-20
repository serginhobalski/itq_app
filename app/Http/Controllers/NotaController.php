<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Disciplina;
use App\Models\Nota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $data = [
            'titulo' => 'Notas',
            'subtitulo' => 'Gerenciando notas dos alunos',
        ];

        if (request()->ajax()) {
            $atributos = [
                'notas.id as principal_id',
                'users.name as aluno',
                'notas.nome as nome',
                'notas.nota as nota',
            ];

            $notas = Nota::select($atributos)
                ->join('users', 'users.id', '=', 'notas.user_id')
                ->get();

            $data = [];

            foreach ($notas as $nota) {
                $data[] = [
                    'id' => $nota->principal_id,
                    'aluno' => $nota->aluno,
                    'nome' => $nota->nome,
                    'nota' => $nota->nota,
                    'acao' => '<a href="' . route('notas.edit', $nota->principal_id) . '" title="Editar Nota"><i class="fa-solid fa-pen-to-square text-success"></i></a> <a href="' . route("notas.destroy", $nota->principal_id) . '" title="Deletar Nota" onclick="event.preventDefault(); document.getElementById(\'delete-form-' . $nota->principal_id . '\').submit();"><i class="fa-solid fa-trash text-danger"></i></a> <form id="delete-form-' . $nota->principal_id . '" method="post" action="' . route("notas.destroy", $nota->principal_id) . '">' . csrf_field() . method_field("DELETE") . '</form>',
                ];
            }

            $retorno = [
                'data' => $data,
            ];

            return response()->json($retorno);
        }

        return view('notas.index', $data);
    }

    public function create()
    {
        $disciplinas = Disciplina::all();
        $atividades = Atividade::all();
        $alunos = User::all();
        $data = [
            'titulo' => 'Cadastrar Nota',
            'subtitulo' => 'Cadastrando Nota de aluno',
            'disciplinas' => $disciplinas,
            'atividades' => $atividades,
            'alunos' => $alunos,
        ];

        return view('notas.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'disciplina_id' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'nota' => ['required', 'numeric'],
        ]);

        $nota = new Nota();

        $nota->disciplina_id = $request->input('disciplina_id');
        $nota->user_id = $request->input('user_id');
        $nota->nome = $request->input('nome');
        $nota->nota = $request->input('nota');

        $nota->save();

        return redirect()->route('notas.create')->with('success', 'Nota cadastrada com sucesso.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $nota = Nota::find($id);
        $user_id = $nota->user_id;
        $aluno = User::where('id', $user_id)->first();
        $data = [
            'titulo' => 'Editar Nota',
            'subtitulo' => 'Atualizando Nota de aluno',
            'nota' => $nota,
            'aluno' => $aluno,
        ];

        return view('notas.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        Nota::destroy($id);

        return redirect()->route('notas.index')->with('success', 'Nota deletada com sucesso.');
    }
}
