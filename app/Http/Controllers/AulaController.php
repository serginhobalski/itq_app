<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $data = [
            'titulo' => 'Aulas',
            'subtitulo' => 'Gerenciando Aulas das disciplinas',
        ];
        if (request()->ajax()) {
            $aulas = Aula::all();

            $data = [];

            foreach ($aulas as $aula) {
                $data[] = [
                    'id' => $aula->id,
                    'nome' => '<a href="' . route('aulas.show', $aula->id) . '">' . $aula->nome . '</a>',
                    'disciplina_id' => strtoupper($aula->disciplina_id),
                ];
            }
            $retorno = [
                'data' => $data,
            ];
            return response()->json($retorno);
        }

        return view('aulas.index', $data);
    }

    public function create()
    {
        $disciplinas = Disciplina::all();
        $data = [
            'titulo' => 'Cadastrar Aula',
            'subtitulo' => 'Cadastrando aula de disciplina',
            'disciplinas' => $disciplinas,
        ];

        return view('aulas.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'disciplina_id' => ['required', 'string'],
            'nome' => ['required', 'string'],
            'descricao' => ['nullable', 'string'],
            'ch' => ['nullable', 'numeric'],
            'link' => ['required', 'string'],
            'codigo' => ['nullable', 'string'],
            'imagem' => ['nullable', 'file'],
        ]);

        $aula = new Aula();

        $aula->disciplina_id = $request->input('disciplina_id');
        $aula->nome = $request->input('nome');
        $aula->descricao = $request->input('descricao');
        $aula->ch = $request->input('ch');
        $aula->link = $request->input('link');
        $aula->codigo = $request->input('codigo');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('cursos', $agora . '.' . $extension);
            $aula->imagem = $imagePath;
        }

        $aula->save();

        return redirect()->route('aulas.index')->with('success', 'Aula cadastrada com sucesso.');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
