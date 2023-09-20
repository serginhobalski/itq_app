<?php

namespace App\Http\Controllers;

use App\Models\LogUser;
use App\Models\Relatorio;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDO;

class AdmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('acesso');
        $this->middleware('admin');
    }

    public function index()
    {

        $qtn_usuarios = User::count();
        $usuarios = DB::table('users')
            ->orderByDesc('id')
            ->paginate(5);
        $data = [
            'titulo' => 'Painel ADM',
            'subtitulo' => 'Gerenciamento global do sistema',
            'qtn_usuarios' => $qtn_usuarios,
            'usuarios' => $usuarios,
        ];
        // dd( $data );
        return view('adm.index', $data);
    }


    public function listar_eventos()
    {
        $query_events = DB::table('eventos')
            ->select('id', 'title', 'color', 'start', 'end');
        $resultado_events = $query_events->get();

        $eventos = [];

        foreach ($resultado_events as $row_events) {
            $id = $row_events->id;
            $title = $row_events->title;
            $color = $row_events->color;
            $start = $row_events->start;
            $end = $row_events->end;

            $eventos[] = [
                'id' => $id,
                'title' => $title,
                'color' => $color,
                'start' => $start,
                'end' => $end,
            ];
        }

        return response()->json($eventos);
    }

    public function teste()
    {

        $data = [
            'titulo' => 'Eventos',
            'subtitulo' => 'Gerenciamento eventos',
        ];
        // dd( $data );
        return view('adm.teste', $data);
    }

    public function perfil(string $id)
    {
        $usuario = User::findOrFail($id);
        $data = [
            'titulo' => 'Usuário',
            'subtitulo' => 'Editando detalhes do usuário ' . $usuario->name,
            'usuario' => $usuario,
        ];
        return view('adm.editar_usuario', $data);
    }

    public function update_usuario(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
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

        return redirect()->route('adm')->with('success', 'Usuário atualizado com sucesso.');
    }
}
