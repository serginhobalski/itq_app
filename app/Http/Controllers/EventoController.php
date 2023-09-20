<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EventoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('acesso');
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {

        $data = [
            'titulo' => 'Eventos',
            'subtitulo' => 'Listando Eventos',
        ];
        if (request()->ajax()) {
            $start = (!empty($_GET['start'])) ? ($_GET['start']) : ('');
            $end = (!empty($_GET['end'])) ? ($_GET['end']) : ('');
            $events = Evento::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)
                ->get(['id', 'title', 'description', 'place', 'address', 'color', 'image', 'start', 'end']);
            return response()->json($events);
        }
        return view('eventos.index', $data);
    }


    public function listar_eventos()
    {
        $eventos = Evento::all();
        $data = [];
        foreach ($eventos as $evento) {
            $data[] = [
                'title' => '<a href="' . route('eventos.show', $evento->id) . '">' . $evento->title . '</a>',
                'place' => $evento->place,
                'start' => date('d/m/Y | H:i', strtotime($evento->start)),
                'end' => date('d/m/Y | H:i', strtotime($evento->end)),
                'acoes' => '<a href="' . route('eventos.show', $evento->id) . '" title="Editar Evento"><i class="fa-solid fa-pen-to-square text-success"></i></a> <a href="' . route("eventos.destroy", $evento->id) . '" title="Deletar Evento" onclick="event.preventDefault(); document.getElementById(\'delete-form-' . $evento->id . '\').submit();"><i class="fa-solid fa-trash text-danger"></i></a> <form id="delete-form-' . $evento->id . '" method="post" action="' . route("eventos.destroy", $evento->id) . '">' . csrf_field() . method_field("DELETE") . '</form>',
            ];
        }
        $retorno = [
            'data' => $data,
        ];
        return response()->json($retorno);
    }

    public function criar_evento(Request $request)
    {
        $data = $request->except('_token');
        $events = Evento::insert($data);
        return response()->json($events);
    }

    public function detalhe_evento(Request $request)
    {
        $event = Evento::find($request->id);
        // return $event;
        echo
        'Evento: ' . $event->title . '<br>' .
            'Período: ' . date('d/m/Y - H:i', strtotime($event->created_at)) . '<br>';
    }

    public function create()
    {
        $data = [
            'titulo' => 'Cadastrar Evento',
            'subtitulo' => 'Cadastrar novo evento no sistema',
        ];
        return view('eventos.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'place' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'color' => ['nullable', 'string'],
            'image' => ['nullable', 'file'],
            'start' => ['required', 'date_format:Y-m-d H:i:s'],
            'end' => ['required', 'date_format:Y-m-d H:i:s', 'after:start'],
        ]);

        $evento = new Evento();

        $evento->title = $request->input('title');
        $evento->description = $request->input('description');
        $evento->place = $request->input('place');
        $evento->address = $request->input('address');
        $evento->color = $request->input('color');
        $evento->start = $request->input('start');
        $evento->end = $request->input('end');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('eventos', $agora . '.' . $extension);
            $evento->image = $imagePath;
        }

        $evento->save();

        return redirect()->route('eventos.index')->with('success', 'Evento criado com sucesso.');
    }


    public function show(string $id)
    {

        $evento = Evento::find($id);
        $data = [
            'titulo' => 'Evento',
            'subtitulo' => 'Detalhes do Evento',
            'evento' => $evento,
        ];
        return view('eventos.show', $data);
    }

    public function edit(string $id)
    {

        //
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'description' => ['nullable', 'max:200'],
            'place' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'color' => ['nullable', 'string'],
            'image' => ['nullable', 'file'],
            'start' => ['required', 'date_format:Y-m-d H:i:s'],
            'end' => ['required', 'date_format:Y-m-d H:i:s', 'after:start'],
        ]);

        $evento = Evento::findOrFail($id);

        $evento->title = $request->input('title');
        $evento->description = $request->input('description');
        $evento->place = $request->input('place');
        $evento->address = $request->input('address');
        $evento->color = $request->input('color');
        $evento->start = $request->input('start');
        $evento->end = $request->input('end');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('eventos', $agora . '.' . $extension);
            $evento->image = $imagePath;
        }

        $evento->save();

        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        Evento::destroy($id);
        return redirect()->route('eventos.index')->with('success', 'Evento deletado com sucesso.');
    }
}
