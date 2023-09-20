<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $data = [
            'titulo' => 'PDF',
            'subtitulo' => 'Gerenciando PDF das disciplinas',
        ];
        if (request()->ajax()) {
            $pdfs = Pdf::all();

            $data = [];

            foreach ($pdfs as $pdf) {
                $data[] = [
                    'id' => $pdf->id,
                    'nome' => '<a href="' . route('pdfs.show', $pdf->id) . '">' . $pdf->nome . '</a>',
                    'disciplina_id' => strtoupper($pdf->disciplina_id),
                ];
            }
            $retorno = [
                'data' => $data,
            ];
            return response()->json($retorno);
        }

        return view('pdfs.index', $data);
    }

    public function create()
    {
        $disciplinas = Disciplina::all();
        $data = [
            'titulo' => 'Cadastrar PDF',
            'subtitulo' => 'Cadastrando PDF de disciplina',
            'disciplinas' => $disciplinas,
        ];

        return view('pdfs.create', $data);
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

        $pdf = new Pdf();

        $pdf->disciplina_id = $request->input('disciplina_id');
        $pdf->nome = $request->input('nome');
        $pdf->descricao = $request->input('descricao');
        $pdf->ch = $request->input('ch');
        $pdf->link = $request->input('link');
        $pdf->codigo = $request->input('codigo');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $image = $request->file('imagem');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('cursos', $agora . '.' . $extension);
            $pdf->imagem = $imagePath;
        }

        $pdf->save();

        return redirect()->route('pdfs.index')->with('success', 'PDF cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
