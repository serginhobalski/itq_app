<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Curso;
use App\Models\EnaqNota;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        $data = [
            'titulo' => 'Início',
            'subtitulo' => 'Página Inicial',
            'cursos' => $cursos,
        ];
        return view('site.index', $data);
    }

    public function sucesso()
    {
        $data = [
            'titulo' => 'Sucesso',
            'subtitulo' => 'Sua operação foi realizada com sucesso!',
        ];
        return view('site.sucesso', $data);
    }

    public function contato()
    {
        $data = [
            'titulo' => 'Contato',
            'subtitulo' => 'Entre em contato',
        ];
        return view('site.contato', $data);
    }

    public function cadastra_contato(Request $request)
    {
        // dd($request);
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

        return redirect()->route('sucesso');
    }

    public function treinamentos()
    {
        $data = [
            'titulo' => 'Treinamentos',
            'subtitulo' => 'Treinamentos da SEEC-PA',
        ];
        return view('site.treinamentos', $data);
    }

    public function cursos()
    {
        $cursos = Curso::all();
        $data = [
            'titulo' => 'Cursos',
            'subtitulo' => 'Cursos oferecidos em nossa plataforma',
            'cursos' => $cursos,
        ];
        return view('site.cursos', $data);
    }

    public function departamentos()
    {
        $data = [
            'titulo' => 'Departamentos',
            'subtitulo' => 'Áreas de atuação da SEEC-PA',
        ];
        return view('site.departamentos', $data);
    }


    public function eventos()
    {
        $data = [
            'titulo' => 'Eventos',
            'subtitulo' => 'Eventos promovidos ou relacionados à SEEC-PA.',
        ];
        if (request()->ajax()) {
            $start = (!empty($_GET['start'])) ? ($_GET['start']) : ('');
            $end = (!empty($_GET['end'])) ? ($_GET['end']) : ('');
            $events = Evento::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)
                ->get(['id', 'title', 'description', 'place', 'address', 'color', 'image', 'start', 'end']);
            return response()->json($events);
        }
        return view('site.eventos', $data);
    }

    public function listar_eventos()
    {
        $eventos = Evento::all();
        $data = [];
        foreach ($eventos as $evento) {
            $data[] = [
                'title' => '<a href="' . route('eventos.show', $evento->id) . '">' . $evento->title . '</a>',
                'place' => $evento->place,
                'start' => $evento->start,
                'end' => $evento->end,
                'acoes' => '<a href="' . route('eventos.show', $evento->id) . '" title="Editar Evento"><i class="fa-solid fa-pen-to-square text-success"></i></a> <form method="post" action="' . route('eventos.destroy', $evento->id) . '">' . csrf_field() . method_field("DELETE") . ' <button class="border-none bg-transparent" type="submit" title="Deletar Evento"><i class="fa-solid fa-trash text-danger"></i></button></form>',
            ];
        }
        $retorno = [
            'data' => $data,
        ];
        return response()->json($retorno);
    }

    public function itq()
    {
        $data = [
            'titulo' => 'ITQ EAD',
            'subtitulo' => 'Instituto Teológico Quadrangular EAD',
        ];
        return view('site.itq', $data);
    }

    public function postulantes()
    {
        $data = [
            'titulo' => 'Curso de Postulantes',
            'subtitulo' => 'Curso ministerial preparatório para o ENAQ',
        ];
        return view('site.postulantes', $data);
    }

    public function sobre()
    {
        $data = [
            'titulo' => 'Sobre Nós',
            'subtitulo' => 'SEEC-PA | Secretaria Estadual de Educa;áo e Cultura da IEQ no Pará',
        ];
        return view('site.sobre', $data);
    }

    public function perfil(string $id)
    {
        $usuario = User::find($id);
        $data = [
            'titulo' => 'Perfil',
            'subtitulo' => 'Perfil do usuário ' . $usuario->name,
            'usuario' => $usuario,
        ];
        return view('site.perfil', $data);
    }

    public function update_usuario(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'surname' => ['nullable', 'max:200'],
            'username' => ['required', 'string'],
            'email' => ['required', 'email'],
            'group' => ['required', 'max:100'],
            'image' => ['nullable', 'file'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->group = $request->input('group');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('usuarios');
            $user->image = $imagePath;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('home')->with('success', 'Dados atualizados com sucesso.');
    }
}
