<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index()
    {
        $data = [
            'titulo' => 'Cursos',
            'subtitulo' => 'Gerenciando Cursos',
        ];
        if (request()->ajax()) {
            $cursos = Curso::all();

            $data = [];

            foreach ($cursos as $curso) {
                $data[] = [
                    'id' => $curso->id,
                    'nome' => '<a href="' . route('cursos.show', $curso->id) . '">' . $curso->nome . '</a>',
                    'categoria' => strtoupper($curso->categoria),
                    'valor' => 'R$ ' . implode(',', explode('.', $curso->valor)),
                    'ativo' => ($curso->ativo == true ? '<strong class="text-success">Ativo</strong>' : '<strong class="text-danger">Inativo</strong>'),
                ];
            }
            $retorno = [
                'data' => $data,
            ];
            return response()->json($retorno);
        }

        return view('cursos.index', $data);
    }


    public function create()
    {
        $data = [
            'titulo' => 'Criar Curso',
            'subtitulo' => 'Criando novo curso',
        ];

        return view('cursos.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string'],
            'descricao' => ['nullable', 'string'],
            'valor' => ['required', 'numeric'],
            'categoria' => ['required', 'string'],
            'ativo' => ['required', 'boolean'],
            'imagem' => ['nullable', 'file'],
        ]);

        $curso = new Curso();

        $curso->nome = $request->input('nome');
        $curso->descricao = $request->input('descricao');
        $curso->valor = $request->input('valor');
        $curso->categoria = $request->input('categoria');
        $curso->ativo = $request->input('ativo');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('cursos', $agora . '.' . $extension);
            $curso->imagem = $imagePath;
        }

        $curso->save();

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso.');
    }

    public function show(string $id)
    {
        $curso = Curso::find($id);
        $data = [
            'titulo' => 'Curso',
            'subtitulo' => 'Gerenciando Curso',
            'curso' => $curso,
        ];

        return view('cursos.show', $data);
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
