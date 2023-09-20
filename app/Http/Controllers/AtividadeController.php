<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class AtividadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $data = [
            'titulo' => 'Atividades',
            'subtitulo' => 'Gerenciando atividades das disciplinas',
        ];
        if (request()->ajax()) {
            $atividades = Atividade::all();

            $data = [];

            foreach ($atividades as $atividade) {
                $data[] = [
                    'id' => $atividade->id,
                    'nome' => '<a href="' . route('atividades.show', $atividade->id) . '">' . $atividade->nome . '</a>',
                    'disciplina_id' => strtoupper($atividade->disciplina_id),
                ];
            }
            $retorno = [
                'data' => $data,
            ];
            return response()->json($retorno);
        }

        return view('atividades.index', $data);
    }

    public function create()
    {
        $disciplinas = Disciplina::all();
        $data = [
            'titulo' => 'Cadastrar Atividade',
            'subtitulo' => 'Cadastrando atividade de disciplina',
            'disciplinas' => $disciplinas,
        ];

        return view('atividades.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nome' => ['required', 'string'],
            'descricao' => ['nullable', 'string'],
            'ch' => ['nullable', 'numeric'],
            'link' => ['required', 'string'],
            'codigo' => ['nullable', 'string'],
            'imagem' => ['nullable', 'file'],
        ]);

        $atividade = new Atividade();

        $atividade->disciplina_id = $request->input('disciplina_id');
        $atividade->nome = $request->input('nome');
        $atividade->descricao = $request->input('descricao');
        $atividade->ch = $request->input('ch');
        $atividade->link = $request->input('link');
        $atividade->codigo = $request->input('codigo');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('imagem', $agora . '.' . $extension);
            $atividade->imagem = $imagePath;
        }

        $atividade->save();

        return redirect()->route('atividades.index')->with('success', 'Atividade cadastrada com sucesso.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
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
