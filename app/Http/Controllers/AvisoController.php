<?php

namespace App\Http\Controllers;

use App\Models\Aviso;
use Illuminate\Http\Request;

class AvisoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'titulo' => 'Avisos',
            'subtitulo' => 'Gerenciando Avisos',
        ];
        return view('avisos.index', $data);
    }

    public function listar_avisos()
    {
        $avisos = Aviso::all();
        $data = [];
        foreach ($avisos as $aviso) {
            $data[] = [
                'titulo' => '<a href="' . route('avisos.show', $aviso->id) . '">' . $aviso->titulo . '</a>',
                'grupo' => $aviso->grupo,
                'created_at' => date('d/m/Y', strtotime($aviso->created_at)),
                'acoes' => '<a class="btn btn-primary text-danger ml-2" href="' . route('avisos.destroy', $aviso->id) . '" onclick="event.preventDefault(); document.getElementById(\'logout-form\').submit();"> <i class="fa fa-trash"></i> Deletar</a> <form id="logout-form" action="' . route('avisos.destroy', $aviso->id) . '" method="POST" class="d-none"> @csrf  @method("DELETE") </form>',
            ];
        }
        $retorno = [
            'data' => $data,
        ];
        return response()->json($retorno);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'titulo' => 'Criar Aviso',
            'subtitulo' => 'Cadastrar novo aviso no sistema',
        ];
        return view('avisos.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'grupo' => ['required', 'string'],
            'icone' => ['required', 'string'],
            'titulo' => ['required', 'string'],
            'descricao' => ['nullable', 'string'],
            'imagem' => ['nullable', 'image'],
        ]);

        $aviso = new Aviso();

        $aviso->grupo = $request->input('grupo');
        $aviso->icone = $request->input('icone');
        $aviso->titulo = $request->input('titulo');
        $aviso->descricao = $request->input('descricao');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imagemPath = $request->file('imagem')->store('avisos');
            $aviso->imagem = $imagemPath;
        }

        $aviso->save();

        return redirect()->route('avisos.index')->with('success', 'Aviso criado com sucesso.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aviso = Aviso::find($id);
        $data = [
            'titulo' => 'Criaar Aviso',
            'subtitulo' => 'Cadastrar novo aviso no sistema',
            'aviso' => $aviso,
        ];
        return view('avisos.create', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Aviso::destroy($id);
        return redirect()->route('avisos.index')->with('success', 'Aviso deletado com sucesso.');
    }
}
