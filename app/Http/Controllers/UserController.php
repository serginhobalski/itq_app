<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Exports\UsersExport;
use App\Models\User;
use App\Models\UsuarioGrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(UsersDataTable $dataTable)
    {
        $data = [
            'titulo' => 'Usuários',
            'subtitulo' => 'Gerenciando Usuários do Sistema',
        ];
        return $dataTable->render('usuarios.index', $data);
    }

    public function recupera_usuarios()
    {
        $atributos = [
            'id',
            'name',
            'email',
            'group',
        ];
        $usuarios = User::all($atributos);

        $data = [];

        foreach ($usuarios as $usuario) {
            $data[] = [
                'id' => $usuario->id,
                'name' => '<a href="' . route('usuarios.show', $usuario->id) . '">' . $usuario->name . '</a>',
                'email' => $usuario->email,
                'group' => strtoupper($usuario->group),
            ];
        }

        $retorno = [
            'data' => $data,
        ];

        return response()->json($retorno);
    }

    public function create()
    {
        $data = [
            'titulo' => 'Criar Usuário',
            'subtitulo' => 'Criando novo usuário ',
        ];
        return view('usuarios.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'surname' => ['nullable', 'max:200'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'group' => ['required', 'max:100'],
            'image' => ['nullable', 'file'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->group = $request->input('group');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('usuarios');
            $user->image = $imagePath;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        $grupoUsuario = new UsuarioGrupo();

        if ($user->group == 'adm') {
            $grupoUsuario->user_id = $user->id;
            $grupoUsuario->grupo_id = 1;
        } elseif ($user->group == 'uetp') {
            $grupoUsuario->user_id = $user->id;
            $grupoUsuario->grupo_id = 2;
        } elseif ($user->group == 'aluno_itq') {
            $grupoUsuario->user_id = $user->id;
            $grupoUsuario->grupo_id = 3;
        } elseif ($user->group == 'aluno_postulante') {
            $grupoUsuario->user_id = $user->id;
            $grupoUsuario->grupo_id = 4;
        } elseif ($user->group == 'professor') {
            $grupoUsuario->user_id = $user->id;
            $grupoUsuario->grupo_id = 5;
        } elseif ($user->group == 'secretario') {
            $grupoUsuario->user_id = $user->id;
            $grupoUsuario->grupo_id = 6;
        } elseif ($user->group == 'visitante') {
            $grupoUsuario->user_id = $user->id;
            $grupoUsuario->grupo_id = 7;
        }

        $grupoUsuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso.');
    }

    public function show(string $id)
    {
        $usuario = User::find($id);
        $data = [
            'titulo' => 'Usuário',
            'subtitulo' => 'Exibindo detalhes do usuário ' . $usuario->name,
            'usuario' => $usuario,
        ];
        return view('usuarios.show', $data);
    }

    public function perfil(string $id)
    {
        $usuario = User::find($id);
        $data = [
            'titulo' => 'Perfil',
            'subtitulo' => 'Perfil do usuário ' . $usuario->name,
            'usuario' => $usuario,
        ];
        return view('usuarios.perfil', $data);
    }

    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        $data = [
            'titulo' => 'Usuário',
            'subtitulo' => 'Editando detalhes do usuário ' . $usuario->name,
            'usuario' => $usuario,
        ];
        return view('usuarios.edit', $data);
    }

    public function update(Request $request, string $id)
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
            $agora = date('YmdHis');
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('usuarios', $agora . '.' . $extension);
            $user->image = $imagePath;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        User::destroy($id);

        return redirect()->route('usuarios.index');
    }

    public function usuarios_xlsx()
    {
        return Excel::download(new UsersExport, 'usuarios_sistema.xlsx');
    }

    public function usuarios_csv()
    {
        return Excel::download(new UsersExport, 'usuarios_sistema.csv');
    }
}
