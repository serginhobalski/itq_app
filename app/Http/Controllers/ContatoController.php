<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'titulo' => 'Contatos',
            'subtitulo' => 'Gerenciando contatos',
        ];
        return view('contatos.index', $data);
    }

    public function listar_contatos()
    {
        $contatos = Contato::all();
        $data = [];
        foreach ($contatos as $contato) {
            $data[] = [
                'nome' => '<a href="' . route('contatos.show', $contato->id) . '">' . $contato->nome . '</a>',
                'email' => $contato->email,
                'assunto' => $contato->assunto,
                'status' => ($contato->status == false ? 'Pendente' : 'Atendido'),
                'created_at' => date('d/m/Y', strtotime($contato->created_at)),
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
            'titulo' => 'Cria contato',
            'subtitulo' => 'Criação de contato',
        ];
        return view('contatos.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'string'],
            'email' => ['required', 'string'],
            'telefone' => ['nullable', 'string'],
            'assunto' => ['required', 'string'],
            'mensagem' => ['required', 'string'],
        ]);

        $contato = new Contato();

        $contato->nome = $validatedData['nome'];
        $contato->email = $validatedData['email'];
        $contato->telefone = $validatedData['telefone'];
        $contato->assunto = $validatedData['assunto'];
        $contato->mensagem = $validatedData['mensagem'];

        $contato->save();

        return redirect()->route('contatos.index')->with("sucess", "Contato cadastrado!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contato = Contato::find($id);
        $data = [
            'titulo' => 'Contatos',
            'subtitulo' => 'Gerenciando contatos',
            'contato' => $contato,
        ];
        return view('contatos.show', $data);
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
        $request->validate([
            'nome' => ['required', 'max:200'],
            'email' => ['required', 'max:255'],
            'telefone' => ['nullable', 'string'],
            'assunto' => ['required', 'string'],
            'mensagem' => ['required', 'string'],
            'status' => ['required', 'boolean'],
        ]);

        $contato = Contato::findOrFail($id);

        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->assunto = $request->input('assunto');
        $contato->mensagem = $request->input('mensagem');
        $contato->status = $request->input('status');

        $contato->save();

        return redirect()->route('contatos.index')->with('success', 'Contato atualizado.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contato::destroy($id);
        return redirect()->route('contatos.index')->with('success', 'Contato deletado.');
    }
}
